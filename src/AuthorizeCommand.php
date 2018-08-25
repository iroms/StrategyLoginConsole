<?php

    namespace Iroms;

    use Symfony\Component\Console\Command\Command;
    use Symfony\Component\Console\Input\InputInterface;
    use Symfony\Component\Console\Input\InputArgument;
    use Symfony\Component\Console\Output\OutputInterface;
    use Iroms\Slogin\Authorization;

    class AuthorizeCommand extends Command
    {
        public function configure()
        {
            $this->setName("authorize")
                 ->setDescription("There are User Authorize")
                 ->addArgument('login',    InputArgument::REQUIRED, 'login')
                 ->addArgument('password', InputArgument::REQUIRED, 'password')
                 ->addArgument('type',     InputArgument::REQUIRED, 'type');
        }

        protected function execute (InputInterface $input, OutputInterface $output)
        {
            $login    = $input->getArgument('login');
            $password = $input->getArgument('password');
            $type     = $input->getArgument('type');

            $proc = new Authorization($type);

            $res = $proc->authorizeUser($login, $password);

            $output->writeln($res);
        }

    }