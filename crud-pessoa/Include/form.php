<section id="esquerda">
    <form action="/Controller/controller.php" method="post" class="form-cadastro">
        <h3 id="titulo">CADASTRAR PESSOA</h3>
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" value="<?= $res['nome'] ?>">
        <label for="telefone">Telefone</label>
        <input type="text" name="telefone" id="telefone" value="<?= $res['telefone'] ?>">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" value="<?= $res['email'] ?>">

        <?php
            if (isset($_POST['editar'])) {
                echo "<button type='submit' name='atualizar' value='" . $res['id'] . "' class='atualizar'>atualizar</button>";
                echo "<button type='submit' class='voltar'>voltar</button>";
            } else {
                echo '<input type="submit" value="cadastrar" name="cadastrar">';
            }
        ?>
        
    </form>
</section>