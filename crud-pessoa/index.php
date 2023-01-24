<?php
require_once("./classe-pessoa.php");

$p = new Pessoa();

if (isset($_POST['atualizar'])) {
    if (!empty($_POST['nome']) && !empty($_POST['telefone']) && !empty($_POST['email'])) {
        echo $p->atualizar(['id' => addslashes($_POST['atualizar']),'nome' => addslashes($_POST['nome']), 'telefone' =>  addslashes($_POST['telefone']), 'email' => addslashes($_POST['email'])]);
    } else {
        echo "Preencha todos os campos";
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
        echo $p->cadastrar_pessoa(['nome' => addslashes($_POST['nome']), 'telefone' => $_POST['telefone'], 'email' => addslashes($_POST['email'])]);
    } else {
        echo "Preencha todos os campos";
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/estilo.css">
    <title>Cadastro Pessoa</title>
</head>

<body>
    <section id="esquerda">
        <form action="#" method="post" class="form-cadastro">
            <h3 id="titulo">CADASTRAR PESSOA</h3>
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" value="<?= $res['nome'] ?>">
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" id="telefone" value="<?= $res['telefone'] ?>">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="<?= $res['email'] ?>">

            <?php
            if(isset($_POST['editar'])){
                echo "<button type='submit' name='atualizar' value='". $res['id'] ."' class='atualizar'>atualizar</button>";
                echo "<button type='submit' class='voltar'>voltar</button>";
            }else{
                echo '<input type="submit" value="cadastrar" name="cadastrar">';
            }
            ?>
        </form>
    </section>
    <button type="submit"></button>
    <section id="direita">
        <form action="#" method="post">
            <table>
                <thead>
                    <tr>
                        <th>NOME</th>
                        <th>TELEFONE</th>
                        <th colspan="2">EMAIL</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $dados = $p->buscar_dados();
                    if (!$dados == []) {
                        foreach ($dados as $dado) {
                            echo "<tr>";
                            echo "<td>{$dado['NOME']}</td>";
                            echo "<td>{$dado['TELEFONE']}</td>";
                            echo "<td>{$dado['EMAIL']}</td>";
                            echo "<td class=''><button type='submit' value='". $dado['ID'] ."' name='editar' class='editar_btn'>Editar</button><button type='submit' value='". $dado['ID'] ."' name='excluir' class='excluir_btn'>Excluir</button></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3' class='banco_vazio'>SEM DADOS</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </form>
    </section>
</body>

</html>