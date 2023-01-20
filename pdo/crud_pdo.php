<?php 
use \PDO;

//-----------------------CONEXÃO-----------------------
try {
    $pdo = new PDO('mysql:dbname=crudpdo;host=localhost', 'root', '1234');
} catch (PDOException $e) {
    echo "Erro com Banco de Dados: " . $e->getMessage();
}
catch (Exception $e) {
    echo "Erro generico: " . $e->getMessage();
}

//-----------------------INSERT-----------------------

//1 Forma:
//$res = $pdo->prepare("INSERT INTO PESSOA(nome, telefone, email) VALUES(:n, :t, :e)");

// $res->bindValue(":n","Miriam");
// $res->bindValue(":t","00000000");
// $res->bindValue(":n","teste@gmail.com");
// $res->execute();

//$res->execute([':n'=>'Miriama',':t'=>'00000000',':e'=>'teste@gmail.com']);

//$res->bindParam();

//2 Forma:
// $pdo->query("INSERT INTO PESSOA(nome, telefone, email) VALUES('Pedro','21943812','Pedrinho_Matador_de_Porco@gmail.com')");


//-----------------------DELETE-----------------------
// $cmd = $pdo->prepare("DELETE FROM PESSOA WHERE ID = ?");
// $id = 1;
// $cmd->execute([$id]);

// $cmd = $pdo->query("DELETE FROM PESSOA WHERE ID = 7");


//-----------------------UPDATE-----------------------
// $cmd = $pdo->prepare("UPDATE pessoa SET email = :email, nome = :nome WHERE id = :id");
// $cmd->execute([':email' => 'Maykondias2002@gmail.com', ':nome'=>'Maykon José Dias da Silva',':id' => 8]);


//-----------------------SELECT-----------------------
$cmd = $pdo->prepare("SELECT * FROM pessoa");
$cmd->execute();

$a = $cmd->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>'; print_r($a); echo '</pre>'; exit;

foreach ($a as $key => $value) {
    echo"ID:".$value['ID'] ."<br>Nome: " . $value['NOME'] . "<br>Telefone: " . $value['TELEFONE'] . "<br>E-mail: " . $value['EMAIL'] . '<br><br>';
}
?>