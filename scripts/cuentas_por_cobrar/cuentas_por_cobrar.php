<?php
    include("../conexion/cone.php");
    session_start();
    $empresa= $_SESSION["empresa_db"];
    $cliente= $_POST['cliente']; 
    $intereses=$_POST["intereses"]; 
    $meses=$_POST['meses']; 
    $amortizacion= $_POST['amortizacion']; 
    $frecuencia= $_POST['frecuencia']; 
    $cobrador= $_POST['cobrador'];
    $porciento= $_POST['porciento'];
    $valor_prestamo= $_POST['valor'];
    $total_prestamo= $_POST['total'];
    $cuotas= $_POST['cuotas'];

    
   
        $conexion->query("INSERT into $empresa.tbl_prestamos (id_cliente, meses, cuotas, intereses, amortizacion, frecuencia, cobrador, creado_por, porciento_intereses, valor_prestamo, total_prestamo, estado )
            values ($cliente, $meses, $cuotas, $intereses, '$amortizacion', '$frecuencia', '$cobrador', 'no seleccion', $porciento, $valor_prestamo, $total_prestamo, 'Pendiente' )");
        $conexion->query("INSERT into $empresa.tbl_cuentas_c (id_cliente, valor, origen)
            values ($cliente, $total_prestamo, 'Prestamo' )");
    
?>