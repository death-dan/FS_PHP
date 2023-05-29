<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.10 - Requisição de arquivos");

/*
 * [ include ] https://php.net/manual/pt_BR/function.include.php
 * [ include_once ] https://php.net/manual/pt_BR/function.include-once.php
 */
fullStackPHPClassSession("include, include_once", __LINE__);

include __DIR__ . "/header.php";

$profile = new stdClass();
$profile->name = "Jose";
$profile->company = "Bras";
$profile->email = "Blbalbalbal";
include __DIR__ . "/profile.php";

$profile = new stdClass();
$profile->name = "Maria";
$profile->company = "Bras";
$profile->email = "Blbalbalbal";
include __DIR__ . "/profile.php";

/*
 * [ require ] https://php.net/manual/pt_BR/function.require.php
 * [ require_once ] https://php.net/manual/pt_BR/function.require-once.php
 */
fullStackPHPClassSession("require, require_once", __LINE__);

require __DIR__ . "/config.php";

echo "<h1>" . COURSE . "</h1>";

var_dump(require_once __DIR__ . "/config.php");