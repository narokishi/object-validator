<?php
declare(strict_types=1);

namespace Narokishi\ObjectValidator;

/**
 * Class AbstractRule
 * @package Aggregate\GenericView\RequestValidator
 */
abstract class AbstractRule
{
    /**
     * @var mixed
     */
    protected $value;

    /**
     * @var string
     */
    protected $error = '';

    /**
     * @return boolean
     */
    abstract public function isValid(): bool;

    /**
     * AbstractRule constructor.
     *
     * @param mixed $value
     */
    final public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @return string|null
     */
    final public function getError(): string
    {
        return $this->error;
    }
}
