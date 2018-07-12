<?php
ob_start();
include("../../config/conexion.php");

$id          = $_POST["id"];
$contenido   = $_POST["contenido"];
$departamento= $_POST["dep"];
$mes         =$_POST["mes"];
$anio        =$_POST["anio"];

//delete
//$sql_delete = "DELETE FROM `proyectos` WHERE `id`=$id";
$sql = "UPDATE `acuerdos` SET `id`='$id',`registro`='$contenido', `dep_sec`='$departamento', `mes`='$mes', `anio`='$anio' WHERE `id`='$id'";
		$ejecutar_consulta = $conexion->query(($sql));

		print($sql);
			if($ejecutar_consulta){
				header("Location: ../acuerdos_edit.php?error=no&id=$id");
			}
			else{
				header("Localtion: ../acuerdos_edit.php?error=si&id=$id");
			}

 ?>
