      var chkd=0;
      var nVertice=0;
      var geometry = new Array();
      var multipoligon = new Array();
      var lines = new Array();
      var d="nada";
      var tmp=0;
      var t=0;
      var area=0;
      var line_count=0;
      var p_inicio = new Array(); 



      var mymap = L.map('mapid').fitWorld();

      L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 30,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
          '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
          'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox.streets'
      }).addTo(mymap);

      //var marker = new L.Marker(e.latlng, {draggable:true});

      L.marker([51.5, -0.09], {draggable:true}).addTo(mymap)
        .bindPopup("<b>Hello world!</b><br />I am a popup.<br>").openPopup();

      L.circle([51.508, -0.11], 500, {
        color: 'red',
        fillColor: '#f03',
        fillOpacity: 0.5
      }).addTo(mymap).bindPopup("I am a circle.");

      L.polygon([
        //vert(lat),hori(lng)
        [51.519, -0.06],
        [51.509, -0.08],
        [51.503, -0.06],
        [51.51, -0.047]
      ]).addTo(mymap).bindPopup("I am a polygon.");


      var popup = L.popup();

      function onMapDClick(act) {
        d=act;

      } 

      function createPolyline(){

        var latlngs = [
                [45.51, -122.68],
                [37.77, -122.43],
                [34.04, -118.2]
            ];
        var polyline = L.polyline(latlngs, {color: 'red'}).addTo(mymap);
        mymap.fitBounds(polyline.getBounds());
}

      function onMapClick(e) { 
        if(d!='nada'){
          chkd++;
          if(chkd>2 && t==0){
             switch(d) {
                  case 'c_marcador':

                        line_count++;
                        tmp=1;
                        t=0;
                        nVertice++;
                        var point = [e.latlng.lat,e.latlng.lng];
                        geometry.push(point);

                        L.polyline(geometry, {color: '#22CD5E'}).addTo(mymap);
                    
                    break;
                  case 'c_poligono':
                        tmp=1;
                        t=0;
                        nVertice++;
                        var point = [e.latlng.lat,e.latlng.lng];
                        
                        
                        //L.marker([e.latlng.lat, e.latlng.lng], {draggable:true}).
                          //addTo(mymap).bindPopup("<b>Vertice: "+nVertice+"</b><br><b>Lat: "+e.latlng.lat+"</b><br><b>Long: "+e.latlng.lng+"</b>");
                        
                        marker = new L.marker(e.latlng, {id:uni, icon:redIcon, draggable:'true'});
                              
                        marker.on('dragend', function(event) {
                              var marker = event.target;
                              var position = marker.getLatLng();
                              marker.setLatLng(position, { id: uni, draggable: 'true' }).bindPopup(position).update();
                          });
                          marker.addTo(mymap);

                          geometry.push(point);

                        //L.polyline(geometry, {color: '#22CD5E'}).addTo(mymap);
                      
                    break;
                    case 'c_circulo':
                        L.circle([e.latlng.lat, e.latlng.lng], 500, {
                          color: 'red',
                          fillColor: '#f03',
                          fillOpacity: 0.5
                        }).addTo(mymap).bindPopup("I am a circle.");
                    break;
                    case 'done_':
                        nVertice=0;
                        if (geometry.length >=3) {
                          multipoligon.push(geometry);

                          L.polygon(geometry).addTo(mymap).bindPopup("I am a polygon.");
                        }
                        console.log(calcPolygonArea());
                        geometry=[];
                        t=1;
                    break;
                  default:
             }
          }else{
            t=0;
          }
        }
      }
      /*Calculo del area de polígono*/

      function calcPolygonArea() { 

        var total = 0; 
        for (var i = 0, l = geometry.length; i < l; i++) { 
          var addX = geometry[i].x; 
          var addY = geometry[i == geometry.length - 1 ? 0 : i + 1].y; 
          var subX = geometry[i == geometry.length - 1 ? 0 : i + 1].x; 
          var subY = geometry[i].y; total += (addX * addY * 0.5); 
          total -= (subX * subY * 0.5); 
        } 
           return total;
          //return Math.abs(total);
      } 




      $("input:checkbox").on('click', function() {
          //var ident="";
          var $box = $(this);
          if ($box.is(":checked")) {
            chkd=1;
            var group = "input:checkbox[name='" + $box.attr("name") + "']";
            $(group).prop("checked", false);
            $box.prop("checked", true);
            document.getElementById("mapid").style.cursor = "crosshair";
            if (tmp==1) {
              chkd++;
            }
            
          } else {
            document.getElementById("mapid").style.cursor = "grab";
            d='done_';
            tmp=0;
            $box.prop("checked", false);
            geometry=[];
          }
          d= $(this).attr('id');
        });
      
        mymap.on('click', onMapClick);
        //mymap.on('mousemove', onMapClick);

        mymap.on('dblclick', onMapDClick);

      