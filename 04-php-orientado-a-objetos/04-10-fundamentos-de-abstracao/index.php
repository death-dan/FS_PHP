<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.10 - Fundamentos da abstração");

require __DIR__ . "/source/autoload.php";

/*
 * [ superclass ] É uma classe criada como modelo e regra para ser herdada por outras classes,
 * mas nunca para ser instanciada por um objeto.
 */
fullStackPHPClassSession("superclass", __LINE__);

$client = new \Source\App\User("Jose", "Maria");
// $account = new \Source\Bank\Account(
//     "1600",
//     "200200",
//     $client,
//     "1000"
// );


var_dump(
    // $account,
    $client
);

/*
 * [ especialização ] É uma classe filha que implementa a superclasse e se especializa
 * com suas prórpias rotinas
 */
fullStackPHPClassSession("especialização.a", __LINE__);

$saving = new \Source\Bank\AccountSaving(
    "1234",
    "200200",
    $client,
    "0"
);

var_dump($saving);

$saving->deposit(1000);
$saving->deposit(200);
$saving->withdrawal(300);
$saving->deposit(1000);

$saving->extract();

/*
 * [ especialização ] É uma classe filha que implementa a superclass e se especializa
 * com suas prórpias rotinas
 */
fullStackPHPClassSession("especialização.b", __LINE__);

$current = new \Source\Bank\AccountCurrent(
    "1234",
    "200200",
    $client,
    "1000",
    "1000"
);

$current->deposit("1000");
$current->withdrawal("2000");
$current->withdrawal("1000");
$current->deposit("2000");

$current->extract();

var_dump($current);