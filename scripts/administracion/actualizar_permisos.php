<?php
include("../conexion/cone.php");
session_start();

$empresa= $_SESSION["empresa_db"];
$rol= $_POST["rol"];
if(isset($_POST["admin"])){
    $conexion->query("UPDATE $empresa.tbl_permisos SET administracion = 1 WHERE rol = '$rol'" );
}
else{
    $conexion->query("UPDATE $empresa.tbl_permisos SET administracion = 0 WHERE rol = '$rol'" );
}
if(isset($_POST["usuarios"])){
    $conexion->query("UPDATE $empresa.tbl_permisos SET usuarios = 1 WHERE rol = '$rol'" );
}
else{
    $conexion->query("UPDATE $empresa.tbl_permisos SET usuarios = 0 WHERE rol = '$rol'" );
}
if(isset($_POST["editar_user"])){
    $conexion->query("UPDATE $empresa.tbl_permisos SET modificar_user = 1 WHERE rol = '$rol'" );
}
else{
    $conexion->query("UPDATE $empresa.tbl_permisos SET modificar_user = 0 WHERE rol = '$rol'" );
}
if(isset($_POST["eliminar_user"])){
    $conexion->query("UPDATE $empresa.tbl_permisos SET eliminar_user = 1 WHERE rol = '$rol'" );
}
else{
    $conexion->query("UPDATE $empresa.tbl_permisos SET eliminar_user = 0 WHERE rol = '$rol'" );
}
if(isset($_POST["agregar_user"])){
    $conexion->query("UPDATE $empresa.tbl_permisos SET agregar_user= 1 WHERE rol = '$rol'" );
}
else{
    $conexion->query("UPDATE $empresa.tbl_permisos SET agregar_user = 0 WHERE rol = '$rol'" );
}
if(isset($_POST["ver_user"])){
    $conexion->query("UPDATE $empresa.tbl_permisos SET ver_user = 1 WHERE rol = '$rol'" );
}
else{
    $conexion->query("UPDATE $empresa.tbl_permisos SET ver_user = 0 WHERE rol = '$rol'" );
}
if(isset($_POST["roles"])){
    $conexion->query("UPDATE $empresa.tbl_permisos SET roles = 1 WHERE rol = '$rol'" );
}
else{
    $conexion->query("UPDATE $empresa.tbl_permisos SET roles = 0 WHERE rol = '$rol'" );
}
if(isset($_POST["ver_roles"])){
    $conexion->query("UPDATE $empresa.tbl_permisos SET ver_roles = 1 WHERE rol = '$rol'" );
}
else{
    $conexion->query("UPDATE $empresa.tbl_permisos SET ver_roles = 0 WHERE rol = '$rol'" );
}
if(isset($_POST["agregar_roles"])){
    $conexion->query("UPDATE $empresa.tbl_permisos SET agregar_roles = 1 WHERE rol = '$rol'" );
}
else{
    $conexion->query("UPDATE $empresa.tbl_permisos SET Agregar_roles = 0 WHERE rol = '$rol'" );
}
if(isset($_POST["modificar_roles"])){
    $conexion->query("UPDATE $empresa.tbl_permisos SET modificar_roles= 1 WHERE rol = '$rol'" );
}
else{
    $conexion->query("UPDATE $empresa.tbl_permisos SET modificar_roles = 0 WHERE rol = '$rol'" );
}
if(isset($_POST["eliminar_roles"])){
    $conexion->query("UPDATE $empresa.tbl_permisos SET eliminar_roles= 1 WHERE rol = '$rol'" );
}
else{
    $conexion->query("UPDATE $empresa.tbl_permisos SET eliminar_roles = 0 WHERE rol = '$rol'" );
}
if(isset($_POST["empresa"])){
    $conexion->query("UPDATE $empresa.tbl_permisos SET empresa = 1 WHERE rol = '$rol'" );
}
else{
    $conexion->query("UPDATE $empresa.tbl_permisos SET empresa = 0 WHERE rol = '$rol'" );
}
if(isset($_POST["ver_empresa"])){
    $conexion->query("UPDATE $empresa.tbl_permisos SET ver_empresa = 1 WHERE rol = '$rol'" );
}
else{
    $conexion->query("UPDATE $empresa.tbl_permisos SET ver_empresa = 0 WHERE rol = '$rol'" );
}
if(isset($_POST["editar_empresa"])){
    $conexion->query("UPDATE $empresa.tbl_permisos SET editar_empresa = 1 WHERE rol = '$rol'" );
}
else{
    $conexion->query("UPDATE $empresa.tbl_permisos SET editar_empresa = 0 WHERE rol = '$rol'" );
}
if(isset($_POST["condiciones_p"])){
    $conexion->query("UPDATE $empresa.tbl_permisos SET condiciones_p = 1 WHERE rol = '$rol'" );
}
else{
    $conexion->query("UPDATE $empresa.tbl_permisos SET condiciones_p = 0 WHERE rol = '$rol'" );
}
if(isset($_POST["agregar_condiciones_p"])){
    $conexion->query("UPDATE $empresa.tbl_permisos SET agregar_condiciones_p = 1 WHERE rol = '$rol'" );
}
else{
    $conexion->query("UPDATE $empresa.tbl_permisos SET agregar_condiciones_p = 0 WHERE rol = '$rol'" );
}
if(isset($_POST["ver_condiciones_p"])){
    $conexion->query("UPDATE $empresa.tbl_permisos SET ver_condiciones_p = 1 WHERE rol = '$rol'" );
}
else{
    $conexion->query("UPDATE $empresa.tbl_permisos SET ver_condiciones_p = 0 WHERE rol = '$rol'" );
}
if(isset($_POST["modificar_condiciones_p"])){
    $conexion->query("UPDATE $empresa.tbl_permisos SET modificar_condiciones_p = 1 WHERE rol = '$rol'" );
}
else{
    $conexion->query("UPDATE $empresa.tbl_permisos SET modificar_condiciones_p = 0 WHERE rol = '$rol'" );
}
if(isset($_POST["eliminar_condiciones_p"])){
    $conexion->query("UPDATE $empresa.tbl_permisos SET eliminar_condiciones_p = 1 WHERE rol = '$rol'" );
}
else{
    $conexion->query("UPDATE $empresa.tbl_permisos SET eliminar_condiciones_p = 0 WHERE rol = '$rol'" );
}
if(isset($_POST["cod_impuestos"])){
    $conexion->query("UPDATE $empresa.tbl_permisos SET cod_impuestos = 1 WHERE rol = '$rol'" );
}
else{
    $conexion->query("UPDATE $empresa.tbl_permisos SET cod_impuestos = 0 WHERE rol = '$rol'" );
}
if(isset($_POST["agregar_cod_impuestos"])){
    $conexion->query("UPDATE $empresa.tbl_permisos SET agregar_cod_impuestos = 1 WHERE rol = '$rol'" );
}
else{
    $conexion->query("UPDATE $empresa.tbl_permisos SET agregar_cod_impuestos = 0 WHERE rol = '$rol'" );
}
if(isset($_POST["editar_cod_impuestos"])){
    $conexion->query("UPDATE $empresa.tbl_permisos SET editar_cod_impuestos = 1 WHERE rol = '$rol'" );
}
else{
    $conexion->query("UPDATE $empresa.tbl_permisos SET editar_cod_impuestos = 0 WHERE rol = '$rol'" );
}
if(isset($_POST["ver_cod_impuestos"])){
    $conexion->query("UPDATE $empresa.tbl_permisos SET ver_cod_impuestos = 1 WHERE rol = '$rol'" );
}
else{
    $conexion->query("UPDATE $empresa.tbl_permisos SET ver_cod_impuestos = 0 WHERE rol = '$rol'" );
}
if(isset($_POST["eliminar_cod_impuestos"])){
    $conexion->query("UPDATE $empresa.tbl_permisos SET eliminar_cod_impuestos = 1 WHERE rol = '$rol'" );
}
else{
    $conexion->query("UPDATE $empresa.tbl_permisos SET eliminar_cod_impuestos = 0 WHERE rol = '$rol'" );
}
if(isset($_POST["almacenes"])){
    $conexion->query("UPDATE $empresa.tbl_permisos SET almacenes = 1 WHERE rol = '$rol'" );
}
else{
    $conexion->query("UPDATE $empresa.tbl_permisos SET almacenes = 0 WHERE rol = '$rol'" );
}
if(isset($_POST["agregar_almacenes"])){
    $conexion->query("UPDATE $empresa.tbl_permisos SET agregar_almacenes = 1 WHERE rol = '$rol'" );
}
else{
    $conexion->query("UPDATE $empresa.tbl_permisos SET agregar_almacenes = 0 WHERE rol = '$rol'" );
}
if(isset($_POST["ver_almacenes"])){
    $conexion->query("UPDATE $empresa.tbl_permisos SET ver_almacenes = 1 WHERE rol = '$rol'" );
}
else{
    $conexion->query("UPDATE $empresa.tbl_permisos SET ver_almacenes = 0 WHERE rol = '$rol'" );
}
if(isset($_POST["editar_almacenes"])){
    $conexion->query("UPDATE $empresa.tbl_permisos SET editar_almacenes = 1 WHERE rol = '$rol'" );
}
else{
    $conexion->query("UPDATE $empresa.tbl_permisos SET editar_almacenes = 0 WHERE rol = '$rol'" );
}
if(isset($_POST["eliminar_almacenes"])){
    $conexion->query("UPDATE $empresa.tbl_permisos SET eliminar_almacenes = 1 WHERE rol = '$rol'" );
}
else{
    $conexion->query("UPDATE $empresa.tbl_permisos SET eliminar_almacenes = 0 WHERE rol = '$rol'" );
}
if(isset($_POST["categorias"])){
    $conexion->query("UPDATE $empresa.tbl_permisos SET categorias = 1 WHERE rol = '$rol'" );
}
else{
    $conexion->query("UPDATE $empresa.tbl_permisos SET categorias = 0 WHERE rol = '$rol'" );
}
if(isset($_POST["agregar_categorias"])){
    $conexion->query("UPDATE $empresa.tbl_permisos SET agregar_categorias = 1 WHERE rol = '$rol'" );
}
else{
    $conexion->query("UPDATE $empresa.tbl_permisos SET agregar_categorias = 0 WHERE rol = '$rol'" );
}
if(isset($_POST["ver_categorias"])){
    $conexion->query("UPDATE $empresa.tbl_permisos SET ver_categorias = 1 WHERE rol = '$rol'" );
}
else{
    $conexion->query("UPDATE $empresa.tbl_permisos SET ver_categorias = 0 WHERE rol = '$rol'" );
}
if(isset($_POST["modificar_categorias"])){
    $conexion->query("UPDATE $empresa.tbl_permisos SET modificar_categorias = 1 WHERE rol = '$rol'" );
}
else{
    $conexion->query("UPDATE $empresa.tbl_permisos SET modificar_categorias = 0 WHERE rol = '$rol'" );
}
if(isset($_POST["eliminar_categorias"])){
    $conexion->query("UPDATE $empresa.tbl_permisos SET eliminar_categorias = 1 WHERE rol = '$rol'" );
}
else{
    $conexion->query("UPDATE $empresa.tbl_permisos SET eliminar_categorias = 0 WHERE rol = '$rol'" );
}
if(isset($_POST["clientes"])){
    $conexion->query("UPDATE $empresa.tbl_permisos SET clientes = 1 WHERE rol = '$rol'" );
}
else{
    $conexion->query("UPDATE $empresa.tbl_permisos SET clientes = 0 WHERE rol = '$rol'" );
}
if(isset($_POST["suplidores"])){
    $conexion->query("UPDATE $empresa.tbl_permisos SET suplidores = 1 WHERE rol = '$rol'" );
}
else{
    $conexion->query("UPDATE $empresa.tbl_permisos SET suplidores = 0 WHERE rol = '$rol'" );
}
if(isset($_POST["ventas"])){
    $conexion->query("UPDATE $empresa.tbl_permisos SET ventas = 1 WHERE rol = '$rol'" );
}
else{
    $conexion->query("UPDATE $empresa.tbl_permisos SET ventas = 0 WHERE rol = '$rol'" );
}
if(isset($_POST["compras"])){
    $conexion->query("UPDATE $empresa.tbl_permisos SET compras = 1 WHERE rol = '$rol'" );
}
else{
    $conexion->query("UPDATE $empresa.tbl_permisos SET compras = 0 WHERE rol = '$rol'" );
}
if(isset($_POST["cxc"])){
    $conexion->query("UPDATE $empresa.tbl_permisos SET cxc = 1 WHERE rol = '$rol'" );
}
else{
    $conexion->query("UPDATE $empresa.tbl_permisos SET cxc = 0 WHERE rol = '$rol'" );
}
if(isset($_POST["cxp"])){
    $conexion->query("UPDATE $empresa.tbl_permisos SET cxp = 1 WHERE rol = '$rol'" );
}
else{
    $conexion->query("UPDATE $empresa.tbl_permisos SET cxp = 0 WHERE rol = '$rol'" );
}
if(isset($_POST["admin"])){
    $conexion->query("UPDATE $empresa.tbl_permisos SET administracion = 1 WHERE rol = '$rol'" );
}
else{
    $conexion->query("UPDATE $empresa.tbl_permisos SET administracion = 0 WHERE rol = '$rol'" );
}
if(isset($_POST["admin"])){
    $conexion->query("UPDATE $empresa.tbl_permisos SET administracion = 1 WHERE rol = '$rol'" );
}
else{
    $conexion->query("UPDATE $empresa.tbl_permisos SET administracion = 0 WHERE rol = '$rol'" );
}
if(isset($_POST["admin"])){
    $conexion->query("UPDATE $empresa.tbl_permisos SET administracion = 1 WHERE rol = '$rol'" );
}
else{
    $conexion->query("UPDATE $empresa.tbl_permisos SET administracion = 0 WHERE rol = '$rol'" );
}
if(isset($_POST["admin"])){
    $conexion->query("UPDATE $empresa.tbl_permisos SET administracion = 1 WHERE rol = '$rol'" );
}
else{
    $conexion->query("UPDATE $empresa.tbl_permisos SET administracion = 0 WHERE rol = '$rol'" );
}
if(isset($_POST["admin"])){
    $conexion->query("UPDATE $empresa.tbl_permisos SET administracion = 1 WHERE rol = '$rol'" );
}
else{
    $conexion->query("UPDATE $empresa.tbl_permisos SET administracion = 0 WHERE rol = '$rol'" );
}
if(isset($_POST["admin"])){
    $conexion->query("UPDATE $empresa.tbl_permisos SET administracion = 1 WHERE rol = '$rol'" );
}
else{
    $conexion->query("UPDATE $empresa.tbl_permisos SET administracion = 0 WHERE rol = '$rol'" );
}
if(isset($_POST["admin"])){
    $conexion->query("UPDATE $empresa.tbl_permisos SET administracion = 1 WHERE rol = '$rol'" );
}
else{
    $conexion->query("UPDATE $empresa.tbl_permisos SET administracion = 0 WHERE rol = '$rol'" );
}


header("location:../../views/administracion/ver_roles.php");
?>