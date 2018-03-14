<?php
    require_once  __DIR__ . '/vendor/autoload.php';

// config - a range of primes
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
    $model = new \Primes\Models\MultiplicationTableModel();
    $controller = new \Primes\Controllers\PrimeController($validator, $model);

    echo $controller->generatePrimesAction(1, 10);
