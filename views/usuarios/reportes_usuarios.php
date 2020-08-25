<?php
    include("../base.php");
    include("../../scripts/conexion/cone.php");
?>
<link rel="stylesheet" href="../../css/usuarios.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="../../scripts/js/usuarios.js"></script>
<div id="box_lista">
<h2>Reportes sobre usuarios</h2>
<form action="" method="post">
    <input  type="text" placeholder="Buscar" name="filtro">
    <input type="submit" class="btn btn" id="buscar" value=" Buscar">
</form>
     <br><br>
<table class="table">
  <thead class="thead">
    <tr>
      <th scope="col">Nombre Reporte</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <td>Listado de accesos por usuario</td>
        <td><a class="btn btn-info"> <i class="fa fa-eye fa-lg"></i></a></td>
    </tr>
    <tr>
        <td>Listado creaciones de Usuario</td>
        <td><a class="btn btn-info"> <i class="fa fa-eye fa-lg"></i></a></td>
    </tr>
    <tr>
        <td>Listado de eliminaciones de usuario</td>
        <td><a class="btn btn-info"> <i class="fa fa-eye fa-lg"></i></a></td>
    </tr>
    <tr>
        <td>Listado de modificaciones de usuario</td>
       <td><a class="btn btn-info"> <i class="fa fa-eye fa-lg"></i></a></td>
    </tr>

  </tbody>
</table>

<a href="../administracion/administracion.php" id="buscar" class="btn btn" >
  Volver atras
</a>

<!-- Modal -->
