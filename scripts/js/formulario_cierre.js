
    $(document).ready(function(){
        $(".holders_no").hide();
        $(".cajas").hide();
        $("#back").hide();
        $("#sin_A").hide();
        $("#new").click(function(){
            $("#formulario").show();
            $(".superior").hide();
        });
        $("#volver").click(function(){
            $("#formulario").hide();
            $(".superior").show();
        });
        $("#config").click(function(){
            $(".cajas").show();
            $("#back").show();
            $(".superior").hide();
        });
        $(".holders1").click(function(){
            $(".holders1").hide();
            $("#uno").val("");
            $("#uno").show();
            $("#uno").focus();
            
        }); 

        $(".holders5").click(function(){
            $(".holders5").hide();
            $("#cinco").val("");
            $("#cinco").show();
            $("#cinco").focus();
        });
        
        $(".monedas").keyup(function(){

             var uno = $("#uno").val();
             var cinco = $("#cinco").val();
             var diez = $("#diez").val();
             var veinticinco = $("#veinticinco").val();
             var cincuenta = $("#cincuenta").val();
             var cien = $("#cien").val();
             var dosciento = $("#dosciento").val();
             var quiniento = $("#quiniento").val();
             var mil = $("#mil").val();
             var dosmil = $("#dosmil").val();
             var resultados = parseInt(uno) + parseInt(cinco) + parseInt(diez)*10 + parseInt(veinticinco)*25 + parseInt(cincuenta)*50 + parseInt(cien)*100 + parseInt(dosciento)*200 + parseInt(quiniento)*500 + parseInt(mil)*1000 + parseInt(dosmil)*2000;
             alert(resultados);
             var caja_result = $("#cajon").val();
             var resultado = parseInt(caja_result) - resultados;
             var total = resultado;
             $("#diferencia").val(total);
        }); 
    });
        
        $(".holders10").click(function(){
            $(".holders10").hide();
            $("#diez").val(" ");
            $("#diez").show();
            $("#diez").focus();
        });
        $(".holders25").click(function(){
            $(".holders25").hide();
            $("#veinticinco").val(" ");
            $("#veinticinco").show();
            $("#veinticinco").focus();
        });
        $(".holders50").click(function(){
            $(".holders50").hide();
            $("#cincuenta").val(" ");
            $("#cincuenta").show();
            $("#cincuenta").focus();
        });
        $(".holders100").click(function(){
            $(".holders100").hide();
            $("#cien").val(" ");
            $("#cien").show();
            $("#cien").focus();
        });
        $(".holders200").click(function(){
            $(".holders200").hide();
            $("#dosciento").val(" ");
            $("#dosciento").show();
            $("#cien").focus();
        });
        $(".holders500").click(function(){
            $(".holders500").hide();
            $("#quiniento").val(" ");
            $("#quiniento").show();
            $("#quiniento").focus();
        });
        $(".holders1000").click(function(){
            $(".holders1000").hide();
            $("#mil").val(" ");
            $("#mil").show();
            $("#mil").focus();
        });
        $(".holders2000").click(function(){
            $(".holders2000").hide();
            $("#dosmil").val(" ");
            $("#dosmil").show();
            $("#dosmil").focus();
        });
        $("#back").click(function(){
            $(".cajas").hide();
            $("#back").hide();
        });
