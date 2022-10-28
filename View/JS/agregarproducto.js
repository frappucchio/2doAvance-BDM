const agregarprecio=document.getElementById("precioProducto_nombre_id");

function mostrar(){
    var selectBox=document.getElementById("modoVenta_select_id");
    var selectedValue=selectBox.options[selectBox.selectedIndex].value;

    if(selectedValue=="1"){
        agregarprecio.innerHTML="<h6><label class='label' for='precioProducto_input_id' style='font-size: 13px;' >Precio de producto</label><input class='form-control text-center w-25 d-inline' type='number' id='precioProducto_input_id' name='precioProducto_input_name' title='<i class=;fas fa-exclamation-circle;></i> Introduzca un valor correcto' value='100' min='1' style='margin-left: 5.5%;'><img src='../View/img/mexico.png' style='width: 4%; margin-left:2%;'><label>MXN</label><label id='precioProducto_input_id-error' class='text-danger' for='precioProducto_input_id'></label></h6>"
    }
    else{
        agregarprecio.innerHTML="";
    }
    
}