   <section class="main-container-map">
       <div id="sidebar" class="sidebar sombra-sidebar">
           <div id="btn-sidebar" class="btn-sidebar sombra-sidebar" onclick="ocultarSidebar()">
               <font color="white"><i class="fas fa-angle-double-left"></i></font>
           </div>
           <div class="sidebar-container">
               <div class="info-sidebar">
                   <p class="h6 text-center">Información sobre vuelo</p>
                   <dl class="row">
                       <dt class="col-4 col-slgm-4">
                           <p><strong>Cultivo:</strong></p>
                       </dt>
                       <dd class="col-8 col-lg-8">
                           <p id="nameCltv"></p>
                       </dd>
                       <dt class="col-4 col-slgm-4">
                           <p><strong>Marca:</strong></p>
                       </dt>
                       <dd class="col-8 col-lg-8">
                           <select id="nameMarcas" class="browser-default" class="form-control form-control-sm">
                               <option value="" disabled selected>Seleccione Capa</option>
                           </select>
                       </dd>
                       <dt class="col-4 col-lg-4">
                           <p><strong>Fecha:</strong></p>
                       </dt>
                       <dd class="col-8 col-lg-8">
                           <input type="text" id="dateF" class="form-control form-control-sm">
                       </dd>

                       <dt class="col-4 col-lg-4">
                           <p><strong>Ubicación:</strong></p>
                       </dt>
                       <dd class="col-8 col-lg-8">
                           <p id="locateCltv"></p>
                       </dd>

                       <dt class="col-4 col-lg-4">
                           <p><strong>Fecha:</strong></p>
                       </dt>
                       <dd class="col-8 col-lg-8">
                           <select id="dateVuelo" class="browser-default">
                           </select>
                       </dd>

                   </dl>
                   <hr style="border-top: 1px solid rgb(255, 255, 255)">
               </div>

               <!-- <div class="comparar-sidebar">
                   <dl class="row">
                       <dt class="col-8 col-lg-4">
                           <h5>
                               <p id="DronSw"><span class="badge success-color badge-pill">Dron</span></p>
                           </h5>
                       </dt>
                       <dd class="col-4 col-lg-4">
                           <label class="switch">
                               <input type="checkbox" id="myCheck2">
                               <span class="slider round"></span>
                           </label>
                       </dd>
                       <dt class="col-8 col-lg-4">
                           <h5>
                               <p id="ApiSw"><span class="badge info-color badge-pill">Api</span></p>
                           </h5>
                       </dt>
                   </dl>
                   
               </div> -->
               <div class="marcas-sidebar">
                   <dl class="row">
                       <dt class="col-8 col-lg-8">
                           <p><strong>Marcas</strong></p>
                       </dt>
                       <dd class="col-4 col-lg-4">
                           <label class="switch">
                               <input type="checkbox" id="myCheck1" checked>
                               <span class="slider round"></span>
                           </label>
                       </dd>
                       <div id="herramientas_map" class="leaflet-pm-toolbar leaflet-bar leaflet-control text-center">
                       </div>
                   </dl>
               </div>
               <div class="download">
                   <dl class="row">
                       <dt class="col-8 col-lg-8">
                           <p><strong>Descargar marcas</strong></p>
                       </dt>
                       <dd class="col-4 col-lg-4">
                           <a id="export" class="btn btn-primary btn-sm btn-agroDescarga"><i
                                   class="fa fa-download "></i></a>
                       </dd>
                   </dl>
               </div>
               <div class="comparar-sidebar">
                   <dl class="row">
                       <dt class="col-8 col-lg-8">
                           <p><strong>Comparar capas</strong></p>
                       </dt>
                       <dd class="col-4 col-lg-4">
                           <label class="switch">
                               <input type="checkbox" id="myCheck">
                               <span class="slider round"></span>
                           </label>
                       </dd>
                   </dl>
                   <hr style="border-top: 1px solid rgb(255, 255, 255)">
               </div>
               <div class="download">
                   <!-- Indicates a successful or positive action -->
                   <a id="downloadInfo" class="btn btn-success btm-sm"><i class="fas fa-file-download"></i> Descargar
                       informe</a>
               </div>
               <hr style="border-top: 1px solid rgb(255, 255, 255)">
               <div class="meteorologia-actual">
                   <dl class="row">
                       <dt class="col-10 col-lg-10">
                           <p><strong>Clima Actual</strong></p>
                       </dt>
                       <dt class="col-11 col-lg-11">
                           <p>
                               <center>
                                   <font color="white">
                                       <div class="media" data-toggle="modal" data-target="#basicExampleModal">
                                           <h1><i class="wi wi-na" id="i_clima"></i></h1>
                                           <div class="media-body">
                                               <h6> <span id="climaPred2" data-toggle="modal"
                                                       data-target="#basicExampleModal" data-toggle="tooltip"
                                                       data-placement="top" title="(click) Más Información"></span>
                                               </h6>
                                           </div>
                                       </div>
                                   </font>
                                   <br>
                                   <div class="container">
                                       <div class="row">
                                           <div class="col" data-toggle="modal" data-target="#basicExampleModal"
                                               data-toggle="tooltip" data-placement="top"
                                               title="(click) Más Información">
                                               <h4><i class='wi wi-thermometer'></i></h4>
                                               <h6><span id="TempW"></span></h6>
                                           </div>
                                           <div class="col" data-toggle="modal" data-target="#basicExampleModal"
                                               data-toggle="tooltip" data-placement="top"
                                               title="(click) Más Información">
                                               <h4><i class='wi wi-barometer'></i></h4>
                                               <h6><span id="PressureW"></span></h6>
                                           </div>
                                           <div class="w-100"></div>
                                           <div class="col" data-toggle="modal" data-target="#basicExampleModal"
                                               data-toggle="tooltip" data-placement="top"
                                               title="(click) Más Información">
                                               <h4><i class='wi wi-humidity'></i></h4>
                                               <h6><span id="HumidityW"></span></h6>
                                           </div>
                                           <div class="col" data-toggle="modal" data-target="#basicExampleModal"
                                               data-toggle="tooltip" data-placement="top"
                                               title="(click) Más Información">
                                               <h4><i class='wi wi-strong-wind'></i></h4>
                                               <h6><span id="SpeedW"></span></h6>
                                           </div>
                                       </div>
                                   </div>
                               </center>
                               <div id="contenido">
                               </div>
                               <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog"
                                   aria-labelledby="exampleModalLabel" data-backdrop="false">
                                   <div class="modal-dialog" role="document">
                                       <div class="modal-content">
                                           <div class="modal-header">
                                               <h5 class="modal-title" id="exampleModalLabel">
                                                   <font color="black">
                                                       <center>Clima Actual </center>
                                                   </font>
                                               </h5>
                                               <button type="button" class="close" data-dismiss="modal"
                                                   aria-label="Close">
                                                   <span aria-hidden="true">&times;</span>
                                               </button>
                                           </div>
                                           <div class="modal-body">
                                               <table class="table table-striped table-hover table-sm "
                                                   id="TableMeteor">
                                                   <tbody>
                                                   </tbody>
                                               </table>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <table class="table table-light table-striped table-hover table-sm " id="TableMeteor2"
                                   data-toggle="modal" data-target="#basicExampleModal" data-toggle="tooltip"
                                   data-placement="top" title="(click) Más Información">
                                   <tbody>
                                   </tbody>
                               </table>
                           </p>
                       </dt>
                   </dl>
               </div>
           </div>

       </div>
       <div class="container-fluid" id="listado">
        </div>
<script>
       var startoDate=0;
       var endoDate=0;
       var today = new Date();
       var year = parseInt(today.getFullYear(),10);
       var date2S = (today.getMonth()+1)+'/'+(today.getDate()-3)+'/'+today.getFullYear();
       var date2E = (today.getMonth()+1)+'/'+(today.getDate())+'/'+today.getFullYear();
           $('#dateF').daterangepicker({
               "showDropdowns": true,
               "minYear": 2000,
               "maxYear": year,
               "timePicker": false,
               "timePickerSeconds": false,
               "autoApply": true,
               "alwaysShowCalendars": true,
               "startDate": date2S.toString(),
               "endDate": date2E.toString(),
               "minDate": "01/01/2000"
           }, function (start, end, label) {
               console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format(
                   'YYYY-MM-DD') + ' (predefined range: ' + label + ')');
                 startoDate=start.format('YYYY MM DD');
                 endoDate=end.format('YYYY MM DD');  
           });
</script>