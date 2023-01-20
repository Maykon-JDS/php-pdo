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
        <form action="">
            <h3 id="titulo">CADASTRAR PESSOA</h3>
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome">
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" id="telefone">
            <label for="email">Email</label>
            <input type="text" name="email" id="email">

            <input type="submit" value="Cadastrar">
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
                <tr>
                    <td>Maria</td>
                    <td>000000</td>
                    <td>Maria@gmail.com</td>
                    <td><a href="http://" class="editar_btn">Editar</a><a href="http://" class="excluir_btn">Excluir</a></td>
                </tr>
            </tbody>
        </table>
    </section>
</body>

</html>