<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Crear Empresa / Administrador
            <small>Llena el formulario para crear Empresa</small>
        </h1>

    </section>

    <!-- Main content -->
    <div class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Crear Administrador</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form id="createAccountFrom" role="form" method="POST" action="<?php echo base_url();?>Empresa/createAcountEmpresa">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="txtNombre">Nombre Empresa</label>
                                        <input type="text" class="form-control" id="txtNombre"  name="txtNombre"placeholder="Nombre Empresa" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="txtCorreo">Correo Empresa</label>
                                        <input type="email" class="form-control" id="txtCorreo"  name="txtCorreo"placeholder="Correo Empresa" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password"  name="password"placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Descripcion Empresa</label>
                                        <textarea class="form-control" rows="3" id="txtDescripcion" name="txtDescripcion"placeholder="Enter ..." required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Razon Social Empresa</label>
                                        <textarea class="form-control" rows="3" id="txtSocial" name="txtSocial"placeholder="Enter ..."></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="txtRucEmpresa">Ruc Empresa</label>
                                        <input type="text" class="form-control" id="txtRucEmpresa"  name="txtRucEmpresa"placeholder="Ruc Empresa" required>
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer">
                                        <button id="btn-Crear" type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.box -->

                    </div>
                    <!-- /.box -->

                </div>
                <!--/.col (left) -->
                <!-- right column -->
            </div>
        </div>
    </div>
    <!-- /.box-body -->
    <!-- <div class="box-footer">
          Footer
        </div> -->
    <!-- /.box-footer-->
</div>
<!-- /.box -->
<div>

</div>
<script src="<?php echo base_url();?>_ajax/create_Account.js"></script>