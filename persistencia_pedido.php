<?php

$operacao = $_POST["operacao"];

if ($operacao == "cadastrar") {

    $id_cliente = $_POST['id_cliente'];
    $id_produto = $_POST['id_produto'];
    $dt_pedido = $_POST['dt_pedido'];
    $qtd = $_POST['qtd'];
    $id_status = $_POST['id_status'];

    if (!empty($id_cliente) && !empty($id_produto) && !empty($dt_pedido) && !empty($qtd) && !empty($id_status)) {

        $conexao = pg_connect("dbname=teste port=5432 user=postgres password=postgres");

        $sql = "INSERT INTO public.pedido (id_cliente,id_produto,dt_pedido, qtd, id_status) VALUES ";
        $sql .= "($id_cliente,$id_produto,'$dt_pedido', $qtd, $id_status)";

        $resultado = pg_query($sql);

        pg_close($conexao);
    }

    echo '<script> location.href=("pedido.php")</script>';
}

if ($operacao == "alterar") {

    $id = $_POST["id"];
    $id_cliente = $_POST['id_cliente'];
    $id_produto = $_POST['id_produto'];
    $dt_pedido = $_POST['dt_pedido'];
    $qtd = $_POST['qtd'];
    $id_status = $_POST['id_status'];

    if (!empty($id_cliente) && !empty($id_produto) && !empty($dt_pedido) && !empty($qtd) && !empty($id_status)) {

        $conexao = pg_connect("dbname=teste port=5432 user=postgres password=postgres");

        $sql = "UPDATE public.pedido ";
        $sql .= "SET id_cliente = '$id_cliente', id_produto = '$id_produto', dt_pedido = '$dt_pedido', qtd = '$qtd', id_status = '$id_status'  WHERE id_pedido = $id ";

        $resultado = pg_query($sql);

        pg_close($conexao);
    }

    echo '<script> location.href=("pedido.php")</script>';
}

if ($operacao == "excluir") {
    if (isset($_POST['id'])) {
        $ids = $_POST["id"];
    }

    if (!empty($ids)) {
        $conexao = pg_connect("dbname=teste port=5432 user=postgres password=postgres");

        foreach ($ids as $id) {
            $sql = "DELETE FROM public.pedido WHERE id_pedido = $id ";

            $resultado = pg_query($sql);
        }

        pg_close($conexao);
    }

    echo '<script> location.href=("pedido.php")</script>';
}
?>

