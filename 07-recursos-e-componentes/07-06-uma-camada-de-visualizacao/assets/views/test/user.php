<?php $this->layout("test::base", ["title" => "Editando Usuário - {$user->first_name}"]); ?>

<?php $this->start("nav"); ?>
    <a href="./" title="Voltar">Voltar</a>
<?php $this->stop(); ?>

<form action="" method="post" enctype="multipart/form-data">
    <input type="text" name="name" value="<?= $user->first_name; ?>">
    <input type="text" name="name" value="<?= $user->last_name; ?>">
    <input type="text" name="name" value="<?= $user->email; ?>">
    <button>Atualizar Usuário</button>
</form>