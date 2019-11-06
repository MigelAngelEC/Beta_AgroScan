<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark primary-color">
        <a class="navbar-brand" href="#">
            <font style="vertical-align: inherit;">
            <img src="<?php echo base_url();?>/_assets/img/agrocloud_logo2.svg" height="35" class="d-inline-block align-top" alt="Logo Agrocloud">
            </font>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="<?php echo base_url();?>/index.php/Dashboard">
                        <i class="fa fa-leaf"></i>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;"><b>Mis cultivos</b>
                            </font>
                        </font><span class="sr-only"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">(actual)</font></font></span>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link waves-effect waves-light" href="<?php echo base_url();?>/index.php/Support/preguntas">
                        <i class="fa fa-question-circle"></i>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;"><b>Preguntas</b>
                            </font>
                        </font><span class="sr-only"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">(actual)</font></font></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="<?php echo base_url();?>/index.php/Support/tutoriales">
                        <i class="fa fa-youtube-play"></i>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;"><b>Tutoriales</b></font>
                        </font>
                    </a>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <i class="fa fa-user"></i>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;"><b>Bienvenido <?=$this->session->userdata('nombre') ?></b> </font>
                        </font>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink-4">
                        <a class="dropdown-item waves-effect waves-light" href="<?php echo base_url();?>index.php/Cuenta_/">Cuenta
<!--                             <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Mi cuenta </font>
                            </font> -->
                        </a>

                        <a class="dropdown-item waves-effect waves-light" href="<?php echo base_url();?>index.php/Login/cerrar_sesion">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Cerrar sesión </font>
                            </font>
                        </a>
                    </div>
                </li>

            </ul>
        </div>
    </nav>

    