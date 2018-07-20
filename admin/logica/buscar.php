<?php
 include("../../config/conexion.php");


      $buscar = $_POST['b'];
       
      if(!empty($buscar)) {
            buscar($buscar);
      }
       
      function buscar($b) {
            $con = mysql_connect('localhost','root', 'root');
            mysql_select_db('base_de_datos', $con);
       
            $sql = "SELECT * FROM anuncios WHERE nombre LIKE '%".$b."%'";
            $ejecutar_consulta = $conexion->query($sql1);
            if($ejecutar_consulta == 0){
                  echo "No se han encontrado resultados para '<b>".$b."</b>'.";
            }else{
                  while($reg = $ejecutar_consulta->fetch_assoc()){
                                                echo "<tr>";
                                                echo "<td>".($reg["id"])."</td>";
                                                echo "<td>".($reg["tipo_acuerdo"])."</td>";
                                                echo "</tr>";
                                            }
                  while($row=mysql_fetch_array($sql)){
                        $nombre = $row['nombre'];
                        $id = $row['id'];
                         
                        echo $id." - ".$nombre."<br /><br />";    
                  }
            }
      }
       
?>