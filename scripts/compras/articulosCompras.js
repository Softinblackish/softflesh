$(document).ready(function () {
  //alert($("#articulo").val());

  function cargar_datos(articulo) {
    //alert("Estoy en ajax " + articulo);
    $.ajax({
      url: "consulta_articulos.php",
      type: "post",
      dataType: "html",
      data: "articulo="+articulo,
      success: function (r) {
        alert(r);
      }
    });
    /*.done(function(precio_art,stop_min_art){
            alert(precio_art);
            alert(stop_min_art);
            $('#precio_compra').val(precio_art);
            $('#stock').val(stop_min_art);
        })*/
  }

  $("#articulo").change(function () {
    var art = $("#articulo").val();
    cargar_datos(art);
  });

  /*

    
    
    */
});
