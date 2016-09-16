<?php

namespace Infrastructure\Api\Middleware {

    use Interop\Container\ContainerInterface;
    use Zend\Expressive\Router\RouterInterface;
    use Zend\Expressive\Template\TemplateRendererInterface;
    use Application\Service;

    final class BooksActionFactory
    {
        public function __invoke(ContainerInterface $container)
        {
            $service = $container->get(Service\BookService::class);

            return new BooksAction($service);
        }
    }
}