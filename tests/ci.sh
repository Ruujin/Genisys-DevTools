#!/bin/bash
echo Running lint...
shopt -s globstar
for file in **/*.php; do
    OUTPUT=`php -l "$file"`
    [ $? -ne 0 ] && echo -n "$OUTPUT" && exit 1
done
echo Lint done successfully.
mkdir build
php Genisys-DevTools/src/DevTools/ConsoleScript.php --make Genisys-DevTools --out build/Genisys-DevTools.phar
if ls build/Genisys-DevTools*.phar >/dev/null 2>&1; then
    echo Phar packaged successfully.
else
    echo No phar created!
    exit 1
fi
