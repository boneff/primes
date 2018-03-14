<?php

namespace Primes\Controllers;

use Primes\Models\MultiplicationTableModel;
use Primes\Validators\PrimeValidator;

class PrimeController extends BaseController
{
    private $validator;

    private $multiplicationTable;

    private $primes;

    public function __construct(PrimeValidator $validator, MultiplicationTableModel $multiplicationTable)
    {
        $this->validator = $validator;
        $this->multiplicationTable = $multiplicationTable;
        $this->primes = [];
    }

    public function generatePrimesAction(int $startNumber, int $numberOfPrimes)
    {
        $currentNumber = $startNumber;

        while (count($this->primes) < $numberOfPrimes) {
            $isPrime = $this->validator->isPrime($currentNumber);

            if ($isPrime === true) {
                array_push($this->primes, $currentNumber);
            }
            $currentNumber++;
        }

        return $this->multiplicationTable->getMultiplicationTable($this->primes);
    }
}
