<?php

function getPlantilla($productos){

$plantilla = '
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="../../img/logo.png">
      </div>
      <div id="company">
        <h2 class="name">Softflesh Corporation</h2>
        <div>teniente amado garcia, #47 Santo Domingo, RD</div>
        <div>(809) 319-1873</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">FACTURA A:</div>
          <h2 class="name">John Doe</h2>
          <div class="address">796 Silver Harbour, TX 79273, US</div>
          <div class="email"><a href="mailto:john@example.com">john@example.com</a></div>
        </div>
        <div id="invoice">
          <h1>FACTURA 3-2-1</h1>
          <div class="date">Fecha de Facturacion: 01/06/2014</div>
          <div class="date">Fecha de vencimiento: 30/06/2014</div>
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">#</th>
            <th class="desc">Articulos</th>
            <th class="unit">Precio Unitario</th>
            <th class="qty">Cantidad</th>
            <th class="total">TOTAL</th>
          </tr>
        </thead>
        <tbody>';

        
        
        foreach($productos as $product)
            { 



              $plantilla.='
                <tr>
                  <td class="no">'   .$product["no_compra"].    '</td>
                  <td class="desc">' .$product["articulo"].     '</td>
                  <td class="unit">' .$product["precio_compra"].'</td>
                  <td class="qty">'  .$product["cantidad"].     '</td>
                  <td class="total">'.$product["total"].        '</td>
                </tr>
              ';

            }

            $plantilla.='</tbody>
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