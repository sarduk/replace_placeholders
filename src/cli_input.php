#!/usr/bin/php
<?php

/*
https://www.php.net/manual/en/reserved.variables.argv.php
$argv — Array of arguments passed to script
Description ¶

Contains an array of all the arguments passed to the script when running from the command line.

    Note: The first argument $argv[0] is always the name that was used to run the script. 

php script.php arg1 arg2 arg3


var_dump($argv);
will output something similar to:

array(4) {
  [0]=>
  string(10) "script.php"
  [1]=>
  string(4) "arg1"
  [2]=>
  string(4) "arg2"
  [3]=>
  string(4) "arg3"
}

*/

//php index.php  --help
$options = getopt('', [
    'help',
]);

myPrintOutput('print_r($options)'); 
//myDiePrintOutput(print_r($options));

if(isset($options['help'])){
	myDiePrintOutput(file_get_contents(Config::filename_help));	
}

//var_dump($argv);

$path_input = @$argv[1];
$path_file_placeholders = @$argv[2];
$path_dir_output = @$argv[3];

/*
validate input
*/
if (!is_file($path_input) && !is_dir($path_input)){ 
	myDiePrintOutputError("argv[1] path not found : ".$path_input);
}
if (!is_file($path_file_placeholders)){ 
	myDiePrintOutputError("argv[2] file not found : ".$path_file_placeholders);
}
if (!is_dir($path_dir_output)){ 
	//$real_dir_$path_dir_output = @realpath($path_dir_output);
	myDiePrintOutputError("argv[3] not is_dir : ".$path_dir_output);
}	 

//$arr_placeholders
//require_once($path_file_placeholders);

//https://www.php.net/manual/en/function.parse-ini-file.php
$arr_placeholders = parse_ini_file($path_file_placeholders);

myPrintOutput("print_r(\$arr_placeholders)");
print_r($arr_placeholders);

