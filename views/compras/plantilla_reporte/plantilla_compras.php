<?php
include("../conexion/cone.php");
session_start();
$desde = empty($_POST['desde']) ? '0000-00-00' : $_POST['desde'];
$hasta = empty($_POST['hasta']) ? '0000-00-00' : $_POST['hasta'];
$filtro;
function getPlantilla(){

$plantilla = '
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="../../img/logo.png">
      </div>
      <div id="company">
        <h2 class="name">Softflesh Corporation</h2>
        <div>teniente amado garcia, #47 Santo Domingo, RD</div>
        <div>(809) 519-0450</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">INVOICE TO:</div>
          <h2 class="name">John Doe</h2>
          <div class="address">796 Silver Harbour, TX 79273, US</div>
          <div class="email"><a href="mailto:john@example.com">john@example.com</a></div>
        </div>
        <div id="invoice">
          <h1>INVOICE 3-2-1</h1>
          <div class="date">Date of Invoice: 01/06/2014</div>
          <div class="date">Due Date: 30/06/2014</div>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-12">

                <!--Aqui va la tabla de articulos de compras para devoluciones -->
                
                    <table class="table">
                    <h5 class="cabeza_tabla" >Detalle de compra</h5>
                        <thead class="thead">      
                            
                        <tr>
                                <th scope="col">#</th>
                                <th scope="col" style="width:20%;">Fecha</th>
                                <th scope="col" style="width:30%;"> Articulos </th>
                                <th scope="col" style="width:10%;"> Cantidad </th>
                                <th scope="col" style="width:10%;"> Precio </th>
                                <th scope="col" style="width:10%;"> Total </th>
                                <th scope="col" style="width:60%;"> Accion </th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php
                            $empresa = $_SESSION["empresa_db"];

                                if(isset($_POST["desde"], $_POST["hasta"] , $_POST["filtro"]))
                                {
                                    if($_POST["desde"] and $_POST["hasta"] )
                                        {
                                            $desde = $_POST["desde"];
                                            $hasta = $_POST["hasta"];
                                            $consulta_articulos= $conexion->query("SELECT * from $empresa.tbl_compras WHERE fecha_creacion >= \'$desde\' and fecha_creacion <= \'$hasta\' ");
                                        }
                                    if($_POST["filtro"])
                                        {
                                            $consulta_articulos= $conexion->query("SELECT * FROM $empresa.tbl_art_compras WHERE articulo LIKE \'%$filtro%\' limit 5");
                                        }                  
                                }else{
                                    $consulta_articulos= $conexion->query("SELECT * FROM $empresa.tbl_art_compras");
                                }    
                                        while($row = $consulta_articulos->fetch_assoc())
                                        {
                            ?>
                                                <!-- Head Tabla Compras   --->
                                                <tr>
                                                    <th scope="row"><?php echo $row["no_compra"]; ?></th>
                                                    <td><?php echo $row["fecha_orden"]; ?></td>
                                                    <td><?php echo $row["articulo"]; ?></td>
                                                    <td><?php echo $row["cantidad"]; ?></td>
                                                    <td><?php echo $row["precio_compra"]; ?></td>
                                                    <?php 
                                                    $cantidad= $row["cantidad"];
                                                    $precio = $row["precio_compra"];
                                                    $total = $cantidad * $precio;
                                                    ?>
                                                    <td><?php  echo $total ?></td>
                                                    
                                                    <!--Boton actualizar informacion-->
                                                    <td><a id="cerrar"  class="btn btn-info" data-toggle="modal" data-target="#example<?php echo $row["no_compra"]; ?>" > <i class="fa fa-eye fa-lg"></i></a>  
                                                    <!--Boton eliminar-->
                                                    <a                 class="btn btn-danger"data-toggle="modal" data-target="#eliminar<?php echo $row["no_compra"]; ?>" > <i class="fa fa-trash-o fa-lg"></i></a> </td>
                                                </tr>





        <!--Modal editar compras   --->
        <div class="modal fade" id="example<?php echo $row["no_compra"];?>" tabindex="-1" 
         aria-labelledby="example<?php echo $row["no_compra"];?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="example<?php echo $row["no_compra"];?>">
                        <?php echo $row["articulo"]; ?>
                        </h5>
                        <button type="button" class="close cerrar" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                     <!-- formulario compras   --->
                        <form action="../../scripts/compras/modificar.php" method="post">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" name="articulo" placeholder="articulo" value="<?php echo $row["articulo"]; ?>" disabled class="form-control">
                                    </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name="cantidad" placeholder ="cantidad" value="<?php echo $row["cantidad"]; ?>" disabled class="form-control" >
                                </div>
                                <div class="form-group col-md-6">
                                     <input type="text" name="precio" placeholder ="precio" value="<?php echo $row["precio_compra"]; ?>" disabled class="form-control" >
                                </div>
                                <div class="form-group col-md-6">
                                    <?php 
                                        $precio = $row["precio_compra"];
                                        $cantidad = $row["cantidad"];
                                        $valor = $precio * $cantidad;
                                    ?>
                                    <input type="text" name="cantidad" placeholder ="valor" value="<?php echo $valor ?>" disabled class="form-control" >
                                </div>
                                <input type="hidden" name="id" value="<?php echo $row["no_compra"]; ?>">
                                <div class="form-group col-md-6">
                                    Fecha de creación:  <?php echo $row["fecha_orden"]; ?>
                                </div>
                             </div>
                            
                             <div class="modal-footer">
                                <button type="button" class="btn btn-secondary cerrar" data-dismiss="modal"><i class="fa fa-times fa-lg"></i></button>
                                <button type="button" class="btn btn-warning editar" ><i class="fa fa-pencil fa-lg"></i></button>
                                <input type="submit" class="btn btn-primary guardar" value="Guardar" style="display:none;">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <!--Modal Eliminar compras   --->
        <div class="modal fade" id="eliminar<?php echo $row["no_compra"];?>" tabindex="-1" 
         aria-labelledby="eliminar<?php echo $row["no_compra"];?>Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="eliminar<?php echo $row["no_compra"];?>Label">Eliminar</h5>
                        <button type="button" class="close cerrar" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            Seguro que desea eliminar el articulo :<strong> <?php echo $row["articulo"];?> </strong>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary cerrar" data-dismiss="modal"><i class="fa fa-times fa-lg"></i></button>
                        <a href="../../scripts/compras/eliminar.php?id=<?php echo $row["no_compra"]?>" class="btn btn-danger" value="borrar">Borrar</a>
                    </div>
                 </div>
            </div>
        </div>




                            <?php
                                        }
                            ?>
                        </tbody>
                    </table>


      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">#</th>
            <th class="desc">DESCRIPTION</th>
            <th class="unit">UNIT PRICE</th>
            <th class="qty">QUANTITY</th>
            <th class="total">TOTAL</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="no">01</td>
            <td class="desc"><h3>Website Design</h3>Creating a recognizable design solution based on the company s existing visual identity</td>
            <td class="unit">$40.00</td>
            <td class="qty">30</td>
            <td class="total">$1,200.00</td>
          </tr>
          <tr>
            <td class="no">02</td>
            <td class="desc"><h3>Website Development</h3>Developing a Content Management System-based Website</td>
            <td class="unit">$40.00</td>
            <td class="qty">80</td>
            <td class="total">$3,200.00</td>
          </tr>
          <tr>
            <td class="no">03</td>
            <td class="desc"><h3>Search Engines Optimization</h3>Optimize the site for search engines (SEO)</td>
            <td class="unit">$40.00</td>
            <td class="qty">20</td>
            <td class="total">$800.00</td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">SUBTOTAL</td>
            <td>$5,200.00</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">TAX 25%</td>
            <td>$1,300.00</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">GRAND TOTAL</td>
            <td>$6,500.00</td>
          </tr>
        </tfoot>
      </table>
      <div id="thanks">Thank you!</div>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
';

return $plantilla;

}

?>