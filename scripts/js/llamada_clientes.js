$(document).ready(function()
    {
        $("p").click(function()
        {
            alert(this);
        });
        $("#cliente").keyup(function()
        {
            $("#cliente_general").hide();
            var cliente = $("#cliente").val();
            $.ajax
            ({
                type:"post",
                url:"../../scripts/ventas/buscar_clientes.php",
                dataType:"html",
                data:"nombre="+cliente,
                success: function(data)
                {
                    $("#caja-clientes").empty();
                    $("#caja-clientes").append(data);
                }
            }); 
        });
    });