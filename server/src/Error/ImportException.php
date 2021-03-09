<?php

namespace BSHARE\WEBSERVER\ERROR;

use Exception;

class ImportException extends Exception
{
    public function __construct($message, $code)
    {
        parent::__construct("Error!: Path to component incorrect");
    }
}
