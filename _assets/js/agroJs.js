// Funcion sidebar
function ocultarSidebar() {
    let sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('ocultar-sidebar');
}
// Activar y desactivar marcadores
document.getElementById("myCheck1").addEventListener('click', funcmarkers);

// BARRA DE COMPARACIÓN
document.getElementById("myCheck").addEventListener('click', compararCapas);
/* Funcionamiento de Marcas  */
function funcmarkers() {
    let checkBox = document.getElementById("myCheck1");
    if (!checkBox.checked) {
        var elements = document.getElementsByClassName("leaflet-pane leaflet-overlay-pane");
        for (var i = 0, length = elements.length; i < length; i++) {
            if (elements[i].textContent == '') {
                elements[i].style.display = 'none';
            }
        }
        var elements = document.getElementsByClassName("leaflet-marker-icon leaflet-zoom-animated leaflet-interactive");
        for (var i = 0, length = elements.length; i < length; i++) {
            if (elements[i].textContent == '') {
                elements[i].style.display = 'none';
            }
        }
        map.closePopup();
    } else {
        var elements = document.getElementsByClassName("leaflet-pane leaflet-overlay-pane");
        for (var i = 0, length = elements.length; i < length; i++) {
            if (elements[i].textContent == '') {
                elements[i].style.display = 'block';
            }
        }
        var elements = document.getElementsByClassName("leaflet-marker-icon leaflet-zoom-animated leaflet-interactive");
        for (var i = 0, length = elements.length; i < length; i++) {
            if (elements[i].textContent == '') {
                elements[i].style.display = 'block';
            }
        }
    }
}

let side = L.control.sideBySide();

function compararCapas() {
    let checkBoxComparar = document.getElementById("myCheck");
    let containerRigth = document.getElementById('capa-left');
    if (!checkBoxComparar.checked) {
        containerRigth.classList.toggle('capa-rigth');
        side.remove();
        if (!capaLeft) {
            console.log("ingrese aqui");
            legendLeft.remove();
        } else {
            capaLeft.remove();
            capaMain.addTo(map);
        }
    } else {
        ocultarSidebar();
        let containerRigth = document.getElementById('capa-left');
        containerRigth.classList.toggle('capa-rigth');
        side.addTo(map);
        if (capaLeft) {
            capaLeft.addTo(map);
            map.addControl(legendLeft);
        }

    }
}



/* 
let selectTop = document.getElementById('conteiner-capas');
let rigth = document.createElement("div");
let containerRigth = document.createElement("div");
let labelRigth = document.createElement("label");
let selectRigth = document.createElement("select");
let optionR = document.createElement("option");

rigth.classList.add("widget-capas-container");
containerRigth.classList.add("container-select");
labelRigth.classList.add('h6');
labelRigth.innerHTML = "Capa:";
selectRigth.classList.add('select-capa');
selectRigth.id = "select-rigth";
optionR.innerHTML = "Seleccione Capa...";

selectTop.appendChild(rigth);
rigth.appendChild(containerRigth);
containerRigth.appendChild(labelRigth);
containerRigth.appendChild(selectRigth); */