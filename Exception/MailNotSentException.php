<?php

namespace SendinBlue\SendinBlueApiBundle\Exception;

class MailNotSentException extends \Exception
{
    public function __construct($message)
    {
        parent::__construct(
          sprintf('Email was not sent. Error message: %s', $message)
        );
    }
}
