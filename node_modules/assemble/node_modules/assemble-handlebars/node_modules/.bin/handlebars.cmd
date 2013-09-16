@IF EXIST "%~dp0\node.exe" (
  "%~dp0\node.exe"  "%~dp0\..\handlebars\bin\handlebars" %*
) ELSE (
  node  "%~dp0\..\handlebars\bin\handlebars" %*
)