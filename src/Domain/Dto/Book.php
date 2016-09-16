<?php

namespace Domain\Dto {

    use Domain\Entity;

    /**
     * Book DTO
     *
     * @author Vasil Dakov <vasildakov@gmail.com>
     */
    class Book implements \JsonSerializable
    {
        /**
         * @var string $id
         */
        private $_id;

        /**
         * @var string $title
         */
        private $_title;

        /**
         * @var string $isbn
         */
        private $_isbn;

        /**
         * @var float $price
         */
        private $_price;


        /**
         * Constructor
         *
         * Entity\Book $book
         */
        public function __construct(Entity\Book $book)
        {
            $this->_id    = (string) $book->getId();
            $this->_title = (string) $book->getTitle();
            $this->_isbn  = (string) $book->getIsbn();
            $this->_price = (float)  $book->getPrice()->getAmount();
        }


        /**
         * Returns book id
         *
         * @return String $id
         */
        public function id()
        {
            return $this->_id;
        }


        /**
         * Returns book title
         *
         * @return String $title
         */
        public function title()
        {
            return $this->_title;
        }


        /**
         * Returns book ISBN
         *
         * @return String $isbn
         */
        public function isbn()
        {
            return $this->_isbn;
        }


        /**
         * Returns book price
         *
         * @return Float $price
         */
        public function price()
        {
            return $this->_price;
        }


        /**
         * Specify data which should be serialized to JSON
         *
         * @return mixed data which can be serialized by <b>json_encode</b>,
         * @link   http://php.net/manual/en/jsonserializable.jsonserialize.php
         */
        public function jsonSerialize()
        {
            return [
                'id'    => $this->_id,
                'title' => $this->_title,
                'isbn'  => $this->_isbn,
                'price' => $this->_price,
            ];
        }
    }
}
