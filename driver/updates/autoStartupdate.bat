@echo off
tasklist /fi "IMAGENAME eq autoTab launcher.exe" 2>NUL | find /I /N "autoTab launcher.exe">NUL
if "%ERRORLEVEL%"=="0" (
rem msg * Program is running
goto Exit
)
if "%ERRORLEVEL%"=="1" (
rem msg * Program is not running
rem kill all/any chrome process
rem echo "killing Chrome"
rem taskkill /F /IM chrome.exe
echo "Killing Chrome driver"
taskkill /F /IM chromedriver.exe
rem restart autotab
wmic datafile where name="C:\\Program Files (x86)\\Google\\Chrome\\Application\\chrome.exe" get Version /value > C:\autoTab\Driver\browserversion
if exist C:\autoTab\Cache\new_AutoTab.exe (
    rem "file exists"
mv C:\autoTab\Cache\new_AutoTab.exe C:\autoTab\AutoTab.exe
) else (
    rem "file doesn't exist"
)
start "AutoTab" "C:\autoTab\AutoTab.exe" update
goto Exit
)
pause