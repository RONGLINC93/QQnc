# QQ农场 飞牛 fnOS fpk 打包工程

> 工程位置：`D:\Desktop\developing\QQnc\fnos\`
> 项目总览（目录布局、完整构建流程、排障表）见上级目录的
> [`../README.md`](../README.md)。本文件偏 fpk 包内部实现细节。

把原 Windows 端（ESSAMP + Apache + PHP5 + MySQL5.1 + Discuz X2 + QQ农场插件）容器化，
打包为飞牛 fnOS 可安装的 `.fpk` 应用。

## 架构

| 容器 | 镜像 | 作用 |
|---|---|---|
| mysql | mariadb:10.6 | 数据库，gbk 字符集，首次启动自动导入 `app/db/qqfarm.sql`（248 张表） |
| web | webdevops/php-apache:5.6 | PHP5.6 + Apache（含 mysqli/pdo_mysql/gd/mcrypt），对外唯一端口（默认 8081），运行 Discuz X2 |
| panel | python:3.12-slim | 纯标准库管理面板：服务状态 / 充值工具（金币、元宝）/ 微端说明，经网关 unix socket 暴露 |

> 全部使用预构建镜像，**安装时不做任何 build**（飞牛在现场构建镜像时无法完成 registry 鉴权）。
> 面板不依赖 flask/pymysql：数据读写走站点内的 `panel_api.php`，因此无需 pip 联网。
> **Discuz X2 依赖已废弃的 `mysql_*` 扩展**，而 PHP5.6 容器镜像普遍不带它：`app/site/config/mysql_compat.php`
> 通过 `auto_prepend_file` 把这 18 个老函数映射到 mysqli（由 `app/docker/web/qqfarm.ini` 挂载启用）。
> 官方 `php:5.6-apache` 连 mysqli 都没有，故必须用 `webdevops/php-apache:5.6`。

- 已替代的 Windows 组件：`[1].启动网站数据库.exe`、`[2].启动QQ农场.exe`、`[3].充值工具.exe`、`微端配置器`
- 充值逻辑：按论坛账号更新 `pre_qqfarm_user.money`（金币）/ `yb`（元宝），与原工具等价

## 打包步骤（在能联网的电脑上）

1. 组装载荷（已完成一次；站点更新后重跑即可。源站点仍在 `d:\QQnc\wwwroot`）：
   ```
   python D:\Desktop\developing\QQnc\tools\prepare_payload.py
   ```
2. fnpack 已放在 `..\tools\bin\fnpack.exe`（1.2.3 Windows amd64）；如需重新下载，
   官方直链 `https://static2.fnnas.com/fnpack/fnpack-1.2.3-windows-amd64`。
3. 打包：
   ```
   cd D:\Desktop\developing\QQnc\fnos
   ..\tools\bin\fnpack.exe build
   ```
   产物 `qqfarm.fpk`（x86 架构，约 94 MB）。
4. 飞牛 fnOS：应用中心 → 手动安装 → 选择 fpk → 按向导填端口（默认 8081）。
5. 安装后桌面出现两个图标：「QQ农场管理」（面板）与「进入QQ农场」（游戏直达），
   游戏本体地址：`http://NAS_IP:向导填写的端口`
   - 默认论坛管理员：`admin / 123456`
   - 游戏设置在论坛管理员后台 → 插件

## 桌面入口

`app/ui/config` 注册两个入口：

| 入口 ID | 标题 | 方式 |
|---|---|---|
| `qqfarm.main`（默认） | QQ农场管理 | `iframe` + 统一网关 `/app/qqfarm` → `app.sock` → 管理面板 |
| `qqfarm.game` | 进入QQ农场 | `url` + `${wizard_http_port}`，浏览器直达游戏，端口自动跟随向导值 |

**必须**在 `manifest` 里显式声明，否则 fnOS 安装后这两个字段为空、桌面不会生成图标：

```ini
desktop_uidir = ui
desktop_applaunchname = qqfarm.main
checkport = false
```

`checkport=false` 与同机网关型应用（alipan / cups-web / fndepot）一致，避免 fnOS 对静态
`service_port` 做端口占用检查而误判。

网关访问时请求可能带 `/app/qqfarm` 前缀，面板 `do_GET` 已做前缀剥离、表单用 `action=""`
提交到当前路径、重定向用相对 `?msg=`，保证在桌面窗口内不跳出去。

## 修改端口

