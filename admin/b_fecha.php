<?php include"template/header.php"; ?>
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Acuerdos</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Acuerdos</a></li>
                        <li class="breadcrumb-item active">Buscar</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->

                <div class="row">
                    <div class="col-12">
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
                            <div class="card-body">
                            <form action="busqueda_filtrada.php" method="post" enctype="multipart/form-data" >
                            <h1>Registro unico</h1>
                            <div class="row" >
                                <div class="col-md-4">
                                    <div class="form-group">
                                            <label for="example-input-normal" class="col-sm-6 control-label">Fecha</label>
                                                <input type="date" placeholder="" class="form-control" id="n_acuerdo" required name="d_acuerdo">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <br>
                                    <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                            </form>
                            <h1>Rango de registros</h1>
                            <form action="busqueda_filtrada.php" method="post" enctype="multipart/form-data" >
                            <div class="row" >
                                <div class="col-md-4">
                                    <div class="form-group">
                                            <label for="example-input-normal" class="col-md-8 control-label">Fecha de Acuerdo desde </label>
                                                <input type="date" placeholder="" class="form-control" id="n_acuerdo" required name="f_acuerdo1">
                                    </div>
                                </div> 
                                <div class="col-md-4">
                                    <div class="form-group">
                                            <label for="example-input-normal" class="col-md-8 control-label">Fecha de Acuerdo hasta </label>
                                                <input type="date" placeholder="" class="form-control" id="n_acuerdo" required name="f_acuerdo2">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <br>
                                    <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                            </form>
                            </div>
                        </div>
                    
                    </div>
                </div>    
 

<?php include"template/footer.php"; ?>


<script type="text/javascript">
$(document).ready(function(){
                               
                                                                   
});
</script>
