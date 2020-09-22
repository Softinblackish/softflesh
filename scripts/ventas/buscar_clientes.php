<?php
    include("../conexion/cone.php");
    session_start();
    $empresa= $_SESSION["empresa_db"];

    $dato = $_POST["nombre"];
    if(!empty($dato))
    {
        $consulta_clientes = $conexion->query("SELECT * FROM $empresa.tbl_clientes where nombre_cliente LIKE '%$dato%'");
    ?>
        <select name="client" style="width:120%;" class="form-control" required>  
    <?php
        while($registros_clientes = $consulta_clientes->fetch_assoc())
        {
        ?>
            <option value="<?php echo $registros_clientes["id_cliente"]?>"><?php echo $registros_clientes["id_cliente"]."| ".$registros_clientes["nombre_cliente"];?></option>
        <?php
        }
    }
?>
