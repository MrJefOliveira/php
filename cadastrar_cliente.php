<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="estilo.css">
        <link rel="stylesheet" href="bootstrap.min.css">

        <script language="javascript">
            function valida() {

                if (document.getElementById('nome').value == "") {
                    alert('Preencha o campo nome.');
                    return false;
                } else if (document.getElementById('cpf').value == "") {
                    alert('Preencha o campo cpf.');
                    return false;
                } else if (document.getElementById('email').value == "") {
                    alert('Preencha o campo email.');
                    return false;
                } else if (!valida_cpf(document.getElementById('cpf').value))
                {
                    alert('CPF Inválido');
                    return false;
                } else if (!valida_email())
                {
                    alert('Email Inválido');
                    return false;
                } else
                {
                    return true;
                }
            }

            function valida_cpf(cpf) {
                var numeros, digitos, soma, i, resultado, digitos_iguais;
                digitos_iguais = 1;
                if (cpf.length < 11)
                    return false;
                for (i = 0; i < cpf.length - 1; i++)
                    if (cpf.charAt(i) != cpf.charAt(i + 1))
                    {
                        digitos_iguais = 0;
                        break;
                    }
                if (!digitos_iguais)
                {
                    numeros = cpf.substring(0, 9);
                    digitos = cpf.substring(9);
                    soma = 0;
                    for (i = 10; i > 1; i--)
                        soma += numeros.charAt(10 - i) * i;
                    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
                    if (resultado != digitos.charAt(0))
                        return false;
                    numeros = cpf.substring(0, 10);
                    soma = 0;
                    for (i = 11; i > 1; i--)
                        soma += numeros.charAt(11 - i) * i;
                    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
                    if (resultado != digitos.charAt(1))
                        return false;
                    return true;
                } else
                    return false;
            }

            function valida_email() {
                if (document.forms[0].email.value == ""
                        || document.forms[0].email.value.indexOf('@') == -1
                        || document.forms[0].email.value.indexOf('.') == -1)
                {
                    alert("Email inválido");
                    return false;
                } else {
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

        <form action="persistencia_cliente.php" method="POST">

            <input type="hidden" name="operacao" value="cadastrar">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Cadastro Cliente</h4>
                </div>
                <div class="panel-body">

                    <div class="row">
                        <div class="form-group col-md-1">Nome:</div>
                        <div class="form-group col-md-11"><input type="text" name="nome" id="nome" size="150" maxlength="100"></div>

                        <div class="form-group col-md-1">CPF:</div>
                        <div class="form-group col-md-11"><input type="text" name="cpf" id="cpf" size="50"  maxlength="11"></div>

                        <div class="form-group col-md-1">Email:</div>
                        <div class="form-group col-md-11"><input type="text" name="email" id="email" size="150"  maxlength="100"></div>
                    </div>

                </div>
                <div class="panel-footer">
                    <input type="submit" value="Cadastrar" class="btn btn-danger" onClick="return valida()">
                    <a href="cliente.php" class="btn btn-primary">Voltar</a>
                </div>
            </div>
        </form>
    </body>
</html>

