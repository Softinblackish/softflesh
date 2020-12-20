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
    $credito = $_POST["credito"];
    $tipo_identificacion= $_POST["tipo_identificacion"];
    $correo = $_POST["correo"];

    $insert_cliente = $conexion->query("INSERT INTO $empresa.tbl_clientes
    (`nombre_cliente`, `Pais`, `provincia`, `direccion`, `telefono_cliente`, `tipo_cliente`,`tipo_identificacion`,`correo`, `referencia`, `rnc_cliente`, `creado_por`,`limite_credito`,`status`)
     VALUES ('$nombre','$pais','$provincia','$direccion','$telefono','$tipo_cliente',$tipo_identificacion,'$correo','$referencia','$rnc','$usuario','$credito','Activo')");
    header("location:../../views/clientes/ver_clientes.php");
?>