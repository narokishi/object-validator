<?php
declare(strict_types=1);

namespace Narokishi\ObjectValidator\Rules;

use Narokishi\ObjectValidator\AbstractRule;

/**
 * Class Date
 * @package Aggregate\GenericView\RequestValidator\Rules
 */
class Date extends AbstractRule
{
    /**
     * Wzór daty z formularza generycznego (YYYY-mm-dd).
     */
    const GENERIC_VIEW_DATE_PATTERN = '/^\d{4}(-\d{2}){2}$/';

    /**
     * Domyślna wiadomość błędu.
     */
    const DEFAULT_ERROR_MESSAGE = 'Input is not a valid date';

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

        if (!is_string($this->value)) {
            return false;
        }

        $matches = [];

        preg_match(self::GENERIC_VIEW_DATE_PATTERN, $this->value, $matches);
        if (!array_key_exists(0, $matches)) {
            return false;
        }

        $date = explode('-', reset($matches));

        return checkdate(intval($date[1]), intval($date[2]), intval($date[0]));
    }
}
