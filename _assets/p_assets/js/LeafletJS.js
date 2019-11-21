      var chkd=0;
      var nVertice=0;
      var geometry = new Array();
      var multipoligon = new Array();
      var d="nada";
      var tmp=0;
      var t=0;


      var mymap = L.map('mapid').fitWorld();

      L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 30,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
          '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
          'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox.streets'
      }).addTo(mymap);

      L.marker([51.5, -0.09]).addTo(mymap)
        .bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();

      L.circle([51.508, -0.11], 500, {
        color: 'red',
        fillColor: '#f03',
        fillOpacity: 0.5
      }).addTo(mymap).bindPopup("I am a circle.");

      L.polygon([
        //vert,hori
        [51.519, -0.06],
        [51.509, -0.08],
        [51.503, -0.06],
        [51.51, -0.047]
      ]).addTo(mymap).bindPopup("I am a polygon.");


      var popup = L.popup();

      function onMapDClick(e) {
        document.getElementById("mapid").style.cursor = "grab";

      } 
      function onMapClick(e) { 
        if(d!='nada'){
          chkd++;
          if(chkd>2 && t==0){
             switch(d) {
                  case 'c_marcador':
                        L.marker([e.latlng.lat, e.latlng.lng]).addTo(mymap).bindPopup("<b><input type='text' placeholder='Nombre marcador'></b><br/>I am a popup.").openPopup();
                    break;
                  case 'c_poligono':
                        tmp=1;
                        t=0;
                        nVertice++;
                        var point = [e.latlng.lat,e.latlng.lng];
                        L.marker([e.latlng.lat, e.latlng.lng]).
                          addTo(mymap).bindPopup("<b>Vertice: "+nVertice+"</b>").openPopup();
                        geometry.push(point);
                      
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
                        geometry=[];
                        //tmp=0;
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
          area= Math.abs(total); 
          return area;
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
            d='nada';
            tmp=0;
            $box.prop("checked", false);
          }
          d= $(this).attr('id');
        });
      
        mymap.on('click', onMapClick);

        mymap.on('dblclick', onMapDClick);

      