let baseUrl = location.origin + "/";

function inizializerMap() {
    let datosMap = {};
    $.ajax({
        type: "post",
        async: false,
        url: "Mapa/inizializerMap",
        data: {
            cultivo: parametroURL("ncltv")
        },
        success: respuesta => {
            var json = JSON.parse(respuesta);
            if (json.status == "ok") {
                datosMap = json;
                /*         console.log(datosMap); */
            }
        },
        error: function(xhr) {
            console.log(xhr.status);
            if (xhr.status == 500) {
                toastr.error(
                    "Si el problema perciste comunicate con el administrador",
                    "Error interno, No se pudo cargar datos del mapa intentalo mas tarde", {
                        positionClass: "toast-bottom-center",
                        showDuration: "250",
                        hideDuration: "1000",
                        timeOut: "5000",
                        extendedTimeOut: "1000"
                    }
                );
            } else if (xhr.status == 400) {
                var json = JSON.parse(xhr.responseText);
                toastr.error("Intentanlo más tarde", json.msg, {
                    positionClass: "toast-bottom-center",
                    showDuration: "250",
                    hideDuration: "1000",
                    timeOut: "5000",
                    extendedTimeOut: "1000"
                });
            }
        }
    });
    return datosMap;
}
let dataIni = inizializerMap();
/* console.log(dataIni); */

document.getElementById("nameCltv").textContent = dataIni.cultivo.nombre_cult;
document.getElementById("locateCltv").textContent =
    dataIni.cultivo.pais_cult + ", " + dataIni.cultivo.ciudad_cult;
let dateVuelo = document.getElementById("dateVuelo");
for (var i = 0; i < dataIni.listaVuelos.length; i++) {
    var option = document.createElement("option"); //Creamos la opcion
    option.innerHTML = dataIni.listaVuelos[i].fecha_vuelo; //Metemos el texto en la opción
    dateVuelo.appendChild(option); //Metemos la opción en el select
}

colorBlue = [
    "red",
    "#f17c4a",
    "#fec980",
    "#ffffbf",
    "#c7e6db",
    "#81bad8",
    "#2c7bb6"
];
colorGreen = [
    "red",
    "#f17c4a",
    "#fec980",
    "#ffffbf",
    "#c4e687",
    "#77c35c",
    "#1a9641"
];

let capas = [""];
if (dataIni.vuelo.capa_RGB != "") {
    let tmp = dataIni.vuelo.capa_RGB.split(",");
    /*   console.log(tmp); */
    capas.push({
        base: L.tileLayer(baseUrl + tmp[0], {
            minZoom: 14,
            maxZoom: 21
        }),
        text: "Visible"
    });
    /*   console.log(capas); */
}
/* console.log("Visible"); */
if (dataIni.vuelo.capa_NDVI != "") {
    let tmp = dataIni.vuelo.capa_NDVI.split(",");
    capas.push({
        base: L.tileLayer(baseUrl + tmp[0], {
            minZoom: 14,
            maxZoom: 21
        }),
        text: "Vigor",
        v1: tmp[1],
        v2: tmp[2],
        v3: tmp[3],
        v4: tmp[4],
        v5: tmp[5],
        v6: tmp[6],
        v7: tmp[7],
        color: colorGreen
    });
}
if (dataIni.vuelo.capa_NDRE != "") {
    let tmp = dataIni.vuelo.capa_NDRE.split(",");
    capas.push({
        base: L.tileLayer(baseUrl + tmp[0], {
            minZoom: 14,
            maxZoom: 21
        }),
        text: "Nutrientes",
        v1: tmp[1],
        v2: tmp[2],
        v3: tmp[3],
        v4: tmp[4],
        v5: tmp[5],
        v6: tmp[6],
        v7: tmp[7],
        color: colorBlue
    });
}
if (dataIni.vuelo.capa_TCI != "") {
    let tmp = dataIni.vuelo.capa_TCI.split(",");
    //    console.log(tmp);
    capas.push({
        base: L.tileLayer(baseUrl + tmp[0], {
            minZoom: 14,
            maxZoom: 21
        }),
        text: "Clorofila",
        v1: tmp[1],
        v2: tmp[2],
        v3: tmp[3],
        v4: tmp[4],
        v5: tmp[5],
        v6: tmp[6],
        v7: tmp[7],
        color: colorGreen
    });
}
if (dataIni.vuelo.capa_GNDVI != "") {
    let tmp = dataIni.vuelo.capa_GNDVI.split(",");
    capas.push({
        base: L.tileLayer(baseUrl + tmp[0], {
            minZoom: 14,
            maxZoom: 21
        }),
        text: "Fotosintesis",
        v1: tmp[1],
        v2: tmp[2],
        v3: tmp[3],
        v4: tmp[4],
        v5: tmp[5],
        v6: tmp[6],
        v7: tmp[7],
        color: colorGreen
    });
}
if (dataIni.vuelo.capa_NGRDI != "") {
    let tmp = dataIni.vuelo.capa_NGRDI.split(",");
    capas.push({
        base: L.tileLayer(baseUrl + tmp[0], {
            minZoom: 14,
            maxZoom: 21
        }),
        text: "Pigmentación",
        v1: tmp[1],
        v2: tmp[2],
        v3: tmp[3],
        v4: tmp[4],
        v5: tmp[5],
        v6: tmp[6],
        v7: tmp[7],
        color: colorGreen
    });
}

if (dataIni.vuelo.capa_CIR != "") {
    let tmp = dataIni.vuelo.capa_CIR.split(",");
    capas.push({
        base: L.tileLayer(baseUrl + tmp[0], {
            minZoom: 14,
            maxZoom: 21
        }),
        text: "Visible II"
    });
}
if (dataIni.vuelo.capa_NIR != "") {
    let tmp = dataIni.vuelo.capa_NIR.split(",");
    capas.push({
        base: L.tileLayer(baseUrl + tmp[0], {
            minZoom: 14,
            maxZoom: 21
        }),
        text: "Reflectancia"
    });
}
if (dataIni.vuelo.capa_DTM != "") {
    let tmp = dataIni.vuelo.capa_DTM.split(",");
    capas.push({
        base: L.tileLayer(baseUrl + tmp[0], {
            minZoom: 14,
            maxZoom: 21
        }),
        text: "Altura",
        v1: tmp[1],
        v2: tmp[2],
        v3: tmp[3],
        v4: tmp[4],
        v5: tmp[5],
        v6: tmp[6],
        v7: tmp[7],
        color: colorBlue
    });
}
if (dataIni.vuelo.capa_NDWI != "") {
    let tmp = dataIni.vuelo.capa_NDWI.split(",");
    capas.push({
        base: L.tileLayer(baseUrl + tmp[0], {
            minZoom: 14,
            maxZoom: 21
        }),
        text: "Humedad",
        v1: tmp[1],
        v2: tmp[2],
        v3: tmp[3],
        v4: tmp[4],
        v5: tmp[5],
        v6: tmp[6],
        v7: tmp[7],
        color: colorBlue
    });
}
//console.log(capas);
let selectMain = document.getElementById("select-main");
for (var i = 1; i < capas.length; i++) {
    var option = document.createElement("option"); //Creamos la opcion
    option.innerHTML = capas[i].text; //Metemos el texto en la opción
    selectMain.appendChild(option); //Metemos la opción en el select
}
//console.log(capas);
let selectleft = document.getElementById("select-left");
for (var i = 1; i < capas.length; i++) {
    var optionleft = document.createElement("option"); //Creamos la opcion
    optionleft.innerHTML = capas[i].text; //Metemos el texto en la opción
    selectleft.appendChild(optionleft); //Metemos la opción en el select
}

//---------------------------Features Map---------
let bounsArr = dataIni.cultivo.bouns_cult.split(",");
var latLgn = L.latLng(bounsArr[0], bounsArr[1]),
    latLng = L.latLng(bounsArr[2], bounsArr[3]),
    bounds = L.latLngBounds(latLgn, latLng);
var map = L.map("myMap", {
    zoom: 16,
    maxZoom: 21,
    zoomControl: false,
    fullscreenControl: true,
    fullscreenControlOptions: {
        position: "topright"
    }
}).fitBounds(bounds);

L.control.zoom({
    position: "topright"
}).addTo(map);

// Escalas en el Mapa
L.control.scalefactor({
    position: "bottomleft"
}).addTo(map);

// Position map
L.control.mousePosition({
    position: "bottomright"
}).addTo(map);

// MAPA DE GOOGLE
var roadMutant = L.gridLayer
    .googleMutant({
        maxZoom: 23,
        type: "hybrid",
    })
    .addTo(map);

map.pm.addControls({
    position: "bottomleft", // toolbar position, options are 'topleft', 'topright', 'bottomleft', 'bottomright'
    drawMarker: true, // adds button to draw markers
    drawPolyline: false, // adds button to draw a polyline
    drawRectangle: false, // adds button to draw a rectangle
    drawPolygon: true, // adds button to draw a polygon
    drawCircle: false, // adds button to draw a cricle
    cutPolygon: false, // adds button to cut a hole in a polygon
    editMode: false, // adds button to toggle edit mode for all layers
    removalMode: true // adds a button to remove layers
});

// MEDIR AREA
var measureControl = new L.Control.Measure({
    primaryLengthUnit: "meters",
    secondaryLengthUnit: "kilometers",
    primaryAreaUnit: "sqmeters",
    secondaryAreaUnit: "hectares",
    position: "topright"
});
measureControl.addTo(map);

// GEOLOCATION
lc = L.control
    .locate({
        position: "topright",
        strings: {
            title: "Geolocalizacion"
        }
    })
    .addTo(map);



