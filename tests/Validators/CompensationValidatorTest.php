<?php
declare(strict_types=1);

namespace Narokishi\ObjectValidator\Validators;

use Narokishi\Tests\TestCase;

/**
 * Class CompensationValidatorTest
 * @package Narokishi\ObjectValidator\Validators
 */
class CompensationValidatorTest extends TestCase
{
    /**
     * @return array
     */
    public function validDataProvider(): array
    {
        $paymentEventByProduct = new \stdClass;
        $paymentEventByProduct->orderItemId = 147;

        $validObject = new \stdClass;
        $validObject->payer = 'Payer';
        $validObject->amount = '0.05 PLN';
        $validObject->expectedOperationDate = '2060-06-06';
        $validObject->paymentEventByProducts = [
            $paymentEventByProduct,
        ];

        return [
            [$validObject],
        ];
    }

    /**
     * @return array
     */
    public function invalidDataProvider(): array
    {
        $notValidObject = new \stdClass;
        $notValidObject->payer = 'Payer';

        return [
            [new \stdClass()],
            [$notValidObject],
        ];
    }

    /**
     * @dataProvider validDataProvider
     *
     * @param \stdClass $object
     */
    public function testValidateFromValidData(\stdClass $object): void
    {
        $validator = new CompensationValidator($object);

        $this->assertEmpty(
            $validator->getErrors()
        );
    }

    /**
     * @dataProvider invalidDataProvider
     *
     * @param \stdClass $object
     */
    public function testValidateFromInvalidData(\stdClass $object): void
    {
        $validator = new CompensationValidator($object);

        $this->assertNotEmpty(
            $validator->getErrors()
        );
    }

    /**
     * @dataProvider invalidDataProvider
     * @expectedException  \Narokishi\ObjectValidator\ValidationException
     *
     * @param \stdClass $object
     */
    public function testIsThrowingFromInvalidData(\stdClass $object): void
    {
        (new CompensationValidator($object))
            ->withThrow();
    }

    /**
     * @dataProvider validDataProvider
     *
     * @param \stdClass $object
     */
    public function testIsNotThrowingFromValidData(\stdClass $object): void
    {
        (new CompensationValidator($object))
            ->withThrow();

        $this->expectNotToPerformAssertions();
    }

    /**
     * @dataProvider invalidDataProvider
     *
     * @param \stdClass $object
     */
    public function testApplyingPrefix(\stdClass $object): void
    {
        $prefix = 'compensation';
        $validator = (new CompensationValidator($object))
            ->applyPrefix($prefix);

        foreach ($validator->getErrors() as $key => $errors) {
            $this->assertSame(
                0,
                strpos($key, $prefix)
            );
        }
    }
}
