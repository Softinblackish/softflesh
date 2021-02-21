<!--AQUI VA UN FORMULARIO/OS DE CUENTAS POR COBRAR SIN PHP, SIN CSS-->

<!--PHP-->
<?php include("../base.php") ?>
<!--CSS-->
<link rel="stylesheet" href="../../css/cuentas_por_cobrar.css">
<!--JS-->
<script type="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../../scripts/js/time_alert.js"></script>
<script>
$(document).ready(function(){
	$(".form-control").change(function(){
		var prestado = $("#cantidad_prestada").val();
		var porciento =$("#porciento").val()/100;
		var intereses = prestado * porciento ;
		$("#intereses").val(intereses);
		$("#total").val(Number($("#intereses").val())+ Number($("#cantidad_prestada").val()));
		if($("#frecuencia").val() == 'Mensual')
		{
			$("#cuotas").val($("#total").val() / $("#meses").val());
		}
		if($("#frecuencia").val() == 'Quincenal')
		{
			$("#cuotas").val($("#total").val() / $("#meses").val()/2);
		}
		if($("#frecuencia").val() == 'Semanal')
		{
			$("#cuotas").val($("#total").val() / $("#meses").val()/5);
		}
		if($("#frecuencia").val() == 'Diario')
		{
			$("#cuotas").val($("#total").val() / $("#meses").val()/30);
		}

		
	})
});
</script>


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
				<h2>Nuevo prestamo</h2>
			</div>
			<div class=form-row>
				<div class="form-group col-md-12">
					<label for="">Cliente</label>
					<select class="form-control" name="cliente" id="" require>
					<?php $clientes = $conexion->query("select * from $empresa.tbl_clientes"); 
						while($lista_clientes = $clientes->fetch_assoc())
						{
					?>
						<option value="<?php echo $lista_clientes["id_cliente"] ?>"><?php echo $lista_clientes["nombre_cliente"] ?> </option>
					<?php } ?> 
					</select>
				</div>		
				<div class="form-group col-md-4">
					<input class="form-control" type="number" name="valor" placeholder="Cantidad a prestar" id="cantidad_prestada">
				</div>		
				<div class="form-group col-md-4">	
					<input type="number" name="porciento" placeholder="% Intereses" id="porciento" class="form-control">
				</div>	
				<div class="form-group col-md-4">	
					<input type="number" name="meses" id="meses" placeholder="Cuantos meses " class="form-control">
				</div>
				<div class="form-group col-md-4">
				<label for="">Amortizacion</label>		
					<select class="form-control" name="amortizacion" placeholder="tipo de amortizacion" id="" require>
						<option >Frances</option>
						<option >Americano</option>
						<option >Simple</option>
					</select>
				</div>
				<div class="form-group col-md-4">
					<label for="">Frecuencia de pagos</label>
				<select class="form-control" name="frecuencia" placeholder="tipo de amortizacion" id="frecuencia" require>
						<option >Mensual</option>
						<option >Quincenal</option>
						<option >Semanal</option>
						<option >Diario</option>
					</select>
				</div>
				<div class="form-group col-md-4">
					<label for="">Cobrador</label>		
					<select class="form-control" name="cobrador" placeholder="tipo de amortizacion" id="" require>
						<option value="">Cobrador 1</option>
					</select>
				</div>
				<div class="form-group col-md-4">	
					<input type="number" readonly name="intereses" placeholder="Intereses" id="intereses" class="form-control">
				</div>
				<div class="form-group col-md-4">	
					<input type="number" readonly name="cuotas" placeholder="Valor de las cuotas" id="cuotas" class="form-control">
				</div>
				<div class="form-group col-md-4">	
					<input type="number" readonly name="total" id="total" placeholder="Valor total" class="form-control">
				</div>
			</div>
			<br>
			<input type="submit" id="btn" class="btn btn" value="Registrar prestamo" >
		</form>
	</div>
</div>