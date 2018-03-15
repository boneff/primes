<?php

namespace Primes\Generators;

use Primes\Config\Config;
use Primes\Validators\PrimeValidator;

class PrimesGenerator
{
    /**
     * @var PrimeValidator
     */
    private $validator;

    /**
     * @var Config
     */
    private $config;

    /**
     * @var array
     */
    private $primes;

    public function __construct(PrimeValidator $validator, Config $config)
    {
        $this->validator = $validator;
        $this->config = $config;
        $this->primes = [];
    }

    public function generatePrimes()
    {
        $currentNumber = $this->config->getStartNumber();
        $numberOfPrimesToFind = $this->config->getNumberOfPrimesToFind();

        while (count($this->primes) < $numberOfPrimesToFind) {
            $isPrime = $this->validator->isPrime($currentNumber);

            if ($isPrime === true) {
                array_push($this->primes, $currentNumber);
            }
            $currentNumber++;
        }

        return $this->primes;
    }
}
