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

        <form method="POST" action="persistencia_cliente.php">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Cadastro Cliente</h4>
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
                                    <label>CPF</label>
                                </th>
                                <th>
                                    <label>Email</label>
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

                            $resultado = pg_query("SELECT id_cliente, nome_cliente, cpf, email FROM public.CLIENTE");

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
                                echo "<a href=\"alterar_cliente.php?id={$registro['0']}\">Alterar</a>";
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
                    <a href="cadastrar_cliente.php" class = "btn btn-danger">Cadastrar</a>
                    <input type="hidden" name="operacao" value="excluir">
                    <input type="submit" value="Excluir" class="btn btn-primary" />
                </div>
            </div>
        </form>  
    </body>
</html>





