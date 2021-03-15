<?php include("../base.php");
?>
<link rel="stylesheet" href="../../css/usuarios.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="../../scripts/js/usuarios.js"></script>
<div id="box_lista">
<h2>Catalogo de cuentas</h2>
<br>
<div style="background-color:#0e444c; padding:10px; color:white">
    <div class="row">
        <div class="col-md-3"> <small><strong>Nombre de la cuenta</strong></small> </div>
        <div class="col-md-3"> <small><strong> Num. de la cuenta</strong></small></div>
        <div class="col-md-3"> <small><strong> Valor Inicial</strong></small></div>
        <div class="col-md-3"> <small><strong> Valor Actual</strong></small></div>
    </div>
</div>
<br>
<div>
    <h3>Activos</h3>
    <div class="row">
        <?php
            $lista_activos = $conexion->query("SELECT * FROM $empresa.tbl_cuentas_contables where tipo = 1");
            while($activos = $lista_activos->fetch_assoc())
            {
            ?>
                   
                <div class="col-md-3"><strong>  <?php echo $activos['nombre_cuenta']; ?> </strong> </div>
                <div class="col-md-3"> <?php echo $activos['numero_cuenta']; ?> </div>
                <div class="col-md-3"><?php echo $activos['valor_inicial']; ?></div>
                <div class="col-md-3"><?php echo $activos['valor_actual']; ?></div>
            <?php
                $numero_madre = $activos['numero_cuenta'];
                $lista_sub_activos = $conexion->query("SELECT * FROM $empresa.tbl_sub_cuentas where cuenta_madre = $numero_madre");
                while($sub_activos = $lista_sub_activos->fetch_assoc())
                {
                ?>
                    <div class="col-md-3 sub"> <?php echo $sub_activos['nombre_cuenta']; ?></div>
                    <div class="col-md-3 datos_sub"> <?php echo $sub_activos['numero_cuenta']; ?></div>
                    <div class="col-md-3 "><?php echo $sub_activos['valor_inicial']; ?></div>
                    <div class="col-md-3 "><?php echo $sub_activos['valor_actual']; ?></div>
                <?php
                    $numero_sub_cuenta = $sub_activos['numero_cuenta'];
                    $lista_detalle = $conexion->query("SELECT * FROM $empresa.tbl_cuentas_detalles where sub_cuenta = '$numero_sub_cuenta' ");
                    while($detalles = $lista_detalle->fetch_assoc())
                    {
                    ?>
                        <div class="col-md-3 sub x2"> <?php echo $detalles['nombre_cuenta']; ?></div>
                        <div class="col-md-3 datos_sub"> <?php echo $detalles['numero_cuenta']; ?></div>
                        <div class="col-md-3 "><?php echo $detalles['valor_inicial']; ?></div>
                        <div class="col-md-3 "><?php echo $detalles['valor_actual']; ?></div>
                    <?php
                    }
                }
            }
        ?>
    </div>
</div>
<br>
<div>
    <h5>Pasivo</h5>
    <div class="row">
    <?php
            $lista_activos = $conexion->query("SELECT * FROM $empresa.tbl_cuentas_contables where tipo = 2");
            while($activos = $lista_activos->fetch_assoc())
            {
            ?>
                   
                <div class="col-md-3"><strong>  <?php echo $activos['nombre_cuenta']; ?> </strong> </div>
                <div class="col-md-3"> <?php echo $activos['numero_cuenta']; ?> </div>
                <div class="col-md-3"><?php echo $activos['valor_inicial']; ?></div>
                <div class="col-md-3"><?php echo $activos['valor_actual']; ?></div>
            <?php
                $numero_madre = $activos['numero_cuenta'];
                $lista_sub_activos = $conexion->query("SELECT * FROM $empresa.tbl_sub_cuentas where cuenta_madre = $numero_madre");
                while($sub_activos = $lista_sub_activos->fetch_assoc())
                {
                ?>
                    <div class="col-md-3 sub"> <?php echo $sub_activos['nombre_cuenta']; ?></div>
                    <div class="col-md-3 datos_sub"> <?php echo $sub_activos['numero_cuenta']; ?></div>
                    <div class="col-md-3 "><?php echo $sub_activos['valor_inicial']; ?></div>
                    <div class="col-md-3 "><?php echo $sub_activos['valor_actual']; ?></div>
                <?php
                    $numero_sub_cuenta = $sub_activos['numero_cuenta'];
                    $lista_detalle = $conexion->query("SELECT * FROM $empresa.tbl_cuentas_detalles where sub_cuenta = '$numero_sub_cuenta' ");
                    while($detalles = $lista_detalle->fetch_assoc())
                    {
                    ?>
                        <div class="col-md-3 sub x2"> <?php echo $detalles['nombre_cuenta']; ?></div>
                        <div class="col-md-3 datos_sub"> <?php echo $detalles['numero_cuenta']; ?></div>
                        <div class="col-md-3 "><?php echo $detalles['valor_inicial']; ?></div>
                        <div class="col-md-3 "><?php echo $detalles['valor_actual']; ?></div>
                    <?php
                    }
                }
            }
        ?>
    </div>
