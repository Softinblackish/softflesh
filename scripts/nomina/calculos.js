$(document).ready(function() {

    
    $("#salario_base").keyup(function() {
        var var_salario_base = parseFloat($("#salario_base").val());
        var var_horas_trabajo = parseFloat($("#horas_trabajadas").val());
        var var_salario_dia = Math.round(var_salario_base/28);
        var var_salario_hora = Math.round(var_salario_dia/var_horas_trabajo);
        //alert(var_salario_base);
        $("#salario_mes").val(var_salario_base);
        $("#salario_dia").val(var_salario_dia);
        $("#salario_hora").val(var_salario_hora);
    });
    $("#horas_trabajadas").change(function() {
        var var_salario_base = parseFloat($("#salario_base").val());
        var var_horas_trabajo = parseFloat($("#horas_trabajadas").val());
        var var_salario_dia = Math.round(var_salario_base/28);
        var var_salario_hora = Math.round(var_salario_dia/var_horas_trabajo);
        //alert(var_salario_base);
        $("#salario_mes").val(var_salario_base);
        $("#salario_dia").val(var_salario_dia);
        $("#salario_hora").val(var_salario_hora);
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