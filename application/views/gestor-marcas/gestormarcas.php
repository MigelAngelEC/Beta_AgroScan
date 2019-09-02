<?php  
 $connect = mysqli_connect("localhost", "root", "", "agroscan_app");  
 $query = "Select popup_marcas ,App_ID_Mark ,Polygon_ID , area,id_marcas from tb_marcas ";  
 $result = mysqli_query($connect, $query);  
 ?>

<nav class="navbar navbar-expand-lg navbar-dark black">
     <div class="container">
          <a class="navbar-brand" href="#"><strong>Administrador</strong></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
               aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                         <a class="nav-link" href="<?php echo base_url();?>Login/monitordash">Inicio</a>
                    </li>
                    <li class="nav-item ">
                         <a class="nav-link" href="<?php echo base_url();?>Login/gestorcultivos">Gestor de
                              Cultivos</a>
                    </li>
                    <li class="nav-item active">
                         <a class="nav-link" href="<?php echo base_url();?>Login/gestormarcas">Gestor de
                              Marcas</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="#"></a>
                    </li>
                    <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <i class="fa fa-user"></i>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;"><b>Bienvenido <?=$this->session->userdata('nombre') ?></b> </font>
                        </font>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink-4">
                        <a class="dropdown-item waves-effect waves-light" href="#">Cuenta
<!--                             <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Mi cuenta </font>
                            </font> -->
                        </a>

                        <a class="dropdown-item waves-effect waves-light" href="<?php echo base_url();?>index.php/Login/cerrar_sesion">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Cerrar sesión </font>
                            </font>
                        </a>
                    </div>
                </li>
               </ul>
          </div>
     </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-9">
            <div class="table-responsive">
                <br>
                <div id="employee_table">
                    <table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%"
                        id="dtBasicExample">
                        <thead>
                            <tr>
                                <th width="70%">Nombre de la Marca</th>
                                <th width="15%">Editar</th>
                                <th width="15%">Ver</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                               while($row = mysqli_fetch_array($result))  
                               {  
                               ?>
                            <tr>
                                <td><?php echo $row["popup_marcas"]; ?></td>
                                <td align="center"><input type="button" name="edit" value="Edit"
                                        id="<?php echo $row["id_marcas"]; ?>" class="btn btn-info btn edit_data" />
                                </td>
                                <td align="center"><input type="button" name="view" value="view"
                                        id="<?php echo $row["id_marcas"]; ?>" class="btn btn-info btn view_data" />
                                </td>
                            </tr>
                            <?php  
                               }  
                               ?>
                        <tfoot>
                            <tr style="color:white;">
                                <th width="70%">Nombre de la Marca</th>
                                <th width="15%">Editar</th>
                                <th width="15%">Ver</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div id="employee_detail2">
                <br><br><br>
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo base_url() ?>_assets/img/agroscan_login.jpg" alt="" class="card-img-top" />
                    <div class="card-body">
                        <h5 class="card-title">Gestor de Marcas Individual de Clientes</h5>
                        <p class="card-text">Administrador de Marcas para cada cliente con respecto a su Cultivo </p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Cliente ID App</li>
                        <li class="list-group-item">ID de Polygono</li>
                        <li class="list-group-item">Area de Polygonos </li>
                    </ul>
                    <div class="card-body">
                        <center><img src="<?php echo base_url() ?>_assets/img/fondo_login.png" alt=""
                                style="width: 85%; height: 5%" /></center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<div id="dataModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <left><button type="button" class="close" data-dismiss="modal">&times;</button></left>
                <h4 class="modal-title">Detalles de la Marca</h4>
            </div>
            <div class="modal-body" id="employee_detail">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div id="add_data_Modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <left><button type="button" class="close" data-dismiss="modal">&times;</button></left>
                <h4 class="modal-title">Detalles de la Marca</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="insert_form">
                    <label>Ingrese el Nombre de la Marca </label>
                    <input type="text" name="popup_marcas" id="popup_marcas" class="form-control" />
                    <br />
                    <label>Ingrese Application ID</label>
                    <textarea name="App_ID_Mark" id="App_ID_Mark" class="form-control"></textarea>
                    <br />
                    <label>Ingrese Polygon ID</label>
                    <input type="text" name="Polygon_ID" id="Polygon_ID" class="form-control" />
                    <br />
                    <label>Ingrese el Area</label>
                    <input type="text" name="area" id="area" class="form-control" />
                    <br />
                    <input type="hidden" name="id_marcas" id="id_marcas" />
                    <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
    $(document).ready(function () {
        $('#dtBasicExample').DataTable({
            "pagingType": "full_numbers", // "simple" option for 'Previous' and 'Next' buttons only
            retrieve: true
        });
        $('.dataTables_length').addClass('bs-select');
    });

    $(document).ready(function () {
        $('#add').click(function () {
            $('#insert').val("Insert");
            $('#insert_form')[0].reset();
        });
        $(document).on('click', '.edit_data', function () {
            var id_marcas = $(this).attr("id");
            $.ajax({
                /* url: "fetch.php", */
                url: "<?php echo base_url();?>Login/fetch",
                method: "POST",
                data: {
                    id_marcas: id_marcas
                },
                dataType: "json",
                success: function (data) {
                    $('#popup_marcas').val(data.popup_marcas);
                    $('#App_ID_Mark').val(data.App_ID_Mark);
                    $('#Polygon_ID').val(data.Polygon_ID);
                    $('#area').val(data.area);
                    $('#id_marcas').val(data.id_marcas);
                    $('#insert').val("Update");
                    $('#add_data_Modal').modal('show');
                }
            });
        });
        $('#insert_form').on("submit", function (event) {
            event.preventDefault();
            if ($('#popup_marcas').val() === "") {
                alert("Nombre de Marca es Obligatorio");
            } else if ($('#App_ID_Mark').val() === '') {
                alert("Application ID es Obligatorio");
            } else if ($('#Polygon_ID').val() === '') {
                alert("Polygono ID es Obligatorio");
            } else if ($('#area').val() === '') {
                alert("Area es requerida");
            } else {
                $.ajax({
                    /* url: "insert.php", */
                    url: "<?php echo base_url();?>Login/insert",
                    method: "POST",
                    data: $('#insert_form').serialize(),
                    beforeSend: function () {
                        $('#insert').val("Inserting");
                    },
                    success: function (data) {
                        $('#insert_form')[0].reset();
                        $('#add_data_Modal').modal('hide');
                        $('#employee_table').html(data);
                    }
                });
            }
        });
        $(document).on('click', '.view_data', function () {
            var id_marcas = $(this).attr("id");
            if (id_marcas != '') {
                $.ajax({
                    /* url: "select.php", */
                    url: "<?php echo base_url();?>Login/select",
                    method: "POST",
                    data: {
                        id_marcas: id_marcas
                    },
                    success: function (data) {
                        $('#employee_detail').html(data);
                        $('#dataModal').modal('show');
                    }
                });
            }
        });
    });
</script>