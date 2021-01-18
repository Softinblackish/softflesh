$(document).ready(function() {


    $("#salario_base").keyup(function() {
        var var_salario_base = parseFloat($("#salario_base").val());
        var var_horas_trabajo = parseFloat($("#horas_trabajadas").val());

        var var_salud = parseFloat($("#salud").val())/100;
        var var_pension = parseFloat($("#pension").val())/100;
        var var_salario_dia = Math.round(var_salario_base/23.83);
        var var_salario_hora = Math.round(var_salario_dia/var_horas_trabajo);
        var var_desc_salud =  var_salario_base * var_salud;
        var var_desc_pension =  var_salario_base * var_pension;

        var var_salud = parseFloat($("#salud").val()) / 100;
        var var_pension = parseFloat($("#pension").val()) / 100;
        var var_salario_dia = Math.round(var_salario_base / 23.83);
        var var_salario_hora = Math.round(var_salario_dia / var_horas_trabajo);
        var var_desc_salud = var_salario_base * var_salud;
        var var_desc_pension = var_salario_base * var_pension;

        var var_total_sueldo = var_salario_base - var_desc_salud - var_desc_pension;
        //alert(var_salud);
        //alert(var_pension);
        $("#salario_mes").val(var_salario_base);
        $("#salario_dia").val(var_salario_dia);
        $("#salario_hora").val(var_salario_hora);
        $("#sueldo").val(var_total_sueldo);
    });
    $("#horas_trabajadas").change(function() {
        var var_salario_base = parseFloat($("#salario_base").val());
        var var_horas_trabajo = parseFloat($("#horas_trabajadas").val());

        var var_salario_dia = Math.round(var_salario_base/23.83);
        var var_salario_hora = Math.round(var_salario_dia/var_horas_trabajo);

        var var_salario_dia = Math.round(var_salario_base / 23.83);
        var var_salario_hora = Math.round(var_salario_dia / var_horas_trabajo);

        //alert(var_salario_base);
        $("#salario_mes").val(var_salario_base);
        $("#salario_dia").val(var_salario_dia);
        $("#salario_hora").val(var_salario_hora);
    });
    $("#salud").keyup(function() {
        var var_salario_base = parseFloat($("#salario_base").val());
        var var_salud = parseFloat($("#salud").val()) / 100;
        var var_pension = parseFloat($("#pension").val()) / 100;
        var var_desc_salud = var_salario_base * var_salud;
        var var_desc_pension = var_salario_base * var_pension;
        var var_total_sueldo1 = var_salario_base - var_desc_pension;
        $("#sueldo").val(var_total_sueldo1);
        var var_total_sueldo = var_total_sueldo1 - var_desc_salud;
        if (var_total_sueldo >= 0) {
            $("#sueldo").val(var_total_sueldo);
        } else {
            $("#sueldo").val(var_total_sueldo1);
        }
        //alert(var_salario_base);

    });
    $("#pension").keyup(function() {
        var var_salario_base = parseFloat($("#salario_base").val());
        var var_salud = parseFloat($("#salud").val()) / 100;
        var var_pension = parseFloat($("#pension").val()) / 100;
        var var_desc_salud = var_salario_base * var_salud;
        var var_desc_pension = var_salario_base * var_pension;
        var var_total_sueldo = var_salario_base - var_desc_salud - var_desc_pension;
        //alert(var_salario_base);
        $("#sueldo").val(var_total_sueldo);
    });


    /*
    $("#precioCompra").keyup(function() {
        var var_precioCompra = parseFloat($("#precioCompra").val());
        var var_precioVenta = parseFloat($("#precioVenta").val());
        var var_ganancia = var_precioVenta - var_precioCompra;
        //alert(var_ganancia);
        $("#ganancia").val(var_ganancia);
    });

    $("#precioVenta").keyup(function() {
        var var_precioCompra = parseFloat($("#precioCompra").val());
        var var_precioVenta = parseFloat($("#precioVenta").val());
        var var_ganancia = var_precioVenta - var_precioCompra;
        //alert(var_ganancia);
        $("#ganancia").val(var_ganancia);
    });

    $("#porcentaje").change(function() {
        //alert("hol");
        var var_porcentaje = (parseFloat($("#porcentaje").val()) / 100); //0.08
        var var_precioVenta = parseFloat($("#precioVenta").val()); //80
        var var_porciento = var_precioVenta * var_porcentaje; //80 * 0.08 = 6.4
        var var_gananciaAnt = parseFloat($("#ganancia").val()); //40
        var var_gananciaAct = parseFloat($("#precioVenta").val()) + var_porciento; //40 + 6.4 = 46.4

        $("#gananciaImp").val(var_gananciaAct);
    });*/

});