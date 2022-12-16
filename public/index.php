<?php
namespace Validation;
require_once "../vendor/autoload.php";

/*$form = [
    'name' => (string)$_GET["name"]
];*/
$form = [
    'name' => 5642,
    'email' => 'IvanFoo@mail.ru'
];

$ConstraintListFactory = new ConstraintListFactory();
$validatorFactory = new ValidatorFactory();

$constraintList = $ConstraintListFactory->ConstraintListFactory();
$validator = $validatorFactory->ValidatorFactory();

$constraintList->addConstraint("name", new Length(3, 10));
$constraintList->addConstraint("name", new NotBlank());
$constraintList->addConstraint("name", new Type("string"));
$constraintList->addConstraint("email", new Email());

$validator->validate($form, $constraintList);

foreach ($validator->errors as $key => $errors) {
    foreach ($errors as $error)
        if ($error)
            print($key . ":  " . $error . "\n");
}