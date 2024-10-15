<?php

/*

@author: Rea Biagio
@author_email: biagiodevel@gmail.com

*/

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

    
    /**
     * run
     *
     * @param  function_callback $fcb_make_dir 
     * @param  function_callback $fcb_write_file
     * @return void
     */
    public function run($fcb_make_dir, $fcb_write_file)
    {

        //https://www.php.net/manual/en/class.recursivedirectoryiterator.php
        $recursiveDirectoryIterator = new RecursiveDirectoryIterator($this->path_dir_input);
        //https://www.php.net/manual/en/class.recursiveiteratoriterator.php
        $it = new RecursiveIteratorIterator($recursiveDirectoryIterator);
        $it = new RecursiveIteratorIterator(
            $recursiveDirectoryIterator, 
            RecursiveIteratorIterator::SELF_FIRST // itera sia i file che le directory
        );

        $it->rewind();

        while($it->valid()) {
            //https://www.php.net/manual/en/directoryiterator.isdot.php
            if (!$it->isDot()) {

                // echo "\n\n";
                // echo 'relPath(): ' . $it->getSubPathName() . "\n";
                // echo 'fullPath, Key():        ' . $it->key() . "\n";

                $relPath_source = $it->getSubPathName();
                $relPath_target = (string)(new ReplacePlaceholders($relPath_source, $this->arr_placeholders));

                $fullPath_target = path_join($this->path_dir_output, $relPath_target);
                // echo 'fullPath_target:        ' . $fullPath_target . "\n";

                if ($it->isDir()) {
                    $fullPathDir_target = $fullPath_target;
                } elseif ($it->isFile()) {
                    $fullPathDir_target = dirname($fullPath_target);
                }

                // echo 'fullPathDir_target:        ' . $fullPathDir_target . "\n";

                $fcb_make_dir($fullPathDir_target);
        
                if ($it->isFile()) {
                    $text_source = file_get_contents($it->key());
                    $text_target = (string)(new ReplacePlaceholders($text_source, $this->arr_placeholders));
                    $fcb_write_file($fullPath_target, $text_target);
                }

            }

            $it->next();
        }

    }

}

