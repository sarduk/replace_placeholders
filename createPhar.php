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

# Name of our archive.
$phar = new Phar($buildDirectory . '/replace_placeholders.phar');

# Have to do buffering to make things executable.
# See http://stackoverflow.com/questions/11082337/how-to-make-an-executable-phar
$phar->startBuffering();

# Default executable.
$defaultStub = $phar->createDefaultStub($buildDirectory . '/replace_placeholders.php');

# ???
# $buildDirectory . '/replace_placeholders.phar');
# $buildDirectory . '/replace_placeholders.php');
# ???

# Have to do buffering to make things executable.
# See http://stackoverflow.com/questions/11082337/how-to-make-an-executable-phar
$phar->startBuffering();

# Default executable.
# https://www.phptutorial.info/?phar.setdefaultstub
$defaultStub = $phar->createDefaultStub($sourceDirectory . '/replace_placeholders.php');

# Build from the project directory. Assumes that createPhar.php (this file) is in the project root.
$phar->buildFromDirectory($sourceDirectory);

# Add the header to enable execution.
$stub = "#!/usr/bin/env php \n" . $defaultStub;

# Set the stub.
$phar->setStub($stub);

# Wrap up.
$phar->stopBuffering();
