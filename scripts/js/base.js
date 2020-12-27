
$(document).ready(function() {
   $(".menu_lv3").hide();

    $("#clientes").click(function() {
       $(".menu_clientes").toggle(); 
    });
    $("#suplidores").click(function() {
        $(".menu_suplidores").toggle(); 
     });
     $("#ventas").click(function() {
        $(".menu_ventas").toggle(); 
     });
     $("#compras").click(function() {
        $(".menu_compras").toggle(); 
     });
    
     $("#cxc").click(function() {
        $(".menu_cxc").toggle(); 
     });
     $("#cxp").click(function() {
        $(".menu_cxp").toggle(); 
     });
     $("#inventario").click(function() {
        $(".menu_inventario").toggle(); 
     });

     $("#nomina").click(function() {
        $(".menu_nomina").toggle(); 
     });

     $("#contabilidad").click(function() {
        $(".menu_contabilidad").toggle(); 
     });

     $("#usuario").click(function() {
        $("#menu-user").toggle(); 
     });

   
});
    