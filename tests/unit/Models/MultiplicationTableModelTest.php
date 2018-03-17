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

    public function testMultiplicationTableProperCalculation()
    {
        $multiplicationTable = new MultiplicationTableModel([2]);
        $multiplicationTableArray = $multiplicationTable->getTableAsArray();

        $this->assertEquals(4, $multiplicationTableArray[1][1]);
    }
}
