<?php
/**
 * Zend Expressive REST API
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
namespace Infrastructure\Api {

    use Zend\Expressive\Application;

    // Delegate static file requests back to the PHP built-in webserver
    if (php_sapi_name() === 'cli-server'
        && is_file(__DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))
    ) {
        return false;
    }

    chdir(dirname(__DIR__));
    require 'vendor/autoload.php';

    /** @var \Interop\Container\ContainerInterface $container */
    $container = require 'config/container.php';

    /** @var \Zend\Expressive\Application $app */
    $app = $container->get(Application::class);
    $app->run();
}