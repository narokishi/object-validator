<?php
declare(strict_types=1);

namespace Narokishi\ObjectValidator\Rules;

/**
 * Class NotPastDate
 * @package Aggregate\GenericView\RequestValidator\Rules
 */
final class NotPastDate extends Date
{
    /**
     * Domyślna wiadomość błędu.
     */
    const DEFAULT_ERROR_MESSAGE = 'Date should not be in the past';

    /**
     * @var string
     */
    protected $error = self::DEFAULT_ERROR_MESSAGE;

    /**
     * @return bool
     */
    final public function isValid(): bool
    {
        if (parent::isValid()) {
            if (empty($this->value)) {
                return true;
            }

            return new \DateTime($this->value) > new \DateTime('yesterday');
        }

        $this->error = parent::DEFAULT_ERROR_MESSAGE;

        return false;
    }
}
