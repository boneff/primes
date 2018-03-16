<?php

namespace Primes\Validators;

class PrimeValidator
{
    public function isPrime(int $number)
    {
        $highestIntegralSquareRoot = floor(sqrt($number));

        if ($number == 2) {
            return true;
        }

        if ($number % 2 == 0 || $number == 1) {
            return false;
        }

        for ($divider = 3; $divider <= $highestIntegralSquareRoot; $divider++) {
            if ($number % $divider == 0) {
                return false;
            }
        }

        return true;
    }
}
