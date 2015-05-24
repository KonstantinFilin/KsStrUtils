<?php

namespace KsStrUtils\StrFilter;

class IntArray extends \KsStrUtils\StrFilter\Int
{
    public function filter($str)
    {
        if (is_array($str)) {
            $ret = [];
            
            foreach($str as $num) {
                $ret[] = parent::filter($num);
            }

            return $ret;
        }
        
        return [];
    }
}
