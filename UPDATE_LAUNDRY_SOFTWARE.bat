@echo off

REM Set the path to your htdocs folder
set "htdocs_path=C:\xampp\htdocs\stock\"

REM Change to the htdocs directory
cd /d "%htdocs_path%"

REM Execute git pull for stock
git pull