<?php

namespace Utils;

class StrFilterChain
{
    protected $filterList;
    
    public function __construct()
    {
        $this->filterList = [];
    }

    public function addFilter(\Utils\StrFilter $filter)
    {
        $this->filterList[] = $filter;
    }
    
    public function run($str)
    {
        foreach ($this->filterList as $filter) {
            if ($filter instanceof \Utils\StrFilter) {
                $str = $filter->filter($str);
            } else {
                throw new \DomainException("Filter must be instance of \Utils\StrFilter class");
            }
        }
        
        return $str;
    }
}
