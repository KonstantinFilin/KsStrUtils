<?php

namespace Utils\Validator;

class TypeInt extends \Utils\Validator
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
