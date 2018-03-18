<?php

namespace Primes\Models;

class MultiplicationTableModel
{
    private $coordinates;

    private $numbers;

    private $header;

    private $body;

    public function __construct(array $numbers = [])
    {
        $this->numbers = $numbers;
        $this->coordinates = [];
        $this->header = [];
        $this->body = [];
    }

    /**
     * @return array
     */
    private function calculateMultiplication()
    {
        $numbersCount = count($this->numbers);
        if ($numbersCount > 0) {
            $this->coordinates[0][0] = " ";
            $this->addHeader($this->coordinates[0][0]);
            for ($i=0; $i < $numbersCount; $i ++) {
                $this->coordinates[0][$i + 1] = $this->numbers[$i];
                $this->addHeader($this->coordinates[0][$i + 1]);
            }
            for ($i=0; $i < $numbersCount; $i ++) {
                $currentRow = [];
                $this->coordinates[$i + 1][0] = $this->numbers[$i];
                array_push($currentRow, $this->coordinates[$i + 1][0]);
                for ($j=0; $j < $numbersCount; $j ++) {
                    $this->coordinates[$i + 1][$j + 1] = $this->numbers[$i] * $this->numbers[$j];
                    array_push($currentRow, $this->coordinates[$i + 1][$j + 1]);
                }
                $this->addRow($currentRow);
            }
        }

        return $this;
    }

    /**
     * @return array
     */
    public function calculate()
    {
        if (count($this->coordinates) == 0) {
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
     * @return array
     */
    public function getCoordinates()
    {
        return $this->coordinates;
    }

    public function getCoordinate(int $x, int $y)
    {
        return $this->coordinates[$x][$y] ?? '';
    }
}
