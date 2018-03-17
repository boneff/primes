<?php

namespace Prime\Test\Generators;

use PHPUnit\Framework\TestCase;
use Primes\Config\Config;
use Primes\Generators\PrimesGenerator;
use Primes\Validators\PrimeValidator;

class PrimesGeneratorTest extends TestCase
{
    public function testGeneratorWithNegativeStartNumber()
    {
        $configMock = $this->getMockBuilder(Config::class)
            ->setMethods(['getStartNumber', 'getNumberOfPrimesToFind'])
            ->getMock();

        $configMock->expects($this->once())
            ->method('getStartNumber')
            ->willReturn(-10);

        $configMock->expects($this->once())
            ->method('getNumberOfPrimesToFind')
            ->willReturn(10);

        $validator = new PrimeValidator();
        $generator = new PrimesGenerator($validator, $configMock);

        $this->assertCount(10, $generator->generatePrimes());
    }

    public function testGeneratorWithStartNumberZero()
    {
        $configMock = $this->getMockBuilder(Config::class)
            ->setMethods(['getStartNumber', 'getNumberOfPrimesToFind'])
            ->getMock();

        $configMock->expects($this->once())
            ->method('getStartNumber')
            ->willReturn(0);

        $configMock->expects($this->once())
            ->method('getNumberOfPrimesToFind')
            ->willReturn(10);

        $validator = new PrimeValidator();
        $generator = new PrimesGenerator($validator, $configMock);

        $this->assertCount(10, $generator->generatePrimes());
    }

    public function testGeneratorWithNegativePrimesLimit()
    {
        $configMock = $this->getMockBuilder(Config::class)
            ->setMethods(['getStartNumber', 'getNumberOfPrimesToFind'])
            ->getMock();

        $configMock->expects($this->once())
            ->method('getStartNumber')
            ->willReturn(0);

        // set number of primes to find a negative number
        $configMock->expects($this->once())
            ->method('getNumberOfPrimesToFind')
            ->willReturn(-20);

        $validator = new PrimeValidator();
        $generator = new PrimesGenerator($validator, $configMock);

        $this->assertCount(0, $generator->generatePrimes());
    }

    public function testGeneratorWithLargerNumberToFind()
    {
        $configMock = $this->getMockBuilder(Config::class)
            ->setMethods(['getStartNumber', 'getNumberOfPrimesToFind'])
            ->getMock();

        $configMock->expects($this->once())
            ->method('getStartNumber')
            ->willReturn(1);

        $configMock->expects($this->once())
            ->method('getNumberOfPrimesToFind')
            ->willReturn(10000);

        $validator = new PrimeValidator();
        $generator = new PrimesGenerator($validator, $configMock);

        $this->assertCount(10000, $generator->generatePrimes());
    }
}
