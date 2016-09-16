<?php

namespace Infrastructure\Cli\Command {

    use Symfony\Component\Console\Command\Command;
    use Symfony\Component\Console\Input\InputInterface;
    use Symfony\Component\Console\Output\OutputInterface;
    use Application\Service\BookService;

    class ShowBooksCommand extends Command
    {
        /**
         * Constructor
         */
        public function __construct(BookService $service)
        {
            $this->service = $service;
            parent::__construct();
        }

        protected function configure()
        {
            $this
                ->setName('app:show:books')
                ->setDescription('Show books.')
                ->setHelp("This command allows you see the books...")
            ;
        }

        /**
         * @param  InputInterface  $input
         * @param  OutputInterface $output
         */
        protected function execute(InputInterface $input, OutputInterface $output)
        {
            $books = ($this->service)();
            foreach ($books as $book) {
                extract($book);
                $output->writeln("<info>$title, $author, $isbn, $price</info>");
            }
        }
    }
}

