$(document).ready(function() {
    var mysql = require('mysql');

    var con = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "1234",
    database: "corona"
    });

    //variables del formulario..
    var articulo = document.getElementById("nombre");
    var form_price = document.getElementById("precio");
    var form_stop_min = document.getElementById("stop_min");
    var empresa = document.getElementById("empresa");


    //variables
    var precio, stop_min;

    con.connect(function(err) {
    if (err) throw err;
    con.query("SELECT precio,stop_min FROM corona.tbl_articulos where nombre = articulo ", function (err, result, fields) {
        if (err) throw err;
        precio = result("precio");
        stop_min = result("stop_min");
    });
    });

    form_price.Value(precio);
    form_stop_min.Value(stop_min);
});