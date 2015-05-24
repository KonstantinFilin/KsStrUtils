<?php

namespace KsStrUtils\Validator;

class TypeString extends \KsStrUtils\Validator
{
    public function check($value)
    {
        if ($value && !is_string($value) && !( is_numeric($value) ) ) {
            $this->setErrorMessage("Требуется указать строку");
            return false;
        }
        
        return true;
    }
}
