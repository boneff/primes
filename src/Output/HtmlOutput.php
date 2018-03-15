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

    public function render($input)
    {
        $this->output .= "<table><tr>";
        $numbersCount = count($input) - 1;
        if (count($numbersCount) > 0) {
            $this->output .= "<th>" . $input[0][0] . "</th>";
            for ($i=0; $i < $numbersCount; $i ++) {
                $this->output .= "<th>" . $input[0][$i + 1] . "</th>";
            }
            $this->output .= "</tr><tr>";
            for ($i=0; $i < $numbersCount; $i ++) {
                $this->output .= "<th>" . $input[$i + 1][0] . "</th>";
                for ($j=0; $j < $numbersCount; $j ++) {
                    $this->output .= "<td>" . $input[$i + 1][$j +1] . "</td>";
                }
                $this->output .= "</tr>";
            }
        }
        $this->output .= '</table>';
        echo $this->output;
    }
}
