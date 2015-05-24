<?php

namespace Utils\Validator;

class ValueList extends \Utils\Validator
{
    protected $availableValues;
    
    public function __construct($availableValues)
    {
        parent::__construct();
        $this->availableValues = $availableValues;
    }

    public function check($value)
    {
        if (!in_array($value, $this->availableValues)) {
            $this->setErrorMessage("Указано недопустимое значение параметра");
            return false;
        }
        
        return true;
    }
}