</div>
<br>
<div>
    <h5>Capital</h5>
    <div class="row">
    <?php
            $lista_activos = $conexion->query("SELECT * FROM $empresa.tbl_cuentas_contables where tipo = 3");
            while($activos = $lista_activos->fetch_assoc())
            {
            ?>
                   
                <div class="col-md-3"><strong>  <?php echo $activos['nombre_cuenta']; ?> </strong> </div>
                <div class="col-md-3"> <?php echo $activos['numero_cuenta']; ?> </div>
                <div class="col-md-3"><?php echo $activos['valor_inicial']; ?></div>
                <div class="col-md-3"><?php echo $activos['valor_actual']; ?></div>
            <?php
                $numero_madre = $activos['numero_cuenta'];
                $lista_sub_activos = $conexion->query("SELECT * FROM $empresa.tbl_sub_cuentas where cuenta_madre = $numero_madre");
                while($sub_activos = $lista_sub_activos->fetch_assoc())
                {
                ?>
                    <div class="col-md-3 sub"> <?php echo $sub_activos['nombre_cuenta']; ?></div>
                    <div class="col-md-3 datos_sub"> <?php echo $sub_activos['numero_cuenta']; ?></div>
                    <div class="col-md-3 "><?php echo $sub_activos['valor_inicial']; ?></div>
                    <div class="col-md-3 "><?php echo $sub_activos['valor_actual']; ?></div>
                <?php
                    $numero_sub_cuenta = $sub_activos['numero_cuenta'];
                    $lista_detalle = $conexion->query("SELECT * FROM $empresa.tbl_cuentas_detalles where sub_cuenta = '$numero_sub_cuenta' ");
                    while($detalles = $lista_detalle->fetch_assoc())
                    {
                    ?>
                        <div class="col-md-3 sub x2"> <?php echo $detalles['nombre_cuenta']; ?></div>
                        <div class="col-md-3 datos_sub"> <?php echo $detalles['numero_cuenta']; ?></div>
                        <div class="col-md-3 "><?php echo $detalles['valor_inicial']; ?></div>
                        <div class="col-md-3 "><?php echo $detalles['valor_actual']; ?></div>
                    <?php
                    }
                }
            }
        ?>
    </div>
