<?php
    include("../conexion/cone.php");
    session_start();
    $empresa= $_SESSION["empresa_db"];

    $id = $_POST["id"];
    $cantidad = $_POST["cantidad"];

    echo $id."".$cantidad;

    //aqui se aguregara que sume al inventario lo que se borro por la devolucion

    //$resultado = $conexion->query("delete from $empresa.tbl_art_compras where no_compra = $id");
    /*
    function ActualizarCantidades_negativo($var_cantidad,$articulo)
        {
            include("../conexion/cone.php");
            $empresa= $_SESSION["empresa_db"];
            try {
                //code...
                    echo $var_cantidad;
                    $consulta_cantidad = $conexion->query("SELECT cantidad_actual FROM $empresa.tbl_articulos where nombre = '$articulo' ");
                    $registro_cantidad = $consulta_cantidad->fetch_assoc();
                    if($consulta_cantidad->num_rows >= 1 ){
                        $cantidad_art_actual = $registro_cantidad["cantidad_actual"];
                        $cantidad_art_Nueva = $cantidad_art_actual - $var_cantidad;
                        $Aumentar_cantidad_articulos = $conexion->query("UPDATE $empresa.tbl_articulos set cantidad_actual = $cantidad_art_Nueva WHERE nombre = '$articulo'");
                    }else{
                        $Reg_New_artCantidad = $conexion->query("insert into $empresa.tbl_articulos (cantidad_actual) values ($var_cantidad)");
                    }
                } catch (\Throwable $th) {
                    //throw $th;
                }
        };
*/
    //header('location: ../../views/compras/frm_compras.php')
?>