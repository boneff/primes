<?php

namespace Prime\Test;

use PHPUnit\Framework\TestCase;
use Primes\Models\MultiplicationTableModel;

class MultiplicationTableModelTest extends TestCase
{
    public function testMultiplicationTableReturnsCoordinatesAsArray()
    {
        $multiplicationTable = new MultiplicationTableModel([2, 3, 4]);

        $this->assertInstanceOf(MultiplicationTableModel::class, $multiplicationTable->calculate());
    }

    public function testMultiplicationTableReturnsEmptyArray()
    {
        $multiplicationTable = new MultiplicationTableModel([]);

        $this->assertCount(0, $multiplicationTable->getBody());
    }

    public function testMultiplicationTableWithOneNumber()
    {
        $multiplicationTable = new MultiplicationTableModel([2]);
        $multiplicationTable->calculate();

        $this->assertGreaterThan(0, $multiplicationTable->getBody());
    }

    public function testMultiplicationTableWithSingleMultiplier()
    {
        $multiplicationTable = new MultiplicationTableModel([2]);
        $multiplicationTable->calculate();

        $this->assertEquals(4, $multiplicationTable->getCoordinate(1, 1));
    }

    public function testMultiplicationTableWithMultipleMultipliers()
    {
        $multiplicationTable = new MultiplicationTableModel([2, 3, 5, 7]);
        $multiplicationTable->calculate();

        $this->assertEquals(4, $multiplicationTable->getCoordinate(1, 1));
        $this->assertEquals(9, $multiplicationTable->getCoordinate(2, 2));
        $this->assertEquals(25, $multiplicationTable->getCoordinate(3, 3));
        $this->assertEquals(14, $multiplicationTable->getCoordinate(1, 4));
        $this->assertEquals(21, $multiplicationTable->getCoordinate(2, 4));
    }

    public function testMultiplicationTableHeaderAndBody()
    {
        $multiplicationTable = new MultiplicationTableModel([2, 3, 5, 7]);
        $multiplicationTable->calculate();

        $this->assertInternalType('array', $multiplicationTable->getHeader());
        $this->assertInternalType('array', $multiplicationTable->getBody());
        $this->assertCount(5, $multiplicationTable->getHeader());
        $this->assertCount(4, $multiplicationTable->getBody());
    }

    public function testMultiplicationTableCoordinateGetter()
    {
        $multiplicationTable = new MultiplicationTableModel([2, 3]);
        $multiplicationTable->calculate();

        $this->assertEquals(4, $multiplicationTable->getCoordinate(1, 1));
    }

    public function testMultiplicationTableWithStringInput()
    {
        $this->expectException(\InvalidArgumentException::class);

        $multiplicationTable = new MultiplicationTableModel(['a', 'b', 'c']);
        $multiplicationTable->calculate();
    }
}
