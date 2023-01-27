<section id="direita">
    <form action="/Controller/controller.php" method="post">
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
                            echo "<td class=''><button type='submit' value='" . $dado['ID'] . "' name='editar' class='editar_btn'>Editar</button><button type='submit' value='" . $dado['ID'] . "' name='excluir' class='excluir_btn'>Excluir</button></td>";
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