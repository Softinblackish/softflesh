<?php
    include('../conexion/cone.php');
    session_start();
    $empresa = $_SESSION['empresa_db'];

    $conteo=1;
    while($conteo < 100)
    {
        if(isset($_POST['campos_ventas'.$conteo]))
        {
            $campo = $_POST['campos_ventas'.$conteo] ;
            $fila = $_POST['fila_asiento'.$conteo];
            $actualizar = $conexion->query("UPDATE $empresa.tbl_asientos SET campo_vinculado = '$campo' WHERE id_asiento = $fila");
            echo $campo;
            echo $fila;
        }
        $conteo= $conteo + 1;
    }
    header('location:../../views/administracion/asientos_contables.php');
?>