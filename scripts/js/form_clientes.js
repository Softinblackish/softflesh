$(document).ready(function(){
    $("#tipo").change(function(){
        if($("#tipo").val() == "1")
            {
                $("#rnc").mask('000000000');
                $("#rnc").attr("placeholder", "000000000").placeholder();
                

            }
        if($("#tipo").val() == "2")
            {
                $("#rnc").mask('000-0000000-0');

                $("#rnc").attr("placeholder", "000-0000000-0").placeholder();
            }
        if($("#tipo").val() == "3")
            {
                
                $("#rnc").attr("placeholder", "Pasaporte").placeholder();
            }
    });

    $('#movil').mask('(000)-000-0000');
    $("#rnc").mask('000000000');

});