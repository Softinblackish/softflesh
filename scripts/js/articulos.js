$(document).ready(function() {

    //Creo mis variables del modulo articulos....
    var nombre, codigo, descripcion, referencia, cod_impuesto, categoria, unidad;

    //asigno mi formulario a la variable formulario.
    var formulario = document.getElementById('save');
    
    //creo el evento de para prevenil vista en el enlace
    formulario.addEventListener('submit', function(e) {
        e.preventDefault();
    })
    //asigno los datos del formulario a una variable datos
    var datos = new FormData(formulario);

    //lleno mis variables de datos....
    nombre = datos.get('nombre');
    codigo = datos.get('codigo');
    descripcion = datos.get('descripcion');
    referencia = datos.get('referencia');
    cod_impuesto = datos.get('cod_impuesto');
    categoria = datos.get('categoria');
    unidad = datos.get('unidad');

    fetch('../scripts/articulos/articulos.php' , {
        method : 'POST',
        body   : datos
    });

    
    
    /*
    $("#save").click(function(e){
      e.preventDefault();  
    });*/

});