<?php

namespace DomainTest\ValueObject\Money {

    use Domain\ValueObject\Money\Money;
    use Domain\ValueObject\Money\Currency;

    class CurrencyTest extends \PHPUnit_Framework_TestCase
    {
        public function setUp() {}


        public function testCanBeConstructedFromUppercaseString()
        {
            $currency = new Currency('EUR');
            $this->assertInstanceOf(Currency::class, $currency);
            return $currency;
        }
    }
}
