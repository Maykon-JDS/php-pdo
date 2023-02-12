<section id="lista">
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
                $dados = $pessoa->buscar_dados();
                
                
                if (!$dados == []) {
                    foreach ($dados as $dado) {
                        echo "<tr>";
                        echo "<td>{$dado['nome']}</td>";
                        echo "<td>{$dado['telefone']}</td>";
                        echo "<td>{$dado['email']}</td>";
                        echo "<td class='coluna-botoes'>
                                <button type='submit' value='" . $dado['id'] . "' name='editar' class='editar_btn'>
                                    Editar
                                </button>
                                <button type='submit' value='" . $dado['id'] . "' name='excluir' class='excluir_btn'>
                                    Excluir
                                </button>
                            </td>";
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