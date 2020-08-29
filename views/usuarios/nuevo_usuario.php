<?php include("../base.php"); ?>
<link rel="stylesheet" href="../../css/articulos.css">
<div class="container-articulos">
    <div class="container form-row">
        <form id="form"  action="../../scripts/usuarios/nuevo_usuario.php" method="post">
            <div class="cabeza">
               <h2> Crear usuario</h2>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" placeholder ="Usuario" name="user" required>
                </div>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" placeholder ="Contraseña inicial" name="pass" required >
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <select id="inputState" class="form-control" name="rol">
                    <?php 
                        $roles= $conexion->query("SELECT * FROM $empresa.roles");
                        while($roles_registrados = $roles->fetch_assoc())
                        {
                     ?>
                            <option selected=""><?php echo $roles_registrados["nombre_rol"]; ?></option>
                    <?php
                        }
                    ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <select id="inputState" class="form-control" name="status">
                        <option selected="">Activo</option>
                        <option>Inactivo</option>
                    </select>
                </div>
            </div>

            <label class="form-check-label" for="gridCheck">
                    Al hacer click en "Crear" se creará el usuario, parametrizar en ver usuarios. 
            </label>
            <br>
            <input type="submit" id="btn" class="btn  btn" value="Crear"> <a href="../administracion/administracion.php" id="btn" class="btn btn">Cancelar</a>
            <br>
            <br>
        </form>
    </div>    
</div>