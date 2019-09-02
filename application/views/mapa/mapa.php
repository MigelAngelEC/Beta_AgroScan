    <div class="capas-top">
        <div id="conteiner-capas" class="widget-capas">
            <div id="capa-left" class="widget-capas-container capa-rigth">
                <div class="container-select">
                    <label class="h6">Capa: </label>
                    <select id="select-left" name="select-main" class="select-capa">
                        <option value="" disabled selected>Seleccione Capa...</option>
                    </select>
                </div>
            </div>
            <div class="widget-capas-container">
                <div class="container-select">
                    <label class="h6">Capa: </label>
                    <select id="select-main" name="select-main" class="select-capa">
                        <option value="default" disabled selected>Seleccione Capa...</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    </div>


    <div id="myMap">
    </div>

    <div id="map-wrapper">
        <div id="button-wrapper">
            <div class="btn-group dropup">
                <div class="container-select">
                    <label class="h6">Capa:</label>
                    <select id="capasel" name="" class="select-capa dropup" onchange="changeCapa()">
                        <option value="" disabled selected>Seleccionar Capa</option>
                        <option value="TC">True Color</option>
                        <option value="FC">False Color</option>
                        <option value="NDVI">NDVI</option>
                        <option value="EVI">EVI</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    </section>