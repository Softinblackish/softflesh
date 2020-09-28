<?php
    include("../conexion/cone.php");
    session_start();
    $empresa = $_SESSION["empresa_db"];
    $usuario = $_SESSION["user"];

    $codigo = $_POST["codigo"];
    $nombre = $_POST["nombre"];
    $pais = $_POST["pais"];
    $provincia = $_POST["provincia"];
    $direccion = $_POST["direccion"];
    $tipo_cliente = $_POST["tipo_cliente"];
    $telefono = $_POST["telefono"];
    $referencia = $_POST["referencia"];
    $rnc = $_POST["rnc"];
    $condicion = $_POST["condicion"];
    $credito = $_POST["credito"];

ECHO $empresa;

    $insert_cliente = $conexion->query("INSERT INTO $empresa.tbl_clientes
    (`nombre_cliente`, `Pais`, `provincia`, `direccion`, `telefono_cliente`, `tipo_cliente`, `referencia`, `rnc_cliente`, `creado_por`,`limite_credito`, `condicion_pago`, `status`)
     VALUES ('$nombre','$pais','$provincia','$direccion','$telefono','$tipo_cliente','$referencia','$rnc','$usuario','$credito','$condicion','Activo')");
    header("location:../../views/administracion/crear_impuesto.php?creado='si'");
?>