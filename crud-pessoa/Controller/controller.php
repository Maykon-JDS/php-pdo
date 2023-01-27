<?php
require_once ("../App/Entity/classe_pessoa.php"); 

echo '<pre>'; print_r($_POST); echo '</pre>'; exit;


$p = new Pessoa();

if (isset($_POST['atualizar'])) {
    if (!empty($_POST['nome']) && !empty($_POST['telefone']) && !empty($_POST['email'])) {
        echo  "<h2 class='mensagem'>" . $p->atualizar(['id' => addslashes($_POST['atualizar']),'nome' => addslashes($_POST['nome']), 'telefone' =>  addslashes($_POST['telefone']), 'email' => addslashes($_POST['email'])]) . "</h2>";
    } else {
        echo "<h2 class='mensagem'>Preencha todos os campos</h2>";
    } 
}

if (isset($_POST['editar'])) {
    $res = $p->editar(addslashes($_POST['editar']));
}


if (isset($_POST['excluir'])) {
    $p->excluir_pessoa(addslashes($_POST['excluir']));
}

if (isset($_POST['cadastrar'])) {
    if (!empty($_POST['nome']) && !empty($_POST['telefone']) && !empty($_POST['email'])) {
        echo "<h2 class='mensagem'>" . $p->cadastrar_pessoa(['nome' => addslashes($_POST['nome']), 'telefone' => $_POST['telefone'], 'email' => addslashes($_POST['email'])]) . "</h2>";
    } else {
        echo "<h2 class='mensagem'>Preencha todos os campos</h2>";
    }
}


?>

