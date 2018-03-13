<?php
    require_once  __DIR__ . '/vendor/autoload.php';

// config - a range of primes
// primeGenerator - can receive an algorithm (sieve) of generation as a dependency
// primeOutputter - handles primes output
// primeMultiplicationOutputter - handles creation of multiplication table
// Unit tests !!!
// GrumPHP - php vendor/bin/grumphp run
// https://en.wikipedia.org/wiki/Sieve_of_Eratosthenes


$validator = new \Primes\Validators\PrimeValidator();
$controller = new \Primes\Controllers\PrimeController($validator);

$primes = $controller->generatePrimes(1, 10);
print_r($primes);
//fwrite(STDOUT, $primes);
