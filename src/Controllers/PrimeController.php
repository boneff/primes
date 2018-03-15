<?php

namespace Primes\Controllers;

use Primes\Models\MultiplicationTableModel;

class PrimeController
{
    private $model;

    public function __construct(MultiplicationTableModel $model)
    {
        $this->model = $model;
    }

    public function showAction()
    {
        fwrite(STDOUT, $this->model->display());
    }
}
