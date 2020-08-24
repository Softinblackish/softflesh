<?php
    include("../conexion/cone.php");

    $nombre= $_POST['nombre']; 
    $descripcion=$_POST["descripcion"]; 
    $codigo=$_POST['codigo']; 
    $cantidad= $_POST['stop_min']; 
    $codigo_barra= $_POST['codigo_barra']; 
    $categoria=$_POST['categoria']; 
    $unidad=$_POST['unidad'];
    $impuesto = $_POST["impuesto"];
        
    $conexion->query("insert into articulos (nombre, descripcion, codigo_barra, cod_impuesto, stop_min,  categoria, unidad)
            values ('$nombre', '$descripcion', '$codigo_barra', $impuesto , '$cantidad', 
            '$categoria','$unidad')");
    
    if (conexion) {
        ?>
            <div class="alert alert-primary" role="alert">
                Datos de Articulos guardados correctamente....
            </div>
        <?php
    }else{
        ?>
            <div class="alert alert-danger" role="alert">
                Error al guardar los articulos...
            </div>
        <?php
    }        
    header('location: ../../views/articulos/articulos.php')
?>