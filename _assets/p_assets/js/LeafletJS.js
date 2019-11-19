      var cont=0;
      var ident="";
      var t=0;
      var geometry = new Array();
      var tmp="";


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

      function onMapClick(e) {
        /*
         * Latitud: e.latlng.lat
         * Longuitud: e.latlng.lng 
         */
         if (cont>1) {
           switch(ident+"") {
                case 'c_marcador':
                tmp='c_marcador';
                   L.marker([e.latlng.lat, e.latlng.lng]).addTo(mymap).bindPopup("<b><input type='text' placeholder='Nombre marcador'></b><br/>I am a popup.").openPopup();
                   cont=0;
                 
                  break;
                case 'c_poligono':
                tmp='c_poligono';
                    t++;
                      var point = [e.latlng.lat,e.latlng.lng];
                      L.marker([e.latlng.lat, e.latlng.lng]).
                        addTo(mymap).bindPopup("<b>Vertice: "+t+"</b>").openPopup();
                      geometry.push(point);
                    
                  break;
                  case 'c_circulo':
                  tmp='c_circulo';
                      L.circle([e.latlng.lat, e.latlng.lng], 500, {
                        color: 'red',
                        fillColor: '#f03',
                        fillOpacity: 0.5
                      }).addTo(mymap).bindPopup("I am a circle.");
                      cont=0;
                    
                  break;
                  case 'done':
                    if(tmp=="c_poligono"){
                      console.log("crear poligono");
                      L.polygon(geometry).addTo(mymap).bindPopup("I am a polygon.");
                    }
                    
                  break;
                default:
           }
          }

      }
      
      if(cont==0){
        $("input:checkbox").on('click', function() {
            //var ident="";
            var $box = $(this);
            if ($box.is(":checked")) {
              var group = "input:checkbox[name='" + $box.attr("name") + "']";
              $(group).prop("checked", false);
              $box.prop("checked", true);
            } else {
              $box.prop("checked", false);
              cont=0;
            }
            ident = $(this).attr('id');
            switch(ident+"") {
              case 'c_marcador':
                  cont++;
                break;
              case 'c_poligono':
              cont++;
                break;
                case 'c_circulo':
                cont++;
                break;
              default:
              cont=0;
            }
          });
      }
      
        mymap.on('click', onMapClick);
      