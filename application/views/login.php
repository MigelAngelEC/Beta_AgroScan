<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-123072858-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-123072858-1');
</script>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="fondo">
    <div class="wrapper" style="background-image: url('<?php echo base_url();?>_assets/img/background-login.jpg');">
        <div id="formContent" class="text-center">

            <!-- Logo -->
            <div class="logo">
              <img src="<?php echo base_url();?>_assets/img/Logo-horizontal2.png" class="img-fluid"  alt="Logo" width="150"/>
            </div>

            <!-- Titulos -->
            <h5 class="titulo text-center"><span class="size-options">Login </span></h5>
            <div class="col-10 col-md-9" style="margin-left: auto; margin-right: auto">
              <form id="loginform" action="index.php/Login/ingresar"  method="POST">
                      <div class="md-form form-group mt-5">
                      <input id="txtEmail" name="txtEmail" type="email" class="form-control" required>
                          <label  for="txtEmail" >Correo electronico</label>
                      </div>
                      <div class="md-form form-group mt-5">
                      <input id="txtclave" name="txtclave" type="password" class="form-control" required>
                          <label  for="txtclave" >Contraseña</label>
                      </div>

                      <div class="md-form form-group mt-5">
                          <button id="btn-ingresar" type="submit" class="btn btn-primary">Iniciar sesión</button>
                      </div>
            </form>
          </div>
          <!-- Material form group -->
            <div class="alert alert-danger" id="errorLogin" hidden="true"></div>
            <!-- Remind Passowrd -->
            <div id="formFooter">
                <span class="size-options">¿Todavía no eres miembro? </span><a class="underlineHover size-options" href="<?php echo base_url();?>index.php/Registro">Registrate aquí</a>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url();?>_ajax/login.js"></script>