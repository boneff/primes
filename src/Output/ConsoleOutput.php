<?php
/**
 * Created by PhpStorm.
 * User: boneff
 * Date: 15.03.18
 * Time: 09:46
 */

namespace Primes\Output;

use Primes\Output\OutputInterface;

class ConsoleOutput implements OutputInterface
{
    private $output;

    public function __construct()
    {
        $this->output = '';
    }

    public function format($input)
    {
        $numbersCount = count($input) - 1;
        if (count($numbersCount) > 0) {
            $this->output .= $input[0][0] . " ";
            for ($i=0; $i < $numbersCount; $i ++) {
                $this->output .= $input[0][$i + 1] . " ";
            }
            $this->output .= "\n";
            for ($i=0; $i < $numbersCount; $i ++) {
                $this->output .= $input[$i + 1][0] . " ";
                for ($j=0; $j < $numbersCount; $j ++) {
                    $this->output .= $input[$i + 1][$j +1] . " ";
                }
                $this->output .= "\n";
            }
        }
        return $this->output;
    }

    public function getOutput()
    {
        return $this->output;
    }
}
