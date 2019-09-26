<!DOCTYPE html>
<html>
    <head>
        <title>Dasboard Usuario</title>
        <script>window.jQuery || document.write(decodeURIComponent('%3Cscript src="js/jquery.min.js"%3E%3C/script%3E'))</script>
    </head>
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
                                  <img class="profile-user-img img-fluid img-circle"
                                       src="<?php echo base_url(); ?>_assets/img/agrocloud.ico"
                                       alt="User profile picture">
                                </div>
                                <h3 class="profile-username text-center"><?= $usuario[0]?></h3>
                                <p class="text-muted text-center"><?= $usuario[1]?></p>
                                <ul class="list-group list-group-unbordered mb-3">
                                  <li class="list-group-item">
                                    <b>Dirección</b> <a class="float-right"><?= $usuario[2];?></a>
                                  </li>                                      
                                </ul>
                                <a href="<?php echo base_url();?>index.php/Login/cerrar_sesion" class="btn btn-primary btn-block"><b>Salir</b></a>
                            </div>
                        </div>
                    </div>

                    <!-- Planes -->
                    <div class="col-9">                        
                        <div class="card">
                            <div class="card-header">
                                <h2>Planes</h2>
                            </div>
                            <div class="card-body">
                                <div class="info-box mb-12">
                                    <span class="info-box-icon bg-info elevation-1">
                                      <i class=""></i>
                                    </span>
                                    <div class="info-box-content">
                                      <span class="info-box-text">Plan activo</span>
                                      <span class="info-box-number">1000
                                        <small>Hectarea/s</small>
                                      </span>
                                    </div>
                                    <span class="info-box-icon bg-info elevation-1">
                                      <i class=""></i>
                                    </span>
                                    <div class="info-box-content">
                                      <span class="info-box-text">Plan en uso</span>
                                      <span class="info-box-number">
                                        <?= $usuario[7]?>
                                        <small>Hectarea/s</small>
                                      </span>
                                    </div>
                                </div>                        
                            </div>
                        </div>                    

                        <!-- Estado de plan-->
                        <div class="card">
                            <div class="card-header">
                              <h5 class="card-title">Reporte</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <!-- /.col -->
                                    <div class="col-md-12">
                                        <div class="progress-group">
                                            Plan activo
                                            <span class="float-right"><b>1000ha</b></span>
                                            <div class="progress progress-sm">
                                              <div class="progress-bar bg-primary" style="width: 100%"></div>
                                            </div>
                                         </div>
                                      <div class="progress-group">
                                            Plan en uso
                                            <span class="float-right"><b><?= ($usuario[7]*100/1000)?>%</b></span>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-primary" style="width: <?= ($usuario[7]*100/1000);?>%">                                              
                                                </div>
                                            </div>
                                      </div>                    
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>

                <!-- Tabla cultivos -->
                <div class="card">
                    <div class="card-header">
                        <h2>Cultivos</h2>
                    </div>
                    <div class="card-body">
                        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
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
                                for ($i=0; $i <count($usuario[3]) ; $i++) { 

                              ?>
                              <tr>
                                <td><?= ($i+1)?></td><!--Indice tabla-->
                                <td><?= $usuario[3][$i]?></td><!--Cultivo-->
                                <td><?= $usuario[6][$i]?></td><!--País-->
                                <td><?= $usuario[5][$i]?></td><!--Ciudada-->
                                <td><?= $usuario[4][$i]?></td><!--Descripciónd-->
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
                              ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Mapa -->
                <div class="card" id="tema1">
                    <div class="card-header">
                        <h2>Mapa cultivos</h2>
                    </div>
                    <div class="card-body">
                        <div class="demo-container">
                            <div id="map"></div>                
                        </div>                        
                    </div>
                </div>                    
            </div>
        </section>
    </body>
</html>