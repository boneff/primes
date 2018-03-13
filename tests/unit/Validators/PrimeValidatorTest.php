<?php

namespace Prime\Test\Validators;

use PHPUnit\Framework\TestCase;
use Primes\Validators\PrimeValidator;

class PrimeValidatorTest extends TestCase
{
    public function testIsPrime()
    {
        $validator = new PrimeValidator();

        $this->assertTrue($validator->isPrime(2));
    }
}
