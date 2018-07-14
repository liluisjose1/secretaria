<?php include"template/header.php"; ?>
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Tipos</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Tipos</a></li>
                        <li class="breadcrumb-item active">Acciones</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-lg-6">
                             <?php
                                    error_reporting(E_ALL ^ E_NOTICE);
                                    if($_GET["error"]=="no"){
                                        echo "<div class='alert alert-primary alert-dismissable'>";
                                        echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
                                        echo "Registro Exitoso";
                                        echo "</div>";
                                    } else if($_GET["error"]=="si"){
                                        echo "<div class='alert alert-danger alert-dismissable'>";
                                        echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
                                        echo "Error al registrar";
                                        echo "</div>";
                                    }


                                ?>
                        <div class="card">
                            <h4 class="card-title">Tipos de Acuerdos</h4>
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Ver</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Crear</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Eliminar</span></a> </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content tabcontent-border">
                                    <div class="tab-pane active" id="home" role="tabpanel">
                                        <div class="p-20">
                                            <div class="table-responsive">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tipo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if(!isset($conexion)){ include("../config/conexion.php");}
                                            $sql = "SELECT * FROM tipo";
                                            $ejecutar = $conexion->query($sql);
                                            while($reg = $ejecutar->fetch_assoc()){
                                                echo "<tr>";
                                                echo "<td>".($reg["id"])."</td>";
                                                echo "<td>".($reg["tipo_acuerdo"])."</td>";
                                                echo "</tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane  p-20" id="profile" role="tabpanel">
                                        <form action="logica/tipo_save.php" method="POST">
                                    <div class="form-body">
                                        <div class="row p-t-20">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Tipo</label>
                                                    <input type="text" id="firstName" class=" form-control" required="" name="tipo" placeholder="Tipo de Acuerdo">
                                                    <small class="form-control-feedback"> Campo Requerido </small> </div>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Guardar</button>
                                        <button type="button" class="btn btn-inverse" onclick="location.reload();" >Cancelar</button>
                                    </div>
                                </form>
                                    </div>
                                    <div class="tab-pane p-20" id="messages" role="tabpanel">
                                             <form action="logica/tipo_delete.php" method="POST">
                                    <div class="form-body">
                                        <div class="row p-t-20">                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tipos</label>
                                                    <select class="form-control custom-select" required="" name=tipo_id>
                                                        <option value=""></option>
                                                        <?php
                                                          if(!isset($conexion)){ include("../config/conexion.php");}
                                                          $sql = "SELECT * FROM tipo";
                                                          $ejecutar = $conexion->query($sql);
                                                          while($reg = $ejecutar->fetch_assoc()){
                                                            echo "<option value=".$reg["id"].">".($reg["tipo_acuerdo"])."</option>";
                                                             }
                                                            ?>
                                                    </select>
                                                    <small class="form-control-feedback"> Campo Requerido </small>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-danger"> <i class="fa fa-check"></i> Borrar</button>
                                        <button type="button" class="btn btn-inverse" onclick="location.reload();" >Cancelar</button>
                                    </div>
                                </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End PAge Content -->
<?php include"template/footer.php"; ?>
