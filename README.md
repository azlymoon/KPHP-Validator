# KPHP VALIDATOR

KPHP Validator

## Implemented functions

You can use following constraints for validate data if you want compile your project with KPHP:

```php
Length($min ::: int = -1, $max ::: int = -1, $exact ::: int = -1);
Type($type ::: string);
NotBlank();
Email();
```

## Installation

To install this library, follow these steps:

1. [Download KPHP source code](https://github.com/VKCOM/kphp)

```
git clone https://github.com/VKCOM/kphp
```

2. [Download KPHP Validator library](https://git.miem.hse.ru/1367/kphp_validator)

```
git clone https://git.miem.hse.ru/1367/kphp_validator
```

3. [Compile KPHP from source files](https://vkcom.github.io/kphp/kphp-internals/developing-and-extending-kphp/compiling-kphp-from-sources.html)

## Quick start

1. Create **vendor/autoload.php** with composer

2. Create **index.php** and write here:

```php
<?php
namespace Validation;
require_once __DIR__ . '/vendor/autoload.php';

// Create a list with constraints
$ConstraintListFactory = new ConstraintListFactory();

// Create a validator
$validatorFactory = new ValidatorFactory();

// Example of create a constarints
$constraintList->addConstraint("name", new Type("string"));
$constraintList->addConstraint("email", new Email());

// Validation
$validator->validate($form, $constraintList);
```