//Features comparar
let capaMain;
let capaLeft;
let legend = L.control.htmllegend();
let legendLeft = L.control.htmllegend();
selectMain.addEventListener("change", function() {
    legend.remove();
    side.remove(map);
    let capaSelected = this.options.selectedIndex;
    capaMain = capas[capaSelected].base.addTo(map);
    if (capas[capaSelected].v1) {
        legend = L.control.htmllegend({
            position: "bottomright",
            legends: [{
                name: "Valores", //capas[capaSelected].text,
                layer: capaMain,
                elements: [{
                        label: capas[capaSelected].v1,
                        html: "",
                        style: {
                            "background-color": capas[capaSelected].color[0],
                            width: "15px",
                            height: "15px"
                        }
                    },
                    {
                        label: capas[capaSelected].v2,
                        html: "",
                        style: {
                            "background-color": capas[capaSelected].color[1],
                            width: "15px",
                            height: "15px"
                        }
                    },
                    {
                        label: capas[capaSelected].v3,
                        html: "",
                        style: {
                            "background-color": capas[capaSelected].color[2],
                            width: "15px",
                            height: "15px"
                        }
                    },
                    {
                        label: capas[capaSelected].v4,
                        html: "",
                        style: {
                            "background-color": capas[capaSelected].color[3],
                            width: "15px",
                            height: "15px"
                        }
                    },
                    {
                        label: capas[capaSelected].v5,
                        html: "",
                        style: {
                            "background-color": capas[capaSelected].color[4],
                            width: "15px",
                            height: "15px"
                        }
                    },
                    {
                        label: capas[capaSelected].v6,
                        html: "",
                        style: {
                            "background-color": capas[capaSelected].color[5],
                            width: "15px",
                            height: "15px"
                        }
                    },
                    {
                        label: capas[capaSelected].v7,
                        html: "",
                        style: {
                            "background-color": capas[capaSelected].color[6],
                            width: "15px",
                            height: "15px"
                        }
                    },
                    {
                        label: "",
                        html: `<a style="background: none; margin-left: auto; margin-right: auto; color: #0277BD; font-size: 22px;"
                                  href="${baseUrl}index.php/Support/preguntas" target="_blank" ><i class="fa fa-info-circle"></i></a>`,
                        style: {
                            "padding-top": "5px",
                            width: "100%"
                        }
                    }
                ]
            }]
        });
        map.addControl(legend);
    }
    if (document.getElementById("myCheck").checked) {
        if (capaSelected != selectleft.options.selectedIndex) {
            side.setRightLayers(capaMain);
            comparar(capaLeft, capaMain);
        } else {
            console.log("aqui estoy");
            //legendLeft.remove();
            comparar(null, null);
        }
    }
    removeCapas(capaSelected, selectleft.options.selectedIndex);
});

selectleft.addEventListener("change", function() {
    legendLeft.remove();
    side.remove(map);
    let capaSelectedLeft = this.options.selectedIndex;
    capaLeft = capas[capaSelectedLeft].base.addTo(map);
    if (capas[capaSelectedLeft].v1) {
        legendLeft = L.control.htmllegend({
            position: "bottomleft",
            legends: [{
                name: "Valores", // capas[capaSelectedLeft].text,
                layer: capaLeft,
                elements: [{
                        label: capas[capaSelectedLeft].v1,
                        html: "",
                        style: {
                            "background-color": capas[capaSelectedLeft].color[0],
                            width: "15px",
                            height: "15px"
                        }
                    },
                    {
                        label: capas[capaSelectedLeft].v2,
                        html: "",
                        style: {
                            "background-color": capas[capaSelectedLeft].color[1],
                            width: "15px",
                            height: "15px"
                        }
                    },
                    {
                        label: capas[capaSelectedLeft].v3,
                        html: "",
                        style: {
                            "background-color": capas[capaSelectedLeft].color[2],
                            width: "15px",
                            height: "15px"
                        }
                    },
                    {
                        label: capas[capaSelectedLeft].v4,
                        html: "",
                        style: {
                            "background-color": capas[capaSelectedLeft].color[3],
                            width: "15px",
                            height: "15px"
                        }
                    },
                    {
                        label: capas[capaSelectedLeft].v5,
                        html: "",
                        style: {
                            "background-color": capas[capaSelectedLeft].color[4],
                            width: "15px",
                            height: "15px"
                        }
                    },
                    {
                        label: capas[capaSelectedLeft].v6,
                        html: "",
                        style: {
                            "background-color": capas[capaSelectedLeft].color[5],
                            width: "15px",
                            height: "15px"
                        }
                    },
                    {
                        label: capas[capaSelectedLeft].v7,
                        html: "",
                        style: {
                            "background-color": capas[capaSelectedLeft].color[6],
                            width: "15px",
                            height: "15px"
                        }
                    },
                    {
                        label: "",
                        html: `<a style="background: none; margin-left: auto; margin-right: auto; color: #0277BD; font-size: 22px;"
                                  href="${baseUrl}index.php/Support/preguntas" target="_blank" ><i class="fa fa-info-circle"></i></a>`,
                        style: {
                            "padding-top": "5px",
                            width: "100%"
                        }
                    }
                ]
            }]
        });
        map.addControl(legendLeft);
    }
    if (capaSelectedLeft != selectMain.options.selectedIndex) {
        side.setLeftLayers(capaLeft);
        comparar(capaLeft, capaMain);
    } else {
        comparar(null, null);
    }
    removeCapas(capaSelectedLeft, selectMain.options.selectedIndex);
});

function comparar(left, rigth) {
    side = L.control.sideBySide(left, rigth).addTo(map);
}

function removeCapas(capaSelected1, capaSelected2) {
    for (let i = 1; i < capas.length; i++) {
        if (i != capaSelected1 && i != capaSelected2) {
            capas[i].base.remove();
        }
    }
}

var greenIcon = L.icon({
    iconUrl: 'leaf-green.png',
    shadowUrl: 'leaf-shadow.png',

    iconSize: [38, 95], // size of the icon
    shadowSize: [50, 64], // size of the shadow
    iconAnchor: [22, 94], // point of the icon which will correspond to marker's location
    shadowAnchor: [4, 62], // the same for the shadow
    popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
});

for (let marca of dataIni.marcas) {
    if (marca.id_tipoMarcas == 2) {
        // exported();
        L.polygon(JSON.parse(marca.coor_marcas))
            .bindPopup(
                /*marca.popup_marcas*/
                " <center><h6 id='marcaValue'>" +
                marca.popup_marcas +
                " </h6></center>" +
                "" +
                "<h6>Área:" + Math.round(marca.area, 1) + " ha<span  class='badge badge-primary' style='cursor:pointer' onclick=exported('" + marca.App_ID_Mark + "','" + marca.Polygon_ID + "','" + marca.id_marcas + "') >Generar Predicción</span></h6>", {
                    maxWidth: "auto"
                }
            )
            .addTo(map);
    } else if (marca.id_tipoMarcas == 1) {
        if (marca.App_ID_Mark == 'Default_App_ID') {
            L.marker(JSON.parse(marca.coor_marcas))
                .bindPopup(marca.popup_marcas + '<h6><span  class="badge badge-primary" style="cursor:pointer"onclick="noImformationMarked()">Más Información</span></h6>')
                .addTo(map);
        } else {
            L.marker(JSON.parse(marca.coor_marcas))
                .bindPopup(marca.popup_marcas + '<h6><span  class="badge badge-primary" style="cursor:pointer" data-toggle="modal" data-target="#' + marca.popup_marcas + '" onclick=valorG("' + marca.popup_marcas + '",' + marca.App_ID_Mark + ')>Más Información</span></h6>')
                .addTo(map);
        }

    }

}

function noImformationMarked() {
    bootbox.alert("Esta Marca No Posee más información !");
}
var PUid = "";
var PUrl = "";

function valorG(PopID, urlg) {
    PUid = PopID;
    PUrl = urlg;
    //console.log(PUid);
    //console.log(PUrl);
}

function aBase() {

    var descripcion = document.getElementById("textarea" + PUid);
    var ruta = document.getElementById("ruta" + PUid);
    //console.log(PUid);
    //console.log(PUrl);
    var dataDB = firebase.database().ref(PUrl).child("descripcion").set({
        descripcion: descripcion.value
    });
}

document.getElementById("downloadInfo").setAttribute("target", "_blank");
document
    .getElementById("downloadInfo")
    .setAttribute("href", baseUrl + dataIni.vuelo.vuelo_informe);
document.getElementById("export").onclick = function(e) {
    let dataIni2 = inizializerMap();
    var arreglo = [];
    var arreglo2 = [];
    for (let marca of dataIni2.marcas) {
        if (marca.id_tipoMarcas == 1) {
            var data = L.marker(JSON.parse(marca.coor_marcas)).toGeoJSON();
            var convertedData =
                "text/json;charset=utf-8,%7B%22name%22%3A%22MarcaSample%22,%22geo_json%22%3A" +
                encodeURIComponent(JSON.stringify(data) + "}");
            arreglo.push("data:" + convertedData, marca.popup_marcas);
        } else {
            if (marca.id_tipoMarcas == 2) {
                var data = L.polygon(JSON.parse(marca.coor_marcas)).toGeoJSON();
                var convertedData =
                    "%7B%22name%22%3A%22" +
                    marca.popup_marcas +
                    "%22,%22geo_json%22%3A" +
                    encodeURIComponent(JSON.stringify(data) + "}");
                var decodedData = decodeURIComponent(convertedData);
                arreglo2.push(decodedData);
            }
        }
    }
    //  for (i in arreglo2) {
    //console.log(arreglo2[1]);
    //loaded(arreglo2[1]);
    //  }
    multidescarga(arreglo);
    //console.log('_____' + arreglo2 + '______');
    //var objectReceived = (decodeURIComponent((arreglo2)));
    //console.log(objectReceived);
    //loaded(objectReceived);
};

