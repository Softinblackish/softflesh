<?php 
session_start();
if($_SESSION["user"] != null)
{
?>
                     
<!DOCTYPE html>
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoftFlesh</title>
   <link rel="stylesheet" href="../../css/base.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="../../scripts/js/base.js" type="text/javascript"> </script>
</head>

    <div id=contenedor>
        <header>
            <div id="menu_top" >
                <div id="logo" class="option_top"><img src="../../img/logo-horizontal.png" alt=""></div>
                <div id="notificaciones" class="option_top">
                        <button class="btn btn-info">Cobros pendientes(35)</button>
                        <button class="btn btn-info">Pagos a realizar(12)</button>
                        <button class="btn btn-info">Artículos por debajo del límite(3)</button>
                        <i class="fa fa-bell fa-lg"></i>
                </div>
                <div id="usuario" class="option_top">
                        <?php 
                                echo $_SESSION["user"];
                        ?>
                        <a href="../../scripts/cerrar_session.php"><i class="fa fa-cog fa-lg"></i></a>
                </div>
            </div>
        </header>
        <aside style="float:left;">
              <nav>
                <div id="menu_lateral">
                    <div id="nombre_empresa"><?php echo $_SESSION["empresa"]; ?></div>
                    <div id="menu">
                        <div id="clientes" class="menu_lv1"><i class="fa fa-users fa-lg" aria-hidden="true"></i> Clientes
                                
                                <div id="agregar_clientes"class="menu_lv3 menu_clientes">Agregar cliente</div>
                                <div id="lista_clientes" class="menu_lv3 menu_clientes">Ver lista de clientes</div>
                            
                        </div>
                        <div id="suplidores" class="menu_lv1"><i class="fa fa-handshake-o fa-lg" aria-hidden="true"></i> Suplidores
                            
                                <div id="agregar_suplidor" class="menu_lv3 menu_suplidores" >Agregar suplidor</div>
                                <div id="lista_suplidores"  class="menu_lv3 menu_suplidores">Ver lista de suplidores</div>
                        
                        </div>
                        <div id="ventas" class="menu_lv1"><i class="fa fa-cart-plus fa-lg" aria-hidden="true"></i> Ventas
                            
                                <div id="punto_de_venta"class="menu_lv3 menu_ventas" >Punto de venta</div>
                                <div id="lista_ventas" class="menu_lv3 menu_ventas">Ventas</div>
                                <div id="devoluciones_venta" class="menu_lv3 menu_ventas">Devoluciones</div>
                            
                        </div>
                        <div id="compras" class="menu_lv1"> <i class="fa fa-shopping-bag fa-lg" aria-hidden="true"></i> Compras 
                           
                                <div id="agregar_compra" class="menu_lv3 menu_compras">Agregar compra</div>
                                <div id="lista_compras" class="menu_lv3 menu_compras">Ver lista de compras</div>
                                <div id="devoluciones_compra" class="menu_lv3 menu_compras">Devoluciones</div>
                            
                        </div>
                        <div id="cxp" class="menu_lv1"><i class="fa fa-credit-card fa-lg" aria-hidden="true"></i> Cuentas por pagar
                            
                                <div id="agregar_cxp" class="menu_lv3 menu_cxp">Agregar cuentas por pagar</div>
                                <div id="lista_cxp" class="menu_lv3 menu_cxp">Ver cuentas por pagar</div>
                            
                        </div>
                        <div id="cxc" class="menu_lv1"><i class="fa fa-money fa-lg" aria-hidden="true"></i> Cuentas por cobrar
                           
                                <div id="agregar_cxc" class="menu_lv3 menu_cxc">Agregar cuenta por cobrar</div>
                                <div id="lista_cxc" class="menu_lv3 menu_cxc">Ver cuentas por cobrar</div>
                            
                            
                        </div>
                        <div id="inventario" class="menu_lv1"><i class="fa fa-bar-chart fa-lg" aria-hidden="true"></i> Inventario
                            
                                <a href="../articulos/frm_articulos.php"><div id="agregar_articulo" class="menu_lv3 menu_inventario">Agregar articulo</div></a>
                                <div id="lista_articulos" class="menu_lv3 menu_inventario">Ver lista de articulos</div>
                                <div id="cargar_articulo" class="menu_lv3 menu_inventario">Cargar articulos</div>
                                <div id="pasar_inventario" class="menu_lv3 menu_inventario">Pasar inventario</div>
                            
                        </div>
                
            </nav>
        </aside>


    


</body>
</html>
        <?php
        
        }
        else
        {header("location:../login/login.php?error=true");
        }
?>
