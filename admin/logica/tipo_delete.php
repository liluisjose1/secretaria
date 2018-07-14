<?php
ob_start();
include("../../config/conexion.php");

$id = $_POST["tipo_id"];

$sql = "DELETE FROM `tipo` WHERE `id`='$id'";
		$ejecutar_consulta = $conexion->query(($sql));
		print($sql);
			if($ejecutar_consulta){
				header("Location: ../tipos.php?error=no");
			}
			else{
				header("Localtion: ../tipos.php?error=si");
			}

 ?>
