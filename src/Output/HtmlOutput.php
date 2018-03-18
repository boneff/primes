<?php

namespace Primes\Output;

use Primes\Models\MultiplicationTableModel;
use Primes\Output\OutputInterface;

class HtmlOutput implements OutputInterface
{
    private $output;

    /**
     * HtmlOutput constructor.
     */
    public function __construct()
    {
        $this->output = '';
    }

    public function render(MultiplicationTableModel $table)
    {
        $this->output .= "<table>";

        $this->output .= "<tr>";
        foreach ($table->getHeader() as $header) {
            $this->output .= "<th>" . $header . "</th>";
        }
        $this->output .= "</tr>";


        foreach ($table->getBody() as $row) {
            $this->output .= "<tr>";
            foreach ($row as $data) {
                $this->output .= "<td>" . $data . "</td>";
            }
            $this->output .= "</tr>";
        }

        $this->output .= "</table>";

        echo $this->output;
    }
}
