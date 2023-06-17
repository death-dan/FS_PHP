<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.03 - Errors, conexão e execução");

/*
 * [ controle de erros ] http://php.net/manual/pt_BR/language.exceptions.php
 */
fullStackPHPClassSession("controle de erros", __LINE__);

try {
    // throw new Exception("Exception");
    // throw new PDOException("PDOException");
    throw new ErrorException("ErrorException");
} catch (PDOException | ErrorException $exception) {
    var_dump($exception);
} catch (Exception $exception) {
    echo "<p class='trigger error'>{$exception->getMessage()}</p>";
} finally {
    echo "<p class='trigger'>Terminou !!!</p>";
}

/*
 * [ php data object ] Uma classe PDO para manipulação de banco de dados.
 * http://php.net/manual/pt_BR/class.pdo.php
 */
fullStackPHPClassSession("php data object", __LINE__);

try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=fsphp",
        "root",
        "",
        [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        ]
    );

    $stmt = $pdo->query("SELECT * FROM users LIMIT 3");
    
    while ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
        var_dump($user);
    }

} catch (PDOException $ex) {
    var_dump($ex);
}

/*
 * [ conexão com singleton ] Conextar e obter um objeto PDO garantindo instância única.
 * http://br.phptherightway.com/pages/Design-Patterns.html
 */
fullStackPHPClassSession("conexão com singleton", __LINE__);

require __DIR__ . "/../source/autoload.php";

use FTP\Connection;
use \Source\DataBase\Conect;

$pdo1 = Conect::getInstance();
$pdo2 = Conect::getInstance();

var_dump(
    $pdo1,
    $pdo2,
    Conect::getInstance(),
    Conect::getInstance()::getAvailableDrivers(),
    Conect::getInstance()->getAttribute(PDO::ATTR_DRIVER_NAME)
);