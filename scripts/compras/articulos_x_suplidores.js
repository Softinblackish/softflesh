$(document).ready(function() {




    $("#nombre_proveedor").change(function() {
        var prov = $("#cod_proveedor").val();
        $.ajax({
            type: 'post',
            url: '../../scripts/compras/BuscarArticuloXsuplidores.php',
            dataType: "html",
            data: "proveedor=" + prov,
            //dataType: 'json',
            //data: { articulo : $("#articulo").val() },
            success: function(res) {
                /*var json = JSON.parse(res);*/
                $("#articulo").html(res);


                //alert(json[0].nombre);
            }
        });
    });

});