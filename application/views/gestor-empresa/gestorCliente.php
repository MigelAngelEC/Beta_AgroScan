<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Blank page
            <small>it all starts here</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Title</h3>

                <!-- <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div> -->
            </div>
            <div class="box-body">
                <div class="row">
                    <?php
                    $empresa = $this->session->userdata('id');
                    $query = $this->db->query("SELECT emp.id_empresa,emp.nombre_empresa,cli.id_usuario,cli.nombre_cliente,cli.apellido_cliente,usu.correo_usuario,cli.cedula_cliente,cli.celular_cliente,cli.direccion_cliente 
                    FROM tb_empresa AS emp,tb_usuarios AS usu,tb_cliente AS cli 
                    WHERE emp.id_empresa=usu.id_empresa AND usu.id_usuario=cli.id_usuario AND emp.id_empresa='" . $empresa . "'");
                    while ($row = $query->unbuffered_row('array')) {
                        $num = 0;
                        $num = $num + 1;
                        ?>
                        <div class="col-md-4">
                            <!-- Widget: user widget style 1 -->
                            <div class="box box-widget widget-user-2">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="widget-user-header bg-yellow">
                                    <div class="widget-user-image">
                                        <img class="img-circle" src="<?php echo base_url();?>../_assets/img/avatar04.png" alt="User Avatar">
                                    </div>
                                    <!-- /.widget-user-image -->
                                    <h3 class="widget-user-username"><?php echo $row['nombre_cliente']; ?> <?php echo $row['apellido_cliente']; ?></h3>
                                    <h5 class="widget-user-desc"><?php echo $row['nombre_empresa']; ?></h5>
                                </div>
                                <div class="box-footer no-padding">
                                    <ul class="nav nav-stacked">
                                        <li><a href="#">Projects <span class="pull-right badge bg-blue">31</span></a></li>
                                        <li><a href="#">Tasks <span class="pull-right badge bg-aqua">5</span></a></li>
                                        <li><a href="#">Completed Projects <span class="pull-right badge bg-green">12</span></a></li>
                                        <li><a href="#">Followers <span class="pull-right badge bg-red">842</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.widget-user -->
                        </div>
                    <?php
                    // SELECT tb_empresa.id_empresa,tb_empresa.nombre_empresa,tb_usuarios.id_usuario,tb_cliente.nombre_cliente,tb_cliente.apellido_cliente,tb_cultivo.id_cultivo,tb_cultivo.nombre_cult
                    // ,tb_cultivo.pais_cult,tb_cultivo.bouns_cult,tb_vuelo.id_vuelo,tb_marcas.id_marcas 
                    // FROM tb_empresa,tb_usuarios,tb_cultivo,tb_vuelo,tb_marcas,tb_cliente
                    // WHERE tb_empresa.id_empresa=tb_usuarios.id_empresa AND tb_usuarios.id_usuario=tb_cliente.id_usuario AND tb_cliente.id_cliente=tb_cultivo.id_cliente 
                    // AND tb_cultivo.id_cultivo=tb_vuelo.id_cultivo AND tb_cultivo.id_cultivo=tb_marcas.id_cultivo
                    // SELECT tb_cliente.id_cliente,tb_cliente.nombre_cliente,tb_cultivo.id_cultivo,tb_cultivo.nombre_cult FROM tb_usuarios,tb_cliente,tb_cultivo WHERE tb_usuarios.id_usuario=tb_cliente.id_usuario AND tb_cliente.id_cliente=tb_cultivo.id_cliente
                    }
                    ?>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                Footer
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- <ul class="treeview-menu"> -->
<!-- 
                <?php
                $num = 0;
                $query = $this->db->query("SELECT usu.id_usuario, cli.nombre_cliente FROM tb_usuarios AS usu,tb_cliente AS cli WHERE usu.id_usuario=cli.id_usuario");
                while ($row = $query->unbuffered_row('array')) {
                    $num = $num + 1;
                    ?>
              <li><a><?php echo $row['nombre_cliente']; ?></a></li>

              <?php
                }
                ?> 
            -->

<!-- <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
           -->
<!-- </ul> -->