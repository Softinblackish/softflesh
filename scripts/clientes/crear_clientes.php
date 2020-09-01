<?php
    include("../conexion/cone.php");
    session_start();
    $empresa = $_SESSION["empresa_db"];
    $usuario = $_SESSION["user"];

    echo $codigo = $_POST["codigo"]."&nbsp";
    echo $nombre = $_POST["nombre"]."&nbsp";
    echo $pais = $_POST["pais"]."&nbsp";
    echo $provincia = $_POST["provincia"]."&nbsp";
    echo $direccion = $_POST["direccion"]."&nbsp";
    echo $tipo_cliente = $_POST["tipo_cliente"]."&nbsp";
    echo $telefono = $_POST["telefono"]."&nbsp";
    echo $tipo_comprobante = $_POST["tipo_comprobante"]."&nbsp";
    echo $rnc = $_POST["rnc"]."&nbsp";
    echo $condicion = $_POST["condicion"]."&nbsp";
    echo $credito = $_POST["credito"]."&nbsp";
    echo $status = $_POST["status"]."&nbsp";



    $insert_cliente = $conexion->query("INSERT INTO $empresa.tbl_clientes
    (`codigo_cliente`, `nombre_cliente`, `Pais`, `provincia`, `direccion`, `telefono_cliente`, `tipo_cliente`, `tipo_comprobante`, `rnc_cliente`, `creado_por`,`limite_credito`, `condicion_pago`, `status`)
     VALUES ('$codigo','$nombre','$pais','$provincia','$direccion','$telefono','$tipo_cliente','$tipo_comprobante','$rnc','$usuario','$credito','$condicion','$status')");
    
    //header("location:../../views/administracion/crear_impuesto.php?creado='si'");
?>