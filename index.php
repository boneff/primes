<?php
/**
 * Created by PhpStorm.
 * User: boneff
 * Date: 13.03.18
 * Time: 11:28
 */

// config - a range of primes
// primeGenerator - can receive an algorithm (sieve) of generation as a dependency
// primeOutputter - handles primes output
// primeMultiplicationOutputter - handles creation of multiplication table
// Unit tests !!!
// GrumPHP - php vendor/bin/grumphp run


// https://en.wikipedia.org/wiki/Sieve_of_Eratosthenes
function generateCheckArray(int $from, int $to)
{
    $checkArray = range($from, $to);
    unset($checkArray[0]);
    return $checkArray;
}

function generatePrimesErathosthenes(int $from, int $to)
{
    // initialD - anyone ? :)
    $initialPrime = 2;
    $checkArray = generateCheckArray($from, $to);
    // TODO implement
}


function isPrimeSimple(int $number)
{
    $decimals = range(2, 9);

    if ($number == 2) {
        return true;
    }

    if ($number % 2 == 0 || $number == 1) {
        return false;
    }

    foreach ($decimals as $divisor) {
        if ($number % $divisor == 0 && $number !== $divisor) {
            return false;
        }
    }

    return true;
}

function isPrimeSimpleSqrt(int $number)
{
    if ($number == 1) {
        return false;
    }

    $divider = 2;
    $maxDivider = (int) sqrt($number);
    $isPrime = true;

    while ($isPrime && ($divider <= $maxDivider)) {
        if ($number % $divider == 0) {
            $isPrime = false;
        }
        $divider++;
    }

    return $isPrime;
}

function generatePrimes(int $from, int $to, $checkFunctionName)
{
    $primes = [];

    if ($to < 2 || $from > $to) {
        throw new Exception('Range is not correct');
    }

    for ($currentNumber = $from; $currentNumber <= $to; $currentNumber ++) {
        $isPrime = $checkFunctionName($currentNumber);

        if ($isPrime === true) {
            array_push($primes, $currentNumber);
        }
    }

    return $primes;
}

$primes = generatePrimes(1, 50, 'isPrimeSimple');
print_r($primes);
//fwrite(STDOUT, $primes);
