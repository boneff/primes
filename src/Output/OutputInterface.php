<?php

namespace Primes\Output;

use Primes\Models\MultiplicationTableModel;

interface OutputInterface
{
    /**
     * @param $input
     * @return mixed
     */
    public function render(MultiplicationTableModel $input);
}
