<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.02 - Classes, propriedades e objetos");

/*
 * [ classe e objeto ] http://php.net/manual/pt_BR/language.oop5.basic.php
 */
fullStackPHPClassSession("classe e objeto", __LINE__);

include __DIR__ . "/classes/User.php";

$user = new User();
var_dump($user);

/*
 * [ propriedades ] http://php.net/manual/pt_BR/language.oop5.properties.php
 */
fullStackPHPClassSession("propriedades", __LINE__);

$user->firstName = "José";
$user->lastName = "Maria";
$user->email = "josemaria@gcloves.com";

var_dump($user);
echo "<p>Eu so {$user->firstName} {$user->lastName}</p>";

echo "<p>Nome: {$user->getFirstName()} {$user->getLastName()} <br> E-mail: {$user->getEmail()}</p>";

/*
 * [ métodos ] São as funções que definem o comportamento e a regra de negócios de uma classe
 */
fullStackPHPClassSession("métodos", __LINE__);

$user->setFirstName("Maria");
$user->setLastName("José");

if (!$user->setEmail("mariajose@cv.com")) {
    echo "<p class='trigger error'>O e-mail {$user->getEmail()} não é válido!</p>";
} else {
    echo "<p class='trigger accept'>O e-mail {$user->getEmail()} é válido! Bem Vindo!!</p>";
}

var_dump($user);