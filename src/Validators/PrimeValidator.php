<?php

namespace Primes\Validators;

class PrimeValidator
{
    public function isPrime(int $number)
    {
        $decimals = range(2, 9);

        if ($number == 2) {
            return true;
        }

        if ($number % 2 == 0 || $number == 1) {
            return false;
        }

        foreach ($decimals as $divisor) {
            if ($number % $divisor == 0 && $number !== $divisor) {
                return false;
            }
        }

        return true;
    }
}