</div>
<br>
<div>
    <h5>Ingresos</h5>
    <div class="row">
    <?php
            $lista_activos = $conexion->query("SELECT * FROM $empresa.tbl_cuentas_contables where tipo = 4");
            while($activos = $lista_activos->fetch_assoc())
            {
            ?>
                   
                <div class="col-md-3"><strong>  <?php echo $activos['nombre_cuenta']; ?> </strong> </div>
                <div class="col-md-3"> <?php echo $activos['numero_cuenta']; ?> </div>
                <div class="col-md-3"><?php echo $activos['valor_inicial']; ?></div>
                <div class="col-md-3"><?php echo $activos['valor_actual']; ?></div>
            <?php
                $numero_madre = $activos['numero_cuenta'];
                $lista_sub_activos = $conexion->query("SELECT * FROM $empresa.tbl_sub_cuentas where cuenta_madre = $numero_madre");
                while($sub_activos = $lista_sub_activos->fetch_assoc())
                {
                ?>
                    <div class="col-md-3 sub"> <?php echo $sub_activos['nombre_cuenta']; ?></div>
                    <div class="col-md-3 datos_sub"> <?php echo $sub_activos['numero_cuenta']; ?></div>
                    <div class="col-md-3 "><?php echo $sub_activos['valor_inicial']; ?></div>
                    <div class="col-md-3 "><?php echo $sub_activos['valor_actual']; ?></div>
                <?php
                    $numero_sub_cuenta = $sub_activos['numero_cuenta'];
                    $lista_detalle = $conexion->query("SELECT * FROM $empresa.tbl_cuentas_detalles where sub_cuenta = '$numero_sub_cuenta' ");
                    while($detalles = $lista_detalle->fetch_assoc())
                    {
                    ?>
                        <div class="col-md-3 sub x2"> <?php echo $detalles['nombre_cuenta']; ?></div>
                        <div class="col-md-3 datos_sub"> <?php echo $detalles['numero_cuenta']; ?></div>
                        <div class="col-md-3 "><?php echo $detalles['valor_inicial']; ?></div>
                        <div class="col-md-3 "><?php echo $detalles['valor_actual']; ?></div>
                    <?php
                    }
                }
            }
        ?>
    </div>
</div>
<br>
<div>
    <h5>Costos</h5>
    <div class="row">
    <?php
            $lista_activos = $conexion->query("SELECT * FROM $empresa.tbl_cuentas_contables where tipo = 5");
            while($activos = $lista_activos->fetch_assoc())
            {
            ?>
                   
                <div class="col-md-3"><strong>  <?php echo $activos['nombre_cuenta']; ?> </strong> </div>
                <div class="col-md-3"> <?php echo $activos['numero_cuenta']; ?> </div>
                <div class="col-md-3"><?php echo $activos['valor_inicial']; ?></div>
                <div class="col-md-3"><?php echo $activos['valor_actual']; ?></div>
            <?php
                $numero_madre = $activos['numero_cuenta'];
                $lista_sub_activos = $conexion->query("SELECT * FROM $empresa.tbl_sub_cuentas where cuenta_madre = $numero_madre");
                while($sub_activos = $lista_sub_activos->fetch_assoc())
                {
                ?>
                    <div class="col-md-3 sub"> <?php echo $sub_activos['nombre_cuenta']; ?></div>
                    <div class="col-md-3 datos_sub"> <?php echo $sub_activos['numero_cuenta']; ?></div>
                    <div class="col-md-3 "><?php echo $sub_activos['valor_inicial']; ?></div>
                    <div class="col-md-3 "><?php echo $sub_activos['valor_actual']; ?></div>
                <?php
                    $numero_sub_cuenta = $sub_activos['numero_cuenta'];
                    $lista_detalle = $conexion->query("SELECT * FROM $empresa.tbl_cuentas_detalles where sub_cuenta = '$numero_sub_cuenta' ");
                    while($detalles = $lista_detalle->fetch_assoc())
                    {
                    ?>
                        <div class="col-md-3 sub x2"> <?php echo $detalles['nombre_cuenta']; ?></div>
                        <div class="col-md-3 datos_sub"> <?php echo $detalles['numero_cuenta']; ?></div>
                        <div class="col-md-3 "><?php echo $detalles['valor_inicial']; ?></div>
                        <div class="col-md-3 "><?php echo $detalles['valor_actual']; ?></div>
                    <?php
                    }
                }
            }
        ?>
  
    </div>
