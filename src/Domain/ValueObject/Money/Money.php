<?php

namespace Domain\ValueObject\Money {

    class Money implements \JsonSerializable
    {
        /**
         * @var integer
         */
        private $amount;

        /**
         * @var Currency
         */
        private $currency;


        /**
         * Constructor
         *
         * @param  integer $amount
         * @param  Currency|string $currency
         * @throws InvalidArgumentException
         */
        public function __construct($amount, $currency)
        {
            if (!is_int($amount)) {
                throw new InvalidArgumentException('$amount must be an integer');
            }
            $this->amount   = $amount;
            $this->currency = $this->handleCurrencyArgument($currency);
        }

        /**
         * Returns the monetary value represented by this object.
         *
         * @return integer
         */
        public function getAmount()
        {
            return $this->amount;
        }


        /**
         * Returns the currency of the monetary value represented by this
         * object.
         *
         * @return Currency
         */
        public function getCurrency()
        {
            return $this->currency;
        }


        /**
         * Compares this Money object to another.
         *
         * Returns an integer less than, equal to, or greater than zero
         * if the value of this Money object is considered to be respectively
         * less than, equal to, or greater than the other Money object.
         *
         * @param  Money $other
         * @return integer -1|0|1
         * @throws CurrencyMismatchException
         */
        public function compareTo(Money $other)
        {
            $this->assertSameCurrency($this, $other);
            if ($this->amount == $other->getAmount()) {
                return 0;
            }
            return $this->amount < $other->getAmount() ? -1 : 1;
        }


        /**
         * Returns TRUE if this Money object equals to another.
         *
         * @param  Money $other
         * @return boolean
         * @throws CurrencyMismatchException
         */
        public function equals(Money $other)
        {
            return $this->compareTo($other) == 0;
        }


        /**
         * @param  Money $a
         * @param  Money $b
         * @throws CurrencyMismatchException
         */
        private function assertSameCurrency(Money $a, Money $b)
        {
            if ($a->getCurrency() != $b->getCurrency()) {
                throw new CurrencyMismatchException;
            }
        }


        /**
         * @param  Currency|string $currency
         * @return Currency
         * @throws InvalidArgumentException
         */
        private static function handleCurrencyArgument($currency)
        {
            if (!$currency instanceof Currency && !is_string($currency)) {
                throw new InvalidArgumentException('$currency must be an object of type Currency or a string');
            }
            if (is_string($currency)) {
                $currency = new Currency($currency);
            }
            return $currency;
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
                'amount'   => $this->amount,
                'currency' => $this->currency->getCurrencyCode()
            ];
        }
    }
}