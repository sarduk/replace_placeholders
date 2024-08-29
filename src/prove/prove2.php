<?php
/*
cd /media/ubiagio/Sviluppo/www/myscript/replace_placeholders/php_prj/src/prove/
php prove2.php

verificare se dirname( ) funziona su un pathfile che non esiste

*/

//file che non esiste
$fullPathFilename_target = '/media/ubiagio/Sviluppo/www/myscript/replace_placeholders/php_prj/src/src/src/output/CRUD_products/CRUD_products_mergeFiles/routes/web.php';

$fullPathDir_target = dirname($fullPathFilename_target);;

echo $fullPathDir_target;




