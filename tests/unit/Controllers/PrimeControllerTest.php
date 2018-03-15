<?php

namespace Prime\Test\Controllers;

use PHPUnit\Framework\TestCase;
use Primes\Controllers\PrimeController;
use Primes\Models\MultiplicationTableModel;
use Primes\Output\ConsoleOutput;

class PrimeControllerTest extends TestCase
{
    public function testConstruct()
    {
        $mockMultipicationTable = $this->createMock(MultiplicationTableModel::class);
        $mockOutputFormatter = $this->createMock(ConsoleOutput::class);

        $primeController = new PrimeController($mockOutputFormatter, $mockMultipicationTable);
        $this->assertInstanceOf(PrimeController::class, $primeController);
    }
}
