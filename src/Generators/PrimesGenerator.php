<?php

namespace Primes\Generators;

use Primes\Config\Config;
use Primes\Validators\PrimeValidator;

class PrimesGenerator implements GeneratorInterface
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

    /**
     * PrimesGenerator constructor.
     * @param PrimeValidator $validator
     * @param Config $config
     */
    public function __construct(PrimeValidator $validator, Config $config)
    {
        $this->validator = $validator;
        $this->config = $config;
        $this->primes = [];
    }

    /**
     * Generates prime numbers in a range and returns them as array
     * @return array
     */
    public function generate($limit = 10)
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
