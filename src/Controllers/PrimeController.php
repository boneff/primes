<?php

namespace Primes\Controllers;

use Primes\Models\MultiplicationTableModel;
use Primes\Output\OutputInterface;

class PrimeController
{
    /**
     * @var MultiplicationTableModel
     */
    private $model;

    /**
     * @var OutputInterface
     */
    private $output;

    public function __construct(OutputInterface $output, MultiplicationTableModel $model)
    {
        $this->model = $model;
        $this->output = $output;
    }

    public function showAction()
    {
        $this->output->format($this->model->getMultiplicationTableAsArray());
        fwrite(STDOUT, $this->output->getOutput());
    }
}
