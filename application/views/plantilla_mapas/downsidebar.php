<div class="menuContentp">
    <div class="sliderp">
        <font color="white">
            <a id="sliderbuton"><i class="fas fa-angle-double-down"></i></a>
        </font>
    </div>

     <!--  <div class="btn-group btn-group-justified flex-wrap" role="group">

        <button type="button" id="home" class="btn btn-primary btn-sm" onclick="openCity('Home')"
            data-toggle="collapse">Datos Climáticos Promedios</button>
        <button type="button" class="btn btn-primary btn-sm" onclick="openCity('pMax')">Presión Atmosférica</button>
        <button type="button" id="prediccion" class="btn btn-primary btn-sm"onclick="openCity('VelocidadViento')">Velocidad Viento</button>
        <button type="button" class="btn btn-primary btn-sm" onclick="openCity('TemperaturaProm')">Temperatura Promedio</button>
        <button type="button" class="btn btn-light btn-sm" onclick="openCity('SueloActual')">Datos de Suelo Actuales</button>
        <button type="button" class="btn btn-light btn-sm" onclick="openCity('SueloPredicho')">Datos de Suelo Historicos &nbsp;<span class="badge badge-danger badge-pill ">PRO</span></button>
    </div> -->
<!-- <div class="body-wrap">
  <div class="container">
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="btn btn-primary btn-sm"data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
           <i class="fas fa-bars"></i>
          </button>
          <!--<a class="navbar-brand" href="#">Home</a
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" collaps>
          <ul class="nav navbar-nav">
            <li><a href="#" onclick="openCity('Home')">Datos Climáticos Promedios</a></li>
            <li><a href="#" onclick="openCity('pMax')">Presión Atmosférica</a></li>
            <li><a href="#" onclick="openCity('VelocidadViento')">Velocidad Viento</a></li>
            <li><a href="#" onclick="openCity('TemperaturaProm')">Temperatura Promedio</a></li>
            <li><a href="#" onclick="openCity('SueloActual')">Datos de Suelo Actuales</a></li>
            <li><a href="#">Datos de Suelo Historicos &nbsp;<span class="badge badge-danger badge-pill ">PRO</span></a></li>
          </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</div> -->
<ul id="navp">
<nav class="mb-1 navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <!--<a class="navbar-brand" href="#"><strong>Home</strong></a>-->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7"
      aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent-7">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" id="home"onclick="openCity('Home')">Datos Climáticos Promedios <span class="sr-only"></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  onclick="openCity('pMax')">Porcentaje de Humedad</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" onclick="openCity('VelocidadViento')">Velocidad Viento</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" onclick="openCity('TemperaturaProm')">Temperatura Promedio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" onclick="openCity('SueloActual')">Datos de Suelo</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    
        <font color="white">
            <div id="Home" class="w3-container city" style="display:none">
                <div id="container"></div>
            </div>

            <div id="pMax" class="w3-container city" style="display:none">
                <div id="container2"></div>
            </div>

            <div id="VelocidadViento" class="w3-container city" style="display:none">
                <div id="container3"></div>
            </div>

            <div id="TemperaturaProm" class="w3-container city" style="display:none">
                <div id="container4"></div>
            </div>
            <div id="SueloActual" class="w3-container city" style="display:none">
                <br>
                <center>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <h3> Datos del Suelo Actual </h3>
                                <table class="table table-light table-striped table-hover table-sm " id="TableSoil">
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col">
                            <h3> Predicción Datos del Suelo <span class="badge badge-pill badge-danger" data-toggle="modal" data-target="#modalPush">PRO</span></h3>
                                <img src="<?php echo base_url() ?>_assets/img/imagesSoil/suelo.jpg " width="100%" data-toggle="modal" data-target="#modalPush">
                            </div> 
                            <!--Modal: modalPush-->
<div class="modal" id="modalPush" tabindex="10" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-notify modal-info" role="document">
        <!--Content-->
        <div class="modal-content text-center">
            <!--Header-->
            <div class="modal-header d-flex justify-content-center">
                <p class="heading">Mantente al Día con tus Cultivos !! </p>
            </div>

            <!--Body-->
            <div class="modal-body">
                 <i class="fas fa-shopping-cart fa-4x animated rotateIn mb-4"></i>

                <h4><p>Desea Adquirir Nuestra Version <span class="badge badge-pill badge-danger">PRO</span> para desbloquear la siguiente caracteristica</p></h4>
                <ul>
                <h5><u> Historicos del suelo </u></h5>
                </ul>
            </div>

            <!--Footer-->
            <div class="modal-footer flex-center">
                <a  type="button" class="btn btn-info waves-effect">Si</a>
                <a type="button" class="btn btn-outline-info waves-effect" data-dismiss="modal">No</a>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!--Modal: modalPush-->
                        </div>
                </center>
            </div>
            </div>
        </font>
    </ul>
</div>
