<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.06 - Uma camada de visualização");

require __DIR__ . "/../vendor/autoload.php";
session_start();
/*
 * [ plates ] https://packagist.org/packages/league/plates
 */
fullStackPHPClassSession("plates", __LINE__);

$plates = new League\Plates\Engine(__DIR__ . "/assets/views", "php");
var_dump(get_class_methods($plates));

// $plates->addFolder("test", __DIR__ . "/assets/views/test");

// if (empty($_GET['id'])) {
//     echo $plates->render("test::list", [
//         "title" => "Usuários do Sitema",
//         "list" => (new \Source\Models\User())->all(3)
//     ]);
// } else {
//     echo $plates->render("test::user", [
//         "title" => "Editar Usuário",
//         "user" => (new \Source\Models\User())->findById($_GET['id'])
//     ]);
// }

/*
 * [ synthesize ] Sintetizando rotina e abstraíndo o recurso (componente)
 */
fullStackPHPClassSession("synthesize", __LINE__);

$view = new \Source\Core\View(__DIR__ . "/assets/views/test");
$view->path("test", __DIR__ . "/assets/views/test");

if (empty($_GET['id'])) {
    echo $view->render("test::list", [
        "title" => "Usuários do Sitema",
        "list" => (new \Source\Models\User())->all(3)
    ]);
} else {
    echo $view->render("test::user", [
        "title" => "Editar Usuário",
        "user" => (new \Source\Models\User())->findById($_GET['id'])
    ]);
}