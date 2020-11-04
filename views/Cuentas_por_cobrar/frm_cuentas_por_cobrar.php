<!--AQUI VA UN FORMULARIO/OS DE CUENTAS POR COBRAR SIN PHP, SIN CSS-->

<!--PHP-->
<?php include("../base.php") ?>
<!--CSS-->
<link rel="stylesheet" href="../../css/cuentas_por_cobrar.css">
<!--JS-->
<script type="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../../scripts/js/time_alert.js"></script>

<div class="container-articulos">
	<div class="container form-row">
		<form id="form" action="../../scripts/cuentas_por_cobrar/cuentas_por_cobrar.php" method="post">
			<div class="cabeza">
				<!--msj de verificacion-->
				<?php if(isset($_GET["registro"])){ ?>
	                <div class="alert alert-warning alert-dismissible fade show" role="alert">
	                     <strong>listo! </strong> Nuevo artículo registrado
	                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                        <span aria-hidden="true">&times;</span>
	                    </button>
	                </div>
	            <?php } ?>
	            
				<!--fin-->
				<h2>Agregar Cuentas por Cobrar</h2>
			</div>
			<div class=form-row>
				<div class="form-group col-md-12">
					<input type="text" name="nombre" placeholder="Nombre del Cliente" class="form-control">
				</div>	
			</div>
			<div class=form-row>			
				<div class="form-group col-md-12">
					<textarea name="detalle"
					cols="50" rows="3" placeholder="Detalle sobre las condiciones" class="form-control"></textarea>
				</div>
			</div>
			<div class=form-row>			
				<div class="form-group col-md-4">		
					<input type="text" name="cantidad"placeholder="Cantidad" class="form-control">
				</div>
				<div class="form-group col-md-4">
					<input type="text" name="precio"placeholder="Precio" class="form-control">
				</div>
				<div class="form-group col-md-4">	
					<input type="text" name="total"placeholder="Total" class="form-control">
				</div>
			</div>
			<br>
			<input type="submit" id="btn" class="btn btn" value="Registrar cobro" >

			<a href="../administracion/administracion.php" id="btn" class="btn btn" >Volver atras</a>
		</form>
	</div>
</div>