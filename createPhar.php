<?php

/*

cd /media/ubiagio/Sviluppo/www/reabiagio_scripts/replace_placeholders_recourse/php_prj_2024/replace_placeholders/
php createPhar.php

*/

#https://gist.github.com/GaryRogers/d67c95dbf3e77c330bbf

# Create an executable phar

#directory con i sorgenti
$sourceDirectory = './src';
#directory in cui salvere il pacchetto phar
$buildDirectory = './dist';

# creare oggetto Phar.
# parametri:
#     - path del file PHAR da generare;
#     - optional flag per il RecursiveDirectoryIterator, default FilesystemIterator::CURRENT_AS_FILEINFO | FilesystemIterator::KEY_AS_FILENAME,
#     - optional alias

$phar = new Phar($buildDirectory . '/replace_placeholders.phar');

# Have to do buffering to make things executable.
# See http://stackoverflow.com/questions/11082337/how-to-make-an-executable-phar
$phar->startBuffering();

# Have to do buffering to make things executable.
# See http://stackoverflow.com/questions/11082337/how-to-make-an-executable-phar
$phar->startBuffering();

# declare Default cli executable entrypoint
# https://www.phptutorial.info/?phar.setdefaultstub
$defaultStub = $phar->createDefaultStub('replace_placeholders.php');

# Build from the project directory.
# include file contents to the archive
# Assumes that createPhar.php (this file) is in the project root.
$phar->buildFromDirectory($sourceDirectory);

# Add the header to enable execution.
$stub = "#!/usr/bin/env php \n" . $defaultStub;

# Set the stub.
$phar->setStub($stub);

# Wrap up.
$phar->stopBuffering();
