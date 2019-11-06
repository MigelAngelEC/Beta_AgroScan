<!-- Multiple inputs -->
<style type="text/css">
    /*Si el valor que el usuario escribe es valido, obtendra un color verde*/
  form input:valid{
        border:2px solid #A3EABC;
    }

  .centrar {
    display: flex;
    justify-content: center;
  }
  .ocultar {/*tranparencia total*/
  position:absolute;
  left:0px;
  top:0px;
  z-index:-1;
  opacity: 0.0;
  filter: alpha(opacity=0);
  }

  .img1 {/*a*/
    position:absolute;
    left:0px;
    top:0px;
    z-index:-1;
  }
   
  .img2 {/*sobreponer sobre a*/
    position:absolute;
    left:30px;
    top:45px;
    z-index:-1;
  }
  .img22 {/*sobreponer sobre a*/
    position:absolute;
    z-index:-1;
  }

  .T {
      opacity: 0.95;
      filter: alpha(opacity=95);
  }


  #chch{
   position: relative;
  }
  .sobre {
   position:absolute;
   top:0px;
   left:0px;
   border:none;
  }
  
  .break-word {/* Mantiene el texto dentro del contenedor */
   -ms-word-break: break-all;
       word-break: break-all;

       // Non standard for webkit
       word-break: break-word;

  -webkit-hyphens: auto;
     -moz-hyphens: auto;
      -ms-hyphens: auto;
          hyphens: auto;
  }
</style>

<script>
  var very='';

  var loadFile2 = function(event) {
    var output = document.getElementById('output');
     var f= event.file;

    output.src = URL.createObjectURL(event.target.files[0]);
  };

function send() {

      $.ajax({
            type:"post",
            url: "<?php echo base_url(); ?>index.php/Registro/send",
            success:function(response) {
                if (!response=='0') {
                  //console.log("xxxx: "+response);
                  very=response;

                }else{
                  //console.log("no se pudo enviar código de confirmacion");
                }
                
            },
            error: function() {
                //alert("No enviado");
            }
        });
  }

  function iguales() {
    var p1 = $("#clave1").val();
    var p2 = $("#clave2").val();
    if (p1==p2) {
      var intro1 = document.getElementById('clave1');
      var intro2 = document.getElementById('clave2');
      intro1.style.border = '1px solid #27EE69';
      intro2.style.border = '1px solid #27EE69';
      var cont = document.getElementById('btn_registrar');
      cont.disabled=false;

      //console.log("iguales");

    }else{
      var intro1 = document.getElementById('clave1');
      var intro2 = document.getElementById('clave2');
      intro1.style.border = '1px solid #FD78A7';
      intro2.style.border = '1px solid #FD78A7';
      var cont = document.getElementById('btn_registrar');
      cont.disabled=true;
      //console.log("Las claves deben coincidir");
    }
  }
  function p2() {
    document.getElementById('pais').value = document.getElementById('code').value;
    //document.getElementById('pais').value=cd;
  }
  function p3() {
    var cont = document.getElementById('contenedor')
    cont.style.opacity = '1.0';
    cont.style.filter = 'alpha(opacity=100)';
  }
  function p4() {
    var cont = document.getElementById('contenedor')
    cont.style.opacity = '0.95';
    cont.style.filter = 'alpha(opacity=95)';
  }
  function activarBoton() {
    var cont = document.getElementById('btn_registrar');
    cont.disabled=true;
  }
  function confirmarCode() {
    var cod = document.getElementById('codigoC').value;
    if (very==cod) {
      alert('codigos coinciden');
      var cont = document.getElementById('conf');
      cont.disabled=false;
      
    }else{
      alert('intente nuevamente');
    }
  }
  function desactivar(){
    var cont = document.getElementById('conf');
    cont.disabled=true;
  }


</script>
<body background="<?php echo base_url();?>_assets/img/background-login.jpg">
  <div class="centrar"> 
    <div id="contenedor" class="card T">
      <div class="card-header"><br>
        <center>
          <div class="logo">
            <img src="<?php echo base_url();?>_assets/img/Logo-horizontal2.png" class="img-fluid"  width="150" />
          </div>Registro
          </center><br>

      </div>
      <div class="card-body">
        <div class="embed-container">
          <form action="Registro/registrar" method="post" enctype="multipart/form-data">
            <div class="input-group mb-3">
              <div class="col-12">
                <div class="text-center">
                  <div class="input-group mb-3">
                      <input id="nombre" name="nombre" type="text" class="form-control"placeholder="Nombre" required>
                      <input id="apellido" name="apellido" type="text" class="form-control" placeholder="Apellido" required>

                  </div>
                  <div class="input-group mb-3">
                      <input id="cedula" name="cedula" type="text" class="form-control" placeholder="DNI/CI" required>
                  </div>
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <select id="code" class="rounded-left" onchange ="p2()">
                          <option value="Ecuador">+593</option>
                          <option value="Colombia">+57</option>
                          <option value="Argentina">+54</option>
                          <option value="Chile">+56</option>
                          <option value="Venezuela">+58</option>
                          <option value="Bolivia">+591</option>
                        </select>
                      </div>
                      <input id="telefono" name="telefono" type="text" class="form-control" placeholder="Telefono" required>
                  </div>
                  <div class="input-group mb-3">
                      <input id="pais" name="pais" type="text" class="form-control" placeholder="País" required>
                  </div>
                  <div class="input-group mb-3">
                      <input id="direccion" name="direccion" type="text" class="form-control" placeholder="Lugar residencia" required>
                  </div>
                  <div class="input-group mb-3">
                      <input id="correo" name="correo" type="text" class="form-control" placeholder="Correo electrónico" required>
                  </div>
                  <div class="input-group mb-3">
                      <input id="clave1" name="clave1" type="text" class="form-control" placeholder="Clave" onchange ="iguales()" required>
                      <input id="clave2" name="clave2" type="text" class="form-control" placeholder="Confirme clave" onchange ="iguales()" required>
                  </div>
                </div>
              </div>
            </div>
            <!--Modal-->
            <div id="draggable" class="noT">
              <div id="exampleModalLive" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLiveLabel"></h5>
                        <button id="cerrarM1" type="button" class="close" onclick="p4()" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="centrar">Código de confirmación</div><br>
                      <div class="input-group mb-3">
                        <input id="codigoC" name="codigoC" type="number" class="form-control col-8" placeholder="Código" onkeypress="desactivar()" required>
                        <input id="c2" name="c1" type="button" class="form-control btn-primary col-4" value ="verificar codigo" onclick="confirmarCode()">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button id="cerrarM2" type="button" class="btn btn-secondary" onclick="p4()" data-dismiss="modal">Cerrar</button>
                      <button id="conf" type="submit" class="btn btn-primary" disabled>Confirmar</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--./Modal-->
          
          </form>   
        </div>          
      </div>
      <div class="card-footer">
        <div class="centrar">
          <input id="btn_registrar" type="button"  value="Registrarte" class="btn btn-primary" name="registrar" onclick="p3(); send();" data-toggle="modal" data-target="#exampleModalLive" disabled>
        </div>

        <center>
          <span class="size-options">¿Eres miembro? </span>
          <a class="underlineHover size-options" href="<?php echo base_url();?>index.php/Login">Login</a>
        </center>
      </div> 
    </div>  
  </div>
</body>
      


