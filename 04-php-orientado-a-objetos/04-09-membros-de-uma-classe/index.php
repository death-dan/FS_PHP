<?php

use Soure\Members\Config;

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.09 - Membros de uma classe");

require __DIR__ . "/source/autoload.php";

/*
 * [ constantes ] http://php.net/manual/pt_BR/language.oop5.constants.php
 */
fullStackPHPClassSession("constantes", __LINE__);

use Source\Members\Configs;

$configs = new Configs();
echo "<p>" . $configs::COMPANY . "</p>";

var_dump(
    Configs::COMPANY,
    // Configs::DOMAIN,
    // Configs::SECTOR
);

$reflection = new ReflectionClass(Configs::class);

var_dump($configs, $reflection->getConstants());

/*
 * [ propriedades ] http://php.net/manual/pt_BR/language.oop5.static.php
 */
fullStackPHPClassSession("propriedades", __LINE__);

Configs::$company = "BrasFeet";
Configs::$domain = "www.upinside.com.br";
Configs::$sector = "Educação";

$configs::$sector = "Educação2";

var_dump($configs, $reflection->getProperties(), $reflection->getDefaultProperties());

/*
 * [ métodos ] http://php.net/manual/pt_BR/language.oop5.static.php
 */
fullStackPHPClassSession("métodos", __LINE__);

$configs::setConfig("SDC", "WER", "GHJ");

var_dump($configs, $reflection->getMethods(), $reflection->getDefaultProperties());

/*
 * [ exemplo ] Uma classe trigger
 */
fullStackPHPClassSession("exemplo", __LINE__);

use Source\Members\Trigger;

$trigger = new Trigger();

$trigger::show("Um objeto Trigger");

Trigger::show("Essa é mais mensagem de Trigger");
Trigger::show("Erro ao tentar!", Trigger::ACCEPT);
Trigger::show("Erro ao tentar!", Trigger::WARNING);
Trigger::show("Erro ao tentar!", Trigger::ERROR);

echo Trigger::push("Nova Mensagem");
echo Trigger::push("Nova Mensagem", Trigger::ACCEPT);
echo Trigger::push("Nova Mensagem", Trigger::WARNING);
echo Trigger::push("Nova Mensagem", Trigger::ERROR);