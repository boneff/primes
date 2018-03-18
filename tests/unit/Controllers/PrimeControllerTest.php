<?php

namespace Prime\Test\Controllers;

use PHPUnit\Framework\TestCase;
use Primes\Controllers\PrimeController;
use Primes\Models\MultiplicationTableModel;
use Primes\Output\ConsoleOutput;
use Primes\Output\HtmlOutput;
use Primes\Output\OutputInterface;

class PrimeControllerTest extends TestCase
{
    public function testConstruct()
    {
        $mockMultipicationTable = $this->createMock(MultiplicationTableModel::class);
        $mockOutputFormatter = $this->createMock(OutputInterface::class);

        $primeController = new PrimeController($mockOutputFormatter, $mockMultipicationTable);
        $this->assertInstanceOf(PrimeController::class, $primeController);
    }

    public function testShowAction()
    {
        $mockMultipicationTable = $this->getMockBuilder(MultiplicationTableModel::class)
            ->setMethods(['calculate'])
            ->getMock();

        $mockMultipicationTable->expects($this->once())
            ->method('calculate')
            ->willReturnSelf();

        $mockOutputFormatter = $this->getMockBuilder(ConsoleOutput::class)
            ->setMethods(['render'])
            ->getMock();

        $mockOutputFormatter->expects($this->once())
            ->method('render')
            ->with($mockMultipicationTable);

        $primeController = new PrimeController($mockOutputFormatter, $mockMultipicationTable);
        $primeController->showAction();
    }
}
