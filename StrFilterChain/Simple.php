<?php

class Simple extends \Utils\StrFilterChain
{
    public function __construct($cutAfter = 100)
    {
        parent::__construct();
        $this->addFilter(new \Utils\StrFilter\Trim());
        $this->addFilter(new \Utils\StrFilter\Cut($cutAfter));
    }
}
