<?php

namespace Primes\Output;

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

    public function render($input)
    {
        $tableData = $this->prepareOutputForTable($input);

        $consoleOutput = new SymfonyConsoleOutput();
        $this->output = new Table($consoleOutput);
        $this->output
            ->setHeaders($tableData['headers'])
            ->setRows($tableData['rows']);

        $this->output->render();
    }

    /**
     * @param array $input
     * @return array
     */
    private function prepareOutputForTable(array $input)
    {
        $headers = [];
        $rows = [];

        $numbersCount = count($input) - 1;
        if (count($numbersCount) > 0) {
            array_push($headers, $input[0][0]);
            for ($i=0; $i < $numbersCount; $i ++) {
                array_push($headers, $input[0][$i + 1]);
            }
            for ($i=0; $i < $numbersCount; $i ++) {
                $currentRow = [];
                array_push($currentRow, $input[$i + 1][0]);
                for ($j=0; $j < $numbersCount; $j ++) {
                    array_push($currentRow, $input[$i + 1][$j +1]);
                }
                array_push($rows, $currentRow);
            }
        }

        return [
            'headers' => $headers,
            'rows' => $rows
        ];
    }
}
