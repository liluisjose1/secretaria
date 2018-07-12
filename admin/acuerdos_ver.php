<?php
ob_start();
include("../config/conexion.php");


$id= $_GET["id"];


$sql = "SELECT * from acuerdos WHERE id='$id'";
$ejecutar_consulta = $conexion->query($sql);
$row = mysqli_fetch_row($ejecutar_consulta);
?>

<?php include"template/header.php"; ?>
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Acuerdos</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="acuerdos_view.php">Acuerdos</a></li>
                        <li class="breadcrumb-item active">Ver</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <form method="POST" action="logica/acuerdos_update.php" >
                <div class="row">
                              <input type="hidden" name="id" value='<?php echo $id;?>'>
                    <div class="col-12">
                                     <?php
                                    error_reporting(E_ALL ^ E_NOTICE);
                                    if($_GET["error"]=="no"){
                                        echo "<div class='alert alert-primary alert-dismissable'>";
                                        echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
                                        echo "Registro se actualizo con exito";
                                        echo "</div>";
                                    } else if($_GET["error"]=="si"){
                                        echo "<div class='alert alert-danger alert-dismissable'>";
                                        echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
                                        echo "Error al registrar";
                                        echo "</div>";
                                    }


                                ?>
                        <div class="card">
                            <div class="card-body">
                              <br>
                              <div class="row">
                                <div class="col-md-2">
                                  <label for="example-input-normal" class="col-sm-12 control-label">Número de Acuerdo</label>
                                  <input type="number" placeholder="" class="form-control" value="<?php echo ($row[0]);  ?>" name="n_acuerdo" >
                                </div>
                                <div class="col-md-2">
                                  <label for="example-input-normal" class="col-sm-12 control-label">Fecha de Acuerdo</label>
                                  <input type="date" placeholder="" class="form-control" name="n_acuerdo" value="<?php echo ($row[1]);  ?>" >
                                </div>
                                <div class="col-md-2">
                                  <label for="example-input-normal" class="col-sm-12 control-label">Tipo</label>
                                  <input type="text" placeholder="" class="form-control" name="n_acuerdo" value="<?php echo ($row[2]);  ?>" >
                                </div>
                              </div>
                              <br>
                              <div class="row">
                                  <div class="col-md-12">
                                      <embed src="<?php echo "logica/".($row[3]);?>" width="100%"  height="700px">
                                  </div>
                              </div>


                              </center>
                                </div>
                            </div>
                        </div>
                    </div>
                  </form>
                <!-- End PAge Content -->
<?php include"template/footer.php"; ?>
