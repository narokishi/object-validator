<?php
declare(strict_types=1);

namespace Narokishi\Tests;

use Narokishi\ObjectValidator\Rules\NotPastDate;

/**
 * Class NotPastDateTest
 * @package Narokishi\Tests
 */
class NotPastDateTest extends TestCase
{
    /**
     * @return array
     */
    public function validDataProvider(): array
    {
        return [
            ['2060-08-05'],
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
            ['2016-03-05'],
        ];
    }

    /**
     * @dataProvider validDataProvider
     *
     * @param string|null $value
     */
    public function testCreateFromValidData(string $value = null): void
    {
        $ruleClass = new NotPastDate($value);

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
        $ruleClass = new NotPastDate($value);

        $this->assertFalse(
            $ruleClass->isValid()
        );
    }
}
