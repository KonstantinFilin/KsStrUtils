<?php

class Simple extends \KsStrUtils\StrFilterChain
{
    public function __construct($cutAfter = 100)
    {
        parent::__construct();
        $this->addFilter(new \KsStrUtils\StrFilter\Trim());
        $this->addFilter(new \KsStrUtils\StrFilter\Cut($cutAfter));
    }
}
