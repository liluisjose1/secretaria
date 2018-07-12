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
                        <li class="breadcrumb-item active">Guardar</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <form action="logica/acuerdos_save.php" method="post" enctype="multipart/form-data" >
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
                              <div class="row">
                                 <div class="col-md-4">
                                   <div class="form-group">
                                            <label for="example-input-normal" class="col-sm-3 control-label">Fecha</label>
                                                <input type="date" placeholder="" class="form-control" required name="fecha">
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                   <div class="form-group">
                                            <label for="example-input-normal" class="col-sm-6 control-label">Numero de Acuerdo</label>
                                                <input type="number" placeholder="" class="form-control" required min="1" name="n_acuerdo">
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                   <div class="form-group">
                                            <label for="example-input-normal" class="col-sm-6 control-label">Tipo de Acuerdo</label>
                                              <select class="form-control" required name="tipo_acuerdo" >
                                              <option value=""></option>
                                              <?php
                                                if(!isset($conexion)){ include("../config/conexion.php");}
                                                $sql = "SELECT * FROM tipo";
                                                $ejecutar = $conexion->query($sql);
                                                while($reg = $ejecutar->fetch_assoc()){
                                                  echo "<option value=".$reg["tipo_acuerdo"].">".($reg["tipo_acuerdo"])."</option>";
                                                   }
                                                  ?>
                                              </select>

                                    </div>
                                 </div>
                                </div>
                                <br>
                                <div class="row">
                                  <div class="col-md-1">
                                    <div class="form-group">
                                    <label for="example-input-normal" class="col-sm-12 control-label">Archivo</label>
                                    </div>
                                  </div>
                                  <div class="col-md-5">
                                    <input type="file" placeholder="" class="form-control" accept="application/pdf" required name="archivo">
                                  </div>
                                  <div class="col-md-1">
                                    <label for="example-input-normal" class=" control-label">Persona/s</label>
                                  </div>
                                  <div class="col-md-4">
                                  <div class="fields_wrap">
                                    <input type="text" placeholder="" class="form-control" required name="personas[]">
                                  </div>
                                  </div>
                                  <div class="col-md-1">
                                    <br>
                                    <a class="add_field_button" title="Mas personas" style="color:blue;" ><i class="fa fa-plus"></i></a>
                                  </div>
                                </div>
                                <br>
                                <div class="row">
                                  <div class="col-md-5"></div>
                                  <div class="col-md-5">
                                    <button type="submit" class="btn btn-success btn-flat btn-addon btn-md m-b-10 m-l-5"><i class="ti-save"></i> Guardar</button>
                                  </div>
                                </div>


                              </div>
                            </div>
                        </div>
                    </div>
                    </form>

<?php include"template/footer.php"; ?>


<script type="text/javascript">
  $(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID

    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div><br><input type="text" placeholder="" class="form-control" required name="personas[]"><a href="#" class="remove_field">Remover</a></div>'); //add input box
        }
    });

    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
  });
</script>
