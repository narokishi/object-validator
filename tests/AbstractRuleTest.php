<?php
declare(strict_types=1);

namespace Narokishi\Tests;

use Narokishi\ObjectValidator\AbstractRule;

/**
 * Class AbstractRuleTest
 * @package Narokishi\Tests
 */
class AbstractRuleTest extends TestCase
{
    /**
     * @var AbstractRule
     */
    protected $ruleClass;

    /**
     * @throws \ReflectionException
     */
    public function setUp(): void
    {
        $this->ruleClass = $this->getMockForAbstractClass(AbstractRule::class, ['AbstractValue']);
    }

    public function testHasEmptyError(): void
    {
        $this->assertEmpty(
            $this->ruleClass->getError()
        );
    }
}
