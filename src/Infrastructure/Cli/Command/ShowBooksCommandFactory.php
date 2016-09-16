<?php

namespace Infrastructure\Cli\Command {

    use Interop\Container\ContainerInterface;

    final class ShowBooksCommandFactory
    {
        /**
         * @param  ContainerInterface $container
         * @return ShowBooksCommand
         */
        public function __invoke(ContainerInterface $container)
        {
            return new ShowBooksCommand();
        }
    }
}
