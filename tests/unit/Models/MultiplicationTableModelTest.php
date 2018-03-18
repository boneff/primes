<?php

namespace Prime\Test;

use PHPUnit\Framework\TestCase;
use Primes\Models\MultiplicationTableModel;

class MultiplicationTableModelTest extends TestCase
{
    public function testMultiplicationTableReturnsCoordinatesAsArray()
    {
        $multiplicationTable = new MultiplicationTableModel([2, 3, 4]);

        $this->assertInternalType('array', $multiplicationTable->getTableAsArray());
    }

    public function testMultiplicationTableReturnsEmptyArray()
    {
        $multiplicationTable = new MultiplicationTableModel([]);

        $this->assertCount(0, $multiplicationTable->getTableAsArray());
    }

    public function testMultiplicationTableWithOneNumber()
    {
        $multiplicationTable = new MultiplicationTableModel([2]);

        $this->assertGreaterThan(0, $multiplicationTable->getTableAsArray());
    }

    public function testMultiplicationTableWithSingleMultiplier()
    {
        $multiplicationTable = new MultiplicationTableModel([2]);
        $multiplicationTableArray = $multiplicationTable->getTableAsArray();

        $this->assertEquals(4, $multiplicationTableArray[1][1]);
    }

    public function testMultiplicationTableWithMultipleMultipliers()
    {
        $multiplicationTable = new MultiplicationTableModel([2, 3, 5, 7]);
        $multiplicationTableArray = $multiplicationTable->getTableAsArray();

        $this->assertEquals(4, $multiplicationTableArray[1][1]);
        $this->assertEquals(9, $multiplicationTableArray[2][2]);
        $this->assertEquals(25, $multiplicationTableArray[3][3]);
        $this->assertEquals(49, $multiplicationTableArray[4][4]);
        $this->assertEquals(14, $multiplicationTableArray[1][4]);
        $this->assertEquals(21, $multiplicationTableArray[2][4]);
    }
}
