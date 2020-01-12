<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="estilo.css">
        <link rel="stylesheet" href="bootstrap.min.css">
        
        <script language="javascript">
            function valida() {

                if (document.getElementById('nome_produto').value == "") {
                    alert('Preencha o campo nome.');
                    return false;
                } else if (document.getElementById('vlr_unitario').value == "") {
                    alert('Preencha o campo valor unitário.');
                    return false;
                } else if (document.getElementById('cod_barras').value == "") {
                    alert('Preencha o campo código de barras.');
                    return false;
                } else
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

        <form action="persistencia_produto.php" method="POST">
          
            <input type="hidden" name="operacao" value="cadastrar">
            
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Cadastro Produto</h4>
                </div>
                <div class="panel-body">

                    <div class="row">
                        <div class="form-group col-md-1">Nome:</div>
                        <div class="form-group col-md-11"><input type="text" name="nome_produto" id="nome_produto" size="150" maxlength="100" ></div>

                        <div class="form-group col-md-1">Valor Unitário:</div>
                        <div class="form-group col-md-11"><input type="text" name="vlr_unitario" id="vlr_unitario"  size="50"></div>

                        <div class="form-group col-md-1">Código de Barras:</div>
                        <div class="form-group col-md-11"><input type="text" name="cod_barras" id="cod_barras" size="150"  maxlength="20"></div>

                    </div>

                </div>
                <div class="panel-footer">
                    <input type="submit" value="Cadastrar" class="btn btn-danger" onClick="return valida()">
                    <a href="produto.php" class="btn btn-primary">Voltar</a>
                </div>
            </div>
        </form>
    </body>
</html>

