<!--  AQUI DEBE DE IR SOLAMENTE UN FORMULARIO DE REGISTRO DE SUPLIDORES 
      SOLO HTML SIN CSS SIN JAVASCRIP SIN PHP-->
<?php include("../base.php"); 
$consulta_suplidores = $conexion->query("SELECT id_sup FROM $empresa.tbl_suplidores ORDER BY id_sup desc limit 1");
$registro_suplidores = $consulta_suplidores->fetch_assoc();
if($consulta_suplidores->num_rows >= 1 ){
    $id_nuevo_suplidor = $registro_suplidores["id_sup"] + 1;
}else{
    $id_nuevo_suplidor = 1;
}

?>

<link rel="stylesheet" href="../../css/suplidores.css">
<script src="../../scripts/js/time_alert.js"></script>
<div class="container-cuentas-por-cobrar">
    <div class="container form-row">
        <form id="form" action="../../scripts/suplidores/suplidores.php" method="post">
            <div class="cabeza">
                <?php if(isset($_GET["registro"])){ ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>listo! </strong> Nuevo Suplidor registrado
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } ?>
               <h2> Registro de Suplidores</h2>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <input type="text" name="codigo_sup" placeholder ="Codigo" readonly class="form-control" value="<?php echo $id_nuevo_suplidor; ?>" >
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="nombre_sup" placeholder ="nombre suplidor" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="contacto_sup" placeholder ="contacto" class="form-control" >
                </div>
            </div>

            <label for="inputState">Telefonos de contacto: </label><br>
            <div class="form-row">
                <div class="form-group col-md-4">

                    <input type="tel" name="tel_no1_sup" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder ="(000)-000-0000" class="form-control " >

                    <!--<input type="tel" name="tel_no1_sup"  placeholder ="(000)-000-0000" class="form-control movil" >-->

                </div>
                <div class="form-group col-md-4">
                    <input type="tel" name="tel_no2_sup" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder ="(000)-000-0000" class="form-control ">
                </div>
                <div class="form-group col-md-4">
                    <input type="tel" name="tel_no3_sup" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder ="(000)-000-0000" class="form-control " >
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <input type="text" name="nota_sup" placeholder ="Comentario" class="form-control" >
                </div>
                <div class="form-group col-md-6">
                    <input type="text" name="rnc_sup" placeholder ="RNC" class="form-control">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" name="sector_sup" placeholder ="Sector" class="form-control" >
                </div>
                <div class="form-group col-md-6">
                    <input type="text" name="ciudad_sup" placeholder ="Ciudad" class="form-control">
                </div>
            </div>

            <!--Aqui va la tabla de suplidores a Registrar-->
            <!--
            <table class="table">
                <h5 class="cabeza_tabla" >Suplidores ingresados</h5>
                <thead>      
                    
                    <tr>
                        <th scope="col" style="width:60%;">codigo</th>
                        <th scope="col" style="width:8%;">nombre</th>
                        <th scope="col" style="width:15%;"> contacto </th>
                        <th scope="col" style="width:15%;"> tel#1 </th>
                        <th scope="col" style="width:15%;"> RNC </th>
                    </tr>

                </thead>
                <tbody>
                    <?php
                        if(isset($_GET["id_temp"]))
                        {
                                $id=$_GET["id_temp"];
                                $consulta_suplidores = $conexion->query("select * from $empresa.tbl_suplidores where codigo_sup= $id");
                        }else
                        {
                            $consulta_suplidores = $conexion->query("select * from $empresa.tbl_suplidores limit 5");
                        }  
                        while($reg_suplidores = $consulta_suplidores->fetch_assoc())
                                {
                    ?>
                                        <tr>
                                        <th><?php  echo $reg_suplidores["codigo_sup"]; ?></th>
                                        <td><?php  echo $reg_suplidores["nombre_sup"]; ?></td>
                                        <td><?php  echo $reg_suplidores["contacto_sup"]; ?></td>
                                        <td><?php  echo $reg_suplidores["tel_no1_sup"]; ?></td>
                                        <td><?php  echo $reg_suplidores["rnc_sup"]; ?></td>
                                        <td><a href="../../scripts/ventas/eliminar_arti_temp.php?id_articulo=<?php echo $reg_suplidores['id_art_temp']; ?> && id_temp=<?php echo $id; ?>" class="btn btn-danger"><i class="fa fa-times fa-lg"></i></a></td> 
                                        </tr>
                    <?php
                                }
                    ?>
                </tbody>
            </table>
                            -->
            <label class="form-check-label" for="gridCheck">
                    Haga click en guardar para registrar este nuevo suplidor 
            </label>
            <br>
            <button type="submit" id="btn" class="btn btn">registrar</button>
            <a href="../administracion/administracion.php" id="btn" class="btn btn" >Volver atras</a>
            <br>
            <br>
        </form>
    </div>    
</div>