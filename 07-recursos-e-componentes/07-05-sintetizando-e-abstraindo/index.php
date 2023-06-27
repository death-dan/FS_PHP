<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.05 - Sintetizando e abstraindo");

require __DIR__ . "/../vendor/autoload.php";

/*
 * [ synthesize ]
 */
fullStackPHPClassSession("synthesize", __LINE__);

$email = (new \Source\Core\Email())->bootstrap(
    "Ola Mundo, esse é meu e-mail",
    "<h1>Ola Mundo!</h1><p>Essa é uma mensagem via rotina da aplicação</p>",
    "f_fernandes_r@hotmail.com",
    "Fernando"
);

$email->attach(__DIR__ . "/../img/mapaLol.png", "MapaLol");
$email->attach(__DIR__ . "/../img/mapaLol1.png", "MapaLol1");

if ($email->send()) {
    echo message()->success("E-mail enviado com sucesso!");
} else {
    echo $email->message();
}