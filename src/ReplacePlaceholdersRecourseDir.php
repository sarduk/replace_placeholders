<?php

require_once('ReplacePlaceholders.php');

class ReplacePlaceholdersRecourseDir
{

    private $path_dir_input = '';
    private $arr_placeholders = [];
    private $path_dir_output = '';

    public function __construct(string $path_dir_input, array $arr_placeholders, string $path_dir_output)
    {
        $this->path_dir_input = $path_dir_input;
        $this->arr_placeholders = $arr_placeholders;
        $this->path_dir_output = $path_dir_output;
    }


    public function run()
    {

        //https://www.php.net/manual/en/class.recursivedirectoryiterator.php
        $recursiveDirectoryIterator = new RecursiveDirectoryIterator($this->path_dir_input);
        //https://www.php.net/manual/en/class.recursiveiteratoriterator.php
        $it = new RecursiveIteratorIterator($recursiveDirectoryIterator);

        $it->rewind();

        // ??? non prende in considerazione le directory , solo i files ?????
        while($it->valid()) {
            //https://www.php.net/manual/en/directoryiterator.isdot.php
            if (!$it->isDot()) {

                echo 'relPathFilename SubPathName(): ' . $it->getSubPathName() . "\n";
                echo 'relPathDir SubPath():          ' . $it->getSubPath() . "\n";
                echo 'fullPathFilename Key():        ' . $it->key() . "\n\n";

                if(is_file($it->key())){

                    $relPathFilename_source = $it->getSubPathName();
                    //???
                    $relPathFilename_target = (string)(new ReplacePlaceholders($relPathFilename_source, $this->arr_placeholders));
                    $fullPathFilename_target = path_join($this->path_dir_output, $relPathFilename_target);
                    $fullPathDir_target = dirname($fullPathFilename_target);;
                    if(!is_dir($fullPathDir_target)){
                        if(!mkdir($fullPathDir_target, 0777, true)){
                            $msg = ("(!)errore! Impossibile creare la directory \$fullPathDir_target: {$fullPathDir_target}");
                            throw new Exception($msg);
                        }
                    }
            
                    $text_source = file_get_contents($it->key());
                    $text_target = (string)(new ReplacePlaceholders($text_source, $this->arr_placeholders));
            
                    //https://www.php.net/manual/en/function.file-put-contents.php
                    $bytes = file_put_contents($fullPathFilename_target, $text_target);
                    if (false === $bytes) {
                        $msg =  "(!)errore, Impossibile scrivere nel file $fullPathFilename_target";
                        throw new Exception($msg);
                    }
                }
            
            }

            $it->next();
        }

    }



}

