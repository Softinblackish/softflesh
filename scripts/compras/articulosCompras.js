//alert($('#articulo').val());
//$(cargar_datos());



$(document).ready(function(){


    function cargar_datos(articulo) {
        $.ajax({
            url:"consulta_articulos.php",
            type:"POST",
            dataType:'html',
            data:{articulo: articulo},
            success:function($precio_art,$stop_min_art){
                $('#precio_compra').val($precio_art);
                $('#stock').val($stop_min_art);
            }
        });
    }

    var art = $('#articulo').val();

    $('#articulo').change(function(){
        cargar_datos(art);
        alert(art);
    });
    alert(art);

    



});
