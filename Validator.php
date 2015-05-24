<?php

namespace Utils;

abstract class Validator
{
    protected $errorMessage;
    
    public function __construct()
    {
        $this->errorMessage = "";
    }
    
    protected function setErrorMessage($errorMessage)
    {
        $this->errorMessage = $errorMessage;
    }
    
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    protected function checkAndSetErrorMessage($res, $errorMessage)
    {
        if (!$res) {
            $this->setErrorMessage($errorMessage);
        }
        
        return $res;
    }

    abstract function check($value);
}
