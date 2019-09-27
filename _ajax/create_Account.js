function createAccount(){
    $("#createAccountFrom").on("submit",function(e){
        var parametros =$(this).serialize();
        $.ajax({
            type:"post",
            url: $(this).attr('action'),
            datatype:"json",
            data:parametros,
            success: function(datos){
                if(datos=="1"){
                    
                }
            }
        })



    });

}
$(document).ready(function() {
    createAccount();
});