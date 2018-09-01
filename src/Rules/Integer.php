<?php
declare(strict_types=1);

namespace Narokishi\ObjectValidator\Rules;

use Narokishi\ObjectValidator\AbstractRule;

/**
 * Class Integer
 * @package Aggregate\GenericView\RequestValidator\Rules
 */
class Integer extends AbstractRule
{
    /**
     * Domyślna wiadomość błędu.
     */
    const DEFAULT_ERROR_MESSAGE = 'Value is not a valid integer';

    /**
     * @var string
     */
    protected $error = self::DEFAULT_ERROR_MESSAGE;

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        if (empty($this->value)) {
            return true;
        }

        return is_integer($this->value);
    }
}
