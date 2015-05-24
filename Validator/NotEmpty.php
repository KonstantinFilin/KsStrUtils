<?php

namespace KsStrUtils\Validator;

class NotEmpty extends \KsStrUtils\Validator
{
    public function check($value)
    {        
        $res = !($this->isNull($value) 
               || $this->isEmptyInteger($value) 
               || $this->isEmptyFloat($value) 
               || $this->isEmptyString($value) 
               || $this->isEmptyArray($value));
        
        return $this->checkAndSetErrorMessage($res, "Необходимо заполнить");
    }
    
    protected function isEmptyArray($value)
    {
        return is_array( $value ) && !$value;
    }
    
    protected function isEmptyInteger($value)
    {
        return is_integer($value) && !$value;
    }
    
    protected function isEmptyFloat($value)
    {
        return is_float($value) && !$value;
    }
    
    protected function isEmptyString($value)
    {
        return is_string($value) && !$value;
    }

    protected function isNull($value) 
    {
        return is_null($value);
    }
}
