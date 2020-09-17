<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <script src="http://code.jquery.com/jquery-1.9.1.js" type="text/javascript"></script>
    <script src="scripts/js/query/dist/jquery.mask.js" type="text/javascript"></script>
    <style>
    div span {
        display:inline-block;
        width:250px;
    }
    h2 {
        font-size:1em;
    }
    input {
        padding:5px;
        border-radius: 5px;
        -moz-border-radius: 5px;
        -webkit-border-radius: 5px;
        -o-border-radius: 5px;
    }
    input:focus {
        outline:0px;
    }
    .ok {
        border-color:blue;
    }
    </style>
 
    <script type="text/javascript">
        $(document).ready(function($){
            $("#numero1").mask("9,99", {
 
                // Generamos un evento en el momento que se rellena
                completed:function(){
                    $("#numero1").addClass("ok")
                }
            });
 
            // Definimos las mascaras para cada input
            $("#date").mask("99/99/9999");
            $("#movil").mask("999 99 99 99");
            $("#letras").mask("aaa");
            $("#comodines").mask("?");
        });
    </script>
</head>
 
<body>
<h1>Mascaras en los inputs</h1>
<h2>Aqui se muestra como utilizar el plugin de jquery maskedinput para poner mascaras en nuestros inputs.</h2>
 
<div><span>numero con dos decimales</span><input type="text" id="numero1"> 9,99 (generamos un evento al rellenarlo)</div>
<div><span>fecha</span><input type="text" id="date"> 99/99/9999</div>
<div><span>movil</span><input type="text" id="movil"> 999 99 99 99</div>
<div><span>Solo tres letras</span><input type="text" id="letras"> aaa</div>
 
<p><a href="http://digitalbush.com/projects/masked-input-plugin">http://digitalbush.com/projects/masked-input-plugin</a></p>
<p><a href="http://www.lawebdelprogramador.com">http://www.lawebdelprogramador.com</a></p>
</body>
</html>
