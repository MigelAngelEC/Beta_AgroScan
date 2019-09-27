function cambiar(esto)
{
	vista=document.getElementById(esto).style.display;
	color = document.getElementById(esto).style.color;
	if (vista=='none'){

		vista='block';
		color='#5EEF1B';
	}
	else{
		vista='none';
		color='#CBCABB';
	}

	document.getElementById(esto).style.display = vista;
	document.getElementById(esto).style.color =color ;
}
function cambiarImagenJS(){
          document.getElementById("img1").src="img/3.1.jpeg";
        }
function cambiarImagenJS2(){
            document.getElementById("img1").src="img/3.2.jpeg";
}

function text(){
	document.getElementById('ejemplo1').style.color='#CBCABB';
}