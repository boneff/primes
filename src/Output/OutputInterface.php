<?php

namespace Primes\Output;

interface OutputInterface
{
    public function format($input);
    public function getOutput();
}
