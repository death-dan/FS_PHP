<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.07 - Relacionamento entre objetos");

require __DIR__ . "/source/autoload.php";

/*
 * [ associacão ] É a associação mais comum entre objetos onde o objeto terá um atributo
 * apontando e dando acesso ao outro objeto
 */
fullStackPHPClassSession("associacão", __LINE__);

$company = new \Source\Related\Company();
$company->bootCopany(
    "UpInside",
    "Nome da Rua"
);

var_dump($company);

$address = new \Source\Related\Address("jose cardoso filho", 2345, "Vara verde");
$company->boot(
    "BrasDefit",
    $address
);

var_dump($company);

echo "<p>A {$company->getCompany()} tem sede na rua {$company->getAddress()->getStreet()}</p>";
/*
 * [ agregação ] Em agregação tornamos um objeto externo parte do objeto base, contudo não
 * o referenciamos em uma propriedade como na associação.
 */
fullStackPHPClassSession("agregação", __LINE__);

$productA = new \Source\Related\Product("Full Stack PHP", 1234);
$productB = new \Source\Related\Product("Full Stack Larvel", 356);

var_dump(
    $productA,
    $productB
);

$company->addProduct($productA);
$company->addProduct($productB);
$company->addProduct(
    new \Source\Related\Product("Novo Full Stack", 2344)
);

var_dump($company);

/**
 * @var \Source\Related\Product $product
*/
foreach ($company->getProducts() as $product) {
    echo "<p>{$product->getName()} por R$ {$product->getPrice()}</p>";
}

/*
 * [ composição ] Em composição temos um objeto base que é responsável por instanciar o
 * objeto parte, que só existe enquanto o base existir.
 */
fullStackPHPClassSession("composição", __LINE__);

$company->addTeamMember("CEO", "Jose", "Maria");
$company->addTeamMember("Maneger", "Maria", "Jose");
$company->addTeamMember("Suporte", "João", "Cleber");
$company->addTeamMember("Producer", "Antonio", "Carlos");
$company->addTeamMember("Designer", "Renata", "Rodrigues");

var_dump($company);

/**
 * @var \Source\Related\User $member 
*/
foreach ($company->getTeam() as $member) {
    echo "<p>{$member->getJob()} : {$member->getFirstName()} {$member->getLastName()}</p>";
}










