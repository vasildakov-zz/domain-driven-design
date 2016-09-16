<?php

namespace Domain\ValueObject\DateTime {

    class DateTime {

        /**
         * @var Date $date
         */
        protected $date;

        /**
         * @var Time $time
         */
        protected $time;

        /**
         * Returns a new DateTime object
         *
         * @param Date $date
         * @param Time $time
         */
        public function __construct(Date $date, Time $time = null)
        {
            $this->date = $date;
            if (null === $time) {
                $time = Time::zero();
            }
            $this->time = $time;
        }
    }
}
