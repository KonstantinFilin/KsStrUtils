<?php

namespace KsStrUtils;

class ValidatorChainFabric
{
    public static function create($str)
    {
        $validatorStrArr = explode("|", $str);
        $validatorChain = new \KsStrUtils\ValidatorChain();
        
        foreach($validatorStrArr as $validatorStr) {
            $validatorChain->addValidator(self::createValidatorFromStr($validatorStr));
        }
        
        return $validatorChain;
    }
    
    /**
     * 
     * @param string $str
     * @return KsStrUtils\Validators Description
     */
    private static function createValidatorFromStr($str)
    {
        $validatorName = "";
        $validatorParams = [];
        
        if (strpos($str, ":") !== false) {
            list($validatorName, $validatorParamsStr) = explode(":", $str, 2);
            $validatorParams = explode(",", $validatorParamsStr);
        } else {
            $validatorName = $str;
        }
        
        switch ($validatorName) {
            case "required": 
                return new \KsStrUtils\Validator\NotEmpty();
            case "size":
                if ( empty($validatorParams[0]) ) {
                    throw new \InvalidArgumentException("Требуется указать наименьшую длину строки");
                }
                
                if ( empty($validatorParams[1]) ) {
                    throw new \InvalidArgumentException("Требуется указать наибольшую длину строки");
                }

                return new \KsStrUtils\Validator\StrRange($validatorParams[0], $validatorParams[1]);
            case "in":
                if ( empty($validatorParams) ) {
                    throw new \InvalidArgumentException("Требуется указать список допустимых значений");
                }

                return new \KsStrUtils\Validator\ValueList($validatorParams);
            case "int":
                return new \KsStrUtils\Validator\TypeInt();
            case "string":
                return new \KsStrUtils\Validator\TypeString();
            case "array":
                return new \KsStrUtils\Validator\TypeArray();
            case "file":
                return new \KsStrUtils\Validator\TypeUploadedFile();
            case "file_array":
                return new \KsStrUtils\Validator\TypeUploadedFileList();
            case "int_array":
                return new \KsStrUtils\Validator\TypeIntArray();
            case "string_array":
                return new \KsStrUtils\Validator\TypeStringArray();
            default:
                throw new \DomainException("Wrong validator name: [" . $validatorName . "]");
        }
    }
}
