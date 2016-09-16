<?php

namespace DomainTest\ValueObject\Isbn {

    use Domain\ValueObject\ValueObjectInterface;
    use Domain\ValueObject\Isbn\Isbn;

    class IsbnTest extends \PHPUnit_Framework_TestCase
    {

        protected function setUp(){}

        /**
         * @test
         * @covers    \Domain\ValueObject\Isbn\Isbn::__construct
         */
        public function objectCanBeConstructedWithValidArguments()
        {
            $string = '978-3-16-148410-0';

            $isbn = new Isbn($string);
            self::assertInstanceOf(Isbn::class, $isbn);
        }


        /**
         * @test
         * @covers  \Domain\ValueObject\Isbn\Isbn::equals
         * @covers  \Domain\ValueObject\Isbn\Isbn::compareTo
         * @uses    \Domain\ValueObject\Isbn\Isbn::__construct
         * @uses    \Domain\ValueObject\Isbn\Isbn::getValue
         */
        public function objectsCanBeCompared1()
        {
            $isbn = new Isbn('978-3-16-148410-0');
            $other = new Isbn('978-3-16-148410-0');

            self::assertTrue($isbn->equals($other));


        }

        /**
         * @test
         * @covers  \Domain\ValueObject\Isbn\Isbn::equals
         * @covers  \Domain\ValueObject\Isbn\Isbn::compareTo
         * @uses    \Domain\ValueObject\Isbn\Isbn::__construct
         * @uses    \Domain\ValueObject\Isbn\Isbn::getValue
         */
        public function objectsCanBeCompared2()
        {
            $isbn = new Isbn('978-3-16-148410-0');
            $other = new Isbn('978-3-16-148410-1');

            self::assertFalse($isbn->equals($other));
        }

        /**
         * @test
         * @covers  \Domain\ValueObject\Isbn\Isbn::fromString
         * @uses    \Domain\ValueObject\Isbn\Isbn::__construct
         */
        public function objectCanBeConstructedFromString()
        {
            $isbn = Isbn::fromString('978-3-16-148410-0');
            self::assertInstanceOf(Isbn::class, $isbn);
        }


        /**
         * @test
         * @expectedException \Domain\ValueObject\Exception\InvalidArgumentException
         * @expectedExceptionMessage $value must be an string or integer
         */
        public function objectCannotBeConstructed()
        {
            $isbn = Isbn::fromString(true);
        }
    }
}