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

        <form method="POST" action="persistencia_pedido.php">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Cadastro Pedidos</h4>
                </div>

                <div class="panel-body">

                    <table class="table">
                        <tbody>
                            <tr>
                            <tr>
                                <th>
                                    <label>Nº Pedido</label>
                                </th>

                                <th>
                                    <label>Cliente</label>
                                </th>
                                <th>
                                    <label>Produto</label>
                                </th>
                                <th>
                                    <label>Data Pedido</label>
                                </th>

                                <th>
                                    <label>Quantidade</label>
                                </th>

                                <th>
                                    <label>Status</label>
                                </th>

                                <th>
                                    <label>Alterar</label>
                                </th>
                                <th>
                                    <label>Excluir</label>
                                </th>
                            </tr>

                            <tr>

                                <?php
                                $conexao = pg_connect("dbname=teste port=5432 user=postgres password=postgres");

                                $resultado = pg_query("select "
                                        . " ped.id_pedido,"
                                        . " cli.id_cliente,"
                                        . " cli.nome_cliente,"
                                        . " prod.nome_produto,"
                                        . " ped.dt_pedido,"
                                        . " ped.qtd,"
                                        . " sta.descricao"
                                        . " from "
                                        . " public.pedido ped "
                                        . " join public.cliente cli "
                                        . " on ped.id_cliente = cli.id_cliente "
                                        . " join public.produto prod "
                                        . " on ped.id_produto = prod.id_produto "
                                        . " join public.status sta "
                                        . " on ped.id_status = sta.id_status "
                                        . " order by ped.id_pedido ");

                                $linhas = pg_num_rows($resultado);

                                for ($i = 0; $i < $linhas; $i++) {
                                    $registro = pg_fetch_row($resultado);
                                    //$registro = pg_fetch_assoc($resultado);

                                    echo "<tr>";
                                    echo "<td>";
                                    echo "$registro[0]";
                                    echo "</td>";

                                    echo "<td>";
                                    echo "<a href=\"detalhe_cliente.php?id={$registro[1]}\">$registro[2]</a>";
                                    echo "</td>";

                                    echo "<td>";
                                    echo "$registro[3]";
                                    echo "</td>";

                                    echo "<td>";
                                    echo date('d/m/Y', strtotime($registro[4]));
                                    echo "</td>";

                                    echo "<td>";
                                    echo "$registro[5]";
                                    echo "</td>";

                                    echo "<td>";
                                    echo "$registro[6]";
                                    echo "</td>";

                                    echo "<td>";
                                    echo "<a href=\"alterar_pedido.php?id={$registro['0']}\">Alterar</a>";
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

                    <a href="cadastrar_pedido.php" class = "btn btn-danger">Cadastrar</a>
                    <input type="hidden" name="operacao" value="excluir">
                    <input type="submit" value="Excluir" class="btn btn-primary" />

                </div>
            </div>
        </form>  
    </body>
</html>

