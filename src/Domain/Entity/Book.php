<?php

namespace Domain\Entity {

    use Ramsey\Uuid\Uuid;
    use Domain\ValueObject\Isbn\Isbn;
    use Domain\ValueObject\Money\Money;
    use Domain\Dto;

    /**
     * Book
     *
     * @author Vasil Dakov <vasildakov@gmail.com>
     */
    class Book extends AbstractEntity
    {
        /**
         * @var Uuid $id
         */
        private $id;

        /**
         * @var String $title
         */
        private $title;

        /**
         * @var Isbn $isbn
         */
        private $isbn;

        /**
         * @var Money $price
         */
        private $price;

        /**
         * @var Boolesn $inStock
         */
        private $inStock;


        /**
         * Constructor
         *
         * @param Uuid   $id
         * @param String $title
         * @param Isbn   $isbn
         * @param Money  $price
         */
        public function __construct(Uuid $id, String $title, Isbn $isbn, Money $price)
        {
            $this->id     = $id;
            $this->title  = $title;
            $this->isbn   = $isbn;
            $this->price  = $price;
        }

        /**
         * @return Uuid $id
         */
        public function getId()
        {
            return $this->id;
        }


        /**
         * @return string $title
         */
        public function getTitle()
        {
            return $this->title;
        }


        /**
         * @param Money $price
         */
        public function setPrice(Money $price)
        {
            $this->price = $price;

            return $this;
        }

        /**
         * @return Money $price
         */
        public function getPrice()
        {
            return $this->price;
        }


        /**
         * @param Isbn $isbn
         */
        public function setIsbn(Isbn $isbn)
        {
            $this->isbn = $isbn;

            return $this;
        }


        /**
         * @return Isbn $price
         */
        public function getIsbn()
        {
            return $this->isbn;
        }
    }
}
