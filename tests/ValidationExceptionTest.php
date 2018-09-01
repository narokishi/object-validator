<?php
declare(strict_types=1);

namespace Narokishi\Tests;

use Narokishi\ObjectValidator\ValidationException;

/**
 * Class ValidationExceptionTest
 * @package Narokishi\Tests
 */
class ValidationExceptionTest extends TestCase
{
    /**
     * @expectedException \Narokishi\ObjectValidator\ValidationException
     */
    public function testThrowable(): void
    {
        throw new ValidationException;
    }

    public function testReturningErrors()
    {
        $exception = new ValidationException;

        $this->assertTrue(
            is_array($exception->getErrors())
        );
        $this->assertEmpty(
            $exception->getErrors()
        );
    }
}
