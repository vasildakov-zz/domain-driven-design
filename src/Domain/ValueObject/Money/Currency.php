<?php

namespace Domain\ValueObject\Money {

    class Currency implements \JsonSerializable
    {
        /**
         * @var array
         */
        private static $currencies = [
            'EUR' => [
                'display_name' => 'Euro',
                'numeric_code' => 978,
                'default_fraction_digits' => 2,
                'sub_unit' => 100,
            ],
            'GBP' => [
                'display_name' => 'Pound Sterling',
                'numeric_code' => 826,
                'default_fraction_digits' => 2,
                'sub_unit' => 100,
            ],
        ];

        /**
         * @var string
         */
        private $currencyCode;


        /**
         * Constructor
         *
         * @param  string $currencyCode
         * @throws InvalidArgumentException
         */
        public function __construct($currencyCode)
        {
            if (!isset(self::$currencies[$currencyCode])) {
                $currencyCode = strtoupper($currencyCode);
            }

            if (!isset(self::$currencies[$currencyCode])) {
                throw new InvalidArgumentException(
                    sprintf('Unknown currency code "%s"', $currencyCode)
                );
            }

            $this->currencyCode = $currencyCode;
        }


        /**
         * @param string $code
         * @param string $displayName
         * @param integer $numericCode
         * @param integer $defaultFractionDigits
         * @param integer $subUnit
         */
        public static function addCurrency($code, $displayName, $numericCode, $defaultFractionDigits, $subUnit)
        {
            self::$currencies[$code] = [
                'display_name' => $displayName,
                'numeric_code' => $numericCode,
                'default_fraction_digits' => $defaultFractionDigits,
                'sub_unit' => $subUnit,
            ];
        }


        /**
         * @return array the list of configured currencies
         */
        public static function getCurrencies()
        {
            return self::$currencies;
        }


        /**
         * Returns the ISO 4217 currency code of this currency.
         *
         * @return string
         */
        public function getCurrencyCode()
        {
            return $this->currencyCode;
        }


        /**
         * Returns the default number of fraction digits used with this
         * currency.
         *
         * @return integer
         */
        public function getDefaultFractionDigits()
        {
            return self::$currencies[$this->currencyCode]['default_fraction_digits'];
        }


        /**
         * Returns the name that is suitable for displaying this currency.
         *
         * @return string
         */
        public function getDisplayName()
        {
            return self::$currencies[$this->currencyCode]['display_name'];
        }


        /**
         * Returns the ISO 4217 numeric code of this currency.
         *
         * @return integer
         */
        public function getNumericCode()
        {
            return self::$currencies[$this->currencyCode]['numeric_code'];
        }


        /**
         * Returns the ISO 4217 numeric code of this currency.
         *
         * @return integer
         */
        public function getSubUnit()
        {
            return self::$currencies[$this->currencyCode]['sub_unit'];
        }


        /**
         * Returns the ISO 4217 currency code of this currency.
         *
         * @return string
         */
        public function __toString()
        {
            return $this->currencyCode;
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
                'currencyCode'   => $this->currencyCode
            ];
        }
    }
}