<?php

namespace Utils\Validator;

class StrRange extends \Utils\Validator
{
    protected $min;
    protected $max;
    
    public function __construct($min = 0, $max = 100)
    {
        parent::__construct();
        $this->min = $min;
        $this->max = $max;
    }

    public function check($value)
    {
        if (!$value) {
            return true;
        }
        
        $len = mb_strlen($value);
        
        if ($len < $this->min || $len > $this->max) {
            $mes = sprintf(
                "Требуется строка от %u до %u символов длиной",
                $this->min,
                $this->max
            );
            
            return $this->checkAndSetErrorMessage(false, $mes);
        }
        
        return true;
    }
}
