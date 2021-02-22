<?php
    include('../conexion/cone.php');
    session_start();
    $empresa= $_SESSION["empresa_db"];

    $tipo = $_POST['tipo'];

    $consulta= $conexion->query("SELECT * FROM $empresa.tbl_sub_cuentas where tipo = '$tipo'");
    ?>
       <select name="listado_sub-cuenta" class="form-control" >
    <?php
    while($row = $consulta->fetch_assoc())
    {
        ?>
            <option value="<?php echo $row['numero_cuenta']; ?>"> <?php echo $row['nombre_cuenta']; ?></option> 
        <?php
    }
    ?>
       </select> 
 <?php
?>