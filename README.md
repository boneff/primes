# Primes multiplication table

A simple PHP project which finds the first 10 prime numbers and creates a multiplication table
where the first row and column contain the primes. Each table cell contains the appropriate multiplication result. 

### Prerequisites

To have a running project you should have [PHP7](http://php.net) and Composer as a minimum requirement.
To get started with Composer visit the [downloads page](https://getcomposer.org/download/)

PHP extension required - "ext-mbstring".
Example installation for Ubuntu (make sure you are not using end-of-life version):

```
sudo apt-get update
sudo apt-get install php-mbstring
``` 

### Installing

After you have the prerequisites install the Composer dependencies (go to project root first):

```
composer install
```

### Making sure all works before the first run(unit tests, code style)

One of the Composer dependencies installed is [GrumPHP](https://github.com/phpro/grumphp)
Run the following command to run code style checks, unit tests and etc.

```
php vendor/bin/grumphp run
```

## Running the tests only

PHPUnit tests could be ran separately from the other checks:

```
php vendor/bin/phpunit --testsuite all
```


## Built With

* [PHP](http://php.net) - PHP
* [Composer](https://getcomposer.org) - Dependency Management
