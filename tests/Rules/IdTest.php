<?php
declare(strict_types=1);

namespace Narokishi\Tests;

use Narokishi\ObjectValidator\Rules\Id;

/**
 * Class IdTest
 * @package Narokishi\Tests
 */
class IdTest extends TestCase
{
    /**
     * @return array
     */
    public function validDataProvider(): array
    {
        return [
            [123],
            [1],
            [null],
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
        ];
    }

    /**
     * @dataProvider validDataProvider
     *
     * @param int|null $value
     */
    public function testCreateFromValidData(int $value = null): void
    {
        $ruleClass = new Id($value);

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
        $ruleClass = new Id($value);

        $this->assertFalse(
            $ruleClass->isValid()
        );
    }
}
