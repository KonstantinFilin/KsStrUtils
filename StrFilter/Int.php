<?php

namespace Utils\StrFilter;

class Int extends \Utils\StrFilter
{
    public function filter($str)
    {
        return intval($str);
    }
}
