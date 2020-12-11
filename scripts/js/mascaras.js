
$(document).ready(function(){
    $("#numero1").mask("9,99", {

        // Generamos un evento en el momento que se rellena
        completed:function(){
            $("#numero1").addClass("ok")
        }
    });

    // Definimos las mascaras para cada input
    $("#date").mask("99/99/9999");
    var longitud = $(".parmil", this).val().length;
    if(longitud == 5)
    {
        $(".parmil").mask("99,000");
    }
    if(longitud == 4)
    {
        $(".parmil").mask("9,000");
    }
    if(longitud == 6)
    {
        $(".parmil").mask("999,000");
    }
    if(longitud == 7)
    {
        $(".parmil").mask("9,000,000");
    }
    if(longitud == 8)
    {
        $(".parmil").mask("99,000,000");
    }
    if(longitud == 9)
    {
        $(".parmil").mask("999,000,000");
    }
    
    $("#movil").mask("(999)-999-9999");
    $("#letras").mask("aaa");
    $("#comodines").mask("?");
    $(".fa-2x").click(function(){
        $("#menu_lateral").toggle();
    });
});