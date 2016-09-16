<?php

namespace Domain\ValueObject\DateTime {

    class Date {


        protected $year;

        protected $month;

        protected $day;

        /**
         * Create a new Date
         *
         * @param  Year                 $year
         * @param  Month                $month
         * @param  MonthDay             $day
         * @throws InvalidDateException
         */
        public function __construct(Year $year, Month $month, Day $day)
        {
            $this->year  = $year;
            $this->month = $month;
            $this->day   = $day;
        }
    }
}