<?php
namespace App\Controller;

require_once("App/Entity/pessoa.php");

use  App\Entity\Pessoa;

$pessoa = new Pessoa("pessoa");

if (isset($_POST['atualizar'])) {
    if (!empty($_POST['nome']) && !empty($_POST['telefone']) && !empty($_POST['email'])) {
        echo  "<h2 class='mensagem'>";
            $pessoa->obter_informacoes([
                'id' => addslashes($_POST['atualizar']),
                'nome' => addslashes($_POST['nome']),
                'telefone' =>  addslashes($_POST['telefone']),
                'email' => addslashes($_POST['email'])
            ]);
            echo $pessoa->atualizar_pessoa()
            . "</h2>";
    } else {
        echo "<h2 class='mensagem'>Preencha todos os campos</h2>";
    }
}


if (isset($_POST['editar'])) {
    $resposta_da_query = $pessoa->editar_pessoa(addslashes($_POST['editar']));
}


if (isset($_POST['excluir'])) {
    echo "<h2 class='mensagem'>" .
    $pessoa->excluir_pessoa(addslashes($_POST['excluir']))
    . "</h2>";
}


if (isset($_POST['cadastrar'])) {
    if (!empty($_POST['nome']) && !empty($_POST['telefone']) && !empty($_POST['email'])) {
        echo "<h2 class='mensagem'>";
            $pessoa->obter_informacoes([
                'nome' => addslashes($_POST['nome']),
                'telefone' => $_POST['telefone'],
                'email' => addslashes($_POST['email'])
            ]);
            echo $pessoa->cadastrar_pessoa()
            . "</h2>";
    } else {
        echo "<h2 class='mensagem'>Preencha todos os campos</h2>";
    }
}

?>