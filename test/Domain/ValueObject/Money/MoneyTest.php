<?php

namespace DomainTest\ValueObject\Money {

    use Domain\ValueObject\Money\Money;
    use Domain\ValueObject\Money\Currency;

    class MoneyTest extends \PHPUnit_Framework_TestCase
    {
        public function setUp() {}

        public function testObjectCanBeConstructedForValidConstructorArguments()
        {
            $money = new Money(0, new Currency('EUR'));
            $this->assertInstanceOf(Money::class, $money);
            return $money;
        }
    }
}
