<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.12 - Comportamentos com traits");

require __DIR__ . "/source/autoload.php";

/*
 * [ trait ] São traços de código que podem ser reutilizados por mais de uma classe. Um trait é como um compoetamento
 * do objeto (BEHAVES LIKE). http://php.net/manual/pt_BR/language.oop5.traits.php
 */
fullStackPHPClassSession("trait", __LINE__);

$user = new \Source\Traits\User("Jose", "Maria", "blabla@bla.co");
$address = new \Source\Traits\Address("Rua Bras de Cubas", "234", "Rio a Cima");

$register = new \Source\Traits\Register(
    $user,
    $address
);

var_dump(
    // $user,
    // $address,
    $register,
    $register->getUser(),
    $register->getAddress(),
    $register->getUser()->getFirstName(),
    $register->getAddress()->getStreet()
);

$cart = new \Source\TraitS\Cart();
$cart->add(1, "Novo Item", 1, 2000);
$cart->add(2, "Outro Item", 3, 1500);
$cart->remove(2, 2);

$cart->checkout($user, $address);

var_dump($cart);