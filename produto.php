<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="estilo.css">
        <link rel="stylesheet" href="bootstrap.min.css">
    </head>
    <body>

        <nav id="menu">
            <ul>
                <li><a href="cliente.php">Cliente</a></li>
                <li><a href="produto.php">Produto</a></li>
                <li><a href="pedido.php">Pedido</a></li>
            </ul>
        </nav>

        <br><br>   

        <form method="POST" action="persistencia_produto.php">
          <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Cadastro Produto</h4>
                </div>
                <div class="panel-body">

                    <table class="table">
                        <tbody>
                            <tr>
                            <tr>
                                <th>
                                    <label>Nome</label>
                                </th>
                                <th>
                                    <label>Valor Unitário</label>
                                </th>
                                <th>
                                    <label>Código Barras</label>
                                </th>
                                <th>
                                    <label>Alterar</label>
                                </th>
                                <th>
                                    <label>Excluir</label>
                                </th>
                            </tr>


                            <?php
                            $conexao = pg_connect("dbname=teste port=5432 user=postgres password=postgres");

                            $resultado = pg_query("SELECT id_produto, nome_produto, vlr_unitario, cod_barras FROM public.PRODUTO");

                            $linhas = pg_num_rows($resultado);

                            for ($i = 0; $i < $linhas; $i++) {
                                $registro = pg_fetch_row($resultado);

                                echo "<tr>";
                                echo "<td>";
                                echo "$registro[1]";
                                echo "</td>";

                                echo "<td>";
                                echo "$registro[2]";
                                echo "</td>";

                                echo "<td>";
                                echo "$registro[3]";
                                echo "</td>";
                                echo "<td>";
                                echo "<a href=\"alterar_produto.php?id={$registro['0']}\">Alterar</a>";
                                echo "</td>";
                                echo "<td>";
                                echo "<input type=\"checkbox\" name=\"id[]\"  value=\"$registro[0]\" />";
                                echo "</td>";
                                echo "</tr>";
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">

                    <a href="cadastrar_produto.php" class = "btn btn-danger">Cadastrar</a>
                    <input type="hidden" name="operacao" value="excluir">
                    <input type="submit" value="Excluir" class="btn btn-primary" />

                </div>
            </div>
        </form>  
    </body>
</html>

