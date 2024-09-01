#!/usr/bin/php
<?php

/*

file entrypoint

*/

require_once('config.php');
require_once('functions.php');

require_once('cli_input.php');


if(is_dir($path_input)){
    $class_name =  'ReplacePlaceholdersRecourseDir';
}elseif(is_file($path_input)){
    $class_name =  'ReplacePlaceholdersFile';
}else{
    throw new Exception('unrecoglized $path_input: '.$path_input);
}

require_once($class_name.'.php');
$replacePlaceholdersFile = new $class_name($path_input, $arr_placeholders, $path_dir_output);
$replacePlaceholdersFile->run($f_make_dir, $f_write_file);
