<?php

$operacao = $_POST["operacao"];

if ($operacao == "cadastrar") {
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $email = $_POST["email"];

    if (!empty($nome) && !empty($cpf) && !empty($email)) {
        $conexao = pg_connect("dbname=teste port=5432 user=postgres password=postgres");

        $sql = "INSERT INTO public.cliente (nome_cliente, cpf, email) VALUES ";
        $sql .= "('$nome', $cpf, '$email')";

        $resultado = pg_query($sql);

        pg_close($conexao);
    }

    echo '<script> location.href=("cliente.php")</script>';
}

if ($operacao == "alterar") {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $email = $_POST["email"];

    if (!empty($id) && !empty($nome) && !empty($cpf) && !empty($email)) {

        $conexao = pg_connect("dbname=teste port=5432 user=postgres password=postgres");

        $sql = "UPDATE public.cliente ";
        $sql .= "SET nome_cliente = '$nome', cpf = '$cpf', email = '$email' WHERE id_cliente = $id ";

        $resultado = pg_query($sql);

        pg_close($conexao);
    }

    echo '<script> location.href=("cliente.php")</script>';
}

if ($operacao == "excluir") {

    if (isset($_POST['id'])) {
        $ids = $_POST["id"];
    }

    if (!empty($ids)) {
        $conexao = pg_connect("dbname=teste port=5432 user=postgres password=postgres");

        foreach ($ids as $id) {
            $sql = "DELETE FROM public.cliente WHERE id_cliente = $id ";

            $resultado = pg_query($sql);
        }

        pg_close($conexao);
    }

    echo '<script> location.href=("cliente.php")</script>';
}
?>

