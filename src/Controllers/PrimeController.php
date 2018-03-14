<?php

namespace Primes\Controllers;

use Primes\Validators\PrimeValidator;

class PrimeController
{
    private $validator;

    private $primes;

    public function __construct(PrimeValidator $validator)
    {
        $this->setValidator($validator);
        $this->primes = [];
    }

    /**
     * @param PrimeValidator $validator
     */
    public function setValidator($validator)
    {
        $this->validator = $validator;
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

        return $this->primes;
    }

    public function displayPrimesMultiplicationTable()
    {
        // enumerable class maybe - and probably keep primes as value object
        // also could extract primesArray ($this->primes) in a separate class
        // maybe create a class MultiplicationTable
        $primesCount = count($this->primes);
        if (count($primesCount) > 0) {
            echo " ";
            for ($i=0; $i < $primesCount; $i ++) {
                echo " " . $this->primes[$i];
            }
            echo "\n";
            for ($i=0; $i < $primesCount; $i ++) {
                echo $this->primes[$i] . " ";
                for ($j=0; $j < $primesCount; $j ++) {
                    echo $this->primes[$i] * $this->primes[$j] . " ";
                }
                echo "\n";
            }
        }
    }
}
