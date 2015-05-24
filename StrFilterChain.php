<?php

namespace KsStrUtils;

class StrFilterChain
{
    protected $filterList;
    
    public function __construct()
    {
        $this->filterList = [];
    }

    public function addFilter(\KsStrUtils\StrFilter $filter)
    {
        $this->filterList[] = $filter;
    }
    
    public function run($str)
    {
        foreach ($this->filterList as $filter) {
            if ($filter instanceof \KsStrUtils\StrFilter) {
                $str = $filter->filter($str);
            } else {
                throw new \DomainException("Filter must be instance of \KsStrUtils\StrFilter class");
            }
        }
        
        return $str;
    }
}
