<?php
    include('../conexion/cone.php');

    session_start();
    $empresa = $_SESSION["empresa_db"];
    $usuario = $_SESSION["user"];

    $nombre = $_POST['nombre_cuenta'];
    $cuenta_madre = $_POST['cuenta_madre'];
    $tipo = $_POST['tipo'];
    $valor_inicial= $_POST['valor_nombre_cuenta'];
    $sub_cuenta= $_POST['nombre_sub-cuenta'];
    $valor_sub_cuenta = $_POST['valor_sub-cuenta'];
    $cuenta_detalle =  $_POST['nombre_cuenta_detalle'];
    $valor_cuenta_detalle =  $_POST['valor_cuenta_detalle'];
    $lista_sub_cuenta = $_POST['listado_sub-cuenta'];
    
    # Agregar cuenta a las cuentas principales o cuentas madres del catalogo de cuentas

    $revision_existencia_cuenta = $conexion->query("SELECT * FROM $empresa.tbl_cuentas_contables where tipo = $tipo");
    $existencia = $revision_existencia_cuenta->num_rows;

    $numero_cuenta = $tipo.".".$existencia;

    if($nombre != null )
    {
       $insertar_cuenta = $conexion->query("INSERT INTO $empresa.tbl_cuentas_contables (numero_cuenta, nombre_cuenta, valor_inicial, valor_actual, tipo, creado_por) values ('$numero_cuenta','$nombre',$valor_inicial, $valor_inicial,$tipo, '$usuario' )");
    }


    #agregar nueva sub cuenta al catalogo de cuentas
    if($sub_cuenta != null)
    {
        $revision_existencia_sub_cuenta = $conexion->query("SELECT * FROM $empresa.tbl_sub_cuentas where cuenta_madre = $cuenta_madre");
        $existencia = $revision_existencia_sub_cuenta->num_rows;
        
        $numero_cuenta = $cuenta_madre.".".$existencia;

        if($cuenta_madre != null )
        {
        $insertar_cuenta = $conexion->query("INSERT INTO $empresa.tbl_sub_cuentas (numero_cuenta, nombre_cuenta, valor_inicial, valor_actual,cuenta_madre, tipo, creado_por) values ('$numero_cuenta','$sub_cuenta',$valor_sub_cuenta,$valor_sub_cuenta,'$cuenta_madre',$tipo, '$usuario' )");
        }
    }

    #agregar nueva cuenta detalle al catalogo de cuentas

    if($cuenta_detalle != null)
    {
        $revision_existencia_cuenta_detalle = $conexion->query("SELECT * FROM $empresa.tbl_cuentas_detalles where sub_cuenta = '$lista_sub_cuenta'");
        $existencia = $revision_existencia_cuenta_detalle->num_rows;
        
        $numero_cuenta = $lista_sub_cuenta.".".$existencia;

        if($lista_sub_cuenta != null )
        {
        $insertar_cuenta = $conexion->query("INSERT INTO $empresa.tbl_cuentas_detalles (numero_cuenta, nombre_cuenta, valor_inicial, valor_actual, cuenta_madre, sub_cuenta, tipo, creado_por) values ('$numero_cuenta','$cuenta_detalle', $valor_cuenta_detalle, $valor_cuenta_detalle,'$cuenta_madre','$lista_sub_cuenta','$tipo', '$usuario' )");
        }
    }




?>
