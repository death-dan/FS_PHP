<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.08 - Camada de manipulação pt3");

require __DIR__ . "/../source/autoload.php";

/*
 * [ validate helpers ] Funções para sintetizar rotinas de validação
 */
fullStackPHPClassSession("validate", __LINE__);
$menssage = new \Source\Core\Message();

$email = "blabal@com.com";
if (!is_email($email)) {
    echo $menssage->error("Email inválido");
} else {
    echo $menssage->success("Email válido");
}

$passwd = "123456789";
if (!is_passwd($passwd)) {
    echo $menssage->error("Senha inválida");
} else {
    echo $menssage->success("Senha válida");
}

/*
 * [ navigation helpers ] Funções para sintetizar rotinas de navegação
 */
fullStackPHPClassSession("navigation", __LINE__);

var_dump([
    url("/blog/nome-artigo"),
    url("blog/nome-artigo")
]);

if (empty($_GET)) {
    redirect("?f=true");
}

/*
 * [ class triggers ] São gatilhos globais para criação de objetos
 */
fullStackPHPClassSession("triggers", __LINE__);

var_dump(user()->load(1));

echo message()->error("Error de Mensagem");
echo message()->warning("Aviso de Mensagem");

session()->set("user", user()->load(5));
var_dump(session()->all());

