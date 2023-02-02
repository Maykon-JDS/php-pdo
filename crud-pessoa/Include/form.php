<section id="formulario">
     <form action="#" method="post" class="form-cadastro">
        <h3 id="titulo">CADASTRAR PESSOA</h3>
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" value="<?= $resposta_da_query['nome'] ?>">
        <label for="telefone">Telefone</label>
        <input type="text" name="telefone" id="telefone" value="<?= $resposta_da_query['telefone'] ?>">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" value="<?= $resposta_da_query['email'] ?>">

        <?php
            if (isset($_POST['editar'])) {
                echo "<button type='submit' name='atualizar' value='" . $resposta_da_query['id'] . "' class='atualizar'>atualizar</button>";
                echo "<button type='submit' class='voltar'>voltar</button>";
            } else {
                echo '<input type="submit" value="cadastrar" name="cadastrar">';
            }
        ?>
        
    </form> 
</section>