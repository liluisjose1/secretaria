<?php
//ob_start();
include("../../config/conexion.php");


$sql = "TRUNCATE TABLE personas;";
		$ejecutar_consulta = $conexion->query(($sql));
		print($sql);
			if($ejecutar_consulta){
				header("Location: ../mantenimiento.php?error=no");
			}
			else{
				header("Localtion: mantenimiento.php");
			}

 ?>