- **安装时**：向导「游戏服务端口」可填任意空闲端口（默认 8081）。
- **安装后**：应用中心 → QQ农场 → 设置/配置 → 修改端口，保存后 `cmd/config_callback`
  会自动重建容器，论坛、游戏、牧场和管理面板里的「打开游戏」链接会一起切到新端口，
  数据库与存档不丢失。

实现要点（fnOS 规范）：

1. 向导字段 `wizard_http_port` 会注入为**同名环境变量**，compose 里必须用
   `${wizard_http_port:-8081}`，不能用自定义变量名；
2. `cmd/*` 会把端口持久化到 `${TRIM_PKGETC}/qqfarm_port.conf`，并写入
   `app/docker/.env`（Compose 自动加载项目目录下的 `.env`）——这样即使 fnOS
   直接执行 `docker compose up` 且未注入向导变量，端口也不会掉回 8081；
3. 所有 compose 调用统一带 `-p qqfarm`，与 `config/resource` 声明的项目名一致，
   否则会因容器名冲突而改端口失败；
4. `PANEL_GAME_PORT` 也取自同一变量，面板显示的游戏地址始终正确。

若当前安装的应用设置里没有配置入口（旧版包），可手动改：

```bash
echo 'wizard_http_port=8090' | sudo tee /vol1/@appcenter/qqfarm/docker/.env
cd /vol1/@appcenter/qqfarm/docker
sudo TRIM_APPDEST=/vol1/@appcenter/qqfarm TRIM_PKGVAR=/vol1/@appdata/qqfarm \
  docker compose -p qqfarm -f docker-compose.yaml up -d --force-recreate
```

> `manifest.service_port` 是 fnOS 应用卡片用的静态声明值（8081），不影响上面的动态端口；
> 端口是否被占用请由向导/用户自行确认，避免 5666/5667/8000 等系统端口。

## 本地联调（Windows Docker Desktop）

```
cd D:\Desktop\developing\QQnc\tools
docker compose -f docker-compose.dev.yml up -d
# 游戏: http://localhost:8081   面板: http://localhost:8082
```

## 安装失败排查（registry 401 / timeout）

若安装日志出现 `401 Unauthorized` 或 `Client.Timeout exceeded`：
1. 飞牛「Docker 管理 → 注册表设置 → 镜像加速器」换一个可用源，保存后**重新安装**；
2. 确认 NAS 能访问外网：先在 Docker 管理里手动拉取 `mariadb:10.6`、`webdevops/php-apache:5.6`、`python:3.12-slim`；
3. 三个镜像都拉取成功后再安装 fpk（安装脚本只会用本地已有镜像，不会重新构建）。

## 注意事项

- **Flash 客户端**：游戏为 Flash，现代浏览器已停用。玩家需用自带 Flash 的浏览器
  （360 极速兼容模式、领动云播放器）或 Ruffle 模拟器。
- **农场插件独立数据库配置**：`source/plugin/qqfarm/core/data/_qsc.php` 是插件的缓存配置，
  写死了 `localhost`/空密码且不会随 Discuz 配置更新，否则进游戏会报
  `Error: Can not connect to MySQL server(0)`。`prepare_payload.py` 已把它改成
  `dbhost=mysql`、`dbpass=qqfarm123`、`charset=gbk`，并同步修了
  `core/config/api/discuzx.php`（缓存重建时也用 gbk）。
- **农场可写目录**：`source/plugin/qqfarm/core/data` 存放编译模板/XML/缓存/日志，
  由 `${TRIM_PKGVAR}/qf_data` 挂载并设为 777（站点其余部分是只读挂载）。
- **UCenter 地址**：若头像/登录回调异常，在论坛后台 → UCenter 应用里把
  `http://127.0.0.1/uc_server` 改成 `http://NAS_IP:端口/uc_server`。
- **数据库凭据**：容器内 root 密码 `qqfarm123`（可在 compose 中改 `QQFARM_DB_PASSWORD`，
  同时重跑 prepare_payload.py 同步修改站点配置）。
- **数据持久化**：数据库位于应用 `var/mysql`，卸载应用默认保留；彻底清理需手动删除。
- **首次导入**：`app/db/qqfarm.sql` 仅在 mariadb 数据目录为空时导入；重复安装不会覆盖数据。
- cmd/ 下脚本需 LF 行尾（本仓库已处理），如手工改动请勿用记事本保存。
