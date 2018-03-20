<?php

namespace Prime\Test\Generators;

use PHPUnit\Framework\TestCase;
use Primes\Generators\FibonacciSequenceGenerator;

class FibonacciSequenceGeneratorTest extends TestCase
{
    private $fibonacciNumbers = [1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89];
    private $notFibonacciNumbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

    public function testFibonacciSequenceGenerated()
    {
        $generator = new FibonacciSequenceGenerator();

        $this->assertEquals($this->fibonacciNumbers, $generator->generate(10));
    }
}
