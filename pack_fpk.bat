@echo off
setlocal
cd /d "%~dp0"

where python >nul 2>&1
if errorlevel 1 (
  echo [ERROR] Python 3 not found in PATH. Install Python and retry.
  echo.
  pause
  exit /b 1
)

echo.
echo   ==========================================
echo    QQfarm fnOS fpk - manual packer
echo   ==========================================
echo    ENTER  Pack current fnos\ contents
echo    P      Rebuild app\site from d:\QQnc\wwwroot, then pack
echo    C      Pre-check only (no build)
echo    Q      Quit
echo.
set "ANS="
set /p "ANS=Choose [default=ENTER]: "
if /I "%ANS%"=="Q" exit /b 0
if /I "%ANS%"=="P" (
  python -X utf8 "tools\pack_fpk.py" --payload
) else if /I "%ANS%"=="C" (
  python -X utf8 "tools\pack_fpk.py" --check
) else (
  python -X utf8 "tools\pack_fpk.py"
)
set "RC=%ERRORLEVEL%"
echo.
echo   Exit code: %RC%
echo.
pause
exit /b %RC%
