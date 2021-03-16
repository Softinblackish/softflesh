<?php
    include('../conexion/cone.php');
    session_start();
    $empresa = $_SESSION['empresa_db'];

    $area = $_POST['area'];
    
    $verificacion = $conexion->query("SELECT * FROM $empresa.tbl_asientos where area = '$area'");
    while($registros = $verificacion->fetch_assoc())
    {
        $id = $registros['id_asiento'];
        $actualizar_predeterminado = $conexion->query("UPDATE $empresa.tbl_asientos SET predeterminado = 0 WHERE id_asiento = $id ");
    }
    $conteo=1;
    while($conteo < 100)
    {
        if(isset($_POST['campos_ventas'.$conteo]))
        {
            $campo = $_POST['campos_ventas'.$conteo] ;
            $fila = $_POST['fila_asiento'.$conteo];
           $actualizar = $conexion->query("UPDATE $empresa.tbl_asientos SET campo_vinculado = '$campo' WHERE id_asiento = $fila");
            
        }
        
        if(isset($_POST['predeterminado']))
            {
                $actualizar_predeterminado = $conexion->query("UPDATE $empresa.tbl_asientos SET predeterminado = 1 WHERE id_asiento = $fila");
            }
        $conteo= $conteo + 1;
    }
    if($area == "ventas")
    {
        header('location:../../views/administracion/asientos_contables.php');
    }
    if($area == "compras")
    {
        header('location:../../views/administracion/asientos_contables_compra.php');
    }
?>