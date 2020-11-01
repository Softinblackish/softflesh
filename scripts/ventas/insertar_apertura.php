<?php
     include("../conexion/cone.php");
     session_start();
     $empresa= $_SESSION["empresa_db"];
     
     $modificar = $_GET["actualizar"];

     if(isset($modificar))
     {
         $modificar = $conexion->query("UPDATE $empresa.tbl_cajas SET apertura = 0 where id_caja = $modificar");
     }
     else{
        $apertura = $_POST["apertura"];
        $id = $_POST["caja"];
        $apertura = $conexion->query("UPDATE $empresa.tbl_cajas SET apertura = $apertura where id_caja = $id");
     }
     header("location:../../views/venta/cierre_ventas.php");

?>