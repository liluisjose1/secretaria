<?php
ob_start();
include("../../config/conexion.php");

$id= $_GET["id"];
//delete

$sql = "DELETE FROM `acuerdos` WHERE `id`='$id'";
		$ejecutar_consulta = $conexion->query(($sql));

			if($ejecutar_consulta){
				header("Location: ../acuerdos_view.php?error=no");
			}
			else{
				header("Localtion: ../acuerdos_view.php?error=si");
			}

 ?>
