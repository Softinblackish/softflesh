<?php include("../base.php"); ?>
<link rel="stylesheet" href="../../css/articulos.css">
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

<div class="container-articulos">
    <div class="container form-row">
        <form id="form"  action="../../scripts/administracion/crear_cuenta_contable.php" method="post">
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
                        <a class="btn btn-info" id="mostrar_texto_cuenta">Nueva cuenta</a>
                        <a class="btn btn-info" id="mostrar_lista_cuentas">Agregar sub-cuenta</a>
                        <a class="btn btn-info" id="mostrar_lista_sub-cuentas">Agregar cuenta detalle</a>
                    </center>
                </div>
                <div class="form-group col-md-12 oculto" id="nombre_cuenta">
                    <input type="text" class="form-control" placeholder="Nombre de la cuenta" name="nombre_cuenta"><br>
                    <input type="number" class="form-control" placeholder="Valor" name="valor_nombre_cuenta">
                </div>
                <div class="form-group col-md-12 oculto" id="cuentas">
                    
                                <div id="caja01">
                                
                                </div>
                    
                </div>
                <div class="form-group col-md-12 oculto" id="nombre_sub-cuenta">
                    <input type="text" class="form-control" placeholder="Nombre de la Sub-cuenta" name="nombre_sub-cuenta"><br>
                    <input type="number" class="form-control" placeholder="Valor" name="valor_sub-cuenta">
                </div>
                <div class="form-group col-md-12 oculto" id="sub-cuentas">
                        <div id="caja02">
                                
                        </div>
                </div>
                <div class="form-group col-md-12 oculto" id="nombre_cuenta_detalle">
                    <input type="text" class="form-control" placeholder="Nombre de la cuenta detalle" name="nombre_cuenta_detalle" ><br>
                    <input type="number" class="form-control" placeholder="Valor" name="valor_cuenta_detalle">

                </div>
                <label class="form-check-label" for="gridCheck">
                    Al hacer click en "Crear" se creará la cuenta en el catàlogo, puede modificar en ver catalogo de cuentas. <br>
                </label>
            <input type="submit"  class="btn btn-info" value="Crear"> <a style="margin-left:15px;" href="../administracion/administracion.php"  class="btn btn-info">Cancelar</a>
        </form>
    </div>    
</div>
<script src="../../scripts/js/catalogo_cuentas.js"></script>
<script src="../../scripts/js/consultas_de_cuentas.js"></script>