<?php

namespace Narokishi\ObjectValidator;

/**
 * Class RuleConst
 * @package Narokishi\ObjectValidator
 */
abstract class RuleConst
{
    const RULE_COLLECTION = Rules\Collection::class;

    const RULE_DATE = Rules\Date::class;
    const RULE_NOT_PAST_DATE = Rules\NotPastDate::class;

    const RULE_INTEGER = Rules\Integer::class;
    const RULE_ID = Rules\Id::class;

    const RULE_PRICE = Rules\Price::class;
    const RULE_POSITIVE_PRICE = Rules\PositivePrice::class;

    const RULE_REQUIRED = Rules\Required::class;

    const RULES = [
        self::RULE_COLLECTION,
        self::RULE_DATE,
        self::RULE_NOT_PAST_DATE,
        self::RULE_INTEGER,
        self::RULE_ID,
        self::RULE_PRICE,
        self::RULE_POSITIVE_PRICE,
        self::RULE_REQUIRED,
    ];
}
