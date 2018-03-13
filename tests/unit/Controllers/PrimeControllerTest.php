<?php

namespace Prime\Test\Controllers;

use PHPUnit\Framework\TestCase;
use Primes\Controllers\PrimeController;
use Primes\Validators\PrimeValidator;

class PrimeControllerTest extends TestCase
{
    public function testConstruct()
    {
        $mockValidator = $this->createMock(PrimeValidator::class);

        $primeController = new PrimeController($mockValidator);
        $this->assertInstanceOf(PrimeController::class, $primeController);
    }
}
