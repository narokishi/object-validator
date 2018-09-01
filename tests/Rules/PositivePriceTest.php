<?php
declare(strict_types=1);

namespace Narokishi\Tests;

use Narokishi\ObjectValidator\Rules\PositivePrice;

/**
 * Class PositivePriceTest
 * @package Narokishi\Tests
 */
class PositivePriceTest extends TestCase
{
    /**
     * @return array
     */
    public function validDataProvider(): array
    {
        return [
            ['123 PLN'],
        ];
    }

    /**
     * @return array
     */
    public function invalidDataProvider(): array
    {
        return [
            [0],
            [-123],
            [123.37],
            [true],
            ['Text'],
            ['123.37 PLN EUR'],
            ['PLN EUR'],
            ['0.00 PLN'],
            ['-75.25 PLN'],
        ];
    }

    /**
     * @dataProvider validDataProvider
     *
     * @param string|null $value
     */
    public function testCreateFromValidData(string $value = null): void
    {
        $ruleClass = new PositivePrice($value);

        $this->assertTrue(
            $ruleClass->isValid()
        );
    }

    /**
     * @dataProvider invalidDataProvider
     *
     * @param mixed $value
     */
    public function testCreateFromInvalidData($value): void
    {
        $ruleClass = new PositivePrice($value);

        $this->assertFalse(
            $ruleClass->isValid()
        );
    }
}
