$(function(){

var markerUrl = "https://js.devexpress.com/Demos/RealtorApp/images/map-marker.png";
        var lat1 = "-0.28177565";
        var lon1 = "-78.54947269";

        var coor = new Array(lat1,lon1);

        $(coor).each(function( index1, element ) {});

        
        markersData = [{
            
                location: [coor[0], coor[1]],
                tooltip: {
                    text: "UPS sur"
                }

        }];

    
    var mapWidget = $("#map").dxMap({
        provider: "bing",
        zoom: 3,
        height: 440,
        width: '100%',
        controls: true,
        markerIconSrc: markerUrl,
        markers: markersData
    }).dxMap("instance");
    
    $("#use-custom-markers").dxCheckBox({
        value: true,
        text: "Use custom marker icons",
        onValueChanged: function(data) {
            mapWidget.option("markers", markersData);
            mapWidget.option("markerIconSrc", data.value ? markerUrl : null);
            console.log("pulsado en marcador1");
        }
    });
    
    $("#show-tooltips").dxButton({
        text: "Show all tooltips",
        onClick: function() {
            var newMarkers = $.map(markersData, function(item) {
                return $.extend(true, {}, item, { tooltip: { isShown: true }} );
                console.log("pulsado en marcador2");
            });
    
            mapWidget.option("markers", newMarkers);
            console.log("pulsado en marcador3");
        }
    });






    $(".boton").click(function() {
    var markerUrl = "https://js.devexpress.com/Demos/RealtorApp/images/map-marker.png";
        var lat = "";
        var lon = "";
        var cult = "";
        var pais = "";
        var ciudad = "";
        var desc = "";

        // Obtenemos todos los valores contenidos en los <td> de la fila
        // seleccionada
        $(this).parents("tr").find(".latitud").each(function() {
          lat += $(this).html() + "\n";
        });
        $(this).parents("tr").find(".longitud").each(function() {
          lon += $(this).html() + "\n";
        });
       
        $(this).parents("tr").find(".cultivo").each(function() {
          cult += $(this).html() + "\n";
        });
        $(this).parents("tr").find(".ciudad").each(function() {
          ciudad += $(this).html() + "\n";
        });
        $(this).parents("tr").find(".pais").each(function() {
          pais += $(this).html() + "\n";
        });
        $(this).parents("tr").find(".descripcion").each(function() {
          desc += $(this).html() + "\n";
        });
        
        var coor = new Array(lat,lon);



        markersData = [{
            
                location: [coor[0], coor[1]],
                tooltip: {
                    text: "->"+cult+"<br>->"+pais+'<br>->'+ciudad+"<br>->"+desc
                }

        }];



    
    var mapWidget = $("#map").dxMap({
        provider: "bing",
        zoom: 16,
        height: 440,
        width: "100%",
        controls: true,
        markerIconSrc: markerUrl,
        markers: markersData
    }).dxMap("instance");
    
    $("#use-custom-markers").dxCheckBox({
        value: true,
        text: "Use custom marker icons",
        onValueChanged: function(data) {
            mapWidget.option("markers", markersData);
            mapWidget.option("markerIconSrc", data.value ? markerUrl : null);
        }
    });
    
    });
});