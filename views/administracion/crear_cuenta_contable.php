<?php include("../base.php"); ?>
<link rel="stylesheet" href="../../css/articulos.css">
<div class="container-articulos">
    <div class="container form-row">
        <form id="form"  action="../../scripts/administracion/.php" method="post">
            <div class="cabeza">
               <h2> Crear cuenta contable</h2>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <select name="tipo" class="form-control" id="tipo">
                        <option value="1">Activo</option>
                        <option value="2">Pasivo</option>
                        <option value="3">Capital</option>
                        <option value="4">Ingreso</option>
                        <option value="5">Costo</option>
                        <option value="6">Gastos</option>
                        <option value="7">Otros</option>
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <center>
                        <a class="btn btn-primary" id="mostrar_texto_cuenta">Nueva cuenta</a>
                        <a class="btn btn-primary" id="mostrar_lista_cuentas">Agregar sub-cuenta</a>
                        <a class="btn btn-primary" id="mostrar_lista_sub-cuentas">Agregar cuenta detalle</a>
                    </center>
                </div>
                <div class="form-group col-md-12 oculto" id="nombre_cuenta">
                    <input type="text" class="form-control" placeholder="Nombre de la cuenta" name="nombre_cuenta">
                </div>
                <div class="form-group col-md-12 oculto" id="cuentas">
                    <select name="" class="form-control" >
                        <option value="0">cuenta corriente</option>    
                    </select>
                </div>
                <div class="form-group col-md-12 oculto" id="nombre_sub-cuenta">
                    <input type="text" class="form-control" placeholder="Nombre de la Sub-cuenta" name="nombre_sub-cuenta">
                </div>
                <div class="form-group col-md-12 oculto" id="sub-cuentas">
                    <select name="" class="form-control" >
                        <option value="0">Caja o banco</option>    
                    </select>
                </div>
                <div class="form-group col-md-12 oculto">
                    <input type="text" class="form-control" placeholder="Nombre de la cuenta detalle" name="nombre_cuenta_detalle" id="nombre_cuenta?detalle">
                </div>
                <label class="form-check-label" for="gridCheck">
                    Al hacer click en "Crear" se creará la cuenta en el catàlogo, puede modificar en ver catalogo de cuentas. <br>
                </label>
            <input type="submit" id="btn" class="btn btn" value="Crear"> <a style="margin-left:15px;" href="../administracion/administracion.php" id="btn" class="btn btn">Cancelar</a>
        </form>
    </div>    
</div>
<script src="../../scripts/js/catalogo_cuentas.js"></script>