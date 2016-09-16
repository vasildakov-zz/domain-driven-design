<?php

namespace DomainTest\Dto {

    use Ramsey\Uuid\Uuid;
    use Domain\Entity;
    use Domain\Dto;
    use Domain\ValueObject;

    class BookTest extends \PHPUnit_Framework_TestCase
    {

        protected function setUp()
        {
            $this->id       = Uuid::uuid4();
            $this->title    = "The Hobbit";
            $this->isbn     = new ValueObject\Isbn\Isbn('978-3-16-148410-0');
            $this->currency = new ValueObject\Money\Currency('EUR');
            $this->price    = new ValueObject\Money\Money(49, $this->currency);
        }

        /**
         * @test
         * @covers    \Domain\Dto\Book::__construct
         */
        public function objectCanBeConstructedWithValidArguments()
        {

            $book = new Entity\Book($this->id, $this->title, $this->isbn, $this->price);

            $dto  = new Dto\Book($book);

            self::assertInstanceOf(Dto\Book::class, $dto);

            self::assertEquals((string)$this->id, $dto->id());
            self::assertEquals((string)$this->title, $dto->title());
            self::assertEquals((string)$this->isbn, $dto->isbn());
            self::assertEquals(49, $dto->price());
        }
    }
}
