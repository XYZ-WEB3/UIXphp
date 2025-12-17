@echo off
setlocal

set "PROJECT_DIR=C:\Users\TP\Desktop\DCP"
set "URL=http://localhost:8008/z.html"

REM Открываем сайт сразу
start "" "%URL%"

REM Запускаем PowerShell, выполняем команды и оставляем окно открытым
powershell.exe -NoProfile -ExecutionPolicy Bypass -NoExit -Command ^
  "Set-Location -LiteralPath '%PROJECT_DIR%'; docker compose up -d --build; docker compose ps"

endlocal
