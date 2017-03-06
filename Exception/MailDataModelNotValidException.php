<?php

namespace SendinBlue\SendinBlueApiBundle\Exception;

class MailDataModelNotValidException extends \Exception
{
    public function __construct($errors)
    {
        parent::__construct(
          sprintf('Data model is not valid. %s', $errors)
        );
    }
}
