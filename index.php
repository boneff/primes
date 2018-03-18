<?php
    require_once  __DIR__ . '/vendor/autoload.php';

    $validator = new \Primes\Validators\PrimeValidator();
    $generator = new \Primes\Generators\PrimesGenerator($validator, \Primes\Config\Config::instance());
    $primesArray = $generator->generatePrimes();
    $model = new \Primes\Models\MultiplicationTableModel($primesArray);
    $outputFormatter = new Primes\Output\ConsoleOutput();
    $controller = new \Primes\Controllers\PrimeController($outputFormatter, $model);

    $controller->showAction();
