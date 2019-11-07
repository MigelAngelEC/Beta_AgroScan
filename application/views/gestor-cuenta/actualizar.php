<!-- Multiple inputs -->
<style type="text/css">
	/*Mostraremos los campos requeridos de color amarillo*/
    form input:required {
       border:2px solid #F08080
;
    /* otras propiedades */
    }
    /*Si el valor que el usuario escribe es valido, obtendra un color verde*/
    form input:valid{
        border:2px solid #C4D6DC;
        /* otras propiedades */
    }
    /*caso contrario, el color sera rojo*/
    form input:focus:invalid{
        border:2px solid red;
        /* otras propiedades */
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

	.img:hover {
	    opacity: 0.4;
	    filter: alpha(opacity=40);
	}

	.img {
	    opacity: 1.0;
	    filter: alpha(opacity=100);
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
  var loadFile2 = function(event) {
    var output = document.getElementById('output');
     var f= event.file;

    output.src = URL.createObjectURL(event.target.files[0]);
  };

 
function get() {
  		$.ajax({
            type:"post",
            url: "<?php echo base_url(); ?>index.php/Cuenta_/",
            success:function(resu) {
                console.log(resu);
            },
            error: function() {
                alert("Invalido!");
            }
        });
}

  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.fixed-action-btn');
    var instances = M.FloatingActionButton.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('.fixed-action-btn').floatingActionButton();
  });
      

</script>

    	
<div class="centrar">

	<div class="card">
		<div class="card-header">
			<center>Datos</center>

		</div>
		<div class="card-body">
			<div class="embed-container">
				<form action="subir" method="post" enctype="multipart/form-data">
					<div class="input-group mb-3">
						<div class="col-5">
							<div class="card card-primary card-outline">
							    <div class="card-body box-profile">
							        <div class="text-center">
							           <div class="image-upload">
										    <label for="file-input">
										    	<div id="chch">
													<img id="se" class="profile-user-img img-fluid img-circle" src="https://cdn1.iconfinder.com/data/icons/iconmart-web-icons-2/64/camera-512.png" style="width: 100px;height: 140px;">

													<img id="output" class="profile-user-img img-fluid img-circle sobre img" src="<?php echo base_url();?><?= $prueba['dir']?>" style="width: 100px;height: 140px;">
												</div>	        
										    </label>
										    <div class="img1">
										    	<input id="file-input" name="upload" type="file" class="ocultar" accept="image/x-png,image/jpeg" onchange="loadFile2(event)">
										    </div>
										    
										</div>

							        </div>
							        <p class="text-center"><?= $prueba['nombre']?></p>
							    </div>
							    <div class="card-footer">
							    	<div class="centrar">
							    		<input type="button"  value="Actualizar" class="btn btn-primary" name="actualizar" data-toggle="modal" data-target="#exampleModalLive">
							    	</div>							    	
							    		    	
							    </div>
							</div>
						</div>
						<div class="col-7">
							<div class="card card-body">
								<div class="input-group mb-3">
								    <div class="input-group-prepend">
								      <span class="input-group-text">Nombre</span>
								    </div>
								    <input id="nombre" name="nombre" type="text" class="form-control" value="<?= $prueba['nombre']?>" placeholder="<?= $prueba['nombre']?>" required>
								</div>
								<div class="input-group mb-3">
								    <div class="input-group-prepend">
								      <span class="input-group-text">Apellido</span>
								    </div>
								    <input id="apellido" name="apellido" type="text" class="form-control" value="<?= $prueba['apellido']?>" placeholder="<?= $prueba['apellido']?>" required>
								</div>
								<div class="input-group mb-3">
								    <div class="input-group-prepend">
								      <span class="input-group-text">Cedula</span>
								    </div>
								    <input id="cedula" name="cedula" type="text" class="form-control" value="<?= $prueba['cedula']?>" placeholder="<?= $prueba['cedula']?>" required>
								</div>
								<div class="input-group mb-3">
								    <div class="input-group-prepend">
								      <span class="input-group-text">Celular</span>
								    </div>
								    <input id="celular" name="celular" type="text" class="form-control" placeholder="<?= $prueba['celular']?>" value="<?= $prueba['celular']?>" required>
								</div>
								<div class="input-group mb-3">
								    <div class="input-group-prepend">
								      <span class="input-group-text">Dirección</span>
								    </div>
								    <input id="direccion" name="direccion" type="text" class="form-control" value="<?= $prueba['direccion']?>" placeholder="<?= $prueba['direccion']?>" required>
								</div>
							</div>
						</div>
					</div>

					<div id="draggable">
						<div id="exampleModalLive" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" style="display: none;" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title text-center" id="exampleModalLiveLabel">Validación</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">×</span>
						        </button>
						      </div>
						      <div class="modal-body">
						      	<div class="centrar">Confirmar cambios?</div>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						        <button type="submit" class="btn btn-primary">Confirmar</button>
						      </div>
						    </div>
						  </div>
						</div>
					</div>
				

				</form>		
			</div>    			
		</div>
		<div class="card-footer"><center><a href="<?php echo base_url();?>index.php/Cuenta_/"><span class="size-options">Volver</span></a>
		</center></div>	
	</div>	
</div>

