<?php 
session_start();
include "conexion.php";
if(!empty($_POST)){
$q1 = $conect->query("insert into carro(email_cliente,crear) value(\"$_POST[email]\",NOW())");
if($q1){
$id_carro = $conect->insert_id;
foreach($_SESSION["carro"] as $c){
$q1 = $conect->query("insert into carro_producto(id_producto,q,id_carro) value($c[id_producto],$c[q],$id_carro)");
}
unset($_SESSION["carro"]);
}
}
print "<script>alert('To process your sale, press next and register');window.location='../html/login.html';</script>";

?>