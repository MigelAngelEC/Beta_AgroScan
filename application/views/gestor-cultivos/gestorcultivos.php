<?php
$connect = mysqli_connect("localhost", "root", "", "agroscan_app");
$query = "Select cl.nombre_cliente,cl.apellido_cliente,cl.AppID ,cu.nombre_cult,cl.id_cliente From tb_cliente as cl , tb_cultivo as cu where cl.id_cliente=cu.id_cliente";
$result = mysqli_query($connect, $query);
?>

<body>
<img id='loading' style="display:none";/>
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
                    <li class="nav-item active ">
                         <a class="nav-link" href="<?php echo base_url();?>Login/gestorcultivos">Gestor de
                              Cultivos</a>
                    </li>
                    <li class="nav-item">
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
                    <br />
                    <div id="employee_table">
                        <table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%"
                            id="dtBasicExample">
                            <thead>
                                <tr>
                                    <th width="23%">Nombre del Cliente</th>
                                    <th width="23%">Nombre del Cultivo</th>
                                    <th width="23%">Application ID</th>
                                    <th width="15%">Edit</th>
                                    <th width="15%">View</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                <tr>
                                    <td><?php
                                                echo $row["nombre_cliente"];
                                                echo $row["apellido_cliente"];
                                                ?></td>
                                    <td><?php echo $row["nombre_cult"]; ?></td>
                                    <td><?php echo $row["AppID"]; ?></td>
                                    <td><input type="button" name="edit" value="Edit"
                                            id="<?php echo $row["id_cliente"]; ?>" class="btn btn-info edit_data" />
                                    </td>
                                    <td><input type="button" name="view" value="view"
                                            id="<?php echo $row["id_cliente"]; ?>" class="btn btn-info view_data" />
                                    </td>
                                </tr>
                                <?php
                                    }
                                    ?>
                            <tfoot>
                                <th width="23%">Nombre del Cliente</th>
                                <th width="23%">Nombre del Cultivo</th>
                                <th width="23%">Application ID</th>
                                <th width="15%">Editar</th>
                                <th width="15%">Ver</th>
                            </tfoot>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div id="employee_detail2">
                    <br><br><br>
                    <div class="card" style="width: 18rem;">
                        <img src="<?php echo base_url() ?>_assets/img/agroscan_login.jpg" alt=""
                            class="card-img-top" />
                        <div class="card-body">
                            <h5 class="card-title">Gestor de Cultivos de Clientes</h5>
                            <p class="card-text">Administrador de Cultivos para cada cliente con respecto a su Cultivo y
                                Marcas del mismo </p>
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
<div id="dataModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <left><button type="button" class="close" data-dismiss="modal">&times;</button> </left>
                <h4 class="modal-title">Detalles del Cultivo u Hacienda</h4>
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
                <left><button type="button" class="close" data-dismiss="modal">&times;</button> </left>
                <h4 class="modal-title">Detalles del Cultivo u Hacienda</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="insert_form">
                    <label>Nombre del Cliente</label>
                    <input type="text" name="nombre_cliente" id="nombre_cliente" class="form-control" readonly />
                    <br />
                    <label>Nombre del Cultivo</label>
                    <textarea name="nombre_cult" id="nombre_cult" class="form-control" readonly></textarea>
                    <br />
                    <label>Application ID</label>
                    <input type="text" name="AppID" id="AppID" class="form-control" />
                    <br />
                    <input type="hidden" name="id_cliente" id="id_cliente" />
                    <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- SCRIPTS -->
<!-- JQuery -->

<script type="text/javascript" src="<?php echo base_url();?>_assets/js/jquery-3.4.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="<?php echo base_url();?>_assets/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="<?php echo base_url();?>_assets/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="<?php echo base_url();?>_assets/js/mdb.min.js"></script>

<!-- MDBootstrap Datatables  -->
<script type="text/javascript" src="<?php echo base_url();?>_assets/js/addons/datatables.min.js"></script>
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
</script>
<script>
    $(document).ready(function () {
        $('#add').click(function () {
            $('#insert').val("Insert");
            $('#insert_form')[0].reset();
        });
        $(document).on('click', '.edit_data', function () {
            var elem = document.querySelector('#loading');
            elem.style.display = '';
            var id_cliente = $(this).attr("id");
            $.ajax({
                /* url: "fetch2.php", */
                url: "<?php echo base_url();?>Login/fetch2",
                method: "POST",
                data: {
                    id_cliente: id_cliente
                },
                dataType: "json",
                success: function (data) {
                    
                    $('#nombre_cliente').val(data.nombre_cliente);
                    $('#nombre_cult').val(data.nombre_cult);
                    $('#AppID').val(data.AppID);
                    $('#id_cliente').val(data.id_cliente);
                    $('#insert').val("Update");
                    $('#add_data_Modal').modal('show');
                    var elem = document.querySelector('#loading');
                    elem.style.display = 'none';
                }
            });
        });
        $('#insert_form').on("submit", function (event) {
            var elem = document.querySelector('#loading');
                        elem.style.display = '';
            event.preventDefault();
            if ($('#nombre_cliente').val() == "") {
                alert("Nombre es obligatorio");
            } else if ($('#nombre_cult').val() == '') {
                alert("Nombre del Cultivo es requerido");
            } else if ($('#AppID').val() == '') {
                alert("Application ID es requerido");
            } else {
                $.ajax({
                    /* url: "insert2.php", */
                    url: "<?php echo base_url();?>Login/insert2",
                    method: "POST",
                    data: $('#insert_form').serialize(),
                    beforeSend: function () {
                        $('#insert').val("Inserting");
                    },
                    success: function (data) {
                        
                        $('#insert_form')[0].reset();
                        $('#add_data_Modal').modal('hide');
                        $('#employee_table').html(data);
                        var elem = document.querySelector('#loading');
                        elem.style.display = 'none';
                    }
                    
                });
            }
        });
        $(document).on('click', '.view_data', function () {
            var id_cliente = $(this).attr("id");
            if (id_cliente != '') {
                $.ajax({
                    /*  url: "select22.php", */
                    url: "<?php echo base_url();?>Login/select2",
                    method: "POST",
                    data: {
                        id_cliente: id_cliente
                    },
                    success: function (data) {
                        $('#employee_detail2').html(data);
                        //                        $('#dataModal2').modal('show');
                    }
                });
                $.ajax({
                    /* url: "select21.php", */
                    url: "<?php echo base_url();?>Login/select3",
                    method: "POST",
                    data: {
                        id_cliente: id_cliente
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