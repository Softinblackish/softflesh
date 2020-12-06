<?php
    include("../conexion/cone.php");
    session_start();
    $empresa= $_SESSION["empresa_db"];

    $id = $_GET["id"];
    $cantidad = $_GET["cantidad"];


    //aqui se aguregara que sume al inventario lo que se borro por la devolucion

    $resultado = $conexion->query("delete from $empresa.tbl_art_compras where no_compra = $id");

    header('location: ../../views/compras/frm_compras.php')
?>