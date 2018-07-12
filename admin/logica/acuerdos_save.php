<?php
//sob_start();


include("../../config/conexion.php");

$id = $_POST["n_acuerdo"];
$personas = $_POST['personas'];

$fecha= $_POST["fecha"];
$tipo_acuerdo= $_POST["tipo_acuerdo"];

$acuerdo = $_FILES["archivo"]["name"];
$ruta = $_FILES["archivo"]["tmp_name"];
$destino="acuerdos/".$acuerdo;
copy($ruta,$destino);



$sql1 = "INSERT INTO `acuerdos`(`id`, `fecha`, `tipo_acuerdo`, `ruta`) VALUES ('$id','$fecha','$tipo_acuerdo','$destino')";
		$ejecutar_consulta1 = $conexion->query(($sql1));




foreach ($personas as $row ) {

	$sql = "INSERT INTO `personas`(`nombre`, `id_acuerdo`) VALUES ('$row','$id')";
	$ejecutar_consulta = $conexion->query($sql);
//	print_r($sql); echo "<br>";

}

if($ejecutar_consulta1){
	header("Location: ../acuerdos.php?error=no");
}
else{
	header("Localtion: ../acuerdos.php?error=si");
}
 ?>
