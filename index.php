<?php
    require_once  __DIR__ . '/vendor/autoload.php';

    $generatorType = (isset($argv[1])) ? $argv[1] : 'primes';

    $generator = \Primes\Generators\GeneratorFactory::make($generatorType);
    $numbersArray = $generator->generate(10);
    $model = new \Primes\Models\MultiplicationTableModel($numbersArray);
    $outputFormatter = new Primes\Output\ConsoleOutput();
    $controller = new \Primes\Controllers\PrimeController($outputFormatter, $model);

    $controller->showAction();
