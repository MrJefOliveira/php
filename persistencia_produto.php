<?php

$operacao = $_POST["operacao"];

if ($operacao == "cadastrar") {
    $nome_produto = $_POST["nome_produto"];
    $vlr_unitario = $_POST["vlr_unitario"];
    $cod_barras = $_POST["cod_barras"];

    if (!empty($nome_produto) && !empty($vlr_unitario) && !empty($cod_barras)) {
        $conexao = pg_connect("dbname=teste port=5432 user=postgres password=postgres");

        $sql = "INSERT INTO public.produto (nome_produto, vlr_unitario, cod_barras) VALUES ";
        $sql .= "('$nome_produto', '$vlr_unitario', '$cod_barras')";

        $resultado = pg_query($sql);

        pg_close($conexao);
    }

    echo '<script> location.href=("produto.php")</script>';
}

if ($operacao == "alterar") {
    $id = $_POST["id"];
    $nome_produto = $_POST["nome_produto"];
    $vlr_unitario = $_POST["vlr_unitario"];
    $cod_barras = $_POST["cod_barras"];

    if (!empty($id) && !empty($nome_produto) && !empty($vlr_unitario) && !empty($cod_barras)) {

        $conexao = pg_connect("dbname=teste port=5432 user=postgres password=postgres");

        $sql = "UPDATE public.produto ";
        $sql .= "SET nome_produto = '$nome_produto', vlr_unitario = '$vlr_unitario', cod_barras = '$cod_barras' WHERE id_produto = $id ";

        $resultado = pg_query($sql);

        pg_close($conexao);
    }

    echo '<script> location.href=("produto.php")</script>';
}

if ($operacao == "excluir") {
    if (isset($_POST['id'])) {
        $ids = $_POST["id"];
    }

    if (!empty($ids)) {
        $conexao = pg_connect("dbname=teste port=5432 user=postgres password=postgres");

        foreach ($ids as $id) {
            $sql = "DELETE FROM public.produto WHERE id_produto = $id ";

            $resultado = pg_query($sql);
        }

        pg_close($conexao);
    }

    echo '<script> location.href=("produto.php")</script>';
}
?>

