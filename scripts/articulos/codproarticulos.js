$(document).ready(function() {




    $("#nombre_proveedor").change(function() {
        var prov = $("#nombre_proveedor").val();
        $.ajax({
            type: 'post',
            url: '../../scripts/articulos/BuscarCodigoArticulos.php',
            dataType: "html",
            data: "proveedor=" + prov,
            //dataType: 'json',
            //data: { articulo : $("#articulo").val() },
            success: function(res) {
                var json = JSON.parse(res);
                $("#cod_proveedor").val(json[0].codigo_sup);


                //alert(json[0].codigo_sup);
            }
        });
    });

});