$("document").ready(function(){

   
    var data = new FormData();

    data.append("name", "Juan");
    data.append("age", 30);

    

    $.ajax({
        url: "/proyecto_bdm/usuarios/ajax",
        type: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(response){
            console.log("respuesta", response);
        },
        error: function(request, status, error){
            console.log("error");
        }
    });

});



  
