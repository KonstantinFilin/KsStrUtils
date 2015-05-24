<?php

namespace KsStrUtils\Validator;

class TypeInt extends \KsStrUtils\Validator
{
    public function check($value)
    {
        if ( !(is_string($value) || is_numeric($value)) 
            || !preg_match("|^\d+$|", $value)) {
            $this->setErrorMessage("Требуется число");
            return false;
        }
        
        return true;
    }
}
