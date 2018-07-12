<?php include"template/header.php"; ?>
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Usuarios</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Usuarios</a></li>
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
                            <h4 class="card-title">Consejo</h4>
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
                                                <th>#</th>
                                                <th>Usuario</th>
                                                <th>Nombre</th>
                                                <th>Fecha de Creación</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if(!isset($conexion)){ include("../config/conexion.php");}
                                            $sql = "SELECT * FROM usuario";
                                            $ejecutar = $conexion->query($sql);
                                            $cont=0;
                                            while($reg = $ejecutar->fetch_assoc()){
                                                $cont=$cont+1;
                                                echo "<tr>";
                                                echo "<th scope='row'>".$cont."</th>";
                                                echo "<td>".($reg["usuario"])."</td>";
                                                echo "<td>".($reg["nombre"])."</td>";
                                                echo "<td>".($reg["fecha"])."</td>";
                                                echo "</tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane  p-20" id="profile" role="tabpanel">
                                        <form action="logica/user_save.php" method="POST">
                                    <div class="form-body">
                                        <div class="row p-t-20">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Usuario</label>
                                                    <input type="text" id="firstName" class="form-control" required="" name="user" placeholder="User">
                                                    <small class="form-control-feedback"> Campo Requerido </small> </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Nombre</label>
                                                    <input type="text" id="firstName1" class="form-control" required="" name="nbre" placeholder="Nombre">
                                                    <small class="form-control-feedback"> Campo Requerido </small> </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Contraseña</label>
                                                    <input type="password" id="firstName2" class="form-control" required="" name="pass" placeholder="Password">
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
                                             <form action="logica/user_delete.php" method="POST">
                                    <div class="form-body">
                                        <div class="row p-t-20">                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nombre</label>
                                                    <select class="form-control custom-select" required="" name="id_user">
                                                        <option value=""></option>
                                                        <?php 
                                                          if(!isset($conexion)){ include("../config/conexion.php");}
                                                          $sql = "SELECT * FROM usuario";
                                                          $ejecutar = $conexion->query($sql);
                                                          while($reg = $ejecutar->fetch_assoc()){
                                                            echo "<option value=".$reg["usuario"].">".($reg["nombre"])."</option>";
                                                             }
                                                            ?>
                                                    </select>
                                                    <small class="form-control-feedback"> Campo Requerido </small>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Guardar</button>
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