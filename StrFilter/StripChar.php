<?php

namespace Utils\StrFilter;

class StripChar extends \Utils\StrFilter
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
