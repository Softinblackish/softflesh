


$(document).ready(function(){

    


    $("#articulo").change(function () {
        var art = $("#articulo").val();
        $.ajax({
                type: 'post',
                url: '../../scripts/compras/BuscarArticulos.php',
                dataType: "html",
                data: "articulo="+art,
                //dataType: 'json',
                //data: { articulo : $("#articulo").val() },
                success: function(res){
                    var json = JSON.parse(res);
                    $("#precio_compra").val(Math.round(json[0].precio));
                    $("#stock").val(json[0].cantidad_actual);
                    //alert(json[0].precio);
                    $("#impuesto").val(json[0].cod_impuesto);
                    $("#descripcion").val(json[0].descripcion);
                    //cantidad_actual cod_impuesto
                    $("#cantidad").keyup(function() {
                      var var_precioCompra = parseFloat($("#precio_compra").val());
                      var var_cantidad = parseFloat($("#cantidad").val());
                      var var_ganancia = var_cantidad * var_precioCompra;
                      $("#total_SI").val(var_ganancia);
                      //total con impuestos
                      var var_porcentaje = (parseFloat($("#impuesto").val()) / 100); //0.08
                      var var_total_SI = parseFloat($("#total_SI").val()); //80
                      var var_porciento = var_total_SI * var_porcentaje; //80 * 0.08 = 6.4
                      var var_total_CI = var_total_SI + var_porciento; //40 + 6.4 = 46.4
                      $("#total_I").val(var_porciento);
                      $("#total").val(var_total_CI);
                    });
                    //alert(json[0].precio);
                }
          });
    });
                      
});    