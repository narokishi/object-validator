<?php
declare(strict_types=1);

namespace Narokishi\ObjectValidator\Rules;

use Narokishi\ObjectValidator\AbstractRule;

/**
 * Class Collection
 * @package Aggregate\GenericView\RequestValidator\Rules
 */
final class Collection extends AbstractRule
{
    const DEFAULT_ERROR_MESSAGE = 'Input value is not a collection';

    /**
     * @var string
     */
    protected $error = self::DEFAULT_ERROR_MESSAGE;

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return is_array($this->value);
    }
}
