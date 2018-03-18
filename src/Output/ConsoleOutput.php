<?php

namespace Primes\Output;

use Primes\Models\MultiplicationTableModel;
use Primes\Output\OutputInterface;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Output\ConsoleOutput as SymfonyConsoleOutput;

class ConsoleOutput implements OutputInterface
{
    private $output;

    public function __construct()
    {
        $this->output = '';
    }

    public function render(MultiplicationTableModel $table)
    {
        $consoleOutput = new SymfonyConsoleOutput();
        $this->output = new Table($consoleOutput);
        $this->output
            ->setHeaders($table->getHeader())
            ->setRows($table->getBody());

        $this->output->render();
    }
}
