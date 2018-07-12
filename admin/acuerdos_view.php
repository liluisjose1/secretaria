<?php include"template/header.php"; ?>
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Registros</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Registros</a></li>
                        <li class="breadcrumb-item active">Ver</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-lg-12">
                    <?php
                                    error_reporting(E_ALL ^ E_NOTICE);
                                    if($_GET["error"]=="no"){
                                        echo "<div class='alert alert-primary alert-dismissable'>";
                                        echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
                                        echo "Eliminado con exito";
                                        echo "</div>";
                                    } else if($_GET["error"]=="si"){
                                        echo "<div class='alert alert-danger alert-dismissable'>";
                                        echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
                                        echo "Error al eliminar";
                                        echo "</div>";
                                    }


                    ?>
                        <div class="card">
                            <div class="card-title">
                                <h4>Registro</h4>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Numero de Acuerdo</th>
                                                <th>Fecha</th>
                                                <th>Tipo</th>
                                                <th>Personas</th>
                                                <th style="width: 300px;">Accion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php
                                            if(!isset($conexion)){ include("../config/conexion.php");}
                                            $sql = "SELECT * from acuerdos";

                                            $ejecutar = $conexion->query($sql);
                                            $cont=0;
                                            while($reg = $ejecutar->fetch_assoc()){
                                                $id_a= ($reg["id"]);
                                                echo "<tr>";
                                                echo "<td>".($reg["id"])."</td>";
                                                echo "<td>".($reg["fecha"])."</td>";
                                                echo "<td>".($reg["tipo_acuerdo"])."</td>";
                                                $sql2 = "SELECT nombre from personas WHERE id_acuerdo='$id_a'";
                                                $ejecutar2 = $conexion->query($sql2);
                                                echo "<td>";
                                                while($reg2 = $ejecutar2->fetch_assoc())
                                                {

                                                  print_r($reg2['nombre']);
                                                  echo "<br>";

                                                  //echo "<td>".($reg2["nombre"])."</td>";
                                                }
                                                echo "</td>";
                                                echo "<td><a class='btn btn-primary' href="."acuerdos_ver.php?id=".$reg['id']."><i class='fa fa-eye'> Ver</i></a>  <a class='btn btn-danger' href="."logica/acuerdos_delete.php?id=".$reg['id']."><i class='fa fa-trash'> Eliminar</i></a></td>";
                                                echo "</tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href=""></a>
                <!-- End PAge Content -->
<?php include"template/footer.php"; ?>
