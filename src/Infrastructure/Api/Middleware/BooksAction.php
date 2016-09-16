<?php

namespace Infrastructure\Api\Middleware {

    use Zend\Stratigility\MiddlewareInterface;
    use Zend\Diactoros\Response\JsonResponse;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Psr\Http\Message\ResponseInterface as Response;
    use Application\Service;

    final class BooksAction implements MiddlewareInterface
    {
        /**
         * @param Service\BookService $service
         */
        public function __construct(Service\BookService $service)
        {
            $this->service = $service;
        }

        /**
         * @param  ServerRequestInterface $request
         * @param  ResponseInterface      $response
         * @param  callable|null          $next
         * @return JsonResponse
         */
        public function __invoke(Request $request, Response $response, callable $next = null)
        {
            $books = ($this->service)();
            return new JsonResponse(['books' => $books]);
        }
    }
}
