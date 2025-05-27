<?php

session_start();
if(!empty($_POST)){
	if(isset($_POST["id_producto"]) && isset($_POST["q"])){
		// si es el primer producto simplemente lo agregamos
		if(empty($_SESSION["carro"])){
			$_SESSION["carro"]=array( array("id_producto"=>$_POST["id_producto"],"q"=> $_POST["q"]));
		}else{
			
			$carro = $_SESSION["carro"];
			$repeated = false;
			
			foreach ($carro as $c) {
				
				if($c["id_producto"]==$_POST["id_producto"]){
					$repeated=true;
					break;
				}
			}
			
			if($repeated){
				print "<script>alert('Error: Producto Repetido!');</script>";
			}else{
				
				array_push($carro, array("id_producto"=>$_POST["id_producto"],"q"=> $_POST["q"]));
				$_SESSION["carro"] = $carro;
			}
		}
		print "<script>window.location='productos.php';</script>";
	}
}

?>

