<form >
<div class="form-row">
    <div class="form-group col-md-6">
        <input type="search" name="B_articulos" id="" class = "">
    </div>
</div>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Codigo</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Categoria</th>
      <th scope="col">Unidad</th>
    </tr>
  </thead>
  <tbody>
  <?php
  foreach ($query as $row) { ?>
    <tr>
      <td><?php echo $row['nombre']; ?></td>
      <td><?php echo $row['codigo']; ?></td>
      <td><?php echo $row['descripcion']; ?></td>
      <td><?php echo $row['categoria']; ?></td>
      <td><?php echo $row['unidad']; ?></td>
    </tr>
  </tbody>
  <?php
  }
    ?>
</table>


</form>