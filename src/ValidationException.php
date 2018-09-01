<?php
declare(strict_types=1);

namespace Narokishi\ObjectValidator;

/**
 * Class ValidationException
 * @package Narokishi\ObjectValidator
 */
class ValidationException extends \Exception
{
    /**
     * @var array
     */
    protected $errors = [];

    /**
     * ValidationException constructor.
     *
     * @param string $message
     * @param array $errors
     */
    public function __construct(string $message = '', array $errors = [])
    {
        parent::__construct($message, 500);
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}
