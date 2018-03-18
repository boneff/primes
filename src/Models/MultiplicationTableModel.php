<?php

namespace Primes\Models;

class MultiplicationTableModel
{
    /**
     * @var array
     */
    private $numbers;

    /**
     * @var array
     */
    private $header;

    /**
     * Array of arrays with multiplication results
     *
     * @var array
     */
    private $body;

    /**
     * MultiplicationTableModel constructor - accept an array of numbers to build a multiplication table.
     * @param array $numbers
     */
    public function __construct(array $numbers = [])
    {
        $this->numbers = $numbers;
        $this->header = [];
        $this->body = [];
    }

    /**
     * Calculates multiplication table
     * @return $this
     */
    private function calculateMultiplication()
    {
        $numbersCount = count($this->numbers);
        if ($numbersCount > 0) {
            $this->addHeader('');
            for ($i=0; $i < $numbersCount; $i ++) {
                $this->addHeader($this->numbers[$i]);
            }
            for ($i=0; $i < $numbersCount; $i ++) {
                if (!is_int($this->numbers[$i])) {
                    throw new \InvalidArgumentException('Pass only integers to multiplication table calculator');
                }
                $currentRow = [];
                array_push($currentRow, $this->numbers[$i]);
                for ($j=0; $j < $numbersCount; $j ++) {
                    $multiplication = $this->numbers[$i] * $this->numbers[$j];
                    array_push($currentRow, $multiplication);
                }
                $this->addRow($currentRow);
            }
        }

        return $this;
    }

    /**
     * Returns multiplication table
     * @return $this|MultiplicationTableModel
     */
    public function calculate()
    {
        if (count($this->getBody()) == 0) {
            return $this->calculateMultiplication();
        }

        return $this;
    }

    private function addHeader($data)
    {
        array_push($this->header, $data);
    }

    private function addRow($data)
    {
        array_push($this->body, $data);
    }

    /**
     * @return array
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * @return array
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param int $x
     * @param int $y
     * @return int
     */
    public function getBodyValue(int $x, int $y)
    {
        return $this->body[$x][$y] ?? 0;
    }
}
