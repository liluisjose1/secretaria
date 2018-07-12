<?php
/*~ Archivo conexion.php
.---------------------------------------------------------------------------.
|    Software: SI - Secreataria Decanato FMO                                   |
|     Versión: 1.0                                                          |
|   Lenguajes: PHP, HTML, CSS3 y Javascript                                 |
| ------------------------------------------------------------------------- |
|   Autores: Luis Iraheta                                                   |
| Copyright (C) 2018, FMO-UES. Todos los derechos reservados.               |
| ------------------------------------------------------------------------- |
|                                                                           |
| Este archivo es parte del sistema de Secreataria Decanato                 |
|                                                                           |
'---------------------------------------------------------------------------'
*/

	function conectarse()
	{
		$servidor 	=	 "localhost";
		$usuario 	=	 "root";
		$password 	=	 "123456";
		$bd 		=	 "secretaria";

		$conectar = new mysqli($servidor, $usuario, $password, $bd);
		    return $conectar;
	}

	$conexion = conectarse();
?>
