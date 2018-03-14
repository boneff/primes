<?php

namespace Primes\Models;

use Primes\Models\BaseModel;

class MultiplicationTableModel extends BaseModel
{
    private $multiplicationTableOutput;

    /**
     * @param array $numbers
     * @return string
     */
    public function getMultiplicationTable(array $numbers)
    {
        $numbersCount = count($numbers);
        if (count($numbersCount) > 0) {
            $this->multiplicationTableOutput .= " ";
            for ($i=0; $i < $numbersCount; $i ++) {
                $this->multiplicationTableOutput .= " " . $numbers[$i];
            }
            $this->multiplicationTableOutput .= "\n";
            for ($i=0; $i < $numbersCount; $i ++) {
                $this->multiplicationTableOutput .= $numbers[$i] . " ";
                for ($j=0; $j < $numbersCount; $j ++) {
                    $this->multiplicationTableOutput .= $numbers[$i] * $numbers[$j] . " ";
                }
                $this->multiplicationTableOutput .= "\n";
            }
        }

        return $this->multiplicationTableOutput;
    }
}
