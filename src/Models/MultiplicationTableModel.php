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

    public function __construct(array $numbers = [])
    {
        $this->numbers = $numbers;
        $this->coordinates = [];
        $this->multiplicationTableOutput = '';
    }

    /**
     * @return array
     */
    private function calculate()
    {
        $numbersCount = count($this->numbers);
        if ($numbersCount > 0) {
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

    /**
     * @return array
     */
    public function getTableAsArray()
    {
        if (count($this->coordinates) == 0) {
            return $this->calculate();
        }

        return $this->coordinates;
    }
}
