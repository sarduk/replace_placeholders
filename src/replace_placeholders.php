#!/usr/bin/php
<?php

/*

cd /media/ubiagio/Sviluppo/www/myscript/replace_placeholders_file/php_prj/src_v2/
php index.php  './input/create.blade.php' './placeholders/placeholders_entityname1.php'
php index.php  --help

php index.php  './prove/prova1.txt' './placeholders/placeholders_entityname1.php'

*/

require_once('config.php');
require_once('functions.php');

require_once('cli_input.php');

if(is_dir($path_input)){
    require_once('ReplacePlaceholdersRecourseDir.php');
    $replacePlaceholdersRecourseDir = new ReplacePlaceholdersRecourseDir($path_input, $arr_placeholders, $path_dir_output);
    $replacePlaceholdersRecourseDir->run();
}elseif(is_file($path_input)){
    require_once('ReplacePlaceholdersFile.php');
    $replacePlaceholdersFile = new ReplacePlaceholdersFile($path_input, $arr_placeholders, $path_dir_output);
    $replacePlaceholdersFile->run();
}
