<nav class="navbar navbar-expand-lg navbar-dark black">
     <div class="container">
          <a class="navbar-brand" href="#"><strong>Administrador</strong></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
               aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                         <a class="nav-link" href="<?php echo base_url();?>Login/monitordash">Inicio</a>
                    </li>
                    <li class="nav-item ">
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
                         <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-4"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              <i class="fa fa-user"></i>
                              <font style="vertical-align: inherit;">
                                   <font style="vertical-align: inherit;"><b>Bienvenido
                                             <?=$this->session->userdata('nombre') ?></b> </font>
                              </font>
                         </a>
                         <div class="dropdown-menu dropdown-menu-right dropdown-primary"
                              aria-labelledby="navbarDropdownMenuLink-4">
                              <a class="dropdown-item waves-effect waves-light" href="#">Cuenta
                                   <!--                             <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Mi cuenta </font>
                            </font> -->
                              </a>

                              <a class="dropdown-item waves-effect waves-light"
                                   href="<?php echo base_url();?>index.php/Login/cerrar_sesion">
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
<br>
<div class="container-fluid">
     <div class="row">
          <div class="col-sm-9">
               <div class="table-responsive">
                    <table class="table table-striped table-sm table-striped table-bordered table-sm">
                         <h6>
                              <thead class="thead-light" align="center">
                                   <tr>
                                        <h5><b><u>
                                                       <th scope="col">#Cliente</th>
                                                       <th scope="col">Nombre del Cliente</th>
                                                       <th scope="col">Nombre del Cultivo</th>
                                                       <th scope="col">Ubicación</th>
                                                       <th scope="col">Application ID</th>
                                                  </u></b></h5>

                                   </tr>
                              </thead>
                              <tbody>
                                   <?php
    if ($client ->num_rows()>0){
    foreach($client->result() as $row)
    {
    ?>
                                   <tr align="center" style="text-align:center">
                                        <h5>
                                             <td scope="row"> <?php echo $row->id_cliente ?> </td>
                                             <td> <?php echo $row->nombre_cliente ." ". $row->apellido_cliente ?> </td>
                                             <td> <?php echo $row->nombre_cult ?> </td>
                                             <td> <?php echo $row->pais_cult."-".$row->ciudad_cult ?> </td>
                                        </h5>
                                        <td>
                                             <h6> <b><?php echo $row->AppID ?></b> </h6>
                                        </td>
                                   </tr>
                                   <?php  
    }
    }
    else{
    ?>
                                   <tr>
                                        <td colspan="5">No Data Found </td>
                                   </tr>
                                   <?php
    }
    ?>
                              </tbody>
                         </h6>
                    </table>


               </div>
          </div>
          <div class="col-sm-3">
               <div id="employee_detail2">
                    <br><br><br>
                    <div class="card" style="width: 18rem;">
                         <img src="<?php echo base_url() ?>_assets/img/agroscan_login.jpg" alt=""
                              class="card-img-top" />
                         <div class="card-body">
                              <h5 class="card-title">Administrador de Clientes de AgroScan</h5>
                              <p class="card-text">Administrador de Clientes</p>
                         </div>
                         <ul class="list-group list-group-flush">
                              <li class="list-group-item">Cliente </li>
                              <li class="list-group-item"> Ubicación de su Cultivo</li>
                              <li class="list-group-item">ID de Applicación </li>
                         </ul>
                         <div class="card-body">
                              <center><img src="<?php echo base_url() ?>_assets/img/fondo_login.png" alt=""
                                        style="width:85%; height:5%" /></center>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>



<div id="dataModal" class="modal fade">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Employee Details</h4>
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
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">PHP Ajax Update MySQL Data Through Bootstrap Modal</h4>
               </div>
               <div class="modal-body">
                    <form method="post" id="insert_form">
                         <label>Enter Employee Name</label>
                         <input type="text" name="name" id="name" class="form-control" />
                         <br />
                         <label>Enter Employee Address</label>
                         <textarea name="address" id="address" class="form-control"></textarea>
                         <br />
                         <label>Select Gender</label>
                         <select name="gender" id="gender" class="form-control">
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                         </select>
                         <br />
                         <label>Enter Designation</label>
                         <input type="text" name="designation" id="designation" class="form-control" />
                         <br />
                         <label>Enter Age</label>
                         <input type="text" name="age" id="age" class="form-control" />
                         <br />
                         <input type="hidden" name="employee_id" id="employee_id" />
                         <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
                    </form>
               </div>
               <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>
          </div>
     </div>
</div>


<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </button>
               </div>
               <div class="modal-body">
                    ...
               </div>
               <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
               </div>
          </div>
     </div>
</div>
<br>

<script>
     $(document).ready(function () {
          $('#add').click(function () {
               $('#insert').val("Insert");
               $('#insert_form')[0].reset();
          });
          $(document).on('click', '.edit_data', function () {
               var employee_id = $(this).attr("id");
               $.ajax({
                    url: "fetch.php",
                    method: "POST",
                    data: {
                         employee_id: employee_id
                    },
                    dataType: "json",
                    success: function (data) {
                         $('#name').val(data.name);
                         $('#address').val(data.address);
                         $('#gender').val(data.gender);
                         $('#designation').val(data.designation);
                         $('#age').val(data.age);
                         $('#employee_id').val(data.id);
                         $('#insert').val("Update");
                         $('#add_data_Modal').modal('show');
                    }
               });
          });
          $('#insert_form').on("submit", function (event) {
               event.preventDefault();
               if ($('#name').val() == "") {
                    alert("Name is required");
               } else if ($('#address').val() == '') {
                    alert("Address is required");
               } else if ($('#designation').val() == '') {
                    alert("Designation is required");
               } else if ($('#age').val() == '') {
                    alert("Age is required");
               } else {
                    $.ajax({
                         url: "insert.php",
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
               var employee_id = $(this).attr("id");
               if (employee_id != '') {
                    $.ajax({
                         url: "select.php",
                         method: "POST",
                         data: {
                              employee_id: employee_id
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