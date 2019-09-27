<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-123072858-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-123072858-1');
</script>
<section id="main-container" class="container-primary">
    <div class="row">
        <?php
        if (!empty($cultivos)) {
            foreach ($cultivos as $cultivo) {
                ?>
                <img id='loading' style="display:none" ; />
                <div class="col-md-6 col-lg-4" style="margin-bottom: 13px;">
                    <!-- Card -->
                    <div class="card">
                        <!-- Card image -->
                        <a href="<?php echo base_url(); ?>Mapa?ncltv=<?php echo $cultivo->id_cultivo; ?>">
                            <img class="card-img-top" src="<?php echo base_url() . $cultivo->img_cult; ?>" alt="Card image cap">
                        </a>

                        <!-- Card content -->
                        <div class="card-body">

                            <!-- Title -->
                            <h4 class="card-title"><?php echo $cultivo->nombre_cult; ?></h4>
                            <!-- Text -->
                            <p class="card-text"><?php echo $cultivo->descripcion_cult; ?></p>
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <p>Pais: <span class="card-text"><?php echo $cultivo->pais_cult; ?></span></p>
                                </div>
                                <div class="col-lg-6">
                                    <p>Ciudad: <span class="card-text"><?php echo $cultivo->ciudad_cult; ?></span></p>
                                </div>
                            </div>

                            <!-- Button -->
                            <a href="<?php echo base_url(); ?>Mapa?ncltv=<?php echo $cultivo->id_cultivo; ?>" class="btn btn-primary"><i class="fa fa-map-marker "></i> Ver Cultivo en el mapa</a>
                        </div>
                    </div>
                    <!-- Card -->
                </div>
        <?php
            }
        }
        ?>
    </div>
</section>