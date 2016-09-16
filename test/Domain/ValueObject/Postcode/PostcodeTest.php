<?php

namespace DomainTest\ValueObject\Postcode {

    use Domain\ValueObject\Postcode\Postcode;

    class PostcodeTest extends \PHPUnit_Framework_TestCase
    {
        public function setUp() {}

        /**
         * @test
         * @covers \Domain\ValueObject\Postcode\Postcode::__construct
         * @uses   \Domain\ValueObject\Postcode\Postcode::isValid
         */
        public function objectCanBeConstructedForValidConstructorArguments()
        {
            $postcode = new Postcode("GU16 7ZH");

            $this->assertInstanceOf(Postcode::class, $postcode);

            return $postcode;
        }


        /**
         * @test
         * @covers \Domain\ValueObject\Postcode\Postcode::normalise
         * @uses   \Domain\ValueObject\Postcode\Postcode::isValid
         * @uses   \Domain\ValueObject\Postcode\Postcode::outward
         * @uses   \Domain\ValueObject\Postcode\Postcode::inward
         */
        public function objectCanBeNormalized()
        {
            $postcode = new Postcode("GU167ZH");

            $this->assertEquals("GU16 7ZH", $postcode->normalise());

            return $postcode;
        }


        /**
         * @test
         * @covers \Domain\ValueObject\Postcode\Postcode::__toString
         * @uses   \Domain\ValueObject\Postcode\Postcode::outward
         * @uses   \Domain\ValueObject\Postcode\Postcode::inward
         */
        public function objectCanBeConvertedToString()
        {
            $postcode = new Postcode("GU16 7ZH");

            $string = (string) $postcode;

            self::assertInternalType('string', $string);
            self::assertEquals("GU16 7ZH", $string);

            return $string;
        }


        /**
         * @test
         * @covers \Domain\ValueObject\Postcode\Postcode::sector
         */
        public function objectSectorCode()
        {
            $postcode = new Postcode("GU16 7ZH");

            self::assertEquals("GU16 7", $postcode->sector());

            return $postcode;
        }


        /**
         * @test
         * @covers \Domain\ValueObject\Postcode\Postcode::unit
         */
        public function objectUnitCode()
        {
            $postcode = new Postcode("GU16 7ZH");

            self::assertEquals("ZH", $postcode->unit());

            return $postcode;
        }


        /**
         * @test
         * @covers \Domain\ValueObject\Postcode\Postcode::split
         * @uses   \Domain\ValueObject\Postcode\Postcode::outward
         * @uses   \Domain\ValueObject\Postcode\Postcode::inward
         * @uses   \Domain\ValueObject\Postcode\Postcode::sector
         * @uses   \Domain\ValueObject\Postcode\Postcode::area
         * @uses   \Domain\ValueObject\Postcode\Postcode::district
         * @uses   \Domain\ValueObject\Postcode\Postcode::unit
         */
        public function objectSplit()
        {
            $postcode = new Postcode("AA9A 9AA");
            $array = $postcode->split();

            self::assertInternalType('array', $array);

            self::assertArrayHasKey('outward', $array);
            self::assertArrayHasKey('inward', $array);
            self::assertArrayHasKey('sector', $array);
            self::assertArrayHasKey('area', $array);
            self::assertArrayHasKey('district', $array);
            self::assertArrayHasKey('unit', $array);

            self::assertEquals("AA9A", $array['outward']);
            self::assertEquals("9AA", $array['inward']);
            self::assertEquals("AA9A 9", $array['sector']);
            self::assertEquals("AA", $array['area']);
            self::assertEquals("AA9", $array['district']);
            self::assertEquals("AA", $array['unit']);

            return $postcode;
        }


        /**
         * @test
         * @covers \Domain\ValueObject\Postcode\Postcode::equals
         * @uses   \Domain\ValueObject\Postcode\Postcode::compareTo
         */
        public function twoObjectsAreEqual()
        {
            $postcode = new Postcode("AA9A 9AA");

            $other = new Postcode("AA9A 9AA");

            self::assertTrue($postcode->equals($other));
        }

        /**
         * @test
         * @covers \Domain\ValueObject\Postcode\Postcode::equals
         * @uses   \Domain\ValueObject\Postcode\Postcode::compareTo
         */
        public function twoObjectsAreNotEqual()
        {
            $postcode = new Postcode("AA9A 9AA");

            $other = new Postcode("TW8 8FB");

            self::assertFalse($postcode->equals($other));
        }


        /**
         * @test
         * @dataProvider validPostcodeProvider
         * @covers \Domain\ValueObject\Postcode\Postcode::__construct
         * @uses   \Domain\ValueObject\Postcode\Postcode::isValid
         */
        public function objectCanBeConstructedWithValidArgument($value, $expected)
        {
            $postcode = new Postcode($value);
            self::assertEquals($expected, $postcode->isValid($value));
        }


        /**
         * Postcodes provider
         * @return array
         */
        public function validPostcodeProvider()
        {
            return [
                [  "A9 9AA", true],
                [ "A9A 9AA", true],
                [ "A99 9AA", true],
                [ "AA9 9AA", true],
                ["AA9A 9AA", true],
                ["AA99 9AA", true],
            ];
        }
    }
}
