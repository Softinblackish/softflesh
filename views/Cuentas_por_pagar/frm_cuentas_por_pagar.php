<!--AQUI VA UN FORMULARIO/OS DE CUENTAS POR PAGAR SIN PHP, SIN CSS-->

<!--PHP-->
<?php include("../base.php") ?>
<!--CSS-->
<link rel="stylesheet" href="../../css/cuentas_por_pagar.css">
<!--JS-->
<script type="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../../scripts/js/time_alert.js"></script>

<div class="container-articulos">
	<div class="container form-row">
		<form id="form" action="../../scripts/Cuentas_por_pagar/cuentas_por_pagar.php" method="post">
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
				<h2>Agregar Cuentas por Pagar</h2>
			</div>
			<div class=form-row>
				<div class="form-group col-md-12">
					<input type="text" name="servicios" placeholder=" Servicios " class="form-control">
				</div>	
				<div class="form-group col-md-3">
					 <label for="inputState">Pago Inicial:</label>
					<input type="number" name="inicial"  class="form-control" value="0">
				</div>	
				<div class="form-group col-md-3">
				<label for="inputState">Saldo:</label>
					<input type="nummber" name="saldo"  class="form-control" value="0">
				</div>	
				<div class="form-group col-md-3">
				<label for="inputState">Cant de Pagos:</label>
					<input type="number" name="cant_pagos" class="form-control">
				</div>
				<div class="form-group col-md-3">
                <label for="inputState">Tipo de Pago:</label>
                    <select id="inputState" class="form-control" name="tipo_pago">
                            <option selected="">Corto Plazo</option>
                            <option selected="">Largo Plazo</option>
                    </select>
				</div>
				<div class="form-group col-md-3">	
					<label for="inputState">Pago Mensual</label>	
					<input type="number" name="pago_mensual"  class="form-control">
				</div>
				<div class="form-group col-md-3">	
					<label for="inputState">Pago Anual</label>	
					<input type="number" name="pago_anual"  class="form-control"value="0">
				</div>
				<div class="form-group col-md-3">
					<label for="inputState">Interes</label>
					<input type="number" name="interes"  class="form-control" value="0">
				</div>
				<div class="form-group col-md-3">
					<label for="inputState">Moras</label>
					<input type="number" name="moras"  class="form-control" value="0">
				</div>
				<div class="form-group col-md-6">
                <label for="inputState">Estatus</label>
                    <select id="inputState" class="form-control" name="estatus">
                            <option selected="">Pagado</option>
                            <option selected="">Proceso</option>
                    </select>
				</div>
			</div>
			<div class=form-row>			
				<div class="form-group col-md-12">
					<textarea name="descripcion"
					cols="50" rows="3" placeholder="Detalle sobre las condiciones" class="form-control"></textarea>
				</div>
					
			</div>
			<br>
			<input type="submit" id="btn" class="btn btn" value="Registrar pago" >

			<a href="../administracion/administracion.php" id="btn" class="btn btn" >Volver atras</a>
		</form>
	</div>
</div>