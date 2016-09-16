<?php
/**
 * Silex Web Application
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
namespace Infrastructure\Ui {

    use Silex\Application;
    use Silex\Provider\TwigServiceProvider;

    require_once __DIR__.'/../vendor/autoload.php';

    $app = new Application();

    $app->register(new TwigServiceProvider(), [
        'twig.path' => __DIR__.'/../src/Infrastructure/Ui/Views/',
    ]);

    $app->get('/ui', function() use($app) {
        return $app['twig']->render('index.html', [
            'message' => 'Silex Smart Domain UI',
        ]);
    });

    $app->run();
}
