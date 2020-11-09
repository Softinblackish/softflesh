$(document).ready(function()
{
    $(".cantidad_devuelta").hide();
    $("#crear_devolucion"). click(function(){
        $(".cantidad_devuelta").show();
        $("#crear_devolucion").hide();
    });
    $(".block1").click(function(){
        $(".block1").hide();
        $(".add1").show();
        $(".art1").css("pointer-events","auto");
    });
    $(".add1").click(function(){
        $(".block1").show();
        $(".add1").hide();
        $(".art1").css("pointer-events","none");
        var fac = $("#fac").val();
        var articulo = $(".articulo1").val();
        var cantidad = $(".art1").val();
        alert("factura:"+fac+ " articulo:"+articulo+" cantidad:"+ cantidad);
        $.ajax
            ({
                type:"GET",
                url:"../../scripts/ventas/devolucion_temp.php?articulo="+articulo+"&cantidad="+cantidad+"&factura="+fac,
                dataType:"html",
                success: function(data)
                {
                   alert("listo");
                }
                
            }); 
        
    });
    $(".block2").click(function(){
        $(".block2").hide();
        $(".add2").show();
        $(".art2").css("pointer-events","auto");
    });
    $(".add2").click(function(){
        $(".block2").show();
        $(".add2").hide();
        $(".art2").css("pointer-events","none");
        var cliente = $(".art2").val();
        
    });
    
 });