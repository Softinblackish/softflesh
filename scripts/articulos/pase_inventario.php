<?php
    include("../conexion/cone.php");
    session_start();
    $empresa = $_SESSION["empresa_db"];
    $contador = 0;
    $id_ident=random_int(1,99999999);

    while($contador<2000)
     {
    if(isset($_POST['articulo'.$contador]))
    {
        $id_articulo = $_POST['articulo'.$contador];
        $consulta_articulos = $conexion->query("SELECT * FROM $empresa.tbl_articulos WHERE id_articulo = $id_articulo");
        $resultado_articulo = $consulta_articulos->fetch_assoc();
        echo $resultado_articulo['nombre'];
        $id_art=$resultado_articulo['id_articulo']; 
        $categoria=$resultado_articulo['categoria'];
        $cantidad_en_sistema=$resultado_articulo['cantidad_actual'];
        $cantidad_fisica=$_POST['cantidad'.$contador];
        $diferencia = $cantidad_en_sistema - $cantidad_fisica;
        $Reg_inser_articulo = $conexion->query( "INSERT into $empresa.tbl_pase_inventario_det ( id_articulo, id_identificador, categoria, cantidad_en_sistema, cantidad_fisica, diferencia)
         values ($id_art, $id_ident, '$categoria', $cantidad_en_sistema, $cantidad_fisica, $diferencia)");
    }

    $contador++;

    }
?>