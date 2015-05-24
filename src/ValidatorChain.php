<?php

namespace KsStrUtils;

class ValidatorChain
{
    protected $chain;
    protected $error;
    
    public function __construct()
    {
        $this->chain = array();
        $this->error = array();
    }
    
    public function addValidator(\KsStrUtils\Validator $validator)
    {
        $this->chain[] = $validator;
    }
    
    public function checkAll($value)
    {
        foreach ($this->chain as $validator) {
            if ($validator instanceof \KsStrUtils\Validator) {
                if (!$validator->check($value)) {
                    $this->error = $validator->getErrorMessage();
                    return false;
                }
            } else {
                throw new \DomainException("Object must be instance of \KsStrUtils\Validator class");
            }
        }
        
        return $this->hasError();
    }
    
    public function hasError()
    {
        return $this->error;
    }
    
    public function getError()
    {
        return $this->error;
    }
}
