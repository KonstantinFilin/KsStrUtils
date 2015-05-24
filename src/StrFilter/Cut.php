<?php

namespace KsStrUtils\StrFilter;

class Cut extends \KsStrUtils\StrFilter
{
    protected $max;
    
    function __construct($max = 100)
    {
        $this->max = $max;
    }
    
    public function filter($str)
    {
        return substr($str, 0, $this->max);
    }
}
