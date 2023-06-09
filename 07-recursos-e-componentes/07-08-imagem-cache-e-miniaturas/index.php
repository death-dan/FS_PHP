<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.08 - Imagem, cache e miniaturas");

require __DIR__ . "/../vendor/autoload.php";

/*
 * [ cropper ] https://packagist.org/packages/coffeecode/cropper
 */
fullStackPHPClassSession("cropper", __LINE__);

$t = new \Source\Support\Thumb();
var_dump($t);

/*
 * [ generate ]
 */
fullStackPHPClassSession("generate", __LINE__);

echo "<img src='{$t->make("files/2023/06/images.jpg", 300)}' alt='' title='' />";
echo "<img src='{$t->make("files/2023/06/images.jpg", 180, 180)}' alt='' title='' />";

var_dump($t->make("image.jpg", 100));

echo "<img src='{$t->make("files/2023/06/download.png", 300)}' alt='' title='' />";
echo "<img src='{$t->make("files/2023/06/download.png", 180, 180)}' alt='' title='' />";

// $t->flush("files/2023/06/download.png");

