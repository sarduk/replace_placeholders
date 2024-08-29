<?php

/*

cd /media/ubiagio/Sviluppo/www/myscript/replace_placeholders/php_prj/src/
php prove.php

PHP Warning:  file_put_contents(/media/ubiagio/Sviluppo/www/myscript/replace_placeholders/php_prj/src/output/CRUD_products/CRUD_products_mergeFiles/routes/web.php): Failed to open stream: No such file or directory in /media/ubiagio/Sviluppo/www/myscript/replace_placeholders/php_prj/src/recourse_files.php on line 32
Impossibile scrivere nel file /media/ubiagio/Sviluppo/www/myscript/replace_placeholders/php_prj/src/output/CRUD_products/CRUD_products_mergeFiles/routes/web.php
*/

$fullPathFilename_target = '/media/ubiagio/Sviluppo/www/myscript/replace_placeholders/php_prj/src/output/CRUD_products/CRUD_products_mergeFiles/routes/web.php';
/*
$fullPathFilename_target = '/media/ubiagio/Sviluppo/www/myscript/replace_placeholders/php_prj/src/output/web.php';
$text_target = "suca";
//https://www.php.net/manual/en/function.file-put-contents.php
$bytes = file_put_contents($fullPathFilename_target, $text_target);
if (false === $bytes) {
    printf('Impossibile scrivere nel file %s', $fullPathFilename_target);
    exit;
}
*/
/*

https://stackoverflow.com/questions/13372179/creating-a-folder-when-i-run-file-put-contents/13372192


file_put_contents() does not create the directory structure. Only the file.

You will need to add logic to your script to test if the month directory exists. If not, use mkdir() first.

if (!is_dir('upload/promotions/' . $month)) {
  // dir doesn't exist, make it
  mkdir('upload/promotions/' . $month);
}

file_put_contents('upload/promotions/' . $month . '/' . $image, $contents_data);

Update: mkdir() accepts a third parameter of $recursive which will create any missing directory structure. Might be useful if you need to create multiple directories.

Example with recursive and directory permissions set to 777:

mkdir('upload/promotions/' . $month, 0777, true);
*/


$fullPathDir_target = dirname($fullPathFilename_target);;





*/