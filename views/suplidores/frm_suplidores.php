<!--  AQUI DEBE DE IR SOLAMENTE UN FORMULARIO DE REGISTRO DE SUPLIDORES 
      SOLO HTML SIN CSS SIN JAVASCRIP SIN PHP-->
      <?php include("../base.php"); ?>
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
                    <input type="text" name="codigo_sup" placeholder ="Codigo" class="form-control" >
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="nombre_sub" placeholder ="nombre suplidor" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="contacto_sup" placeholder ="contacto" class="form-control" >
                </div>
            </div>

            <label for="inputState">Telefonos de contacto: </label><br>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <input type="tel" name="tel_no1_sup" placeholder ="tel no 1" class="form-control" >
                </div>
                <div class="form-group col-md-4">
                    <input type="tel" name="tel_no2_sub" placeholder ="tel no 2" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <input type="tel" name="tel_no3_sup" placeholder ="tel no 3" class="form-control" >
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

        

            <label class="form-check-label" for="gridCheck">
                    Haga click en guardar para registrar este nuevo artículo 
            </label>
            <br>
            <button type="submit" id="btn" class="btn btn">registrar</button>
            <a href="../administracion/administracion.php" id="btn" class="btn btn" >Volver atras</a>
            <br>
            <br>
        </form>
    </div>    
</div>