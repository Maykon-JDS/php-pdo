<?php 
use \PDO;

//CONEXÃO
try {
    $pdo = new PDO('mysql:dbname=crudpdo;host=localhost', 'root', '1234');
} catch (PDOException $e) {
    echo "Erro com Banco de Dados: " . $e->getMessage();
}
catch (Exception $e) {
    echo "Erro generico: " . $e->getMessage();
}

//INSERT
?>
