<?php

namespace Primes\Output;

interface OutputInterface
{
    /**
     * @param $input
     * @return mixed
     */
    public function render($input);
}
