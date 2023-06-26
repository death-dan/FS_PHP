<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.11 - Refatorando modelo de usuário");

require __DIR__ . "/../source/autoload.php";

/*
 * [ find ]
 */
fullStackPHPClassSession("find", __LINE__);
$model = new \Source\Models\User();
$user = $model->find("id = :id", "id=1");

var_dump($user);

/*
 * [ find by id ]
 */
fullStackPHPClassSession("find by id", __LINE__);
$user = $model->findById(3);
var_dump($user);

/*
 * [ find by email ]
 */
fullStackPHPClassSession("find by email", __LINE__);
$user = $model->findByEmail("eleno29@email.com.br");
var_dump($user);

/*
 * [ all ]
 */
fullStackPHPClassSession("all", __LINE__);
$list = $model->all(2, 3);
var_dump($list);

/*
 * [ save ]
 */
fullStackPHPClassSession("save create", __LINE__);
$user = $model->bootstrap(
    "Jose",
    "Antonio",
    "curso@surso.com",
    "12345678"
);

if ($user->save()) {
    echo message()->success("Cadastro Realizado com Sucesso!");
} else {
    echo $user->message();
    echo message()->info($user->message()->json());
}

/*
 * [ save update ]
 */
fullStackPHPClassSession("save update", __LINE__);
$user = (new \Source\Models\User())->findById(51);
$user->first_name = "Maria";
$user->last_name = "Antonia";
$user->password = passwd(12345677);

if ($user->save()) {
    echo message()->success("Dados Atualizados com Sucesso!");
} else {
    echo $user->message();
    echo message()->info($user->message()->json());
}

var_dump($user);