<?php

namespace KsStrUtils\StrFilter;

class StripChar extends \KsStrUtils\StrFilter
{
    protected $char;
    
    function __construct($char)
    {
        $this->char = $char;
    }
    
    public function filter($str)
    {
        return str_replace($this->char, "", $str);
    }
}
