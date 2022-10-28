
//$(document).ready(function(){
    $("#categoria_form").submit(function(event){
        if($("#categoria_form").valid() == true){ //validacion del form
         event.preventDefault();
                //alert("Envio el formulario");
         $.ajax({
             data: $(this).serialize(),
             type: "POST",
             url: "../Categorias_API.php",
             dataType: 'json'
         }).done(function(data){
                //alert("entre a ajax");
                if(data.suceso == true){
                    Swal.fire({
                        icon: 'success',
                        title: '¡Categoría registrada!',
                        text: 'Registro realizado',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById("categoria_form").reset();
                        } 
                      })
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Categoría ya existente',
                        text: 'Ya existe una categoría registrada con ese nombre',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            //document.getElementById("categoria_form").reset();
                        } 
                      })
                    
                }
                 console.log(data.suceso);
         }).fail(function(jqXHR, textEstado){
             console.log("La solicitud regreso con un error: " + textEstado);
             
         }); 
        }
     });
      
   //});

   