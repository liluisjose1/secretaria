<?php
/*~ Archivo salir.php
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
session_destroy();
setcookie("sesion", "",time()-1,"/");
header("Location: ../index.php");
?>