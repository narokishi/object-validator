<?php
declare(strict_types=1);

namespace Narokishi\Tests;

use Narokishi\ObjectValidator\Rules\Date;

/**
 * Class DateTest
 * @package Narokishi\Tests
 */
class DateTest extends TestCase
{
    /**
     * @return array
     */
    public function validDataProvider(): array
    {
        return [
            ['2018-02-03'],
            ['2014-05-08'],
            [null],
        ];
    }

    /**
     * @return array
     */
    public function invalidDataProvider(): array
    {
        return [
            [123],
            [true],
            ['Text'],
        ];
    }

    /**
     * @dataProvider validDataProvider
     *
     * @param string|null $value
     */
    public function testCreateFromValidData(string $value = null): void
    {
        $ruleClass = new Date($value);

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
        $ruleClass = new Date($value);

        $this->assertFalse(
            $ruleClass->isValid()
        );
    }
}
