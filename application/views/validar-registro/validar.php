<style type="text/css">
	*{
		margin:	0px;	
		padding: 0px;
		font-family: helvetica Neue;
		font-weight: lighter;
	}
	html,body{
		background-color: #EAE6E6;

	}
	section#formulario{
		position: absolute;
		top: 50%;
		left: 50%;
		margin-left: -200px;
		margin-top: -300px;
		width: 400px;
		min-height: 100px;
		background-color: white;
		overflow: hidden;		
		border-radius: 5px;	
	}
	p#titulo{
		font-size: 1.6em;
		text-align: center;
		margin-top: 20px;
	}
	input[type="text"], input[type="password"],input[type="email"],input[type="number"], textarea{
		width: 350px;
		height: 35px;
		margin-left: 20px;
		margin-top: 10px;
		padding: 10px;
		font-size: 1.1em;
		outline: none;
		border: 0px;
		background-color: #DFD6D6;
		border-radius: 5px;

	}
	input[type="submit"], input[type="other"], button#reg{
		margin: 20px;
		margin-bottom: 20px; 
		width: 360px;
		height: 40px;
		outline: none;
		border:0px;
		background-color: #039344;
		color: white;
		font-size: 1.2em;
		border-radius: 5px;	
		-webkit-box-shadow: 0px 5px 0px;

	}
	textarea{
		max-width: 350px;
		min-width: 350px;
		min-height: 70px;
		padding-top: 10px;
	}
	div.modal{

		border-radius: 15px;	

	}
	
</style>

<script type="text/javascript">
	function justNumbers(e)
	    {
	    var keynum = window.event ? window.event.keyCode : e.which;
	    if ((keynum == 8) || (keynum == 46))
	    return true;
	     
	    return /\d/.test(String.fromCharCode(keynum));
	    }
	function justText(e) {
	    key = e.keyCode || e.which;
	    tecla = String.fromCharCode(key).toLowerCase();
	    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
	    especiales = [8, 37, 39, 46];

	    tecla_especial = false
	    for(var i in especiales) {
	        if(key == especiales[i]) {
	            tecla_especial = true;
	            break;
	        }
	    }

	    if(letras.indexOf(tecla) == -1 && !tecla_especial)
	        return false;
	}

</script>

<body >
	<section id="formulario">
		<p id="titulo">Registro</p>
		<form id="registroForm" action="registrarP"  method="POST">
			<input type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre" onkeypress="return justText(event);">
			<input type="text" id="apellido" name="apellido" placeholder="Ingrese su apellido" onkeypress="return justText(event);">
			<input type="text" id="cedula" name="cedula" placeholder="Ingrese su CI/DNI" onkeypress="return justNumbers(event);">
			<input type="text" id="direccion" name="direccion" placeholder="Ingrese su direccion de domicilio">
			<input type="text" id="telefono" name="telefono" placeholder="Ingrese su numeor telefónico" onkeypress="return justNumbers(event);">
			<input type="email" id="demo" name="correo" placeholder="Ingrese una correo">
			<input type="password" id="clave1" name="clave1" placeholder="Ingrese su clave">
			<input type="password" id="clave2" name="clave2" placeholder="Cofirme su clave" onchange="mostrar();">
			

			<button id="reg" name="reg" onclick="myFunction2()" data-toggle="modal" data-target="#exampleModalLive">Enviar</button>
				

			<!----------------------------------------------------->
			<div id="exampleModalLive" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" style="display: none;" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLiveLabel">
			        	<center>Modal tilulo</center>
			        </h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">×</span>
			        </button>
			      </div>
			      <div class="modal-body">
			      	<div class="centrar">
			        	<div class="input-group mb-3">
						    <div class="input-group-prepend">
						      <span class="input-group-text">Código</span>
						    </div>
						    <input type="txt" class="form-control" placeholder="Código de confirmación" required maxlength="6" onkeypress="return justNumbers(event);">
						</div>
			        </div>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			        <button type="submit" class="btn btn-primary">Confirmar</button>
			      </div>
			    </div>
			  </div>
			</div>
			<!----------------------------------------------------->	
		</form>		
	</section>

<script type="text/javascript">

	function myFunction2() {

  		$.ajax({
            type:"post",
            url: "<?php echo base_url(); ?>index.php/Registro/send",
            success:function(response) {
                console.log(response);
            },
            error: function() {
                alert("Invalido!");
            }
        });
	}

	function mostrar() {
		var p1 = $("#clave1").val();
		var p2 = $("#clave2").val();
		if (p1==p2) {
			var intro1 = document.getElementById('clave1');
			var intro2 = document.getElementById('clave2');
			intro1.style.border = '1px solid #27EE69';
			intro2.style.border = '1px solid #27EE69';
			console.log("iguales");

		}else{
			var intro1 = document.getElementById('clave1');
			var intro2 = document.getElementById('clave2');
			intro1.style.border = '1px solid #FD78A7';
			intro2.style.border = '1px solid #FD78A7';
			//border: 1px solid #f00;
			console.log("Las claves deben coincidir");
		}
	}
</script>
	
</body>