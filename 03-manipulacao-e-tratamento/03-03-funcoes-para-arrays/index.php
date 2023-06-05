<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.03 - Funções para arrays");

/*
 * [ criação ] https://php.net/manual/pt_BR/ref.array.php
 */
fullStackPHPClassSession("manipulação", __LINE__);

$index = [
    "AC\DC",
    "Nirvana",
    "After Bread"
];

$assoc = [
    "band_1" => "AC\DC",
    "band_2" => "Nirvana",
    "band_3" => "After Bread"
];

// INSERIR NO INCIO DO ARRAY
array_unshift($index, "", "Pearl Jam");
$assoc = ["band_4" => "", "band_5" => "Pearl Jam"] + $assoc;

// INSERIR NO FIM DO ARRAY
array_push($index, "");
$assoc = $assoc + ["band_6" => ""];

// RETIRA O PRIMEIRO ELEMENTO DO ARRAY
array_shift($index);
array_shift($assoc);

// RETIRA O ULTIMO ELEMENTO DO ARRAY
array_pop($index);
array_pop($assoc);

array_unshift($index, "");
$assoc = ["band_4" => ""] + $assoc;

// RETIRA VALORES EM BRANCO DO ARRAY
$index = array_filter($index);
$assoc = array_filter($assoc);

var_dump(
    $index,
    $assoc
);

/*
 * [ ordenação ] reverse | asort | ksort | sort
 */
fullStackPHPClassSession("ordenação", __LINE__);


// INVERTE OS VALORES DO ARRAY SEM MUDAR O INDICE
$index = array_reverse($index);
$assoc = array_reverse($assoc);

// ORDENA O ARRAY PELO AFABETO E NÃO PELO INDICE
asort($index);
asort($assoc);

ksort($index);
krsort($index);

sort($index);
rsort($index);


var_dump(
    $index,
    $assoc
);

/*
 * [ verificação ]  keys | values | in | explode
 */
fullStackPHPClassSession("verificação", __LINE__);

var_dump([
    array_keys($assoc),
    array_values($assoc)
]);

if (in_array("AC\DC", $assoc)) {
    echo "<p>Cause I'm back!</p>";
}

$arrToString = implode(", ", $assoc);
echo "<p>Eu curto {$arrToString} e muito mais</p>";
echo "<p>{$arrToString}</p>";

var_dump(explode(", ", $arrToString));

/**
 * [ exemplo prático ] um template view | implode
 */
fullStackPHPClassSession("exemplo prático", __LINE__);

$profile = [
    "name" => "Jose",
    "company" => "Braselit",
    "mail" =>"blablabla@bla.com"
];

$template = <<<TPL
    <article>
        <h1>{{name}}</h1>
        <p>{{company}}<br>
        <a href="mailto:{{mail}}" title="Enviar e-mail para {{name}}">Enviar E-mail</a></p>
    </article>
TPL;

echo $template;

echo str_replace(array_keys($profile), array_values($profile), $template);

$repalces = "{{" . implode("}}&{{", array_keys($profile)) . "}}";

echo str_replace(
    explode("&", $repalces),
    array_values($profile),
    $template
);