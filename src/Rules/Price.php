<?php
declare(strict_types=1);

namespace Narokishi\ObjectValidator\Rules;

use Narokishi\ObjectValidator\AbstractRule;

/**
 * Class Price
 * @package Aggregate\GenericView\RequestValidator\Rules
 */
class Price extends AbstractRule
{
    /**
     * Domyślna wiadomość błędu.
     */
    const DEFAULT_ERROR_MESSAGE = 'Value is not a valid price';

    /**
     * @var string
     */
    protected $error = self::DEFAULT_ERROR_MESSAGE;

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        // Jeżeli nie jest stringiem lub jest i nie zawiera spacji.
        if (!(is_string($this->value) && is_integer(strpos($this->value, ' ')))) {
            return false;
        }

        $amountAndCurrency = explode(' ', $this->value);

        // Jeżeli string składał się z czegoś więcej niż tylko kwota i waluta.
        if (count($amountAndCurrency) !== 2) {
            return false;
        }

        list($amount, $currency) = $amountAndCurrency;

        if (!(is_numeric($amount) && is_string($currency))) {
            return false;
        }

        return true;
    }
}
