<?php

namespace Prime\Test\Controllers;

use PHPUnit\Framework\TestCase;
use Primes\Controllers\PrimeController;
use Primes\Models\MultiplicationTableModel;
use Primes\Validators\PrimeValidator;

class PrimeControllerTest extends TestCase
{
    public function testConstruct()
    {
        $mockValidator = $this->createMock(PrimeValidator::class);
        $mockMultipicationTable = $this->createMock(MultiplicationTableModel::class);

        $primeController = new PrimeController($mockValidator, $mockMultipicationTable);
        $this->assertInstanceOf(PrimeController::class, $primeController);
    }
}
