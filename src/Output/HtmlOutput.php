<?php

namespace Primes\Output;

use Primes\Output\OutputInterface;

class HtmlOutput implements OutputInterface
{
    private $output;

    public function __construct()
    {
        $this->output = '';
    }

    public function format($input)
    {
        $this->output = "<table><tr>";
        $numbersCount = count($input) - 1;
        if (count($numbersCount) > 0) {
            $this->output .= "<th>" . $input[0][0] . "</th>";
            for ($i=0; $i < $numbersCount; $i ++) {
                $this->output .= "<th>" . $input[0][$i + 1] . "</th>";
            }
            $this->output .= "</tr>";
            for ($i=0; $i < $numbersCount; $i ++) {
                $this->output .= $input[$i + 1][0] . " ";
                for ($j=0; $j < $numbersCount; $j ++) {
                    $this->output .= $input[$i + 1][$j +1] . " ";
                }
                $this->output .= "\n";
            }
        }
        $this->output = '</table>';
        return $this->output;
    }

    public function getOutput()
    {
        return $this->output;
    }
}
