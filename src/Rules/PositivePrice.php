<?php
declare(strict_types=1);

namespace Narokishi\ObjectValidator\Rules;

/**
 * Class PositivePrice
 * @package Aggregate\GenericView\RequestValidator\Rules
 */
final class PositivePrice extends Price
{
    /**
     * Domyślna wiadomość błędu.
     */
    const DEFAULT_ERROR_MESSAGE = 'Price should be positive';

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
            $price = explode(' ', $this->value);

            return reset($price) > 0;
        }

        $this->error = parent::DEFAULT_ERROR_MESSAGE;

        return false;
    }
}
