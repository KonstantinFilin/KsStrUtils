<?php

namespace KsStrUtils\StrFilter;

class Trim extends \KsStrUtils\StrFilter
{
    public function filter($str)
    {
        return trim($str);
    }
}
