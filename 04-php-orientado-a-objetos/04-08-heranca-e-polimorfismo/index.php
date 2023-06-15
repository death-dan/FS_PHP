<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.08 - Herança e polimorfismo");

require __DIR__ . "/source/autoload.php";

/*
 * [ classe pai ] Uma classe que define o modelo base da estrutura da herança
 * http://php.net/manual/pt_BR/language.oop5.inheritance.php
 */
fullStackPHPClassSession("classe pai", __LINE__);

$event =  new \Source\Inheritance\Event\Event(
    "WorkFlow",
    new DateTime("2023-09-20 16:00"),
    200,
    "4"
);

var_dump($event);

$event->register("Jose", "blabla@bla.com");
$event->register("Jose", "blabla@bla.com");
$event->register("Jose", "blabla@bla.com");
$event->register("Jose", "blabla@bla.com");
$event->register("Jose", "blabla@bla.com");

/*
 * [ classe filha ] Uma classe que herda a classe pai e especializa seuas rotinas
 */
fullStackPHPClassSession("classe filha", __LINE__);

$address = new \Source\Inheritance\Address("Rua do Brás", "666");
$event =  new \Source\Inheritance\Event\EventLive(
    "WorkFlow",
    new DateTime("2023-09-20 16:00"),
    200,
    "4",
    $address
);

var_dump($event);

$event->register("Jose", "blabla@bla.com");
$event->register("Jose", "blabla@bla.com");
$event->register("Jose", "blabla@bla.com");
$event->register("Jose", "blabla@bla.com");
$event->register("Jose", "blabla@bla.com");

/*
 * [ polimorfismo ] Uma classe filha que tem métodos iguais (mesmo nome e argumentos) a class
 * pai, mas altera o comportamento desses métodos para se especializar
 */
fullStackPHPClassSession("polimorfismo", __LINE__);

$event =  new \Source\Inheritance\Event\EventOnline(
    "WorkFlow",
    new DateTime("2023-09-20 16:00"),
    200,
    "https://localhost"
);

var_dump($event);

$event->register("Jose", "blabla@bla.com");
$event->register("Jose", "blabla@bla.com");
$event->register("Jose", "blabla@bla.com");
$event->register("Jose", "blabla@bla.com");
$event->register("Jose", "blabla@bla.com");