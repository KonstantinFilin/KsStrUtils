<?php

namespace KsStrUtils\StrFilter;

class Int extends \KsStrUtils\StrFilter
{
    public function filter($str)
    {
        return intval($str);
    }
}
