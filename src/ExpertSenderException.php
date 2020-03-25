<?php

namespace ExpertSender;

use Exception;

class ExpertSenderException extends Exception
{
    public function __construct($message, $code = 0)
    {
        parent::__construct($message, $code);
    }
}
