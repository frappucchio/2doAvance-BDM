var contador;
function calificar(item){
contador=item.id[0];
let nombre=item.id.substring(1);

for(let i=0;i<5;i++){
if(i<contador){
    document.getElementById((i+1)+nombre).style.color="orange";
}else{
    document.getElementById((i+1)+nombre).style.color="black";
}
}
}

//se coloca en las estrellas id=1estrella.. 2estrella hasta 5estrella y onclick="calificar(this)"
