<?php

/*

@author: Rea Biagio
@author_email: biagiodevel@gmail.com

*/

require_once('ReplacePlaceholders.php');

/*

class ReplacePlaceholdersFile
classe copiata da 
https://stackoverflow.com/questions/10106052/replace-multiple-placeholders-with-php
Replace multiple placeholders with PHP?
ANSWER  answered Apr 11 '12 at 12:40 by hakre
la classe prende in input una stringa che contiene il path del file 
    @input una stringa che contiene il path del file di testo
    @input arr paceholders => val_str_replace
e restituisce il testo lavorato/replaced

todo

*/

class ReplacePlaceholdersFile{

    private $fullpath_filename_input = '';
    private $arr_placeholders = [];
    private $path_dir_output = '';

    public function __construct(string $fullpath_filename_input, array $arr_placeholders, string $path_dir_output)
    {
        $this->fullpath_filename_input = $fullpath_filename_input;
        $this->arr_placeholders = $arr_placeholders;
        $this->path_dir_output = $path_dir_output;
    }

    public function run($fcb_make_dir, $fcb_write_file)
    {
        $text_source = file_get_contents($this->fullpath_filename_input);
        $text_target = (string)(new ReplacePlaceholders($text_source, $this->arr_placeholders));
        $filename_input = pathinfo($this->fullpath_filename_input)['basename'];
        $filename_target = (string)(new ReplacePlaceholders($filename_input, $this->arr_placeholders));
        $fullpath_filename_target = path_join($this->path_dir_output, $filename_target);
        //die($fullpath_filename_target);
        $fcb_write_file($fullpath_filename_target, $text_target);
    }
}