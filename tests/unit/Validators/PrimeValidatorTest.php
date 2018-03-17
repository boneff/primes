<?php

namespace Prime\Test\Validators;

use PHPUnit\Framework\TestCase;
use Primes\Validators\PrimeValidator;

class PrimeValidatorTest extends TestCase
{
    private $primes = [2, 3, 5, 7, 11, 13, 17, 19];

    private $notPrimes = [1, 6, 9, 25, 200, 1000, 12000];

    public function testIsPrimeTrue()
    {
        $validator = new PrimeValidator();

        foreach ($this->primes as $prime) {
            $this->assertTrue(
                $validator->isPrime($prime),
                'Failed asserting ' . $prime . ' is a prime number!'
            );
        }
    }

    public function testIsNotPrime()
    {
        $validator = new PrimeValidator();

        foreach ($this->notPrimes as $notPrime) {
            $this->assertFalse(
                $validator->isPrime($notPrime),
                'Failed asserting ' . $notPrime . ' is NOT a prime number!'
            );
        }
    }
}
