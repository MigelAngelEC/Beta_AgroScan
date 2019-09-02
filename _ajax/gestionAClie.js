$(document).ready(function () {
consultaTablaClie();
guardarClie();
});

var consultaTablaClie = function(){
        var table = $('#tablaClie').DataTable({
        responsive: true,
        destroy:true,
          ajax:{
          type:"post",
          url:"GestionAClieCtrl/get_todosClie",
          data:{}
          },
                columns:[
                  {"data":"ID_USUARIO"},
                  {"data":"NICK_USUARIO"},
                  {"data":"CLAVE_USUARIO"},
                  { "targets": -1,
                    "data": null,
                    "defaultContent":"<button type='button' name='elimimar' id='eliminar' class='btn btn-danger' data-toggle='modal' data-target='#eliminacionProfesorModal' tittle='Eliminar'><i class='glyphicon glyphicon-trash'></i></button>"
                  },
                  { "targets": -1,
                    "data": null,
                    "defaultContent":"<button type='button' name='modificar' id='modificar' class='btn btn-warning' data-toggle='modal' data-target='#modificarModalProfesor'><i class='glyphicon glyphicon-pencil'></button>"
                  }
                ],



            });

}

var idioma_espanol = {
	"sProcessing":     "Procesando...",
	"sLengthMenu":     "Mostrar _MENU_ registros de profesores registrados",
	"sZeroRecords":    "No se encontraron resultados",
	"sEmptyTable":     "Ningún dato disponible en esta tabla",
	"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
	"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
	"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
	"sInfoPostFix":    "",
	"sSearch":         "Buscar profesor registrado:",
	"sUrl":            "",
	"sInfoThousands":  ",",
	"sLoadingRecords": "Cargando...",
	"oPaginate": {
	"sFirst":    "Primero",
	"sLast":     "Último",
	"sNext":     "Siguiente",
	"sPrevious": "Anterior"
	},
	"oAria": {
	"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
	"sSortDescending": ": Activar para ordenar la columna de manera descendente"
	}
}

function  guardarClie() {
      $("#form_newClie").on("submit",function(e) {
      e.preventDefault();
      var parametros = $(this).serialize();   
          $.ajax({
                type:"post",
                url: $(this).attr('action'),
                datatype: "json",
                data: parametros,
                success:function(datos) {
                  console.log(datos);
                    if (datos=="1") {
                        $(location).attr('href','inicioAdminCtrl');
                    }else{
                      msj="Nick o contraseña erroneos"
                      $("#errorLogin").html(msj).show();
                    }
                  }               
          });
      });
}