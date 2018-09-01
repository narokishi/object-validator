<?php
declare(strict_types=1);

namespace Narokishi\Tests;

use Narokishi\ObjectValidator\Rules\Price;

/**
 * Class PriceTest
 * @package Narokishi\Tests
 */
class PriceTest extends TestCase
{
    /**
     * @return array
     */
    public function validDataProvider(): array
    {
        return [
            ['123.35 PLN'],
            ['-123.35 PLN'],
            ['0.00 PLN'],
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
        ];
    }

    /**
     * @dataProvider validDataProvider
     *
     * @param string|null $value
     */
    public function testCreateFromValidData(string $value = null): void
    {
        $ruleClass = new Price($value);

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
        $ruleClass = new Price($value);

        $this->assertFalse(
            $ruleClass->isValid()
        );
    }
}
