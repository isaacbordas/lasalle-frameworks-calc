<?php

namespace MyApp\Bundle\AppBundle\Exception;

use Throwable;

class MissingParamException extends \Exception
{
    /**
     * MissingParamException constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     * @throws \Exception
     */
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        throw new \Exception($message);
    }
}