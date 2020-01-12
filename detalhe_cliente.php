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

        <?php
        $id = $_GET["id"];

        $conexao = pg_connect("dbname=teste port=5432 user=postgres password=postgres");

        $resultado = pg_query("SELECT nome_cliente, cpf, email FROM public.CLIENTE WHERE id_cliente = $id ");

        $registro = pg_fetch_assoc($resultado);

        pg_close($conexao);
        ?>

        <form action="persistencia_cliente.php" method="POST">

            <input type="hidden" name="operacao" value="alterar">

            <input type="hidden" name="id" value="<?= $id ?>">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Detalhe Cliente</h4>
                </div>
                <div class="panel-body">

                    <div class="row">
                        <div class="form-group col-md-1">Nome:</div>
                        <div class="form-group col-md-11"><?php echo trim($registro['nome_cliente']); ?></div>

                        <div class="form-group col-md-1">CPF:</div>
                        <div class="form-group col-md-11"><?php echo trim($registro['cpf']); ?></div>

                        <div class="form-group col-md-1">Email:</div>
                        <div class="form-group col-md-11"><?php echo trim($registro['email']); ?></div>

                    </div>

                </div>
               
            </div>

        </form>

    </body>
</html>

