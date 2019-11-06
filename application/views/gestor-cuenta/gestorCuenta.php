
<body class="dx-viewport">
    <section class="content">
        <div class="container-fluid">
            <!-- Dashboard -->
            <div class="row">
                <!-- Perfil usuario -->
                <div class="col-3">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                              <img class="img profile-user-img img-fluid img-circle"
                                   src="<?php echo base_url();?><?= $cliente['dir']?>"
                                   alt="User profile picture" style="width: 100px;height: 140px;">
                            </div>
                            <h3 class="profile-username text-center"><?= $cliente['nombre']?></h3>
                            <p class="text-muted text-center"><?= $cliente['apellido']?></p>
                            <ul class="list-group list-group-unbordered mb-3">
                              <li class="list-group-item">
                                <b>Dirección</b> <a class="float-right"><?= $cliente['direccion']?></a>
                                
                              </li>                                      
                            </ul>
                            <a href="<?php echo base_url();?>index.php/Login/cerrar_sesion" class="btn btn-primary btn-block"><b>Salir</b></a>
                        </div>
                    </div>
                </div>

                <!-- Planes -->
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <h2>Planes</h2>
                        </div>
                        <div class="card-body">
                            <div class="col-12">
                                <div class="info-box">
                                  <span class="info-box-icon bg-success">
                                    <i class="far fa-flag"></i></span>
                                  <div class="info-box-content">
                                    <span class="info-box-text">Plan activo</span>
                                    <span class="info-box-number">1000                                 
                                        <small>Hectarea/s</small>
                                    </span>
                                  </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="info-box">
                                  <span class="info-box-icon bg-info elevation-1">
                                    <i class="far fa-flag"></i></span>
                                  <div class="info-box-content">
                                    <span class="info-box-text">Plan en uso</span>
                                    <span class="info-box-number"><?php 
                                        if (isset($usuario[7])) {
                                            echo $usuario[7]*100/1000;
                                        }else{
                                            echo '0';
                                        }
                                        ?>                        
                                        <small>Hectarea/s</small>
                                    </span>
                                  </div>
                                </div>
                            </div>                       
                        </div>
                    </div> 
                </div>

                <!-- Estado de plan-->
                <div class="col-5">
                    <div class="card" style="height: 19rem;">
                        <div class="card-header">
                            <h5 class="card-title">Reporte</h5>
                        </div>
                        <div class="card-body">
                            <!-- /.col -->
                            <div class="col-12">
                                <div class="progress-group">
                                    Plan activo
                                    <span class="float-right"><b>1000ha</b></span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-primary" style="width: 100%"></div>
                                    </div>
                                </div>
                                <div class="progress-group">
                                        Plan en uso
                                        <span class="float-right"><b><?php 
                                        if (isset($usuario[7])) {
                                            echo $usuario[7]*100/1000;
                                        }else{
                                            echo '0';
                                        }
                                        ?>%</b></span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-primary" style="width: <?php 
                                        if (isset($usuario[7])) {
                                            echo $usuario[7]*100/1000;
                                        }else{
                                            echo '0';
                                        }
                                        ?>%">                                              
                                            </div>
                                        </div>
                                </div>                    
                            </div>
                            <br>
                            <center>Nuevos planes</center>
                            <a href="#" class="btn btn-secondary btn-block">
                                <b>Actualizar</b>
                            </a>
                        </div>
                    </div> 
                </div> 
            </div>
            <!-- Mapa y tabla-->
            <div class="row">
                <div class="col-7">
                    <!-- Tabla cultivos -->
                    <div class="card">
                        <div class="card-header">
                            <h2>Cultivos</h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table id="dtBasicExample" class="table table-bordered" align="center">
                                    <thead>
                                      <tr>
                                        <th>No</th>
                                        <th>Cultivo</th>
                                        <th>País</th>
                                        <th>Ciudad</th>
                                        <th>Descripción</th>
                                        <td class="d-none">Latitud</th>
                                        <td class="d-none">longitud</th>
                                        <th>Ubicación</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      if (isset($usuario[3])) {

                                        for ($i=0; $i <count($usuario[3]) ; $i++) { 
                                      ?>
                                      <tr>
                                        <td class="indice"><?= ($i+1)?></td><!--Indice tabla-->
                                        <td class="cultivo"><?= $usuario[3][$i]?></td><!--Cultivo-->
                                        <td class="pais"><?= $usuario[6][$i]?></td><!--País-->
                                        <td class="ciudad"><?= $usuario[5][$i]?></td><!--Ciudada-->
                                        <td class="descripcion"><?= $usuario[4][$i]?></td><!--Descripciónd-->
                                        <td class="latitud d-none"><?= $usuario[8][$i][0]?></td><!--Latutud-->
                                        <td class="longitud d-none"><?= $usuario[8][$i][1]?></td><!--Longitu-->
                                        <td class="boton">
                                          <a href="#tema1" class="btn btn-primary btn-block">
                                            <b>Ubicar</b>
                                          </a>
                                        </td>
                                      </tr>
                                      <?php
                                        }
                                        }
                                      ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <!-- Mapa -->
                    <div class="card" id="tema1">
                        <div class="card-header">
                            <h2>Mapa cultivos</h2>
                        </div>
                        <div class="card-body">
                            <div class="demo-container">
                                <div id="map" style="height: 50px"></div>                
                            </div>                        
                        </div>
                    </div> 
                </div>
            </div>  
        </div>
    </section>
</body>