function exported(App_ID_Mark, Polygon_ID, id_marcas) {
    var elem = document.querySelector('#loading');
    elem.style.display = '';
    let dataIni2 = inizializerMap();
    var arreglo = [];
    var arreglo2 = [];
    for (let marca of dataIni2.marcas) {
        if (marca.id_tipoMarcas == 1) {
            var data = L.marker(JSON.parse(marca.coor_marcas)).toGeoJSON();
            var convertedData =
                "text/json;charset=utf-8,%7B%22name%22%3A%22MarcaSample%22,%22geo_json%22%3A" +
                encodeURIComponent(JSON.stringify(data) + "}");

            arreglo.push("data:" + convertedData, marca.popup_marcas);
        } else {
            if (marca.id_tipoMarcas == 2) {
                var data = L.polygon(JSON.parse(marca.coor_marcas)).toGeoJSON();
                var convertedData =
                    "%7B%22name%22%3A%22" +
                    marca.popup_marcas +
                    "%22,%22geo_json%22%3A" +
                    encodeURIComponent(JSON.stringify(data) + "}");
                var decodedData = decodeURIComponent(convertedData);
                arreglo2.push(decodedData);
            }
        }
    }

    for (i in arreglo2) {
        var jsonparsed = JSON.parse(arreglo2[i]);
        /*     console.log("<Ini---------------------" + i + "---------------------Ini>");
            console.log(arreglo2[i]);
            console.log("<End---------------------" + i + "---------------------End>"); */
        var nameParsed = (jsonparsed['name']);
        var marcaGetName = document.getElementById("marcaValue").innerText;
        if (marcaGetName === nameParsed) {
            //console.log(arreglo2[i]);
            GetPolygonID(arreglo2[i], App_ID_Mark, Polygon_ID, id_marcas);
        } else {
            // console.log('Nothing goes Wrong bro');
        }

    }

}
window.onload = function meteorologiaActual() {
    var elem = document.querySelector('#loading');
    elem.style.display = '';
    this.getallCultivos();
}

function getallCultivos() {
    var elem = document.querySelector('#loading');
    elem.style.display = '';
    let dataIni2 = inizializerMap();
    var arreglo = [];
    var arreglo2 = [];
    var areas = [];
    var appid = [];
    for (let marca of dataIni2.marcas) {
        if (marca.id_tipoMarcas == 1) {
            var data = L.marker(JSON.parse(marca.coor_marcas)).toGeoJSON();
            var convertedData =
                "text/json;charset=utf-8,%7B%22name%22%3A%22MarcaSample%22,%22geo_json%22%3A" +
                encodeURIComponent(JSON.stringify(data) + "}");

            arreglo.push("data:" + convertedData, marca.popup_marcas);
        } else {
            if (marca.id_tipoMarcas == 2) {
                var data = L.polygon(JSON.parse(marca.coor_marcas)).toGeoJSON();
                var convertedData =
                    "%7B%22name%22%3A%22" +
                    marca.popup_marcas +
                    "%22,%22geo_json%22%3A" +
                    encodeURIComponent(JSON.stringify(data) + "}");
                var decodedData = decodeURIComponent(convertedData);
                arreglo2.push(decodedData);
                areas.push(marca.area);
                appid.push(marca.App_ID_Mark);
            }
        }
    }

    /*    for (i in arreglo2) {
     GetPolygonID2(arreglo2[i]);
     console.log(arreglo2[i]);
     } */

    for (i in arreglo2) {
        if (areas[i] >= 1.0) {
            GetPolygonID2(arreglo2[i], appid[i]);
            break;
        } else if (areas[i] <= 0) {
            setTimeout(end, 3500 * i);
        }
    }



}

function end() {
    var elem = document.querySelector('#loading');
    elem.style.display = 'none';
}

function GetPolygonID(arreglo, App_ID_Mark, Polygon_ID, id_marcas) {
    if (Polygon_ID == null || Polygon_ID == 'undefined' || Polygon_ID == 'Default_Polygon_ID' || Polygon_ID == '') {
        var xhr = new XMLHttpRequest();
        /*     bootbox.alert('Desde la API -->'+Polygon_ID); */
        xhr.responseType = "text";
        xhr.addEventListener("readystatechange", function() {
            if (xhr.readyState === 4) {
                var json = JSON.parse(xhr.responseText);
                console.log(json);
                //console.log(json.id + "_" + json.user_id);
                if (json.id == "" || json.id == null || json.id == 'undefined') {
                    bootbox.alert({
                        message: "<br>No es posible de Predecir Datos para su Poligono : <font style='text-transform: uppercase;'> <b>" + JSON.parse(arreglo).name + " </b></font> <br> Debido a que la extensinón del Polygono es menor 1",
                        backdrop: true,
                    });
                    setTimeout(end, 2500);
                } else {
                    newPolygonID = json.id;
                    area = json.area
                    console.log("<---------->");
                    console.log(json.name + "-->" + json.area);
                    console.log("<---------->");

                    if (json.area >= 2 & json.area <= 3000) {
                        saveIT(newPolygonID, id_marcas, area);
                        DrawHighcharts(App_ID_Mark, json.id);
                    } else {
                        bootbox.alert({
                            message: "<br>Imposible de Predecir Datos para su Poligono : <font style='text-transform: uppercase;'> <b>" + JSON.parse(arreglo).name + " </b></font> <br> El Polygono esta fuera del <font style='text-transform: uppercase;'> <a data-toggle='tooltip' title='Los Cultivos deben tener un rango entre 1 a 2500 Hectareas'><u>Standard</u></a></font>",
                            backdrop: true,
                        });
                        setTimeout(end, 2500);
                    }
                }
            } else if (xhr.status === 422) {

                var elem = document.querySelector('#loading');
                elem.style.display = 'none';
            }
        });
        xhr.withCredentials = false;
        var myurl =
            "https://api.agromonitoring.com/agro/1.0/polygons?appid=" + App_ID_Mark + "";
        var proxy = "https://cors-anywhere.herokuapp.com/";
        xhr.open("POST", proxy + myurl, true);
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.setRequestHeader("cache-control", "no-cache");
        xhr.setRequestHeader("Access-Control-Allow-Headers", "x-requested-with, x-requested-by");
        xhr.send(arreglo);
    } else {
        /*     bootbox.alert('Desde la Base-->'+Polygon_ID); */
        DrawHighcharts(App_ID_Mark, Polygon_ID);
    }

}

