<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="estilo.css">
        <link rel="stylesheet" href="bootstrap.min.css">
        
        <script language="javascript">
            function valida() {

                if (document.getElementById('id_cliente').value == "Selecione") {
                    alert('Preencha o campo cliente.');
                    return false;
                } else if (document.getElementById('id_produto').value == "Selecione") {
                    alert('Preencha o campo produto.');
                    return false;
                } else if (document.getElementById('dt_pedido').value == "") {
                    alert('Preencha o campo data do pedido.');
                    return false;
                }else if (document.getElementById('qtd').value == "") {
                    alert('Preencha o campo quantidade.');
                    return false;
                } else if (document.getElementById('id_status').value == "Selecione") {
                    alert('Preencha o campo status.');
                    return false;
                }
                else
                {
                    return true;
                }
            }

        </script>
        
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

        <form action="persistencia_pedido.php" method="POST">

            <input type="hidden" name="operacao" value="cadastrar">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Cadastro Pedido</h4>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-md-1">Cliente:</div>
                        <div class="form-group col-md-11">

                            <select name="id_cliente" id="id_cliente">
                                <option>Selecione</option>
                                <?php
                                pg_connect("dbname=teste port=5432 user=postgres password=postgres");
                                $list = pg_query("SELECT id_cliente, nome_cliente FROM public.cliente");

                                while ($row_list = pg_fetch_assoc($list)) {
                                    ?>
                                    <option value="<?php echo $row_list['id_cliente']; ?>"><?php echo $row_list['nome_cliente']; ?></option> 
                                    <?php
                                }
                                ?>
                            </select>   
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-1">Produto:</div>
                        <div class="form-group col-md-11">

                            <select name="id_produto" id="id_produto">
                                <option>Selecione</option>
                                <?php
                                pg_connect("dbname=teste port=5432 user=postgres password=postgres");
                                $list = pg_query("SELECT id_produto, nome_produto FROM public.produto");

                                while ($row_list = pg_fetch_assoc($list)) {
                                    ?>
                                    <option value="<?php echo $row_list['id_produto']; ?>"><?php echo $row_list['nome_produto']; ?></option> 
                                    <?php
                                }
                                ?>
                            </select>   
                        </div>
                    </div>

                    <div class="row">
                        <ul class="list-group">
                            <div class="form-group col-md-1">Data Pedido:</div>
                            <div class="form-group col-md-11"><input type="date" name="dt_pedido" id="dt_pedido" size="20" value="<?php echo date("Y-m-d"); ?>"></div>
                        </ul>
                    </div>

                    <div class="row">
                        <ul class="list-group">
                            <div class="form-group col-md-1">Quantidade:</div>
                            <div class="form-group col-md-11"><input type="text" name="qtd" id="qtd" size="20" ></div>
                        </ul>
                    </div>

                    <div class="row">
                        <ul class="list-group">
                            <div class="form-group col-md-1">Status:</div>
                            <div class="form-group col-md-11">
                                <select name="id_status" id="id_status">
                                    <option>Selecione</option>
                                    <?php
                                    pg_connect("dbname=teste port=5432 user=postgres password=postgres");
                                    $list = pg_query("SELECT id_status, descricao FROM public.status");

                                    while ($row_list = pg_fetch_assoc($list)) {
                                        ?>
                                        <option value="<?php echo $row_list['id_status']; ?>"><?php echo $row_list['descricao']; ?></option> 
                                        <?php
                                    }
                                    ?>
                                </select> 
                            </div>
                        </ul>
                    </div>
                </div>

                <div class="panel-footer">
                    <input type="submit" value="Cadastrar" class="btn btn-danger" onClick="return valida()">
                    <a href="pedido.php" class="btn btn-primary">Voltar</a>
                </div>
            </div>
        </form>
    </body>
</html>

