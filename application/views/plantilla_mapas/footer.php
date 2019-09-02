    <!-- SCRIPTS -->

        

    <!-- JQuery -->

    <script type="text/javascript" src="<?php echo base_url();?>_assets/js/jquery-3.3.1.min.js"></script>

    <script src="<?php echo base_url();?>_assets/js/_map_js/leaflet.pm/leaflet.pm.min.js"></script>

    <script src="<?php echo base_url();?>_assets/js/_map_js/geoLocation/locate.js"></script>

     <script type="text/javascript" src="<?php echo base_url();?>_assets/js/_map_js/mouse.position/mousePosition.js"></script>

         <!-- plugin para leyenda html -->

    <script src="<?php echo base_url();?>_assets/js/_map_js/legend/L.Control.HtmlLegend.js"></script>

    <!-- Plugin Mutan Google -->

    <script type="text/javascript" src="<?php echo base_url();?>_assets/js/_map_js/Leaflet.GoogleMutant.js"></script>

    <!-- Plugin Measure Google -->

    <script src="<?php echo base_url();?>_assets/js/_map_js/measure/measure.js"></script>

    <script src="https://rawgit.com/MarcChasse/leaflet.ScaleFactor/master/leaflet.scalefactor.min.js"></script>

    <!-- side by side -->

    <script type="text/javascript"  src="<?php echo base_url();?>_assets/js/_map_js/sidebyside/leaflet-side-by-side.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>_assets/js/_map_js/agroMap.js"></script>

    <!-- Bootstrap tooltips -->

    <script type="text/javascript" src="<?php echo base_url();?>_assets/js/popper.min.js"></script>

    <!-- Bootstrap core JavaScript -->

    <script type="text/javascript" src="<?php echo base_url();?>_assets/js/bootstrap.min.js"></script>

    <!-- MDB core JavaScript -->

    <script type="text/javascript" src="<?php echo base_url();?>_assets/js/mdb.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>_assets/js/agroJs.js"></script>

    <!-- Bootbox y Toaster -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
       var PUid = "";
       var PUrl = "";
       var config = {
           apiKey: "AIzaSyBQITNajkPcCIMdhHhD63lLWUHFVRMEgNY",
           authDomain: "beta-3e152.firebaseapp.com",
           databaseURL: "https://beta-3e152.firebaseio.com",
           projectId: "beta-3e152",
           storageBucket: "beta-3e152.appspot.com",
           messagingSenderId: "sender-id",
       };
       firebase.initializeApp(config);
       var database = firebase.database();
       var referencia = database.ref("/");
       var data = [];
       referencia.on('value', function (datos) {
           data = datos.val();
           var readJ = (JSON.stringify(data));;
           var readJp = (JSON.parse(readJ));
           var names = Object.keys(readJp.Usuarios);
           var cordinates = [];
           var popupmarcas = [];
           var ruta = [];
           try {
               for (var i = 0; i < names.length; i++) {
                   var datos = Object.keys(readJp.Usuarios[names[i]]);
                   for (var j = 0; j < datos.length; j++) {
                       var coors = ('{"lat":' + readJp['Usuarios'][names[i]][datos[j]]['lat'] + ',"lng":' + readJp['Usuarios'][names[i]][datos[j]]['lng'] + '}');
                       var pops = (readJp['Usuarios'][names[i]][datos[j]]['punto']);
                       var npop = StrreplacedName(pops);
                       console.log(coors);
                       var ruta2 = '"Usuarios/' + names[i] + '/datos' + j + '/"';
                       if (typeof coors !== 'undefined' || typeof pops !== 'undefined' || typeof ruta !== 'undefined') {
                           cordinates.push('{"lat":' + readJp['Usuarios'][names[i]][datos[j]]['lat'] + ',"lng":' + readJp['Usuarios'][names[i]][datos[j]]['lng'] + '}');
                           popupmarcas.push(npop);
                           ruta.push(ruta2);
                           $(prevDataget).remove('#listado');
                           var prevDataget = "<div class=row>";
                           prevDataget += '<div class="modal fade" id="' +npop+ '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">';
                           prevDataget += '<div class="modal-dialog" role="document">';
                           prevDataget += '<div class="modal-content">';
                           prevDataget += '<div class="modal-header">';
                           prevDataget += '<h5 class="modal-title" id="exampleModalLabel">Detalles de ' + (readJp['Usuarios'][names[i]][datos[j]]['punto']) + '</h5>';
                           prevDataget += '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
                           prevDataget += '<span aria-hidden="true">&times;</span>';
                           prevDataget += '</button>';
                           prevDataget += '</div>';
                           prevDataget += '<div class="modal-body">';
                           prevDataget += "<ul>";
                           prevDataget += '<li><b>Afección:</b>' + (readJp['Usuarios'][names[i]][datos[j]]['afeccion']) + '</li>';
                           prevDataget += '<li><b>Etapa:</b>' + (readJp['Usuarios'][names[i]][datos[j]]['etapa']) + '</li>';
                           prevDataget += '<li><b>Fumigado:</b>' + (readJp['Usuarios'][names[i]][datos[j]]['fumigado']) + '</li>';
                           prevDataget += '<li><b>Punto:</b>' + (readJp['Usuarios'][names[i]][datos[j]]['punto']) + '</li>';
                           prevDataget += '<li><b>Tipo:</b>' + (readJp['Usuarios'][names[i]][datos[j]]['tipo']) + '</li>';
                           var photo = (readJp['Usuarios'][names[i]][datos[j]]['foto']);
                           var gotph = Strreplaced(photo);
                           var audio = (readJp['Usuarios'][names[i]][datos[j]]['audio']);
                           var gotau = Strreplaced(audio);
                           prevDataget += '<li><b>Multimedia:</b> <a  href="' + gotph + '" target="_blank" rel="noopener noreferrer">FOTO <span class="badge badge-pill badge-info">BETA</span> </a></li>';
                           prevDataget += '<li><b>Multimedia:</b> <a  href="' + audio + '" "target="_blank"  download="Audio.wav" download>AUDIO <span class="badge badge-pill badge-danger">BETA</span> </a></li>';
                           prevDataget += "</ul>";
                           prevDataget += "<img src=" + gotph + " alt='Smiley face' height='35%' width='35%'>";
                           prevDataget += "<input type='hidden' id=ruta_" + (readJp['Usuarios'][names[i]][datos[j]]['punto']) + " value='" + ruta2 + "'/>";
                           prevDataget += '<div class="form-group">';
                           prevDataget += '<label for="exampleFormControlTextarea2">Observaciones</label>';
                           prevDataget += '<textarea class="form-control rounded-0" id="textarea' +npop+ '" rows="2"></textarea>';
                           prevDataget += '</div>';
                           prevDataget += '<center><button type="button "class="btn btn-primary btn-sm" onclick="aBase()"data-dismiss="modal" >Guardar</button></center>';
                           prevDataget += '</div>';
                           prevDataget += '<div class="modal-footer">';
                           prevDataget += '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>';
                           prevDataget += '</div>';
                           prevDataget += '</div>';
                           prevDataget += '</div>';
                           prevDataget += '</div>';
                           prevDataget += "</div>";
                           $(prevDataget).appendTo('#listado');

                       } else {
                           bootbox.alert("Error al Cargar las Marcas desde su Dispositivo");
                       }
                   }

               }
               console.log(popupmarcas);
               console.log(cordinates);

           } catch (error) {
               console.error(error);
           }

           $.ajax({
               url: "<?php echo base_url();?>Mapa/insertado",
               method: "POST",
               data: {
                   names: names,
                   cordinates: cordinates,
                   popupmarcas: popupmarcas,
                   ruta: ruta
               },
               success: function (respuesta) {
                   var answ=respuesta.split(",");;
                   console.log(answ);
                   if (answ.includes('true')){
                    bootbox.alert({
                            message: "Marcadores Actualizados Correctamente - Recargando!",
                            callback: function () {
                                location.reload();
                            }
                        });
                   }else{
                    bootbox.alert("Marcadores estan al día !");
                   }

               }
           });
       }, function (objetoError) {
           console.log('Error de lectura:' + objetoError.code);
       });

       function Strreplaced(string) {
           console.log(string);
           return string.replace(/[""[\]\\]/g, '');
       }
       function StrreplacedName(string) {
           console.log(string);
           var str1= string.replace(/[""[\]\\]/g, '');
           var str2=str1.replace(/\s/g, '');
           return str2;
       }

       function valorG(PopID, urlg) {
           PUid = PopID;
           PUrl = urlg;
           console.log(PUid);
           console.log(PUrl);
       }

       function aBase() {
           var des = document.getElementById("textarea" + PUid);
           var ruta = document.getElementById("ruta" + PUid);
           console.log(ruta);
           console.log(PUid);
           var dataDB = firebase.database().ref(PUrl).child("descripcion").set({
               des: des.value
           });
       }
       $(function () {
           $('.sliderp').click(function () {
               $('#navp').slideToggle(300);
               var img = $(this).find('img');
               if ($(img).attr('id') == 'bot') {
                   $(img).attr('src', 'images/arrow_top.png');
                   $(img).attr('id', 'top');
               } else {
                   $(img).attr('src', 'images/arrow_bottom.png');
                   $(img).attr('id', 'bot');
               }
           });

           $('.sub').click(function () {
               var cur = $(this).prev();
               $('#navp li ul').each(function () {
                   if ($(this)[0] != $(cur)[0])
                       $(this).slideUp(300);
               });
               $(cur).slideToggle(300);
           });
       });

       function openCity(cityName) {
           var i;
           var x = document.getElementsByClassName("city");
           for (i = 0; i < x.length; i++) {
               x[i].style.display = "none";
           }
           document.getElementById(cityName).style.display = "block";

       }

       function saveIT(newPolygonID, id_marcas, area) {
           $.ajax({
               url: '<?php echo base_url();?>Mapa/insert',
               method: "POST",
               data: {
                   newPolygonID: newPolygonID,
                   id_marcas: id_marcas,
                   area: area
               },
               success: function (data) {
                   $('#contenido').html(data);
               }
           });
       }
</script>

</body>
</html>

