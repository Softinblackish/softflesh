$(document).ready(function() {

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
    });

});