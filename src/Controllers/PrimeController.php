<?php

namespace Primes\Controllers;

use Primes\Validators\PrimeValidator;

class PrimeController
{
    private $validator;

    public function __construct(PrimeValidator $validator)
    {
        $this->validator = $this->setValidator($validator);
    }

    /**
     * @param PrimeValidator $validator
     */
    public function setValidator($validator)
    {
        $this->validator = $validator;
    }

    public function generatePrimes(int $startNumber, int $numberOfPrimes)
    {
        $primes = [];
        $currentNumber = $startNumber;

        while (count($primes) < $numberOfPrimes) {
            $isPrime = $this->validator->isPrime($currentNumber);

            if ($isPrime === true) {
                array_push($primes, $currentNumber);
            }
            $currentNumber++;
        }

        return $primes;
    }
}
