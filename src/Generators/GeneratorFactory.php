<?php

namespace Primes\Generators;

class GeneratorFactory
{
    /**
     * @param string $type
     * @return GeneratorInterface
     */
    public static function make($type = 'primes') : GeneratorInterface
    {
        if ($type == 'fibonacci') {
            $generator = new \Primes\Generators\FibonacciSequenceGenerator();
        } else {
            $validator = new \Primes\Validators\PrimeValidator();
            $generator = new \Primes\Generators\PrimesGenerator($validator, \Primes\Config\Config::instance());
        }

        return $generator;
    }
}
