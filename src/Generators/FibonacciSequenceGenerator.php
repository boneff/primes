<?php

namespace Primes\Generators;

class FibonacciSequenceGenerator implements GeneratorInterface
{
    /**
     * @param $limit
     * @return array
     */
    public function generate($limit)
    {
        $fibonacci = [1];
        $x = 0;
        $y = 1;
        for ($i =0; $i < $limit; $i ++) {
            $z = $x + $y;
            array_push($fibonacci, $z);
            $x = $y;
            $y = $z;
        }

        return $fibonacci;
    }
}
