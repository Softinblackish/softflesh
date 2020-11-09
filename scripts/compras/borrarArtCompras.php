<?php
    include("../conexion/cone.php");
    session_start();
    $empresa= $_SESSION["empresa_db"];

    $no_compra = $_GET["no_compra"];
    $id = $_GET["id_compra"];
    $valor_total= $_POST['valor_total'];

    $resultado = $conexion->query("delete from $empresa.tbl_art_compras where no_compra = $no_compra and id_compra = $id");

    $Act_Valor_Total = $conexion->query("UPDATE $empresa.tbl_compras set valor_total = $valor_total where no_compra = $no_compra ");

    header('location: ../../views/compras/frm_compras.php')
?>