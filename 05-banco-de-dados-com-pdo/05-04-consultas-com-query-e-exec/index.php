<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.04 - Consultas com query e exec");

require __DIR__ . "/../source/autoload.php";

use Source\DataBase\Conect;
use Source\Database\Connect;

/*
 * [ insert ] Cadastrar dados.
 * https://mariadb.com/kb/en/library/insert/
 *
 * [ PDO exec ] http://php.net/manual/pt_BR/pdo.exec.php
 * [ PDO query ]http://php.net/manual/pt_BR/pdo.query.php
 */
fullStackPHPClassSession("insert", __LINE__);
$insert = "
    INSERT INTO users (first_name, last_name, email, document)
    VALUES ('Jose', 'Maria', 'blabla@bla.com', '09876565');
";

try {
    // $exec = Conect::getInstance()->exec($insert);
    // var_dump(Conect::getInstance()->lastInsertId());
    $exec = null;

    $query = Conect::getInstance()->query($insert);
    var_dump(Conect::getInstance()->lastInsertId());

    var_dump(
        $exec,
        $query->errorInfo()
    );

} catch (PDOException $e) {
    var_dump($e);
}

/*
 * [ select ] Ler/Consultar dados.
 * https://mariadb.com/kb/en/library/select/
 */
fullStackPHPClassSession("select", __LINE__);

try {
    $query = Conect::getInstance()->query("SELECT * FROM users LIMIT 2");
    var_dump([
        $query,
        $query->rowCount(),
        $query->fetchAll()
    ]);
} catch (PDOException $e) {
    var_dump($e);
}

/*
 * [ update ] Atualizar dados.
 * https://mariadb.com/kb/en/library/update/
 */
fullStackPHPClassSession("update", __LINE__);

try {
    $exec = Conect::getInstance()->exec("
        UPDATE users SET first_name = 'Jose', last_name='Maria' 
        WHERE id='1'
    ");
    var_dump($exec);

} catch (PDOException $e) {
    var_dump($e);
}

/*
 * [ delete ] Deletar dados.
 * https://mariadb.com/kb/en/library/delete/
 */
fullStackPHPClassSession("delete", __LINE__);

try {
    $exec = Conect::getInstance()->exec("
        DELETE FROM users WHERE id > '50'
    ");
    var_dump($exec);
} catch (PDOException $e) {
    var_dump($e);
}