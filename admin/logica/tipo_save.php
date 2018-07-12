<?php
ob_start();
include("../../config/conexion.php");

$tipo = $_POST["tipo"];
//$date = Date("Y-m-d");



			$consulta = "INSERT INTO  `tipo`(`tipo_acuerdo`) VALUES ('$tipo')";
			$ejecutar_consulta = $conexion->query(($consulta));

			/* Si se ejecutó la consulta, redirigimos al archivo del formulario con una clave de que se ejecutó correctamente. */
			if($ejecutar_consulta){
				header("Location: ../tipos.php?error=no");
			}
	/* Si existen registros, indicamos que el usuario a crear ya existe. */
	else{
			header("Localtion: ../tipos.php?error=si");
		}
 ?>
