
function showTableData(){
    var parametros = $(this).serialize();
    $.ajax({
        type:"get",
        url:$(this).attr('action'),
        datatype: "json",
        data:parametros,
        success: function(datos){
            if(datos=="1"){
                $(location).attr('href','Mapa');
            }else {
                
            }
        }

    });

}  
$(document).ready(function(){
  showTableData();    
});   