$(document).ready(function(){
    $('form').submit(function(e){
        e.preventDefault();
        var data=$(this).serializeArray();
        data.push({name:'tag', value: 'login'});
        $.ajax({
            url:       'mapa.php',
            type:      'post',
            dataType:  'json',
            data:       data,
            beforeSend: function(){
                
            }
        })
        .done(function(){
            console.log('success');
        })
        .fail(function(){
            console.log('error');
        })
        .always(function(){
            console.log('complete');
        });  
    })









    
    var mapWidget = $("#map").dxMap({
        provider: "bing",
        zoom: 11,
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
    
    $("#show-tooltips").dxButton({
        text: "Show all tooltips",
        onClick: function() {
            var newMarkers = $.map(markersData, function(item) {
                return $.extend(true, {}, item, { tooltip: { isShown: true }} );
            });
    
            mapWidget.option("markers", newMarkers);
        }
    });
});