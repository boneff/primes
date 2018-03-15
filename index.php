<?php
    require_once  __DIR__ . '/vendor/autoload.php';

    $validator = new \Primes\Validators\PrimeValidator();
    $generator = new \Primes\Generators\PrimesGenerator($validator, \Primes\Config\Config::instance());
    $model = new \Primes\Models\MultiplicationTableModel($generator->generatePrimes());
    $outputFormatter = new Primes\Output\ConsoleOutput();
    $controller = new \Primes\Controllers\PrimeController($outputFormatter, $model);

    $controller->showAction();
