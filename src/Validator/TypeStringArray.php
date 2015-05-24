<?php

namespace KsStrUtils\Validator;

class TypeStringArray extends TypeString
{
    public function check($value)
    {
        $v2 = new TypeArray();
        
        if ( !$v2->check($value) ) {
            return false;
        }
        
        foreach ( $value as $valueItem ) {
            if ( !parent::check($valueItem) ) {
                $this->setErrorMessage("Элемент массива должен быть строкой");
                return false;
            }
        }
        
        return true;
    }
}
