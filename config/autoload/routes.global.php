<?php

use Infrastructure\Api\Middleware;
use Application\Service;

return [
    'dependencies' => [
        'invokables' => [
            Zend\Expressive\Router\RouterInterface::class => Zend\Expressive\Router\ZendRouter::class,
            Middleware\PingAction::class => Middleware\PingAction::class,
            Service\BookService::class => Service\BookService::class
        ],
        'factories' => [
            Middleware\HomePageAction::class => Middleware\HomePageFactory::class,
            Middleware\BooksAction::class => Middleware\BooksActionFactory::class,
        ],
    ],

    'routes' => [
        [
            'name' => 'home',
            'path' => '/',
            'middleware' => App\Action\HomePageAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'api.ping',
            'path' => '/api/ping',
            'middleware' => Middleware\PingAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'api.books',
            'path' => '/api/books',
            'middleware' => Middleware\BooksAction::class,
            'allowed_methods' => ['GET'],
        ],
    ],
];
