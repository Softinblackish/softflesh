$(document).ready(function(){
    $(".editar").click(function(){
        $(".editar").hide();
        $(".guardar").show();
        $(".form-control").prop('disabled', false);
    });
    $(".cerrar").click(function(){
        $(".editar").show();
        $(".guardar").hide();
        $(".form-control").prop('disabled', true);
    });

});