</div>
<br>
<div>
    <h5>Gastos</h5>
    <div class="row">
    <?php
            $lista_activos = $conexion->query("SELECT * FROM $empresa.tbl_cuentas_contables where tipo = 6");
            while($activos = $lista_activos->fetch_assoc())
            {
            ?>
                   
                <div class="col-md-3"><strong>  <?php echo $activos['nombre_cuenta']; ?> </strong> </div>
                <div class="col-md-3"> <?php echo $activos['numero_cuenta']; ?> </div>
                <div class="col-md-3"><?php echo $activos['valor_inicial']; ?></div>
                <div class="col-md-3"><?php echo $activos['valor_actual']; ?></div>
            <?php
                $numero_madre = $activos['numero_cuenta'];
                $lista_sub_activos = $conexion->query("SELECT * FROM $empresa.tbl_sub_cuentas where cuenta_madre = $numero_madre");
                while($sub_activos = $lista_sub_activos->fetch_assoc())
                {
                ?>
                    <div class="col-md-3 sub"> <?php echo $sub_activos['nombre_cuenta']; ?></div>
                    <div class="col-md-3 datos_sub"> <?php echo $sub_activos['numero_cuenta']; ?></div>
                    <div class="col-md-3 "><?php echo $sub_activos['valor_inicial']; ?></div>
                    <div class="col-md-3 "><?php echo $sub_activos['valor_actual']; ?></div>
                <?php
                    $numero_sub_cuenta = $sub_activos['numero_cuenta'];
                    $lista_detalle = $conexion->query("SELECT * FROM $empresa.tbl_cuentas_detalles where sub_cuenta = '$numero_sub_cuenta' ");
                    while($detalles = $lista_detalle->fetch_assoc())
                    {
                    ?>
                        <div class="col-md-3 sub x2"> <?php echo $detalles['nombre_cuenta']; ?></div>
                        <div class="col-md-3 datos_sub"> <?php echo $detalles['numero_cuenta']; ?></div>
                        <div class="col-md-3 "><?php echo $detalles['valor_inicial']; ?></div>
                        <div class="col-md-3 "><?php echo $detalles['valor_actual']; ?></div>
                    <?php
                    }
                }
            }
        ?>
    </div>
</div>
<br>
<div>
    <h5>Otros</h5>
    <div class="row">
    <?php
            $lista_activos = $conexion->query("SELECT * FROM $empresa.tbl_cuentas_contables where tipo = 7");
            while($activos = $lista_activos->fetch_assoc())
            {
            ?>
                   
                <div class="col-md-3"><strong>  <?php echo $activos['nombre_cuenta']; ?> </strong> </div>
                <div class="col-md-3"> <?php echo $activos['numero_cuenta']; ?> </div>
                <div class="col-md-3"><?php echo $activos['valor_inicial']; ?></div>
                <div class="col-md-3"><?php echo $activos['valor_actual']; ?></div>
            <?php
                $numero_madre = $activos['numero_cuenta'];
                $lista_sub_activos = $conexion->query("SELECT * FROM $empresa.tbl_sub_cuentas where cuenta_madre = $numero_madre");
                while($sub_activos = $lista_sub_activos->fetch_assoc())
                {
                ?>
                    <div class="col-md-3 sub"> <?php echo $sub_activos['nombre_cuenta']; ?></div>
                    <div class="col-md-3 datos_sub"> <?php echo $sub_activos['numero_cuenta']; ?></div>
                    <div class="col-md-3 "><?php echo $sub_activos['valor_inicial']; ?></div>
                    <div class="col-md-3 "><?php echo $sub_activos['valor_actual']; ?></div>
                <?php
                    $numero_sub_cuenta = $sub_activos['numero_cuenta'];
                    $lista_detalle = $conexion->query("SELECT * FROM $empresa.tbl_cuentas_detalles where sub_cuenta = '$numero_sub_cuenta' ");
                    while($detalles = $lista_detalle->fetch_assoc())
                    {
                    ?>
                        <div class="col-md-3 sub x2"> <?php echo $detalles['nombre_cuenta']; ?></div>
                        <div class="col-md-3 datos_sub"> <?php echo $detalles['numero_cuenta']; ?></div>
                        <div class="col-md-3 "><?php echo $detalles['valor_inicial']; ?></div>
                        <div class="col-md-3 "><?php echo $detalles['valor_actual']; ?></div>
                    <?php
                    }
                }
            }
        ?>
    </div>
</div>

<!-- Modal -->
