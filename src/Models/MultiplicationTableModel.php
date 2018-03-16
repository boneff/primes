<?php

namespace Primes\Models;

class MultiplicationTableModel
{
    /**
     * @var string
     */
    private $multiplicationTableOutput;

    private $coordinates;

    private $numbers;

    public function __construct(array $numbers)
    {
        $this->numbers = $numbers;
        $this->coordinates = [];
        $this->multiplicationTableOutput = '';
    }

    /**
     * @return mixed
     */
    public function getMultiplicationTableAsArray()
    {
        $numbersCount = count($this->numbers);
        if (count($numbersCount) > 0) {
            $this->coordinates[0][0] = " ";
            for ($i=0; $i < $numbersCount; $i ++) {
                $this->coordinates[0][$i + 1] = $this->numbers[$i];
            }
            for ($i=0; $i < $numbersCount; $i ++) {
                $this->coordinates[$i + 1][0] = $this->numbers[$i];
                for ($j=0; $j < $numbersCount; $j ++) {
                    $this->coordinates[$i + 1][$j + 1] = $this->numbers[$i] * $this->numbers[$j];
                }
            }
        }

        return $this->coordinates;
    }
}
