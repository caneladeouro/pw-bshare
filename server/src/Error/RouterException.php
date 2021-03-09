<?php

namespace BSHARE\WEBSERVER\ERROR;

use Exception;

class RouterException extends Exception
{
    public function __construct($message, $code)
    {
        parent::__construct("Error!: Path router to component incorrect");
    }
}
