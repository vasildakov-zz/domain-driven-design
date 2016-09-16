<?php

namespace Application\Service {

    final class BookService
    {
        public function __construct() {}

        public function __invoke()
        {
            return [
                [
                    "id"     => 1,
                    "title"  => "The Fellowship of the Ring",
                    "author" => "J. R. R. Tolkien",
                    "isbn"   => "978-0007488315",
                    "price"  => "£8.99"
                ],
                [
                    "id"     => 2,
                    "title"  => "The Two Towers",
                    "author" => "J. R. R. Tolkien",
                    "isbn"   => "978-0007488339",
                    "price"  => "£8.83"
                ],
                [
                    "id"     => 3,
                    "title"  => "The Return of the King",
                    "author" => "J. R. R. Tolkien",
                    "isbn"   => "978-0007488353",
                    "price"  => "£8.67"
                ]
            ];
        }
    }
}