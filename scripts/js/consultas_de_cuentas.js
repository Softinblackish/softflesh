$(document).ready(function()
    {
        var tipo = $("#tipo").val();
            $.ajax
            ({
                type:"post",
                url:"../../scripts/administracion/listar_cuentas.php",
                dataType:"html",
                data:"tipo="+tipo,
                success: function(data)
                {
                    $("#caja01").empty();
                    $("#caja01").append(data);
                }
            }); 

            $.ajax
            ({
                type:"post",
                url:"../../scripts/administracion/listar_sub_cuentas.php",
                dataType:"html",
                data:"tipo="+tipo,
                success: function(data)
                {
                    $("#caja02").empty();
                    $("#caja02").append(data);
                }
            }); 

        $("#tipo").change(function()
        {
            var tipo = $("#tipo").val();
            $.ajax
            ({
                type:"post",
                url:"../../scripts/administracion/listar_cuentas.php",
                dataType:"html",
                data:"tipo="+tipo,
                success: function(data)
                {
                    $("#caja01").empty();
                    $("#caja01").append(data);
                }
            }); 
            $.ajax
            ({
                type:"post",
                url:"../../scripts/administracion/listar_sub_cuentas.php",
                dataType:"html",
                data:"tipo="+tipo,
                success: function(data)
                {
                    $("#caja02").empty();
                    $("#caja02").append(data);
                }
            }); 
            
        });
    });