<?php
    require_once  __DIR__ . '/vendor/autoload.php';

// primeGenerator - can receive an algorithm (sieve) of generation as a dependency
// primeOutputter - handles primes output
// primeMultiplicationOutputter - handles creation of multiplication table
// Unit tests !!!
// GrumPHP - php vendor/bin/grumphp run
// https://en.wikipedia.org/wiki/Sieve_of_Eratosthenes
// enumerable class maybe - and probably keep primes as value object
// also could extract primesArray ($this->primes) in a separate class
// maybe create a class MultiplicationTable
// fwrite(STDOUT, $primes);

    $validator = new \Primes\Validators\PrimeValidator();
    $generator = new \Primes\Generators\PrimesGenerator($validator, \Primes\Config\Config::instance());
    $model = new \Primes\Models\MultiplicationTableModel($generator->generatePrimes());
    $controller = new \Primes\Controllers\PrimeController($model);

    $controller->showAction();
