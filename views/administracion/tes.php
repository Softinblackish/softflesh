<?php
    $conexion = new mysqli("localhost","root","","softflesh");
    $prueba = $conexion->query("SELECT tbl_cuentas_contables.nombre_cuenta as cuenta2, tbl_sub_cuentas.nombre_cuenta as cuenta4 FROM tbl_cuentas_contables, tbl_sub_cuentas where tbl_cuentas_contables.estado = 1");
    while($prueba2 = $prueba->fetch_assoc())
    {
        echo $prueba2["cuenta2"];
        echo $prueba2["cuenta4"];
    }
?>