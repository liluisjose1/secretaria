<?php
ob_start();
include("../config/conexion.php");

//user
$sqlu = "SELECT COUNT(*) AS Total FROM usuario";
$ejecutar_consultau = $conexion->query($sqlu);
$user = mysqli_fetch_row($ejecutar_consultau);
//acuerdos
$sqlp = "SELECT COUNT(*) AS Total FROM acuerdos";
$ejecutar_consultap = $conexion->query($sqlp);
$proyectos = mysqli_fetch_row($ejecutar_consultap);
//Tamaño DB
$sqldb = "SELECT sum(ROUND(((DATA_LENGTH + INDEX_LENGTH - DATA_FREE) / 1024 / 1024),2)) AS Size FROM INFORMATION_SCHEMA.TABLES where TABLE_SCHEMA like '%secretaria%'";
$ejecutar_consultadb = $conexion->query($sqldb);
$tdb = mysqli_fetch_row($ejecutar_consultadb);

?>

<?php include "template/header.php" ; ?>
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-md-4">
                        <a href="users.php">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $user[0]; ?></h2>
                                    <p class="m-b-0">Usuarios</p>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="acuerdos_view.php">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-archive f-s-40 color-warning"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $proyectos[0]; ?></h2>
                                    <p class="m-b-0">Acuerdos Registrados</p>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>

                    <div class="col-md-4">
                        <a href="mantenimiento.php">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-database f-s-40 color-success"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $tdb[0]; ?> Mb</h2>
                                    <p class="m-b-0">Tamaño de DB</p>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>

                </div>

                <div class="row">
					<div class="col-lg-12">
						<div class="row">
						<!-- /# column -->
						<div class="col-lg-12">
							<div class="card">
								<div class="card-body">
									<div class="year-calendar"></div>
								</div>
							</div>
						</div>


						</div>
					</div>


                </div>


                <!-- End PAge Content -->
<?php include"template/footer.php"; ?>
