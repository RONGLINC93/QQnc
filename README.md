# QQ农场 · 飞牛 fnOS fpk 工程

把原 Windows 端的 QQ农场私服（ESSAMP：Apache + PHP5 + MySQL5.1 + Discuz! X2 + QQ农场插件）
**容器化并打包成飞牛 fnOS 可安装的 `.fpk`**。游戏逻辑仍跑原始 PHP 程序，Python 只用于管理面板。

> 当前状态：`1.0.0`，2026-11-07 已在飞牛 NAS 上实测装好并可正常进入论坛 / 农场 / 牧场。
> 工程内还有一份偏实现细节的文档：[`fnos/README.md`](fnos/README.md)。

---

## 1. 目录与路径

| 路径 | 内容 |
|---|---|
| `D:\Desktop\developing\QQnc\` | **项目根**（本文件所在） |
| `D:\Desktop\developing\QQnc\fnos\` | fpk 工程，打包对象 |
| `D:\Desktop\developing\QQnc\fnos\qqfarm.fpk` | 已打好的安装包（约 94 MB，x86） |
| `D:\Desktop\developing\QQnc\tools\` | 构建与运维脚本、`fnpack.exe` |
| `d:\QQnc\wwwroot\` | **原始站点源码**，构建输入（仍在旧位置，勿删） |
| `d:\QQnc\MySQL5\`、`d:\QQnc\PHP5\` 等 | 原 Windows ESSAMP 环境，仅作历史参考 |
| `d:\QQnc\tools\` | 搬迁前的历史脚本副本（路径已失效），**一律以新目录 tools 为准** |

`fnos/` 结构（fnpack 规范）：

```
fnos/
├── manifest                 应用元数据（含桌面入口声明）
├── ICON.PNG / ICON_256.PNG  应用图标
├── qqfarm.fpk               构建产物
├── config/privilege         权限声明（run-as: package, join-groups: docker）
├── config/resource          声明 docker-project 项目名 qqfarm
├── wizard/install           安装向导（端口 wizard_http_port）
├── wizard/config            安装后修改端口的向导
├── cmd/                     9 个生命周期脚本（LF 行尾）
├── app/
│   ├── ui/config            桌面入口（管理面板 + 游戏直达）
│   ├── ui/images/           入口图标
│   ├── site/                Discuz X2 全站（含已修补配置、兼容层、面板接口）
│   ├── db/qqfarm.sql        数据库全量 dump（248 张表，gbk）
│   └── docker/              docker-compose.yaml + php.ini + apache conf + panel/app.py
└── README.md                工程内技术文档
```

`tools/` 结构：

```
tools/
├── prepare_payload.py       从 wwwroot 组装 app/site 并打补丁
├── payload/mysql_compat.php mysql_* → mysqli 兼容层源文件
├── bin/fnpack.exe           fnpack 1.2.3（Windows amd64）
├── docker-compose.dev.yml   本机 Docker Desktop 联调
└── ssh_run.py               NAS 运维助手（密码走环境变量，不落盘）
```

---

## 2. 只想安装？看这里

1. 把 `fnos/qqfarm.fpk` 拷到飞牛 NAS；
2. 应用中心 → 手动安装 → 选择 fpk → 向导填端口（默认 `8081`）；
3. 装完桌面出现两个图标：**QQ农场管理**、**进入QQ农场**；
4. 浏览器访问 `http://NAS_IP:端口`，默认论坛管理员 `admin / 123456`；
5. 若三个镜像拉取失败，先在 Docker 管理 → 注册表设置换镜像加速器，手动拉取
   `mariadb:10.6`、`webdevops/php-apache:5.6`、`python:3.12-slim` 后重装。

**Flash 是硬限制**：游戏客户端是 `.swf`，Chrome / Edge 已停用 Flash。玩家需用自带
Flash 的浏览器（360 极速兼容模式、领动云播放器）或 Ruffle 模拟器，否则只能看到论坛。

---

## 3. 架构

| 容器 | 镜像 | 作用 |
|---|---|---|
| `qqfarm-web` | `webdevops/php-apache:5.6` | PHP5.6 + Apache，运行 Discuz X2 与农场插件，对外唯一端口 |
| `qqfarm-mysql` | `mariadb:10.6` | gbk 库，首次启动自动导入 `app/db/qqfarm.sql` |
| `qqfarm-panel` | `python:3.12-slim` | 纯标准库管理面板，经网关 unix socket 暴露 |

```
浏览器 :8081 ──> [web] Discuz X2 / 农场插件 / panel_api.php ──> [mysql]
飞牛桌面 ──> 网关 /app/qqfarm ──> app.sock ──> [panel] ──HTTP──> web/panel_api.php ──> [mysql]
```

