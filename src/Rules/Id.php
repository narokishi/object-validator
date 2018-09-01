<?php
declare(strict_types=1);

namespace Narokishi\ObjectValidator\Rules;

/**
 * Class Id
 * @package Aggregate\GenericView\RequestValidator\Rules
 */
final class Id extends Integer
{
    /**
     * @const Maksymalna wielkość int w PostgreSQL.
     */
    const POSTGRES_MAX_INT_SIZE = 2147483647;

    /**
     * Domyślna wiadomość błędu.
     */
    const DEFAULT_ERROR_MESSAGE = 'Number is not an identifier';

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
            if (is_null($this->value)) {
                return true;
            }

            return $this->value >= 1 && $this->value < self::POSTGRES_MAX_INT_SIZE;
        }

        $this->error = parent::DEFAULT_ERROR_MESSAGE;

        return false;
    }
}
