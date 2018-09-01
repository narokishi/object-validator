<?php
declare(strict_types=1);

namespace Narokishi\Tests;

use Narokishi\ObjectValidator\Rules\Integer;

/**
 * Class IntegerTest
 * @package Narokishi\Tests
 */
class IntegerTest extends TestCase
{
    /**
     * @return array
     */
    public function validDataProvider(): array
    {
        return [
            [123],
            [0],
            [-123],
            [null],
        ];
    }

    /**
     * @return array
     */
    public function invalidDataProvider(): array
    {
        return [
            [123.37],
            [true],
            ['Text'],
        ];
    }

    /**
     * @dataProvider validDataProvider
     *
     * @param int|null $value
     */
    public function testCreateFromValidData(int $value = null): void
    {
        $ruleClass = new Integer($value);

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
        $ruleClass = new Integer($value);

        $this->assertFalse(
            $ruleClass->isValid()
        );
    }
}
