<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.09 - Fornecedor de otimização");

require __DIR__ . "/../vendor/autoload.php";

/*
 * [ optimizer ] https://packagist.org/packages/coffeecode/optimizer
 */
fullStackPHPClassSession("optimizer", __LINE__);

$seo = new \Source\Support\Seo();
$seo->render(
    "Novo Titulo",
    "Mais uma descrição de produto",
    "https://www.localhost",
    __DIR__ . "/../img/mapaLol.png"
);

echo "<h1 class='trigger accept'>{$seo->title}</h1>";
echo "<p class='trigger warning'>{$seo->description}</p>";

var_dump($seo->optimizer()->debug());