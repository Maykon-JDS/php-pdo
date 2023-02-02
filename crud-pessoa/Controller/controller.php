<?php

require("App/Entity/classe_pessoa.php");

$pessoa = new Pessoa();

if (isset($_POST['atualizar'])) {
    if (!empty($_POST['nome']) && !empty($_POST['telefone']) && !empty($_POST['email'])) {
        echo  "<h2 class='mensagem'>" .
            $pessoa->atualizar([
                'id' => addslashes($_POST['atualizar']),
                'nome' => addslashes($_POST['nome']),
                'telefone' =>  addslashes($_POST['telefone']),
                'email' => addslashes($_POST['email'])
            ])
            . "</h2>";
    } else {
        echo "<h2 class='mensagem'>Preencha todos os campos</h2>";
    }
}


if (isset($_POST['editar'])) {
    $resposta_da_query = $pessoa->editar(addslashes($_POST['editar']));
}


if (isset($_POST['excluir'])) {
    $pessoa->excluir_pessoa(addslashes($_POST['excluir']));
}


if (isset($_POST['cadastrar'])) {
    if (!empty($_POST['nome']) && !empty($_POST['telefone']) && !empty($_POST['email'])) {
        echo "<h2 class='mensagem'>" .
            $pessoa->cadastrar_pessoa([
                'nome' => addslashes($_POST['nome']),
                'telefone' => $_POST['telefone'],
                'email' => addslashes($_POST['email'])
            ])
            . "</h2>";
    } else {
        echo "<h2 class='mensagem'>Preencha todos os campos</h2>";
    }
}

?>