function GetPolygonID2(arreglo, appid) {
    var xhr = new XMLHttpRequest();
    xhr.responseType = "text";
    xhr.addEventListener("readystatechange", function() {
        if (xhr.readyState === 4) {
            var json = JSON.parse(xhr.responseText);
            // console.log(json);
            //console.log(json.id + "_" + json.user_id);
            if (json.id == "" || json.id == null) {

            } else {
                /* console.log("Area :" + json.area); */
                meteorologiaACT(json.id, appid);
                uviACT(json.id, appid);
            }

        } else if (xhr.status === 422) {

            var elem = document.querySelector('#loading');
            elem.style.display = 'none';
        }
    });
    xhr.withCredentials = false;
    var myurl =
        "https://api.agromonitoring.com/agro/1.0/polygons?appid=" + appid + "";
    var proxy = "https://cors-anywhere.herokuapp.com/";
    xhr.open("POST", proxy + myurl, true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.setRequestHeader("cache-control", "no-cache");
    xhr.setRequestHeader("Access-Control-Allow-Headers", "x-requested-with, x-requested-by");
    xhr.send(arreglo);
}


function meteorologiaACT(polygonID, appid) {
    var data;
    var xhr = new XMLHttpRequest();
    xhr.withCredentials = false;
    xhr.addEventListener("readystatechange", function() {
        if (xhr.readyState === 4) {
            var jsonAnswer = JSON.parse(xhr.responseText);
            meteorologiaActual(jsonAnswer);
            var elem = document.querySelector('#loading');
            elem.style.display = 'none';
        }
    });
    var myurl2 = "http://api.agromonitoring.com/agro/1.0/weather?polyid=" + polygonID + "&appid=" + appid + "";
    var proxy = 'https://cors-anywhere.herokuapp.com/';
    xhr.open("GET", proxy + myurl2, true);
    xhr.setRequestHeader("cache-control", "no-cache");
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.setRequestHeader("Access-Control-Allow-Headers", "x-requested-with, x-requested-by");
    xhr.send(data);
}

function uviACT(polygonID, appid) {
    var data;
    var xhr = new XMLHttpRequest();
    xhr.withCredentials = false;
    xhr.addEventListener("readystatechange", function() {
        if (xhr.readyState === 4) {
            var jsonAnswer = JSON.parse(xhr.responseText);
            UVIActual(jsonAnswer);
            var elem = document.querySelector('#loading');
            elem.style.display = 'none';
        }
    });
    var myurl2 = "http://api.agromonitoring.com/agro/1.0/uvi?polyid=" + polygonID + "&appid=" + appid + "";
    var proxy = 'https://cors-anywhere.herokuapp.com/';
    xhr.open("GET", proxy + myurl2, true);
    xhr.setRequestHeader("cache-control", "no-cache");
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.setRequestHeader("Access-Control-Allow-Headers", "x-requested-with, x-requested-by");
    xhr.send(data);
}

function DrawHighcharts(App_ID_Mark, Polygon_ID) {
    var data;
    var xhr = new XMLHttpRequest();
    xhr.withCredentials = false;
    // xhr.responseType = 'text';
    xhr.addEventListener("readystatechange", function() {
        if (xhr.readyState === 4) {
            var jsonAnswer = JSON.parse(xhr.responseText);
            //console.log(JSON.stringify(json));
            $("#home").click();
            predicCompleta(jsonAnswer);
            predicPresion(jsonAnswer);
            predicViento(jsonAnswer);
            predicTemperature(jsonAnswer);
            SueloPolygon(App_ID_Mark, Polygon_ID);
            var elem = document.querySelector('#loading');
            elem.style.display = 'none';
        }
    });
    var myurl = 'https://api.agromonitoring.com/agro/1.0/weather/forecast?polyid=' + Polygon_ID + '&appid=' + App_ID_Mark + '';
    var proxy = 'https://cors-anywhere.herokuapp.com/';
    xhr.open("GET", proxy + myurl, true);
    xhr.setRequestHeader("cache-control", "no-cache");
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.withCredentials = false;
    xhr.setRequestHeader('Access-Control-Allow-Origin', '*');
    xhr.setRequestHeader("Access-Control-Allow-Headers", "x-requested-with, x-requested-by");
    xhr.send(data);

}

function meteorologiaActual(jsonl2) {
    var iconCode = "";
    var estado2 = "";
    var iconUrl, descrip, temp, pressure, humidity, tempmin, tempmax, wind, deg, cloudy;
    try {
        estado = ((jsonl2['weather'][0]['main']));
        descrip = ((jsonl2['weather'][0]['description']));
        switch (descrip) {
            case "broken clouds":
                estado2 = "Nubes Fragmentadas";
                break;
            case "clear sky":
                estado2 = "Cielo Despejado";
                break;
            case "few clouds":
                estado2 = "Pocas Nubes"
                break;
            case "scattered clouds":
                estado2 = "Nubes Dispersas";
                break;
            case "shower rain":
                estado2 = "Chubascos";
                break;
            case "rain":
                estado2 = "Lluvia";
                break;
            case "thunderstorm":
                estado2 = "Tormenta Electrica";
                break;
            case "snow":
                estado2 = "Nevando";
                break;
            case "mist":
                estado2 = "Neblado";
                break;
            default:
                estado2 = "No Data Found!"
        }

        temp = ((jsonl2['main']['temp']));
        pressure = ((jsonl2['main']['pressure']));
        humidity = ((jsonl2['main']['humidity']));
        tempmin = ((jsonl2['main']['temp_min']));
        tempmax = ((jsonl2['main']['temp_min']));
        wind = ((jsonl2['wind']['speed']));
        deg = ((jsonl2['wind']['deg']));
        cloudy = ((jsonl2['clouds']['all']));
        iconCode = (jsonl2['weather'][0]['icon']);
        switch (iconCode) {
            case "01d":
                iconUrl = "wi wi-day-sunny";
                break;
            case "01n":
                iconUrl = "wi wi-night-clear";
                break;
            case "02d":
                iconUrl = "wi wi-day-cloudy ";
                break;
            case "02n":
                iconUrl = "wi wi-night-alt-cloudy";
                break;
            case "03d":
                iconUrl = "wi wi-cloud ";
                break;
            case "03n":
                iconUrl = "wi wi-night-alt-cloudy";
                break;
            case "04d":
                iconUrl = "wi wi-day-cloudy-windy";
                break;
            case "04n":
                iconUrl = "wi wi-night-alt-cloudy-windy";
                break;
            case "09d":
                iconUrl = "wi wi-day-showers";
                break;
            case "09n":
                iconUrl = "wi wi-night-alt-showers ";
                break;
            case "10d":
                iconUrl = "wi wi-day-rain-wind";
                break;
            case "10n":
                iconUrl = "wi wi-night-alt-rain-wind";
                break;
            case "11d":
                iconUrl = "wi wi-day-thunderstorm";
                break;
            case "11n":
                iconUrl = "wi wi-night-thunderstorm";
                break;
            case "13d":
                iconUrl = "wi wi-snow";
                break;
            case "13n":
                iconUrl = "wi wi-snow";
                break;
            case "50d":
                iconUrl = "wi wi-fog";
                break;
            case "50n":
                iconUrl = "wi wi-fog";
                break;
            default:
                iconUrl = "wi wi-na";
                break;
        }

    } catch (e) {
        estado = "No Data Found !";
        estado2 = "No Data Found !";
        descrip = "No Data Found !";
        temp = "No Data Found !";
        pressure = "No Data Found !";
        humidity = "No Data Found !";
        tempmin = "No Data Found !";
        tempmax = "No Data Found !";
        wind = "No Data Found !";
        deg = "No Data Found !";
        cloudy = "No Data Found !";
        iconUrl = "No Data Found !";
    }
    $("#TableMeteor tbody").append(
        "<tr>" +
        "<th scope='col'>Descripción</th>" +
        "<td>" + estado2 + "</td>" +
        "</tr>" +
        "<tr>" +
        "<th scope='col'>Temperatura </th>" +
        "<td>" + Math.round(convertKelvinToCelsius(temp), 2) + "°C</td>" +
        "</tr>" +
        "<tr>" +
        "<th scope='col'>Presión</th>" +
        "<td>" + pressure + " hPa</td>" +
        "</tr>" +
        "<tr>" +
        "<th scope='col'>Humedad</th>" +
        "<td>" + humidity + " % </td>" +
        "</tr>" +
        "<tr>" +
        "<th scope='col'>Temperatura Minima</th>" +
        "<td>" + Math.round(convertKelvinToCelsius(tempmin), 2) + " °C</td>" +
        "</tr>" +
        "<tr>" +
        "<th scope='col'>Temperatura Maxima</th>" +
        "<td>" + Math.round(convertKelvinToCelsius(tempmax), 2) + "°C</td>" +
        "</tr>" +
        "<tr>" +
        "<th scope='col'>Velocidad Viento</th>" +
        "<td>" + wind + " m/s</td>" +
        "</tr>" +
        "<tr>" +
        "<th scope='col'>Dirección Viento</th>" +
        "<td>" + deg + " °</td>" +
        "</tr>" +
        "<tr>" +
        "<th scope='col'>Nubes</th>" +
        "<td>" + cloudy + "%</td>" +
        "</tr>"
    );

    $("#i_clima").attr('class', iconUrl);
    /*   console.log(estado2); */
    $("#climaPred2").text(estado2);
    $("#TempW").text(Math.round(convertKelvinToCelsius(temp), 2) + "°C");
    $("#PressureW").text(Math.round(pressure, 2) + "hPa");
    $("#HumidityW").text(humidity + "%");
    $("#SpeedW").text(Math.round(wind, 2) + "m/s");
}

function UVIActual(jsonl2) {
    var uvin = jsonl2['uvi'];
    $("#uvar").text(uvin + " UVI.");
}

function SueloPolygon(App_ID_Mark, polygonID) {
    var data;
    var xhr = new XMLHttpRequest();
    xhr.withCredentials = false;
    xhr.addEventListener("readystatechange", function() {
        if (xhr.readyState === 4) {
            var jsonAnswer = JSON.parse(xhr.responseText);
            SueloActual(jsonAnswer);
        }
    });
    var myurl2 = "http://api.agromonitoring.com/agro/1.0/soil?polyid=" + polygonID + "&appid=" + App_ID_Mark + "";
    var proxy = 'https://cors-anywhere.herokuapp.com/';
    xhr.open("GET", proxy + myurl2);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.setRequestHeader("cache-control", "no-cache");
    xhr.setRequestHeader('Access-Control-Allow-Origin', '*');
    xhr.setRequestHeader("Access-Control-Allow-Headers", "x-requested-with, x-requested-by");
    xhr.send(data);
}

function SueloActual(jsonl2) {
    var temperature10 = "";
    var humedad, temperaturaS, tiempoAC, today, date, time;

    today = new Date();
    date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
    time = today.getHours() + ":" + today.getMinutes();
    tiempoAC = 'Fecha: ' + date + ' - Hora: ' + time;

    try {
        temperature10 = ((jsonl2['t10']));
        humedad = ((jsonl2['moisture']));
        temperaturaS = ((jsonl2['t0']));
    } catch (e) {
        temperature10 = "No Data Found !";
        humedad = "No Data Found!";
        temperaturaS = "No Data Found!";

    }
    $("#TableSoil tbody").append(
        "<tr>" +
        "<th scope='col'>Tiempo Actual</th>" +
        "<td>" + tiempoAC + "</td>" +
        "</tr>" +
        "<tr>" +
        "<th scope='col' data-toggle='tooltip' data-placement='top' title='Temperatura sobre los 10 centímetros de profundidad'>Temperatura</th>" +
        "<td>" + Math.round(convertKelvinToCelsius(temperature10), 2) + "°C</td>" +
        "</tr>" +
        "<tr>" +
        "<th scope='col'>Humedad </th>" +
        "<td data-toggle='tooltip' data-placement='top' title='Metros Cubicos (m3)'>" + humedad + " m3 </td>" +
        "</tr>" +
        "<tr>" +
        "<th scope='col'>Temperatura de Superficie</th>" +
        "<td>" + Math.round(convertKelvinToCelsius(temperaturaS), 2) + "°C</td>" +
        "</tr>"
    );

}

function predicCompleta(jsonl2) {
    //---------------------------------------------------------- Prediccion Completa Version 1 ------------------------------------------------------------
    //   var datos = [];
    //   var datos1 = [];
    //   var datos2 = [];
    //   //Metodo para la prediccion de tiempo de 3 horas 
    //   var d = new Date();
    //   var time = [];
    //   var horas = (d.getHours());
    //   var num = 0;
    //   for (i = 1; i < 40; i++) {
    //     if (horas >= 24) {
    //       horas === 0;
    //     } else {
    //       horas = horas + 3;
    //       if (horas >= 24) {
    //         horas = 0;
    //       }
    //     }
    //     time.push((horas + ':00'));
    //     datos.push((parseFloat(JSON.stringify(jsonl2[i]['main']['pressure']))));
    //     //datos1.push((parseFloat(JSON.stringify(jsonl2[i]['rain']['3h']))));
    //     datos2.push((parseFloat(JSON.stringify(jsonl2[i]['main']['temp']))));
    //     try {
    //       datos1.push((parseFloat(JSON.stringify(jsonl2[i]['rain']['3h']))));
    //     } catch (e) {
    //       datos1.push((parseFloat(0)));
    //     }
    //     num = num + 1;
    //   }

    //   Highcharts.chart('container', {
    //     chart: {
    //       height: 300,
    //       zoomType: 'xy'
    //     },
    //     credits: {
    //       enabled: false
    //     },
    //     title: {
    //       text: 'Promedio de Datos Meteorológicos'
    //     },
    //     subtitle: {
    //       //text: 'Source: WorldClimate.com'
    //     },
    //     xAxis: [{
    //       categories: time,
    //       crosshair: true
    //     }],
    //     yAxis: [{ // Primary yAxis
    //       labels: {
    //         format: '{value}°K',
    //         style: {
    //           color: Highcharts.getOptions().colors[2]
    //         }
    //       },
    //       title: {
    //         text: 'Temperatura',
    //         style: {
    //           color: Highcharts.getOptions().colors[2]
    //         }
    //       },
    //       opposite: true

    //     }, { // Secondary yAxis
    //       gridLineWidth: 0,
    //       title: {
    //         text: 'Lluvia',
    //         style: {
    //           color: Highcharts.getOptions().colors[0]
    //         }
    //       },
    //       labels: {
    //         format: '{value} mm',
    //         style: {
    //           color: Highcharts.getOptions().colors[0]
    //         }
    //       }

    //     }, { // Tertiary yAxis
    //       gridLineWidth: 0,
    //       title: {
    //         text: 'Presión a nivel del mar',
    //         style: {
    //           color: Highcharts.getOptions().colors[1]
    //         }
    //       },
    //       labels: {
    //         format: '{value} mb',
    //         style: {
    //           color: Highcharts.getOptions().colors[1]
    //         }
    //       },
    //       opposite: true
    //     }],
    //     tooltip: {
    //       shared: true
    //     },
    //     legend: {
    //       layout: 'horizontal',
    //       align: 'left',
    //       x: 0,
    //       verticalAlign: 'left',
    //       y: 0,
    //       floating: true,
    //       backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || 'rgba(255,255,255,0.25)'
    //     },
    //     series: [{
    //       name: 'Lluvia',
    //       type: 'column',
    //       yAxis: 1,
    //       data: datos1,
    //       tooltip: {
    //         valueSuffix: ' mm'
    //       }

    //     }, {
    //       name: 'Presión a nivel del mar',
    //       type: 'spline',
    //       yAxis: 2,
    //       data: datos,
    //       marker: {
    //         enabled: false
    //       },
    //       dashStyle: 'shortdot',
    //       tooltip: {
    //         valueSuffix: ' mb'
    //       }

    //     }, {
    //       name: 'Temperatura',
    //       type: 'spline',
    //       data: datos2,
    //       tooltip: {
    //         valueSuffix: ' °K'
    //       }
    //     }]
    //   });
    //---------------------------------------------------------- Prediccion Completa Version 1 ------------------------------------------------------------
    //---------------------------------------------------------- Prediccion Completa Version 2 ------------------------------------------------------------
    //  var iconUrl = "";
    //             var icond = "";
    //             var datos = [];
    //             var datos1 = [];
    //             var datos2 = [];
    //             var datos3 = [];
    //             //Metodo para la prediccion de tiempo de 3 horas 
    //             var d = new Date();
    //             var time = [];
    //             var horas = (d.getHours());
    //             var num = 0;
    //             var day = new Date().getDay();
    //             var finaldays = [];
    //             var weekDays = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    //             for (i = 1; i < 40; i++) {
    //                 if (horas >= 24) {
    //                     horas = 0;
    //                     num++;
    //                 } else {
    //                     horas = horas + 3;
    //                     if (horas >= 24) {
    //                         horas = 0;
    //                         num++;
    //                     }
    //                 }
    //                 time.push((horas + ':00'));
    //                 finaldays = (weekDays.slice(day, weekDays.length).concat(weekDays.slice(0, (num + day) % 7)));
    // //                var fUrl = "http://openweathermap.org/img/wn/";
    //                 icond = (jsonl2[i]['weather'][0]['icon']);
    //                 // console.log(icond);
    // //                var lastUrl = "@2x.png";
    // //                var purl = fUrl.concat(icond);
    // //                var p2url = purl.concat(lastUrl);
    // //                var lll = Strreplaced(p2url);
    // //                console.log(lll);
    //                 // time.push((horas + ':00'));
    //                 //datos1.push((parseFloat(JSON.stringify(jsonl2[i]['rain']['3h']))));
    //                 switch (icond) {
    //                     case '01d':
    //                         iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Hot_Sun_Day-512.png";
    //                         break;
    //                     case "01n":
    //                         iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Hot_Sun_Day-512.png";
    //                         break;
    //                     case "02d":
    //                         iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Sunny_Sun_Cloudy-512.png";
    //                         break;
    //                     case "02n":
    //                         iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Sunny_Sun_Cloudy-512.png";
    //                         break;
    //                     case "03d":
    //                         iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Cloudy_Season_Cloud-512.png";
    //                         break;
    //                     case "03n":
    //                         iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Cloudy_Season_Cloud-512.png";
    //                         break;
    //                     case "04d":
    //                         iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Cloudy_Season_Cloud-512.png";
    //                         break;
    //                     case "04n":
    //                         iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Cloudy_Season_Cloud-512.png";
    //                         break;
    //                     case "09d":
    //                         iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Rain_Cloud_Climate-512.png";
    //                         break;
    //                     case "09n":
    //                         iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Rain_Cloud_Climate-512.png";
    //                         break;
    //                     case "10d":
    //                         iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Sunny_Rain_Climate-512.png";
    //                         break;
    //                     case '10n':
    //                         iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Sunny_Rain_Climate-512.png";
    //                         break;
    //                     case "11d":
    //                         iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Lightning_Cloud_Storm-512.png";
    //                         break;
    //                     case "11n":
    //                         iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Lightning_Cloud_Storm-512.png";
    //                         break;
    //                     case "13d":
    //                         iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Flake_Flakes_Snowflake-512.png";
    //                         break;
    //                     case "13n":
    //                         iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Flake_Flakes_Snowflake-512.png";
    //                         break;
    //                     case "50d":
    //                         iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Wind_Blowing_Climate-512.png";
    //                         break;
    //                     case "50n":
    //                         iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Wind_Blowing_Climate-512.png";
    //                         break;
    //                     default:
    //                         iconUrl = "https://cdn4.iconfinder.com/data/icons/cloud-computing-2/500/cloud-question-mark-512.png";
    //                         break;
    //                         //https://www.iconfinder.com/iconsets/weather-and-forecast-free
    //                 }
    //                 datos2.push({y: convertKelvinToCelsius(parseFloat(JSON.stringify(jsonl2[i]['main']['temp']))*1.01), marker: {symbol: 'url(' + iconUrl + ')', width: 25, height: 25}});
    //                 datos3.push(convertKelvinToCelsius(parseFloat(JSON.stringify(jsonl2[i]['main']['temp']))));
    //                 try {
    //                     datos1.push((parseFloat(JSON.stringify(jsonl2[i]['rain']['3h']))));
    //                 } catch (e) {
    //                     datos1.push((parseFloat(0)));
    //                 }
    //                 num = num + 1;
    //             }
    //             // console.log(finaldays.length);
    //             Highcharts.chart('container', {
    //                 chart: {
    //                     height: 300,
    //                     zoomType: 'xy',
    //                     plotBorderWidth: 1,
    //                 },
    //                 credits: {
    //                     enabled: false
    //                 },
    //                 title: {
    //                     text: 'Promedio de Datos Meteorológicos'
    //                 },
    //                 subtitle: {
    //                     //text: 'Source: WorldClimate.com'
    //                 },
    //                 xAxis: [
    //                     {
    //                         categories: time,
    //                         gridLineWidth: 1,
    //                     }
    // //                    ,
    // //                    {
    // //                        categories: finaldays,
    // //                        opposite: true,
    // //                        tickLength: 8,
    // //                        tickInterval: 1,
    // //                        gridLineWidth: 1,
    // //                        linkedTo: 0,
    // //                    }
    //                 ],
    //                 yAxis: [{// Primary yAxis
    //                         labels: {
    //                             format: '{value}°C',
    //                             style: {
    //                                 color: Highcharts.getOptions().colors[2]
    //                             }
    //                         },
    //                         title: {
    //                             text: 'Temperatura',
    //                             style: {
    //                                 color: Highcharts.getOptions().colors[2]
    //                             }
    //                         },
    //                         opposite: true

    //                     }, {// Secondary yAxis
    //                         gridLineWidth: 0,
    //                         title: {
    //                             text: 'Lluvia',
    //                             style: {
    //                                 color: Highcharts.getOptions().colors[0]
    //                             }
    //                         },
    //                         labels: {
    //                             format: '{value} mm',
    //                             style: {
    //                                 color: Highcharts.getOptions().colors[0]
    //                             }
    //                         }

    //                     },
    //                     {
    //                         title: {
    //                             text: '',
    //                         },
    //                         labels: {
    //                             format: '',
    //                         }
    //                     }
    //                 ],
    //                 tooltip: {
    //                     shared: true,
    //                 },
    //                 legend: false,
    //                 series: [{
    //                         name: 'Lluvia',
    //                         type: 'column',
    //                         yAxis: 1,
    //                         data: datos1,
    //                         tooltip: {
    //                             valueSuffix: ' mm',
    //                             valueDecimals:2,
    //                         }

    //                     }, {
    //                         type: 'spline',
    //                         lineWidth: 0.00000000001,
    //                         data: datos2,
    //                         tooltip: false,
    //                         name: '',
    //                     }, {
    //                         name: 'Temperatura',
    //                         type: 'spline',
    //                         type: 'spline',
    //                                 data: datos3,
    //                         tooltip: {
    //                             valueSuffix: ' °C',
    //                             valueDecimals:2,
    //                         },
    //                     }
    //                 ]
    //             });
    ////---------------------------------------------------------- Prediccion Completa Version 2 ------------------------------------------------------------
    //  var today = new Date();
    //         var icond = "";
    //         var iconUrl = "";
    //         var datos = [];
    //         var datos1 = [];
    //         var datos2=[];
    //         var datos3 = [];
    //         //Metodo para la prediccion de tiempo de 3 horas 
    //         var d = new Date();
    //         var time = [];
    //         var horas = (d.getHours());
    //         var num = 0;
    //         var count = 0;
    //         var day = new Date().getDay();
    //         for (i = 1; i < 40; i++) {
    //             if (horas >= 24) {
    //                 horas = 0;
    //                 if (horas = 0) {
    //                     count++;
    //                 } else {
    //                     num++;
    //                 }
    //             } else {
    //                 horas = horas + 3;
    //                 if (horas >= 24) {
    //                     horas = 0;
    //                     if (horas = 0) {
    //                         count++;
    //                     } else {
    //                         num++;
    //                     }
    //                 }
    //             }
    //             //console.log(num);
    //             time.push((horas + ':00'));
    //             icond = (jsonl2[i]['weather'][0]['icon']);
    //             //console.log(icond);
    //             switch (icond) {
    //                 case '01d':
    //                     iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Hot_Sun_Day-512.png";
    //                     break;
    //                 case "01n":
    //                     iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Hot_Sun_Day-512.png";
    //                     break;
    //                 case "02d":
    //                     iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Sunny_Sun_Cloudy-512.png";
    //                     break;
    //                 case "02n":
    //                     iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Sunny_Sun_Cloudy-512.png";
    //                     break;
    //                 case "03d":
    //                     iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Cloudy_Season_Cloud-512.png";
    //                     break;
    //                 case "03n":
    //                     iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Cloudy_Season_Cloud-512.png";
    //                     break;
    //                 case "04d":
    //                     iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Cloudy_Season_Cloud-512.png";
    //                     break;
    //                 case "04n":
    //                     iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Cloudy_Season_Cloud-512.png";
    //                     break;
    //                 case "09d":
    //                     iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Rain_Cloud_Climate-512.png";
    //                     break;
    //                 case "09n":
    //                     iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Rain_Cloud_Climate-512.png";
    //                     break;
    //                 case "10d":
    //                     iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Sunny_Rain_Climate-512.png";
    //                     break;
    //                 case '10n':
    //                     iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Sunny_Rain_Climate-512.png";
    //                     break;
    //                 case "11d":
    //                     iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Lightning_Cloud_Storm-512.png";
    //                     break;
    //                 case "11n":
    //                     iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Lightning_Cloud_Storm-512.png";
    //                     break;
    //                 case "13d":
    //                     iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Flake_Flakes_Snowflake-512.png";
    //                     break;
    //                 case "13n":
    //                     iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Flake_Flakes_Snowflake-512.png";
    //                     break;
    //                 case "50d":
    //                     iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Wind_Blowing_Climate-512.png";
    //                     break;
    //                 case "50n":
    //                     iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Wind_Blowing_Climate-512.png";
    //                     break;
    //                 default:
    //                     iconUrl = "https://cdn4.iconfinder.com/data/icons/cloud-computing-2/500/cloud-question-mark-512.png";
    //                     break;
    //                     //https://www.iconfinder.com/iconsets/weather-and-forecast-free
    //             }
    //             try {
    //                 //  (iconUrl);
    //                 datos.push('url(' + iconUrl + ')');
    //                 //console.log(datos);
    //                 datos3.push([Date.UTC(today.getFullYear(), (today.getMonth()), (today.getDate() + num), horas, 0), convertKelvinToCelsius(parseFloat(JSON.stringify(jsonl2[i]['main']['temp'])))]);
    //                 //console.log([(today.getFullYear(), (today.getMonth() + 1), (today.getDate() + num)), convertKelvinToCelsius(parseFloat(JSON.stringify(jsonl2[i]['main']['temp'])))]);
    //                 datos1.push([Date.UTC(today.getFullYear(), (today.getMonth()), (today.getDate() + num), horas, 0), (parseFloat(JSON.stringify(jsonl2[i]['rain']['3h'])))]);
    //                 datos2.push([Date.UTC(today.getFullYear(), (today.getMonth()), (today.getDate() + num), horas, 0), (parseFloat(JSON.stringify(jsonl2[i]['clouds']['all'])))]);
    //             } catch (e) {
    //                 datos1.push([Date.UTC(today.getFullYear(), (today.getMonth()), (today.getDate() + num), horas, 0), (parseFloat(0))]);
    //             }
    //             //num = num + 1;
    //         }

    //         Highcharts.chart('container', {
    //             chart: {
    //                 height: 300,
    //                 zoomType: 'xy',
    //                 plotBorderWidth: 1,
    //             },
    //             credits: {
    //                 enabled: false
    //             },
    //             title: {
    //                 text: 'Promedio de Datos Meteorológicos'
    //             },
    //             subtitle: {
    //                 //text: 'Source: WorldClimate.com'
    //             },
    //             xAxis: [
    //                 {
    //                     type: 'datetime',
    //                     dateTimeLabelFormats: {
    //                         day: '%H:%M',
    //                     },
    //                     min: Date.UTC(today.getFullYear(), (today.getMonth()), today.getDate()),
    //                     max: Date.UTC(today.getFullYear(), (today.getMonth()), today.getDate() + 5),
    //                     gridLineWidth: 1,
    //                 }
    //                 , {
    //                     linkedTo: 0,
    //                     type: 'datetime',
    //                     tickInterval: 24 * 3600 * 1000,
    //                     labels: {
    //                         format: '{value:<span style="font-size: 12px; font-weight: bold">%a</span> %b %e}',
    //                         align: 'left',
    //                         x: 3,
    //                         y: -5
    //                     },
    //                     opposite: true,
    //                     tickLength: 40,
    //                     gridLineWidth: 1,
    //                     min: Date.UTC(today.getFullYear(), (today.getMonth()), today.getDate()),
    //                     max: Date.UTC(today.getFullYear(), (today.getMonth()), today.getDate() + 5),
    //                 }
    //             ],
    //             yAxis: [
    //                 {// Primary yAxis
    //                     labels: {
    //                         format: '{value}°C',
    //                         style: {
    //                             color: Highcharts.getOptions().colors[2]
    //                         },
    //                     },
    //                     title: {
    //                         text: 'Temperatura',
    //                         style: {
    //                             color: Highcharts.getOptions().colors[2]
    //                         },
    //                     },
    //                     opposite: true

    //                 }
    //                 ,
    //                 {// Secondary yAxis
    //                     gridLineWidth: 1,
    //                     title: {
    //                         text: 'Precipitación',
    //                         style: {
    //                             color: Highcharts.getOptions().colors[4]
    //                         },
    //                     },
    //                     labels: {
    //                         format: '{value} mm',
    //                         style: {
    //                             color: Highcharts.getOptions().colors[4]
    //                         },
    //                     }

    //                 },
    //                 {// Third yAxis
    //                     gridLineWidth: 1,
    //                     title: {
    //                         enabled:false,
    //                     },
    //                     labels: {
    //                      enabled:false,
    //                     }

    //                 }
    //             ],
    //             tooltip: {
    //                 shared: true,
    //             },
    //             legend: {
    //                 enabled: true,
    //                 layout: 'horizontal',
    //                 align: 'left',
    //                 x: 0,
    //                 verticalAlign: 'left',
    //                 y: 10,
    //                 floating: true,
    //             },
    //             series: [
    //                 {
    //                     name: 'Precipitación',
    //                     type: 'column',
    //                     yAxis: 1,
    //                     data: datos1,
    //                     tooltip: {
    //                         valueSuffix: ' mm',
    //                         valueDecimals: 2,
    //                     },
    //                     pointWidth: 15,
    //                     color: Highcharts.getOptions().colors[4],
    //                 },
    //                 {
    //                     name: 'Temperatura',
    //                     type: 'spline',
    //                     data: datos3,
    //                     yAxis: 0,
    //                     tooltip: {
    //                         valueSuffix: ' °C',
    //                         valueDecimals: 2,
    //                     },
    //                     color: Highcharts.getOptions().colors[2],
    //                 },
    //                 {
    //                     name: 'Nubes',
    //                     type: 'line',
    //                     yAxis: 2,
    //                     data: datos2,
    //                     tooltip: {
    //                         valueSuffix: ' %',
    //                     },
    //                     color: Highcharts.getOptions().colors[7],
    //                 }
    //             ]
    //         });    
    var today = new Date();
    var icond = "";
    var iconUrl = "";
    var datos = [];
    var datos1 = [];
    var datos2 = [];
    var datos3 = [];
    var datos4 = [];
    //Metodo para la prediccion de tiempo de 3 horas 
    var d = new Date();
    var time = [];
    var horas = (d.getHours());
    var num = 0;
    var count = 0;
    var day = new Date().getDay();
    for (i = 1; i < 40; i++) {
        if (horas >= 24) {
            horas = 0;
            if (horas = 0) {
                count++;
            } else {
                num++;
            }
        } else {
            horas = horas + 3;
            if (horas >= 24) {
                horas = 0;
                if (horas = 0) {
                    count++;
                } else {
                    num++;
                }
            }
        }
        //console.log(num);
        time.push((horas + ':00'));
        icond = (jsonl2[i]['weather'][0]['icon']);
        console.log(icond);
        switch (icond) {
            case '01d':
                iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Hot_Sun_Day-512.png";
                break;
            case "01n":
                iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Hot_Sun_Day-512.png";
                break;
            case "02d":
                iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Sunny_Sun_Cloudy-512.png";
                break;
            case "02n":
                iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Sunny_Sun_Cloudy-512.png";
                break;
            case "03d":
                iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Cloudy_Season_Cloud-512.png";
                break;
            case "03n":
                iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Cloudy_Season_Cloud-512.png";
                break;
            case "04d":
                iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Cloudy_Season_Cloud-512.png";
                break;
            case "04n":
                iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Cloudy_Season_Cloud-512.png";
                break;
            case "09d":
                iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Rain_Cloud_Climate-512.png";
                break;
            case "09n":
                iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Rain_Cloud_Climate-512.png";
                break;
            case "10d":
                iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Sunny_Rain_Climate-512.png";
                break;
            case '10n':
                iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Sunny_Rain_Climate-512.png";
                break;
            case "11d":
                iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Lightning_Cloud_Storm-512.png";
                break;
            case "11n":
                iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Lightning_Cloud_Storm-512.png";
                break;
            case "13d":
                iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Flake_Flakes_Snowflake-512.png";
                break;
            case "13n":
                iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Flake_Flakes_Snowflake-512.png";
                break;
            case "50d":
                iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Wind_Blowing_Climate-512.png";
                break;
            case "50n":
                iconUrl = "https://cdn2.iconfinder.com/data/icons/weather-and-forecast-free/32/Weather_Weather_Forecast_Wind_Blowing_Climate-512.png";
                break;
            default:
                iconUrl = "https://cdn4.iconfinder.com/data/icons/cloud-computing-2/500/cloud-question-mark-512.png";
                break;
                //https://www.iconfinder.com/iconsets/weather-and-forecast-free
        }
        try {
            //  (iconUrl);
            datos.push('url(' + iconUrl + ')');
            //console.log(datos);
            datos3.push([Date.UTC(today.getFullYear(), (today.getMonth()), (today.getDate() + num), horas, 0), convertKelvinToCelsius(parseFloat(JSON.stringify(jsonl2[i]['main']['temp'])))]);
            datos2.push([Date.UTC(today.getFullYear(), (today.getMonth()), (today.getDate() + num), horas, 0), (parseFloat(JSON.stringify(jsonl2[i]['clouds']['all'])))]);
            datos1.push([Date.UTC(today.getFullYear(), (today.getMonth()), (today.getDate() + num), horas, 0), (parseFloat(JSON.stringify(jsonl2[i]['rain']['3h'])))]);
        } catch (e) {
            datos1.push((parseFloat(0)));
        }
        //num = num + 1;
    }
    debugger
    // console.log(finaldays.length);
    Highcharts.chart('container', {
        chart: {
            height: 300,
            zoomType: 'xy',
            plotBorderWidth: 1,
            load: function() {

            }
        },
        credits: {
            enabled: false
        },
        title: {
            text: 'Promedio de Datos Meteorológicos'
        },
        subtitle: {
            //text: 'Source: WorldClimate.com'
        },
        xAxis: [{
            type: 'datetime',
            dateTimeLabelFormats: {
                day: '%H:%m',
            },
            min: Date.UTC(today.getFullYear(), (today.getMonth()), today.getDate()),
            max: Date.UTC(today.getFullYear(), (today.getMonth()), today.getDate() + 5),
            gridLineWidth: 1,
        }, {
            linkedTo: 0,
            type: 'datetime',
            tickInterval: 24 * 3600 * 1000,
            labels: {
                format: '{value:<span style="font-size: 12px; font-weight: bold">%a</span> %b %e}',
                align: 'left',
                x: 3,
                y: -5
            },
            opposite: true,
            tickLength: 40,
            gridLineWidth: 1,
            min: Date.UTC(today.getFullYear(), (today.getMonth()), today.getDate()),
            max: Date.UTC(today.getFullYear(), (today.getMonth()), today.getDate() + 5),
        }],
        yAxis: [{ // Primary yAxis
                labels: {
                    format: '{value}°C',
                    style: {
                        color: Highcharts.getOptions().colors[2]
                    },
                },
                title: {
                    text: 'Temperatura',
                    style: {
                        color: Highcharts.getOptions().colors[2]
                    },
                },
                opposite: true

            },
            { // Secondary yAxis
                gridLineWidth: 1,
                title: {
                    text: 'Precipitación',
                    style: {
                        color: Highcharts.getOptions().colors[4]
                    },
                },
                labels: {
                    format: '{value} mm',
                    style: {
                        color: Highcharts.getOptions().colors[4]
                    },
                }

            },
            { // Third yAxis
                gridLineWidth: 1,
                title: {
                    enabled: false,
                },
                labels: {
                    enabled: false,
                }

            }
        ],
        tooltip: {
            shared: true,
        },
        legend: {
            enabled: true,
            layout: 'horizontal',
            align: 'left',
            x: 0,
            verticalAlign: 'left',
            y: 10,
            floating: true,
        },
        series: [{
                name: 'Precipitación',
                type: 'column',
                yAxis: 1,
                data: datos1,
                tooltip: {
                    valueSuffix: ' mm',
                    valueDecimals: 2,
                },
                pointWidth: 15,
                color: Highcharts.getOptions().colors[4],
            },
            {
                name: 'Temperatura',
                type: 'spline',
                yAxis: 0,
                data: datos3.map((item, index) => {
                    return {
                        x: item[0],
                        y: item[1],
                        marker: {
                            symbol: datos[index],
                            width: 20,
                            height: 20
                        }
                    }
                }),
                tooltip: {
                    valueSuffix: ' °C',
                    valueDecimals: 2,
                },
                marker: {
                    enabled: true
                },
                color: Highcharts.getOptions().colors[2],
            },
            {
                name: 'Nubes',
                type: 'line',
                yAxis: 2,
                data: datos2,
                tooltip: {
                    valueSuffix: ' %',
                    valueDecimals: 2,
                },
                pointWidth: 15,
                color: Highcharts.getOptions().colors[7],
            },
        ]
    });
}

function Strreplaced(string) {
    //console.log(string);
    return string.replace(/[""[\]\\]/g, '');
}

function predicPresion(jsonl2) {
    var today = new Date();
    var icond = "";
    var iconUrl = "";
    var datos = [];
    var datos1 = [];
    var datos3 = [];
    //Metodo para la prediccion de tiempo de 3 horas 
    var d = new Date();
    var time = [];
    var horas = (d.getHours());
    var num = 0;
    var count = 0;
    var day = new Date().getDay();
    for (i = 1; i < 40; i++) {
        if (horas >= 24) {
            horas = 0;
            if (horas = 0) {
                count++;
            } else {
                num++;
            }
        } else {
            horas = horas + 3;
            if (horas >= 24) {
                horas = 0;
                if (horas = 0) {
                    count++;
                } else {
                    num++;
                }
            }
        }
        //console.log(num);
        time.push((horas + ':00'));
        try {
            //  (iconUrl);
            //console.log(datos);
            //datos3.push([Date.UTC(today.getFullYear(), (today.getMonth()), (today.getDate() + num), horas, 0), convertKelvinToCelsius(parseFloat(JSON.stringify(jsonl2[i]['main']['temp'])))]);
            //console.log([(today.getFullYear(), (today.getMonth() + 1), (today.getDate() + num)), convertKelvinToCelsius(parseFloat(JSON.stringify(jsonl2[i]['main']['temp'])))]);
            datos1.push([Date.UTC(today.getFullYear(), (today.getMonth()), (today.getDate() + num), horas, 0), (parseFloat(JSON.stringify(jsonl2[i]['main']['humidity'])))]);
            datos1
        } catch (e) {
            datos1.push((parseFloat(0)));
        }
        //num = num + 1;
    }
    Highcharts.chart('container2', {
        chart: {
            height: 300,
            plotBorderWidth: 1,
        },
        credits: {
            enabled: false
        },
        title: {
            text: 'Porcentaje de Humedad'
        },
        subtitle: {
            //text: 'Source: WorldClimate.com'
        },
        xAxis: [{
            type: 'datetime',
            dateTimeLabelFormats: {
                day: '%H:%M',
            },
            min: Date.UTC(today.getFullYear(), (today.getMonth()), today.getDate()),
            max: Date.UTC(today.getFullYear(), (today.getMonth()), today.getDate() + 5),
            gridLineWidth: 1,
        }, {
            linkedTo: 0,
            type: 'datetime',
            tickInterval: 24 * 3600 * 1000,
            labels: {
                format: '{value:<span style="font-size: 12px; font-weight: bold">%a</span> %b %e}',
                align: 'left',
                x: 3,
                y: -5
            },
            opposite: true,
            tickLength: 40,
            gridLineWidth: 1,
            min: Date.UTC(today.getFullYear(), (today.getMonth()), today.getDate()),
            max: Date.UTC(today.getFullYear(), (today.getMonth()), today.getDate() + 5),
        }],
        yAxis: [{ // Secondary yAxis
            gridLineWidth: 1,
            title: {
                text: 'Porcentaje de Humedad ',
                style: {
                    color: Highcharts.getOptions().colors[4]
                },
            },
            labels: {
                format: '{value} %',
                style: {
                    color: Highcharts.getOptions().colors[4]
                },
            }

        }, ],
        tooltip: {
            shared: true,
        },
        legend: {
            enabled: true,
            layout: 'horizontal',
            align: 'left',
            x: 0,
            verticalAlign: 'left',
            y: 10,
            floating: true,
        },
        series: [{
            name: 'Humedad',
            type: 'spline',
            yAxis: 0,
            data: datos1,
            tooltip: {
                valueSuffix: ' %',
                valueDecimals: 2,
            },
            pointWidth: 15,
            color: Highcharts.getOptions().colors[4],
        }, ]
    });
}

function predicViento(jsonl2) {
    var today = new Date();
    var datos1 = [];
    //Metodo para la prediccion de tiempo de 3 horas 
    var d = new Date();
    var time = [];
    var horas = (d.getHours());
    var num = 0;
    var count = 0;
    for (i = 1; i < 40; i++) {
        if (horas >= 24) {
            horas = 0;
            if (horas = 0) {
                count++;
            } else {
                num++;
            }
        } else {
            horas = horas + 3;
            if (horas >= 24) {
                horas = 0;
                if (horas = 0) {
                    count++;
                } else {
                    num++;
                }
            }
        }
        //console.log(num);
        time.push((horas + ':00'));
        try {
            //  (iconUrl);
            //console.log(datos);
            //datos3.push([Date.UTC(today.getFullYear(), (today.getMonth()), (today.getDate() + num), horas, 0), convertKelvinToCelsius(parseFloat(JSON.stringify(jsonl2[i]['main']['temp'])))]);
            //console.log([(today.getFullYear(), (today.getMonth() + 1), (today.getDate() + num)), convertKelvinToCelsius(parseFloat(JSON.stringify(jsonl2[i]['main']['temp'])))]);
            datos1.push([Date.UTC(today.getFullYear(), (today.getMonth()), (today.getDate() + num), horas, 0), (parseFloat(JSON.stringify(jsonl2[i]['wind']['speed'])))]);
        } catch (e) {
            datos1.push((parseFloat(0)));
        }
        //num = num + 1;
    }
    Highcharts.chart('container3', {
        chart: {
            height: 300,
            plotBorderWidth: 1,
            zoomType: 'x',
            panning: true,
            panKey: 'shift',
            scrollablePlotArea: {
                minWidth: 600
            }
        },
        credits: {
            enabled: false
        },
        title: {
            text: 'Velocidad del Viento'
        },
        subtitle: {
            //text: 'Source: WorldClimate.com'
        },
        xAxis: [{
            type: 'datetime',
            dateTimeLabelFormats: {
                day: '%H:%M',
            },
            min: Date.UTC(today.getFullYear(), (today.getMonth()), today.getDate()),
            max: Date.UTC(today.getFullYear(), (today.getMonth()), today.getDate() + 5),
            gridLineWidth: 1,
        }, {
            linkedTo: 0,
            type: 'datetime',
            tickInterval: 24 * 3600 * 1000,
            labels: {
                format: '{value:<span style="font-size: 12px; font-weight: bold">%a</span> %b %e}',
                align: 'left',
                x: 3,
                y: -5
            },
            opposite: true,
            tickLength: 40,
            gridLineWidth: 1,
            min: Date.UTC(today.getFullYear(), (today.getMonth()), today.getDate()),
            max: Date.UTC(today.getFullYear(), (today.getMonth()), today.getDate() + 5),
        }],
        yAxis: [{ // Secondary yAxis
            startOnTick: true,
            endOnTick: false,
            maxPadding: 0.35,
            title: {
                text: 'velocidad(m/s)'
            },
            labels: {
                format: '{value} m/s'
            }


        }, ],
        tooltip: {
            shared: true,
        },
        legend: {
            enabled: true,
            layout: 'horizontal',
            align: 'left',
            x: 0,
            verticalAlign: 'left',
            y: 10,
            floating: true,
        },
        series: [{
            data: datos1,
            lineColor: Highcharts.getOptions().colors[1],
            color: Highcharts.getOptions().colors[2],
            fillOpacity: 0.5,
            name: 'Velocidad del viento',
            tooltip: {
                valueSuffix: ' m/s',
                valueDecimals: 2,
            },
            pointWidth: 15,
            type: 'area',
        }, ]
    });
}

function predicTemperature(jsonl2) {
    //   var datos0 = [];
    //   var datos1 = [];
    //   var datos2 = [];
    //   //Metodo para la prediccion de tiempo de 3 horas 
    //   var d = new Date();
    //   var time = [];
    //   var horas = (d.getHours());
    //   for (i = 1; i < 40; i++) {
    //     if (horas >= 24) {
    //       horas === 0;
    //     } else {
    //       horas = horas + 3;
    //       if (horas >= 24) {
    //         horas = 0;
    //       }
    //     }
    //     //  console.log(horas);
    //     time.push((horas + ':00'));
    //   }
    //   // console.log(time);

    //   for (i = 1; i < 40; i++) {

    //     var iconCode = (((jsonl2[i]['weather'][0]['icon'])));
    //     var iconUrl = "http://openweathermap.org/img/w/" + iconCode + ".png";
    //     datos0.push(convertKelvinToCelsius(parseFloat(JSON.stringify(jsonl2[i]['main']['temp']))));
    //     datos1.push(convertKelvinToCelsius(parseFloat(JSON.stringify(jsonl2[i]['main']['temp_min']))) - 10);
    //     datos2.push(convertKelvinToCelsius(parseFloat(JSON.stringify(jsonl2[i]['main']['temp_max']))) + 10);
    //     //datos.push('marker:{symbol:'+iconUrl+'}}');
    //     //console.log(datos);
    //   }

    //   Highcharts.chart('container4', {
    //     chart: {
    //       height: 300,
    //       type: 'column'
    //     },
    //     title: {
    //       text: '  Predicción Promedio de Temperatura'
    //     },
    //     subtitle: {
    //       //text: 'Source: WorldClimate.com'
    //     },
    //     xAxis: {
    //       categories: time,
    //       crosshair: true
    //     },
    //     yAxis: {
    //       min: 0,
    //       title: {
    //         text: 'Temperatura (°C)'
    //       }
    //     },
    //     tooltip: {
    //       headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
    //       pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
    //         '<td style="padding:0"><b>{point.y:.1f} °C</b></td></tr>',
    //       footerFormat: '</table>',
    //       shared: true,
    //       useHTML: true
    //     },
    //     plotOptions: {
    //       column: {
    //         pointPadding: 0.2,
    //         borderWidth: 0
    //       }
    //     },
    //     legend: {
    //       layout: 'horizontal',
    //       align: 'left',
    //       x: 0,
    //       verticalAlign: 'left',
    //       y: 0,
    //       floating: true,
    //     },
    //     series: [{
    //       name: 'Temperatura Actual',
    //       data: datos0

    //     }, {
    //       name: 'Temperatura Minima',
    //       data: datos1

    //     }, {
    //       name: 'Temperatura Maxima',
    //       data: datos2

    //     }]
    //   });
    var today = new Date();
    var icond = "";
    var iconUrl = "";
    var datos0 = [];
    var datos1 = [];
    var datos2 = [];
    //Metodo para la prediccion de tiempo de 3 horas 
    var d = new Date();
    var time = [];
    var horas = (d.getHours());
    var num = 0;
    var count = 0;
    var day = new Date().getDay();
    for (i = 1; i < 40; i++) {
        if (horas >= 24) {
            horas = 0;
            if (horas = 0) {
                count++;
            } else {
                num++;
            }
        } else {
            horas = horas + 3;
            if (horas >= 24) {
                horas = 0;
                if (horas = 0) {
                    count++;
                } else {
                    num++;
                }
            }
        }
        try {
            //  (iconUrl);
            //console.log(datos);
            //datos3.push([Date.UTC(today.getFullYear(), (today.getMonth()), (today.getDate() + num), horas, 0), convertKelvinToCelsius(parseFloat(JSON.stringify(jsonl2[i]['main']['temp'])))]);
            //console.log([(today.getFullYear(), (today.getMonth() + 1), (today.getDate() + num)), convertKelvinToCelsius(parseFloat(JSON.stringify(jsonl2[i]['main']['temp'])))]);
            datos0.push([Date.UTC(today.getFullYear(), (today.getMonth()), (today.getDate() + num), horas, 0), (convertKelvinToCelsius(parseFloat(JSON.stringify(jsonl2[i]['main']['temp']))))]);
            datos1.push([Date.UTC(today.getFullYear(), (today.getMonth()), (today.getDate() + num), horas, 0), (convertKelvinToCelsius(parseFloat(JSON.stringify(jsonl2[i]['main']['temp_min'])) - 5))]);
            datos2.push([Date.UTC(today.getFullYear(), (today.getMonth()), (today.getDate() + num), horas, 0), (convertKelvinToCelsius(parseFloat(JSON.stringify(jsonl2[i]['main']['temp_max'])) + 8))]);
        } catch (e) {
            datos0.push((parseFloat(0)));
            datos1.push((parseFloat(0)));
            datos2.push((parseFloat(0)));
        }
        //num = num + 1;
    }
    Highcharts.chart('container4', {
        chart: {
            height: 300,
            plotBorderWidth: 1,
        },
        credits: {
            enabled: false
        },
        title: {
            text: 'Temperatura'
        },
        subtitle: {
            //text: 'Source: WorldClimate.com'
        },
        xAxis: [{
            type: 'datetime',
            dateTimeLabelFormats: {
                day: '%H:%M',
            },
            min: Date.UTC(today.getFullYear(), (today.getMonth()), today.getDate()),
            max: Date.UTC(today.getFullYear(), (today.getMonth()), today.getDate() + 5),
            gridLineWidth: 1,
        }, {
            linkedTo: 0,
            type: 'datetime',
            tickInterval: 24 * 3600 * 1000,
            labels: {
                format: '{value:<span style="font-size: 12px; font-weight: bold">%a</span> %b %e}',
                align: 'left',
                x: 3,
                y: -5
            },
            opposite: true,
            tickLength: 40,
            gridLineWidth: 1,
            min: Date.UTC(today.getFullYear(), (today.getMonth()), today.getDate()),
            max: Date.UTC(today.getFullYear(), (today.getMonth()), today.getDate() + 5),
        }],
        yAxis: [{ // Primary yAxis
                gridLineWidth: 1,
                title: {
                    text: 'Temperatura ',
                },
                labels: {
                    format: '{value} °C',
                }

            },
            {
                title: {
                    enabled: false
                },
                labels: {
                    enabled: false
                }
            },
            {
                title: {
                    enabled: false
                },
                labels: {
                    enabled: false
                }
            }
        ],
        tooltip: {
            shared: true,
        },
        legend: {
            enabled: true,
            layout: 'horizontal',
            align: 'left',
            x: 0,
            verticalAlign: 'left',
            y: 10,
            floating: true,
        },
        series: [{
            name: 'Temperatura Actual',
            data: datos0,
            type: 'spline',
            yAxis: 0,
            tooltip: {
                valueSuffix: ' °C',
                valueDecimals: 2,
            },
        }, {
            name: 'Temperatura Minima',
            data: datos1,
            type: 'spline',
            yAxis: 1,
            tooltip: {
                valueSuffix: ' °C',
                valueDecimals: 2,
            },
        }, {
            name: 'Temperatura Maxima',
            type: 'spline',
            yAxis: 2,
            data: datos2,
            tooltip: {
                valueSuffix: ' °C',
                valueDecimals: 2,
            },
        }]
    });
}
//metodos de descarga
function download(url, nombre) {
    var a = document.createElement("a");
    a.download = nombre + ".geojson";
    a.href = url;
    // firefox doesn't support `a.click()`...
    a.dispatchEvent(new MouseEvent("click"));
}

function isFirefox() {
    // sad panda :(
    return /Firefox\//i.test(navigator.userAgent);
}

function sameDomain(url) {
    var a = document.createElement("a");
    a.href = url;

    return location.hostname === a.hostname && location.protocol === a.protocol;
}

function fallback(urls) {
    var i = 0;

    (function createIframe() {
        var frame = document.createElement("iframe");
        frame.style.display = "none";
        frame.src = urls[i++];
        document.documentElement.appendChild(frame);

        // the download init has to be sequential otherwise IE only use the first
        var interval = setInterval(function() {
            if (
                frame.contentWindow.document.readyState === "complete" ||
                frame.contentWindow.document.readyState === "interactive"
            ) {
                clearInterval(interval);

                // Safari needs a timeout
                setTimeout(function() {
                    frame.parentNode.removeChild(frame);
                }, 1000);

                if (i < urls.length) {
                    createIframe();
                }
            }
        }, 100);
    })();
}

function multidescarga(urls) {
    if (!urls) {
        throw new Error("`urls` required");
    }

    if (typeof document.createElement("a").download === "undefined") {
        return fallback(urls);
    }

    var delay = 0;
    for (i = 0; i < urls.length; i = i + 2) {
        /*         if (isFirefox() && !sameDomain(urls[i])) {
                        return setTimeout(download.bind(null, urls[i]), 1000 * ++delay);
                    } */
        download(urls[i], urls[i + 1]);
    }
}

function convertKelvinToCelsius(kelvin) {
    if (kelvin < (0)) {
        return 0;
    } else {
        return (kelvin - 273.15);
    }
}