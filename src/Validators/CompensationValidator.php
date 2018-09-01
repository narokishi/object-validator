<?php
declare(strict_types=1);

namespace Narokishi\ObjectValidator\Validators;

use Narokishi\ObjectValidator\AbstractObjectValidator;
use Narokishi\ObjectValidator\PropertyConst;
use Narokishi\ObjectValidator\RuleConst;

/**
 * Class CompensationValidator
 * @package Aggregate\GenericView\RequestValidator\Validator\FinancialEvent
 */
final class CompensationValidator extends AbstractObjectValidator
{
    /**
     * @return array
     */
    public function getRules(): array
    {
        return [
            PropertyConst::PAYER => RuleConst::RULE_REQUIRED,
            PropertyConst::EXPECTED_OPERATION_DATE => [
                RuleConst::RULE_REQUIRED,
                RuleConst::RULE_NOT_PAST_DATE,
            ],
            PropertyConst::AMOUNT => [
                RuleConst::RULE_REQUIRED,
                RuleConst::RULE_POSITIVE_PRICE,
            ],
            PropertyConst::PAYMENT_EVENT_BY_PRODUCTS => [
                RuleConst::RULE_COLLECTION => [
                    PropertyConst::ORDER_ITEM_ID => [
                        RuleConst::RULE_REQUIRED,
                        RuleConst::RULE_ID,
                    ]
                ],
            ],
        ];
    }
}
