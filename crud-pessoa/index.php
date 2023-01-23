<?php 
   require_once("./classe-pessoa.php");
    
    $p = new Pessoa();

    if(isset($_GET['id'])){
        $p->excluir_pessoa(addslashes($_GET['id']));
        header("location: index.php");
    }

    if(isset($_POST['status'])){
        if(!empty($_POST['nome']) && !empty($_POST['telefone']) && !empty($_POST['email'])){
            echo $p->cadastrar_pessoa(['nome' => addslashes($_POST['nome']), 'telefone' => $_POST['telefone'], 'email' => addslashes($_POST['email'])]);
        }else{
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
        <form action="#" method="post">
            <h3 id="titulo">CADASTRAR PESSOA</h3>
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome">
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" id="telefone">
            <label for="email">Email</label>
            <input type="text" name="email" id="email">

            <input type="submit" value="cadastrar" name="status">
        </form>
    </section>
    <section id="direita">
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
                if(!$dados == []){
                    foreach ($dados as $dado) {
                        echo "<tr>";
                        echo "<td>{$dado['NOME']}</td>";
                        echo "<td>{$dado['TELEFONE']}</td>";
                        echo "<td>{$dado['EMAIL']}</td>";
                        echo "<td><a href='#' value='tudo' name='teste' class='editar_btn'>Editar</a><a href='?id=".$dado['ID']."' class='excluir_btn'>Excluir</a></td>";
                        echo "</tr>";
                    }
                } else{
                    echo "<tr><td colspan='3' class='banco_vazio'>SEM DADOS</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </section>
</body>

</html>