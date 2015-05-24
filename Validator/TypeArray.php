<?php

namespace KsStrUtils\Validator;

class TypeArray extends \KsStrUtils\Validator
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
