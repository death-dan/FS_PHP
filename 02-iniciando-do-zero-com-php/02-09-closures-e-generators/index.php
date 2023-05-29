<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.09 - Closures e generators");

/*
 * [ closures ] https://php.net/manual/pt_BR/functions.anonymous.php
 */
fullStackPHPClassSession("closures", __LINE__);

$myAge = function ($year) {
    $age = date("Y") - $year;
    return "<h5>Você tem {$age} anos!</h5>";
};

echo $myAge(1981);

$priceBrl = function ($price) {
    return number_format($price, 2, ",", ".");
};

echo "<p>O preço do Projeto é de R$ {$priceBrl(3600)}.</p>";

$myCart = [];
$myCart["totalPrice"] = 0;
$cardAdd = function ($item, $qdt, $price) use (&$myCart) {
    $myCart[$item] = $qdt * $price;
    $myCart["totalPrice"] += $myCart[$item];
};

$cardAdd("BlaBla", 3, 500);
$cardAdd("BlaBla2", 2, 500);

var_dump($myCart);

/*
 * [ generators ] https://php.net/manual/pt_BR/language.generators.overview.php
 */
fullStackPHPClassSession("generators", __LINE__);

$interator = 10;

function showDate($days)
{
    $saveDate = [];
    for ($day = 1; $day < $days; $day++) {
        $saveDate[] = date("d/m/Y", strtotime("+{$day}days"));
    }

    return $saveDate;
}

echo "<div style='text-aling: center'>";
foreach(showDate($interator) as $date) {
    echo "<small class='tag'>{$date}</small>" . PHP_EOL;
}
echo "</div>";

function generatoDate($days)
{
    for ($day = 1; $day < $days; $day++) {
        yield date("d/m/Y", strtotime("+{$day}days"));
    }
}

echo "<br>";

echo "<div style='text-aling: center'>";
foreach(generatoDate($interator) as $date) {
    echo "<small class='tag'>{$date}</small>" . PHP_EOL;
}
echo "</div>";