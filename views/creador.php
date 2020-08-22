<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/creador.css">
    <title>Document</title>
</head>
<body>
    
    <div id="div_form">
      <div id="titulo">
        <center>
          <h1 style="padding-top:25px; "><i class="fa fa-file-text-o"></i> Registro</h1>
        </center> <br><br>
      </div>
      <form action="../scripts/creador.php" method="POST">
        <input type="text" class="form-control" placeholder="&#x26EB Nombre de la empresa" name="nombre" required>
        <input type="text" class="form-control" placeholder="&#x26D5 Dirección" name="direccion" required>
        <input type="tel"  class="form-control" placeholder="&#x2706; Teléfono" name="telefono" required>
        <input type="text" class="form-control" placeholder="RNC" name="rnc" required>
        <input type="email" class="form-control" placeholder="&#x40; Correo" name="correo" required>
        <input type="text"  class="form-control" placeholder="&#128102;&#127999; Nombre del encargado" name="encargado" required>
        <input type="tel" class="form-control" placeholder=" &#x2706; Teléfono encargado" name="tel_encargado" required>
        <button type="submit" id="submit" class="btn btn">Continuar <i id="img-continuar" class="fa fa-share"></i></button>
      </form>
      <img src="../img/logo.png" id="logo" class="img-fluid" alt="">
    </div>
   
</body>
</html>