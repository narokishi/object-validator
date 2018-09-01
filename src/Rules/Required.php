<?php
declare(strict_types=1);

namespace Narokishi\ObjectValidator\Rules;

use Narokishi\ObjectValidator\AbstractRule;

/**
 * Class Required
 * @package Aggregate\GenericView\RequestValidator\Rules
 */
final class Required extends AbstractRule
{
    /**
     * Domyślna wiadomość błędu.
     */
    const DEFAULT_ERROR_MESSAGE = 'Field is required';

    /**
     * @var string
     */
    protected $error = self::DEFAULT_ERROR_MESSAGE;

    /**
     * @return bool
     */
    final public function isValid(): bool
    {
        return !empty($this->value) || $this->value === 0;
    }
}
