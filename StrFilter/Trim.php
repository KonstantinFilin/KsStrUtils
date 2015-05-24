<?php

namespace Utils\StrFilter;

class Trim extends \Utils\StrFilter
{
    public function filter($str)
    {
        return trim($str);
    }
}