**全部使用预构建镜像，安装时零 `build:`**：飞牛现场构建镜像会因 registry 鉴权失败
（日志 `401 Unauthorized` / `Client.Timeout exceeded`）。官方 `php:5.6-apache` 连
mysqli 都没有，所以选带 `mysqli / pdo_mysql / gd / mcrypt` 的 webdevops 镜像。

被替代的 Windows 组件：`[1].启动网站数据库.exe`、`[2].启动QQ农场.exe`、
`[3].充值工具.exe`、`微端配置器`。充值等价于按账号更新
`pre_qqfarm_user.money`（金币）/ `yb`（元宝）。

---

## 4. 关键技术点（改代码前必读）

### 4.1 数据库
- 用本机运行中的 MySQL 5.1 的 `mysqldump --default-character-set=gbk --databases root`
  导出，得到 `app/db/qqfarm.sql`（248 张表）。
- MariaDB 以 `--character-set-server=gbk --sql-mode= --lower-case-table-names=1` 启动，
  `--sql-mode=` 是老 Discuz 数据能导入的关键。
- 仅在数据目录为空时由 `/docker-entrypoint-initdb.d` 导入，重装/升级不会覆盖存档。
- 容器内 root 密码 `qqfarm123`（改密码需同步 compose 的 `QQFARM_DB_PASSWORD`、
  `prepare_payload.py`、`panel_api.php` 三处）。

### 4.2 `mysql_*` 兼容层
Discuz X2 / UCenter 用了 189 处已废弃的 `mysql_*` 函数，而 PHP5.6 镜像都不带老扩展。
`app/site/config/mysql_compat.php` 把 18 个函数映射到 mysqli，由
`app/docker/web/qqfarm.ini` 的 `auto_prepend_file` 挂载为 `zz-qqfarm.ini` 全局启用。
删掉它，`forum.php` 立刻 500。

### 4.3 农场插件的独立配置
农场 `core/common.php` 用 `core/data/_qsc.php` 的**缓存配置**单独连库，写死
`localhost` / 空密码 / `utf8`，且不会从 Discuz 配置重建。`prepare_payload.py` 会改成
`dbhost=mysql`、`dbpass=qqfarm123`、`charset=gbk`，并同步修
`core/config/api/discuzx.php`。不改会报 `Error: Can not connect to MySQL server(0)`。

### 4.4 可写目录
站点主体是 `:ro` 挂载，以下目录由 `${TRIM_PKGVAR}` 单独挂载并 `chmod 777`
（`install_callback` 会从站点模板初始化）：

| 宿主机目录 | 容器内路径 |
|---|---|
| `var/data` | `/var/www/html/data`（Discuz 缓存/附件） |
| `var/uc_data` | `/var/www/html/uc_server/data` |
| `var/qf_data` | `/var/www/html/source/plugin/qqfarm/core/data`（编译模板/XML/日志） |

`var/mysql` 是数据库数据，卸载默认保留。

### 4.5 端口
- 向导字段 `wizard_http_port` 会注入为**同名环境变量**，compose 用
  `${wizard_http_port:-8081}`，不能用自定义变量名；
- `cmd/*` 把端口写入 `${TRIM_PKGETC}/qqfarm_port.conf` 和 `app/docker/.env`
  （Compose 自动加载项目目录 `.env`），保证 fnOS 直接 `up` 也不掉回 8081；
- 所有 compose 调用带 `-p qqfarm`，与 `config/resource` 的项目名一致，否则容器名冲突；
- `cmd/config_callback` 响应应用设置里的改端口，只重建 `web` + `panel`，不动数据库；
- 面板 `PANEL_GAME_PORT` 与桌面游戏直达入口的 `port` 都取自同一变量。

### 4.6 桌面入口
`manifest` **必须**显式写，否则 fnOS 安装后这两项为空、桌面不生成图标：

```ini
desktop_uidir = ui
desktop_applaunchname = qqfarm.main
checkport = false
```

`app/ui/config` 两个入口：`qqfarm.main`（iframe + 网关 `app.sock`）指向管理面板，
`qqfarm.game`（`url` + `"port": "${wizard_http_port}"`）直达游戏。
`ui/config` 支持 `${向导字段}` 变量替换（与 fnOS 自带应用一致）。
网关请求可能带 `/app/qqfarm` 前缀，面板已做前缀剥离、表单 `action=""`、相对重定向。

### 4.7 管理面板
`app/docker/panel/app.py` 只用 Python 标准库（无 pip 依赖）：HTTP + Unix socket 双监听，
数据经站点 `panel_api.php`（带 token）读写。

踩过的坑，别改回去：
- HTML 模板不能用 `PAGE % dict`，CSS 的 `100%;` 会被当格式符 → 用逐项 `replace`；
- `AF_UNIX` 下 `address_string()` 会因空 `client_address` 崩 → 已覆盖；
- 面板 API 也依赖 `mysql_*` 兼容层（由 `auto_prepend_file` 提供）。

