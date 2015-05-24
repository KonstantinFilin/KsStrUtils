<?php

namespace Utils\Validator;

class TypeArray extends \Utils\Validator
{
    public function check($value)
    {
        if ($value && ! is_array($value) ) {
            $this->setErrorMessage("Требуется массив");
            return false;
        }
        
        return true;
    }
}
