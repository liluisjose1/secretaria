<?php
ob_start();
include("../../config/conexion.php");


$sql = "SET FOREIGN_KEY_CHECKS = 0; TRUNCATE TABLE acuerdos; SET FOREIGN_KEY_CHECKS = 1;";
		$ejecutar_consulta = $conexion->query(($sql));
			if($ejecutar_consulta){
				header("Location: ../mantenimiento.php?error=no");
			}
			else{
				header("Localtion: mantenimiento.php");
			}

 ?>
