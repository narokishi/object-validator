<?php
declare(strict_types=1);

namespace Narokishi\Tests;

use Narokishi\ObjectValidator\Rules\Collection;

/**
 * Class CollectionTest
 * @package Narokishi\Tests
 */
class CollectionTest extends TestCase
{
    /**
     * @return array
     */
    public function validDataProvider(): array
    {
        return [
            [[]],
            [['123', '1234']],
        ];
    }

    /**
     * @return array
     */
    public function invalidDataProvider(): array
    {
        return [
            [null],
            [123],
            [true],
            ['Text'],
        ];
    }

    /**
     * @dataProvider validDataProvider
     *
     * @param array $value
     */
    public function testCreateFromValidData(array $value): void
    {
        $ruleClass = new Collection($value);

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
        $ruleClass = new Collection($value);

        $this->assertFalse(
            $ruleClass->isValid()
        );
    }
}
