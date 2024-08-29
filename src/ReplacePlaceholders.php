<?php

/*

class ReplacePlaceholders
classe copiata da 
https://stackoverflow.com/questions/10106052/replace-multiple-placeholders-with-php
Replace multiple placeholders with PHP?
ANSWER  answered Apr 11 '12 at 12:40 by hakre
la classe prende in input una stringa che contiene il path del file 
    @input una stringa che contiene il path del file di testo
    @input arr paceholders => val_str_replace
e restituisce il testo lavorato/replaced

*/

class ReplacePlaceholders{
    /**
     * @var string
     */
    private $str_input;
    /**
     * @var string[] varname => string value
     */
    private $vars;

    public function __construct(string $str_input, array $vars = array())
    {
        $this->str_input = (string)$str_input;
        $this->setVars($vars);
    }

    public function setVars(array $vars): void
    {
        $this->vars = $vars;
    }

    public function __toString(): string
    {
        return $this->replace();
    }
    public function replace(): string
    {
        return strtr($this->str_input, $this->getReplacementPairs());
    }

    private function getReplacementPairs(): array
    {
        $pairs = array();
        foreach ($this->vars as $name => $value)
        {
            $key = sprintf('{%s}', $name);
            $pairs[$key] = (string)$value;
        }
        return $pairs;
    }
}
