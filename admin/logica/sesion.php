<?php
/*~ Archivo sesion.php
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
session_start();
//Evaluo que la sesión continue verificando una de las variables creadas en control.php, cuando esta ya no coincida con su valor inicial se redirije al archivo de salir.php
if(!$_SESSION["autentificado"]){
    header("Location: salir.php");
}
?>