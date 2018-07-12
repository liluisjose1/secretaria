<?php
/*~ Archivo control.php
.---------------------------------------------------------------------------.
|    Software: SI -  Sistema de Informacion                                 |
|     Versión: 1.0                                                          |
|   Lenguajes: PHP, HTML, CSS3 y Javascript                                 |
| ------------------------------------------------------------------------- |
|   Autores: Luis Iraheta                                                   |
| Copyright (C) 2018, FMO-UES. Todos los derechos reservados.               |
| ------------------------------------------------------------------------- |
|                                                                           |
| Este archivo es parte del sistema de informacion SI para la unidad        |
| de Proyeccion Social.                                                     |
|                                                                           |
'---------------------------------------------------------------------------'
*/
?>
<?php
	include("../../config/conexion.php");

	$usuario = $_POST["user_txt"];
	$password = $_POST["password_txt"];
	$consulta = "SELECT usuario FROM usuario WHERE usuario='$usuario' AND password=SHA1('$password')";
	
	$ejecutar_consulta = $conexion->query($consulta);

	$regs = $ejecutar_consulta->num_rows;
	
	if($regs!=0)
	{
		session_start();

		$_SESSION["autentificado"]=true;
		$_SESSION["usuario"]=$_POST["user_txt"];
		setcookie("sesion",$_SESSION["autentificado"],time()+3600,"/");
		header("Location: ../home.php");
	}

	else
	{
		header("Location: ../index.php?error=si");
	}
?>