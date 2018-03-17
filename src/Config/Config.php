<?php

namespace Primes\Config;

class Config
{
    private static $instance = null;

    private $numberOfPrimesToFind  = 10;
    private $startNumber = 1;

    /**
     *
     * @return self
     */
    public static function instance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * @return int
     */
    public function getNumberOfPrimesToFind()
    {
        return $this->numberOfPrimesToFind;
    }

    /**
     * @return int
     */
    public function getStartNumber()
    {
        return $this->startNumber;
    }
}
