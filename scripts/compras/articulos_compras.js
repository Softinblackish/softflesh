$(cargar_datos());

function cargar_datos(articulo) {
    $.ajax({
        type:"POST",
        url:"../../scripts/compras/consulta_articulos.php",
        dataType:'html',
        data:{articulo: articulo},
        success:function($precio_art,$stop_min_art){
            $('#precio_compra').val($precio_art);
            $('#stock').val($stop_min_art);
        }
    });
}

$(document).ready(function(){

    var art = $('#articulo').val();

    $('#articulo').change(function(){
        cargar_datos(art);
    });
    alert(art);
});