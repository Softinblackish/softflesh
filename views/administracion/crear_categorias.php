<?php include("../base.php"); ?>
<link rel="stylesheet" href="../../css/articulos.css">
<div class="container-articulos">
    <div class="container form-row">
        <form id="form"  action="../../scripts/administracion/crear_categoria.php" method="post">
            <div class="cabeza">
               <h2> Crear categoría</h2>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" placeholder ="Nombre categoría" name="nombre" required>
                </div>
                <div class="form-group col-md-12">
                    <textarea class="form-control" placeholder ="Descripción" name="descripcion" required></textarea>
                </div>
                <label class="form-check-label" for="gridCheck">
                    Al hacer click en "Crear" se creará la categoría, puede modificar en ver categorías. <br>
                </label>
            <input type="submit" id="btn" class="btn btn" value="Crear"> <a style="margin-left:15px;" href="../administracion/administracion.php" id="btn" class="btn btn">Cancelar</a>
        </form>
    </div>    
</div>