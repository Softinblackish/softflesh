<?php
include("../conexion/cone.php");

session_start();
$empresa = $_SESSION['empresa_db'];

echo $nombre_cliente = $_POST['nombre'];
echo $pais = $_POST['pais'];
echo $ciudad = $_POST['provincia'];
echo $direccion = $_POST['direccion'];
echo $telefono = $_POST['telefono'];
echo $tipo = $_POST['tipo_cliente'];
echo $referencia = $_POST['referencia'];
echo $rnc  = $_POST['rnc'];
echo $condicion_pago = $_POST['condicion'];
echo $limite_credito = $_POST['credito'];

$id_cliente = $_POST['id'];
echo $id_cliente;
$actualizar_cliente = $conexion->query("UPDATE $empresa.tbl_clientes SET nombre_cliente= '$nombre_cliente', Pais = '$pais', provincia =  '$ciudad', direccion =  '$direccion', telefono_cliente = '$telefono' , tipo_cliente= '$tipo' , condicion_pago = '$condicion_pago' , limite_credito = $limite_credito ,rnc_cliente= '$rnc'  WHERE id_cliente = $id_cliente ");

header('location:../../views/clientes/ver_clientes.php');
?>