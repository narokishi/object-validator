<?php

namespace Narokishi\ObjectValidator;

use Narokishi\ObjectValidator\Rules\Collection;

/**
 * Class AbstractObjectValidator
 * @package Aggregate\GenericView\RequestValidator
 */
abstract class AbstractObjectValidator
{
    /**
     * @var \stdClass
     */
    protected $object;

    /**
     * @var string[]
     */
    protected $errors;

    /**
     * @return array
     */
    abstract public function getRules(): array;

    /**
     * AbstractRequestValidator constructor.
     *
     * @param \stdClass $request
     */
    final public function __construct(\stdClass $object)
    {
        $this->object = $object;
        $this->validate();
    }

    final public function validate(): void
    {
        $errors = [];

        /**
         * @var string $property
         * @var string|string[]|array $rules
         */
        foreach ($this->getRules() as $property => $rules) {
            $value = isset($this->object->$property) ? $this->object->$property : null;
            $rules = is_array($rules) ? $rules : [$rules];

            if (array_key_exists(RuleConst::RULE_COLLECTION, $rules)) {
                if (is_array($value)) {
                    /**
                     * @var integer|string $key
                     * @var \stdClass $item
                     */
                    foreach ($value as $key => $item) {
                        /**
                         * @var string $collectionProperty
                         * @var string|string[] $collectionRules
                         */
                        foreach ($rules[RuleConst::RULE_COLLECTION] as $collectionProperty => $collectionRules) {
                            $collectionValue = isset($value[$key]->$collectionProperty)
                                ? $value[$key]->$collectionProperty : null;

                            if ($validationErrors = $this->validateRules(
                                $collectionValue,
                                $collectionRules
                            )) {
                                $errors["$property.$key.$collectionProperty"] = $validationErrors;
                            }
                        }
                    }
                } else {
                    $errors[$property] = [Collection::DEFAULT_ERROR_MESSAGE];
                }
            } elseif ($validationErrors = $this->validateRules($value, $rules)) {
                $errors[$property] = $validationErrors;
            }
        }

        $this->errors = $errors;
    }

    /**
     * @param mixed $value
     * @param array $rules
     * @return array
     * @throws \LogicException
     */
    final private function validateRules($value, array $rules): array
    {
        $errors = [];

        /** @var string $rule */
        foreach ($rules as $rule) {
            /** @var AbstractRule $rule */
            $rule = new $rule($value);

            if (!$rule instanceof AbstractRule) {
                throw new \LogicException(
                    "$rule is not defined"
                );
            }

            if (!$rule->isValid()) {
                $errors[] = $rule->getError();
            }
        }

        return $errors;
    }

    /**
     * @return string[]
     */
    final public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * @return bool
     */
    final public function isNotValid(): bool
    {
        return !empty($this->errors);
    }

    /**
     * @example $prefix = 'compensation', output: 'compensation.payer', 'compensation.amount'
     *
     * @param string $prefix
     * @return $this
     */
    final public function applyPrefix(string $prefix): self
    {
        if ($this->isNotValid()) {
            $errors = [];

            foreach ($this->errors as $property => $error) {
                $errors["$prefix.$property"] = $error;
            }

            $this->errors = $errors;
        }

        return $this;
    }

    /**
     * @throws ValidationException
     */
    final public function withThrow(): void
    {
        if ($this->isNotValid()) {
            throw new ValidationException('', $this->errors);
        }
    }
}
