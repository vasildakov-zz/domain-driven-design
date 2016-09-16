<?php

namespace Domain\ValueObject\DateTime {

    class Time {

        /**
         * @var Hour $hour
         */
        protected $hour;

        /**
         * @var Minute $minute
         */
        protected $minute;

        /**
         * @var Second $second
         */
        protected $second;

        /**
         * Returns a new Time objects
         *
         * @param Hour   $hour
         * @param Minute $minute
         * @param Second $second
         */
        public function __construct(Hour $hour, Minute $minute, Second $second)
        {
            $this->hour   = $hour;
            $this->minute = $minute;
            $this->second = $second;
        }
    }
}
