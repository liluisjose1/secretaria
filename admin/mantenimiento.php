<?php
ob_start();
include("../config/conexion.php");

$sql = "SELECT sum(ROUND(((DATA_LENGTH + INDEX_LENGTH - DATA_FREE) / 1024 / 1024),2)) AS Size FROM INFORMATION_SCHEMA.TABLES where TABLE_SCHEMA like '%secretaria%'";
$ejecutar_consulta = $conexion->query($sql);
$row = mysqli_fetch_row($ejecutar_consulta);
?>
<?php include"template/header.php"; ?>
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Mantenimiendo</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Mantenimiento</a></li>
                        <li class="breadcrumb-item active"></li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <center><h1>Tamaño de Base de Datos <span class="label label-warning"><?php echo $row[0];  ?> MB</span></h1></center>
                            <div class="card-body" style="">
                                <br><br>
                                <br><br>
                                <div class="row">
                                  <div class="col-md-6">
                                    <center>
                                                <h2>Vaciar tabla acuerdos</h2>
                                                <button class="btn btn-info btn-block example-the-2 tb_acuerdos">Vaciar</button>
                                    </center>
                                  </div>
                                  <div class="col-md-6">
                                    <center>
                                                <h2>Vaciar tabla personas</h2>
                                                <button class="btn btn-info btn-block example-the-2  tb_personas ">Vaciar</button>
                                    </center>
                                  </div>

                                </div>

                                <br><br>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End PAge Content -->
<?php include"template/footer.php"; ?>
<script src="assets/alert/jquery-confirm.min.js"></script>

<script type="text/javascript">
    $( document ).ready(function() {
        //funcion para caputar los parametros de la URL
        var getUrlParameter = function getUrlParameter(sParam) {
            var sPageURL = decodeURIComponent(window.location.search.substring(1)),
                sURLVariables = sPageURL.split('&'),
                sParameterName,
                i;

            for (i = 0; i < sURLVariables.length; i++) {
                sParameterName = sURLVariables[i].split('=');

                if (sParameterName[0] === sParam) {
                    return sParameterName[1] === undefined ? true : sParameterName[1];
                }
            }
        };
    //caputando variable HTTP Request
    var error = getUrlParameter('error');
    if (error=='no') {
        $.confirm({
            title: 'Exito!',
            content: 'Tabla Vaciada Con Exito',
            type: 'green',
            buttons: {
                omg: {
                    text: 'Ok',
                    btnClass: 'btn-green',
                    action:function(){
                         window.location = "mantenimiento.php";
                    }
                },
                close: function () {
                }
            }
        });
    }
     else{
        $('.tb_acuerdos').on('click', function () {
            $.confirm({
                title: 'Advertencia!',
                content: 'Esta Seguro que desea vaciar los registros de acuerdos?',
                type: 'red',
                typeAnimated: true,
                buttons: {
                    tryAgain: {
                        text: 'Aceptar',
                        btnClass: 'btn-red',
                        action: function(){
                            window.location = "logica/acuerdos_truncate.php";
                        }
                    },
                    close: function () {
                    }
                }
            });
        });
        $('.tb_personas').on('click', function () {
            $.confirm({
                title: 'Advertencia!',
                content: 'Esta Seguro que desea vaciar los registros de personas?',
                type: 'red',
                typeAnimated: true,
                buttons: {
                    tryAgain: {
                        text: 'Aceptar',
                        btnClass: 'btn-red',
                        action: function(){
                            window.location = "logica/personas_truncate.php";
                        }
                    },
                    close: function () {
                    }
                }
            });
        });
    }
});

</script>
