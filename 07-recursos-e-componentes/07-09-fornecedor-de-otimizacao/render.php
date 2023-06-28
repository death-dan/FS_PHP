<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <?php
        require __DIR__ . "/../vendor/autoload.php";

        $seo = new \Source\Support\Seo();
        echo $seo->render(
            "Novo Titulo",
            "Mais uma descrição de produto",
            "https://www.localhost",
            __DIR__ . "/../img/mapaLol.png"
        );
    ?>
</head>

<link rel="stylesheet" href="/fullstackphp/fsphp.css">
<body>
    <h1 class='trigger accept'><?= $seo->title; ?></h1>
    <p class='trigger warning'><?= $seo->description; ?></p>

    <?= "<pre>" , print_r($seo->data(), true) , "</pre>"; ?>
</body>
</html>