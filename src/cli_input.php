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

//myPrintOutput('print_r($options)'); 
//myDiePrintOutput(print_r($options));

if(isset($options['help'])){
	myDiePrintOutput(file_get_contents(Config::filename_help));	
}

//var_dump($argv);

$path_input = @$argv[1];
$arg_placeholders = @$argv[2];
$path_dir_output = @$argv[3];

var_dump($path_input, $arg_placeholders, $path_dir_output);

/*
validate input
*/
if (!is_file($path_input) && !is_dir($path_input)){ 
	myDiePrintOutputError("argv[1] path not found : ".$path_input);
}
if (is_file($arg_placeholders)){ 
	//https://www.php.net/manual/en/function.parse-ini-file.php
	$arr_placeholders = parse_ini_file($arg_placeholders);
}else{
	$arr_placeholders = parsePlaceholders($arg_placeholders);
}
if(!is_array($arr_placeholders) || empty($arr_placeholders)){
	$msg = "argv[2] invalid placeholders param : ".$arg_placeholders ."\n";
	$msg = "empty arr_placeholders"."\n";
	$msg .= "arg_placeholders can be either a file .ini ora a string map key1=val1,key2=val2,..."."\n";
	if (!is_file($arg_placeholders)){ 
		$msg .= "file not found"."\n";
	}
	myDiePrintOutputError($msg);
}

if (!is_dir($path_dir_output)){ 
	//$real_dir_$path_dir_output = @realpath($path_dir_output);
	myDiePrintOutputError("argv[3] not is_dir : ".$path_dir_output);
}

//$arr_placeholders
//require_once($arg_placeholders);


myPrintOutput("print_r(\$arr_placeholders)");
print_r($arr_placeholders);

function parsePlaceholders($placeholdersStr) {
    $arr_placeholders = [];
    $pairs = explode(",", $placeholdersStr);
    
    foreach ($pairs as $pair) {
        if(strpos($pair, '=')===false){ continue;}
        list($key, $value) = explode("=", $pair);
        $arr_placeholders[trim($key)] = trim($value);
    }

    return $arr_placeholders;
}

