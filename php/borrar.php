<?php

session_start();
if(!empty($_SESSION["carro"])){
	$carro  = $_SESSION["carro"];
	if(count($carro)==1){ unset($_SESSION["carro"]); }
	else{
		$newcart = array();
		foreach($carro as $c){
			if($c["id_producto"]!=$_GET["id"]){
				$newcart[] = $c;
			}
		}
		$_SESSION["carro"] = $newcart;
	}
}
print "<script>window.location='carro.php';</script>";

?>

