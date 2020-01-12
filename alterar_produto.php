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

        $resultado = pg_query("SELECT nome_produto, vlr_unitario, cod_barras FROM public.PRODUTO WHERE id_produto = $id ");

        $registro = pg_fetch_assoc($resultado);

        pg_close($conexao);
        ?>

        <form action="persistencia_produto.php" method="POST">

            <input type="hidden" name="operacao" value="alterar">

            <input type="hidden" name="id" value="<?= $id ?>">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Alterar Produto</h4>
                </div>
                <div class="panel-body">

                    <div class="row">
                        <div class="form-group col-md-1">Nome:</div>
                        <div class="form-group col-md-11"><input type="text" name="nome_produto" size="150" maxlength="100" value="<?php echo trim($registro['nome_produto']); ?>" ></div>

                        <div class="form-group col-md-1">Valor Unitário:</div>
                        <div class="form-group col-md-11"><input type="text" name="vlr_unitario" size="50"  value="<?php echo trim($registro['vlr_unitario']); ?>"></div>

                        <div class="form-group col-md-1">Código Barras:</div>
                        <div class="form-group col-md-11"><input type="text" name="cod_barras" size="150"  maxlength="20"  value="<?php echo trim($registro['cod_barras']); ?>"></div>

                    </div>

                </div>
                <div class="panel-footer">
                    <input type="submit" value="Alterar" class="btn btn-danger">
                    <a href="produto.php" class="btn btn-primary">Voltar</a>
                </div>
            </div>

        </form>

    </body>
</html>