---

## 5. 重新构建 / 打包

前置：Python 3、`d:\QQnc\wwwroot` 仍在原位、`tools/bin/fnpack.exe` 可用。

```powershell
# 1) 站点有更新时，重新组装 app/site（会重拷站点并重打所有补丁）
python D:\Desktop\developing\QQnc\tools\prepare_payload.py

# 2) 打包
cd D:\Desktop\developing\QQnc\fnos
D:\Desktop\developing\QQnc\tools\bin\fnpack.exe build
# 产物：qqfarm.fpk（覆盖旧文件）
```

`fnpack` 官方直链（Windows amd64）：
`https://static2.fnnas.com/fnpack/fnpack-1.2.3-windows-amd64`

打包注意：
- `fnpack build` 要求 `cmd/` 下 9 个脚本齐全，且必须是 **LF 行尾、无 BOM**；
- `wizard/`、`config/`、`app/ui/`、两个 ICON 都要存在；
- `manifest` 会被 fnpack 规范化成列宽对齐格式（属正常）。

## 6. 本机联调（Windows Docker Desktop）

```powershell
cd D:\Desktop\developing\QQnc\tools
docker compose -f docker-compose.dev.yml up -d
# 游戏 http://localhost:8081   面板 http://localhost:8082
```

## 7. 安装后运维

改端口：应用中心 → QQ农场 → 设置 → 修改端口（保存后自动重建 `web` / `panel`）。
旧版包没有该入口时可手动：

```bash
echo 'wizard_http_port=8090' | sudo tee /vol1/@appcenter/qqfarm/docker/.env
cd /vol1/@appcenter/qqfarm/docker
sudo TRIM_APPDEST=/vol1/@appcenter/qqfarm TRIM_PKGVAR=/vol1/@appdata/qqfarm \
  docker compose -p qqfarm -f docker-compose.yaml up -d --force-recreate
```

常用命令（SSH 登录后）：

```bash
sudo docker ps --format '{{.Names}} {{.Status}}' | grep qqfarm
sudo docker compose -p qqfarm -f /vol1/@appcenter/qqfarm/docker/docker-compose.yaml logs -f web
sudo docker exec qqfarm-web php -v
sudo systemctl restart trim_app_center   # 刷新桌面入口，不重启容器
```

## 8. 排障速查

| 现象 | 原因 | 处理 |
|---|---|---|
| 安装日志 `401 Unauthorized` / `Client.Timeout` | registry 镜像源不通或现场 build | 换镜像加速器，手动拉取 3 个镜像；确认包内无 `build:` |
| `forum.php` 500 | 缺 `mysql_*` 兼容层 / 镜像无 mysqli | 用 `webdevops/php-apache:5.6`，确认 `zz-qqfarm.ini` 挂载 |
| `Error: Can not connect to MySQL server(0)` | 农场缓存配置仍是 localhost/空密码 | 检查 `core/data/_qsc.php`，重跑 `prepare_payload.py` |
| 桌面没有图标 | manifest 缺 `desktop_uidir` / `desktop_applaunchname` | 补字段后重装，或改已安装 manifest 并重启 `trim_app_center` |
| 图标点开白屏 | 面板模板 `%` 崩溃 / 网关前缀未剥离 | 见 4.7；`curl --unix-socket .../app.sock http://localhost/app/qqfarm` 应为 200 |
| 重启后端口变回 8081 | 缺 `docker/.env` | `cmd/main start` 或 `config_callback` 会写入；确认 `.env` 内容 |
| 中文乱码 | 连接字符集被写成 utf8 | 库是 gbk，`_qsc.php` 与 `discuzx.php` 都要用 gbk |
| 头像 / 登录回调异常 | `UC_API` 仍是 `http://127.0.0.1/uc_server` | 论坛后台 → UCenter 应用改成 `http://NAS_IP:端口/uc_server` |

验证要用**登录态**：未登录时 `plugin.php?id=qqfarm:qqfarm` 会直接返回"请登录"，
测不出数据库问题（用 `admin / 123456` 登录后带 cookie 再请求）。

## 9. 已知限制

- 游戏是 Flash：现代浏览器需 Flash 播放器 / Ruffle。
- 仅 `platform = x86`（PHP 5.6 镜像为 x86）。
- 数据库默认凭据、论坛默认管理员密码都写在包里，勿直接暴露到公网。
- `manifest.service_port` 是静态声明值 8081，不影响向导动态端口；避免占用
  5666/5667/8000 等系统端口。
- 首次启动 MariaDB 导入 248 张表需要 1~2 分钟，期间页面可能 500。

## 10. 版本

- `1.0.0`（2026-11-07）：首次容器化并打包；完成数据库迁移、mysql_* 兼容层、
  农场插件配置修补、零 build 镜像方案、动态端口、双桌面入口、管理面板。
