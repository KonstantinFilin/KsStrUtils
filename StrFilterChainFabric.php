<?php

namespace Utils;

class StrFilterChainFabric
{
    /**
     * 
     * @param type $str
     * @return \Utils\StrFilterChain
     */
    public static function create($str)
    {
        $filterStrArr = explode("|", $str);
        $filterChain = new \Utils\StrFilterChain();
        
        foreach($filterStrArr as $filterStr) {
            $filterChain->addFilter(self::createFilterFromStr($filterStr));
        }
        
        return $filterChain;
    }
    
    /**
     * 
     * @param string $str
     * @return Utils\Validators Description
     */
    private static function createFilterFromStr($str)
    {
        $filterName = "";
        $filterParams = [];
        
        if (strpos($str, ":") !== false) {
            list($filterName, $filterParamsStr) = explode(":", $str, 2);
            $filterParams = explode(",", $filterParamsStr);
        } else {
            $filterName = $str;
        }
        
        switch ($filterName) {
            case "cut":
                if ( empty($filterParams[0]) ) {
                    throw new \InvalidArgumentException("Требуется указать параметр для фильтра cut");
                }
                
                return new \Utils\StrFilter\Cut($filterParams[0]);
            case "trim":
                return new \Utils\StrFilter\Trim();
            case "int":
                return new \Utils\StrFilter\Int();
            case "int_array":
                return new \Utils\StrFilter\IntArray();
            case "eat":
                if ( empty($filterParams[0]) ) {
                    throw new \InvalidArgumentException("Требуется указать параметр для фильтра eat");
                }
                return new \Utils\StrFilter\StripChar($filterParams[0]);
            default:
                throw new \DomainException("Wrong filter name: [" . $filterName . "]");
        }
    }
}
