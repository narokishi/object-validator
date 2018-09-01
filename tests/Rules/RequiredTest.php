<?php
declare(strict_types=1);

namespace Narokishi\Tests;

use Narokishi\ObjectValidator\Rules\Required;

/**
 * Class RequiredTest
 * @package Narokishi\Tests
 */
class RequiredTest extends TestCase
{
    /**
     * @return array
     */
    public function validDataProvider(): array
    {
        return [
            [123],
            [1],
            ['Text'],
            ['2018-02-05'],
            [0],
            [-123],
            [123.75],
        ];
    }

    /**
     * @return array
     */
    public function invalidDataProvider(): array
    {
        return [
            [null],
        ];
    }

    /**
     * @dataProvider validDataProvider
     *
     * @param mixed $value
     */
    public function testCreateFromValidData($value = null): void
    {
        $ruleClass = new Required($value);

        $this->assertTrue(
            $ruleClass->isValid()
        );
    }

    /**
     * @dataProvider invalidDataProvider
     *
     * @param null $value
     */
    public function testCreateFromInvalidData($value): void
    {
        $ruleClass = new Required($value);

        $this->assertFalse(
            $ruleClass->isValid()
        );
    }
}
