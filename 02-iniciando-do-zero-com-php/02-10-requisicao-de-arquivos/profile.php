<article style="
    padding: 5px 20px;
    background: #eee;
    border-radius: 4px;
">
    <h1><?= $profile->name; ?></h1>
    <p>
        Trabalha na Empresa: <?= $profile->name; ?><br>
        <a href="mailto:<?= $profile->email; ?>" title="Enviar E-mail">Enviar E-mail</a>
    </p>
</article>