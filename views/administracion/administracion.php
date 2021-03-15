<?php include("../base.php");

?>
<link rel="stylesheet" href="../../css/administracion.css">
<?php if($permisos['usuarios']== 1){ ?><ul class="list-group">
  <li class="list-group-item active" style="background-color:#17a2b8;">Usuarios</li>
  <?php if($permisos['agregar_user']== 1){ ?><a href="../usuarios/nuevo_usuario.php"><li class="list-group-item" ><i class="fa fa-plus-circle"></i> Agregar</li></a><?php }?>
  <?php if($permisos['ver_user']== 1){ ?><a href="../usuarios/lista_usuarios.php"><li class="list-group-item"><i class="fa fa-eye"></i> Ver usuarios</li></a><?php } ?>
  <a href="../usuarios/reportes_usuarios.php"><li class="list-group-item"><i class="fa fa-list-alt"></i> Reportes</li></a>
</ul>
<?php }?>

<?php if($permisos['empresa']== 1){ ?><ul class="list-group" >
  <li class="list-group-item superior"  style="background-color:#125c67;color:white;">Mi empresa</li>
  <a href="../usuarios/lista_usuarios.php"><li class="list-group-item"><i class="fa fa-pencil"></i> Información</li></a>
  <a href="../usuarios/lista_usuarios.php"> <li class="list-group-item"><i class="fa fa-picture-o"></i> Logo</li></a>
  <a href="../usuarios/lista_usuarios.php"><li class="list-group-item"><i class="fa fa-text-width"></i> slogan</li></a>
</ul>
<?php } ?>

<?php if($permisos['cod_impuestos']== 1){ ?><ul class="list-group">
  <li class="list-group-item" style="background-color:#0e444c; color:white;">Códigos de impuestos</li>
  <?php if($permisos['agregar_cod_impuestos']== 1){ ?><a href="crear_impuesto.php"><li class="list-group-item"><i class="fa fa-plus-circle"></i> Agregar</li></a><?php } ?>
    <?php if($permisos['ver_cod_impuestos']== 1){ ?><a href="ver_impuestos.php"><li class="list-group-item"><i class="fa fa-eye"></i> Ver códigos</li></a><?php } ?>
  <li class="list-group-item"><i class="fa fa-list-alt"></i> Reportes</li></a>
</ul>
<?php } ?>

<?php if($permisos['almacenes']== 1){ ?><ul class="list-group" >
  <li class="list-group-item " style="background-color:#882f88; color:white">Almacenes</li>
  <?php if($permisos['agregar_almacenes']== 1){ ?><a href="crear_almacenes.php"><li class="list-group-item"><i class="fa fa-plus-circle"></i> Agregar</li></a><?php } ?>
    <?php if($permisos['ver_almacenes']== 1){ ?><a href="ver_almacenes.php"><li class="list-group-item"><i class="fa fa-eye"></i> Ver almacenes</li></a><?php } ?>
  <a href="../usuarios/lista_usuarios.php"><li class="list-group-item"><i class="fa fa-list-alt"></i> Reportes</li></a>
</ul>
<?php } ?>

<?php if($permisos['categorias']== 1){ ?>
<ul class="list-group" >
  <li class="list-group-item " style="background-color:rgb(87, 220, 200); color:white;">Categorías</li>
  <?php if($permisos['agregar_categorias']== 1){ ?><a href="crear_categorias.php"><li class="list-group-item"><i class="fa fa-plus-circle"></i> Agregar</li></a><?php } ?>
    <?php if($permisos['ver_categorias']== 1){ ?><a href="ver_categorias.php"><li class="list-group-item"><i class="fa fa-eye"></i> Ver categorias</li></a><?php } ?>
  <a href="../usuarios/lista_usuarios.php"><li class="list-group-item"><i class="fa fa-list-alt"></i> Reportes</li></a>
</ul>
<?php } ?>

<?php if($permisos['condiciones_p']== 1){ ?><ul class="list-group" >
  <li class="list-group-item active" style="background-color:#17a2b8;">Condición de pago</li>
  <?php if($permisos['agregar_condiciones_p']== 1){ ?><a href="crear_condicion_pago.php"><li class="list-group-item"><i class="fa fa-plus-circle"></i> Agregar</li></a><?php } ?>
    <?php if($permisos['ver_condiciones_p']== 1){ ?><a href="ver_condiciones_pago.php"><li class="list-group-item"><i class="fa fa-eye"></i> Ver condiciones de pago</li></a><?php } ?>
  <a href="../usuarios/lista_usuarios.php"><li class="list-group-item"><i class="fa fa-list-alt"></i> reportes</li></a>
</ul>
<?php } ?>

<ul class="list-group" >
  <li class="list-group-item " style="background-color:#882f88; color:white;">Comprobantes fiscales</li>
  <a href="comprobantes.php?tipo=Consumidor Final"><li class="list-group-item">Consumidor final</li></a>
  <a href="comprobantes.php?tipo=Valor fiscal"><li class="list-group-item">Valor fiscal</li></a>
  <a href="comprobantes.php?tipo=Gastos menores"><li class="list-group-item">Gastos menores</li></a>
  <a href="comprobantes.php?tipo=Proveedor informal"><li class="list-group-item">Proveedor informal</li></a>
  <a href="comprobantes.php?tipo=Gubernamental"><li class="list-group-item">Gubernamental</li></a>
</ul>

<ul class="list-group" >
  <li class="list-group-item " style="background-color:#0e444c; color:white;">Sucursales</li>
  <?php if($permisos['agregar_categorias']== 1){ ?><a href="crear_sucursal.php"><li class="list-group-item"><i class="fa fa-plus-circle"></i> Agregar sucursal</li></a><?php } ?>
  <?php if($permisos['agregar_categorias']== 1){ ?><a href="crear_caja.php"><li class="list-group-item"><i class="fa fa-plus-circle"></i> Agregar cajas</li></a><?php } ?>
    <?php if($permisos['ver_categorias']== 1){ ?><a href="ver_sucursales.php"><li class="list-group-item"><i class="fa fa-eye"></i> Ver sucursales</li></a><?php } ?>
    <?php if($permisos['ver_categorias']== 1){ ?><a href="ver_cajas.php"><li class="list-group-item"><i class="fa fa-eye"></i> Ver cajas</li></a><?php } ?>
</ul>


<?php if($permisos['roles']== 1){ ?> <ul class="list-group">
  <li class="list-group-item" style="background-color:rgb(87, 220, 200); color:white;">Roles</li>
<?php if($permisos['agregar_roles']== 1){ ?><a href="crear_rol.php"><li class="list-group-item"><i class="fa fa-plus-circle"></i> Agregar</li></a><?php } ?>
<?php if($permisos['ver_roles']== 1){ ?><a href="ver_roles.php"><li class="list-group-item"><i class="fa fa-eye"></i> Ver Roles</li></a><?php } ?>
</ul>
<?php } ?>

<?php if($permisos['empresa']== 1){ ?><ul class="list-group" >
  <li class="list-group-item superior"  style="background-color:#17a2b8;color:white;"> Catalogo de cuentas</li>
  <a href="crear_cuenta_contable.php"><li class="list-group-item"><i class="fa fa-pencil"></i> Agregar</li></a>
  <a href="catalogo_cuentas.php"> <li class="list-group-item"><i class="fa fa-picture-o"></i> Ver cuentas</li></a>
  <a href="asientos_contables.php"> <li class="list-group-item"><i class="fa fa-picture-o"></i> Asientos contables</li></a>

</ul>
<?php } ?>