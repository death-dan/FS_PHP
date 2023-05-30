<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.11 - Trabalhando com funções");

/*
 * [ functions ] https://php.net/manual/pt_BR/language.functions.php
 */
fullStackPHPClassSession("functions", __LINE__);
include __DIR__ . "/functions.php";

var_dump(functionName("Bob Marley", "Pantera", "Slayer"));
var_dump(functionName("Bob", "Thommas", "Homer"));

var_dump(optionArgs("Jose"));
var_dump(optionArgs("Antonio", "Homer"));
var_dump(optionArgs("Silver", "Gold", "Platina"));

/*
 * [ global access ] global $var
 */
fullStackPHPClassSession("global access", __LINE__);

$weight = 80;
$height = 1.70;

echo calcImc();

/*
 * [ static arguments ] static $var
 */
fullStackPHPClassSession("static arguments", __LINE__);

$pay = payTotal(300);
$pay = payTotal(1300);
$pay = payTotal(3000);

echo $pay;

/*
 * [ dinamic arguments ] get_args | num_args
 */
fullStackPHPClassSession("dinamic arguments", __LINE__);

var_dump(myTeam("Jose", "Maria", "Joao", "Oliveira"));