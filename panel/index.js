//Se escucha el evento submit para realizar comprobaciones si algun select esta vacio
document.getElementById("formFiltrar").addEventListener("submit", function (e) {
    e.preventDefault(); // Evita que se recargue la página
    var carrera = document.getElementById('selectCarrera').value;
    var anio = document.getElementById('selectAnio').value;
    var semestre = document.getElementById('selectSemestre').value;
    
    if (carrera == '' || anio == '' || semestre == '') {
        alert('Seleccione que carrera, año y semestre desea buscar!!!');
    } else {
       document.forms['formFiltrar'].submit();
    }
});

//En caso de venir la url con variables get se rellena los select
function rellenar(){
    var inCarrera = document.getElementById('inCarrera').value; 
    var inAnio = document.getElementById('inAnio').value;
    var inSemestre = document.getElementById('inSemestre').value;
    if(inCarrera!=''){
        document.getElementById('selectCarrera').value=inCarrera;
    }
    if(inAnio!=''){
        document.getElementById('selectAnio').value=inAnio;
    }
    if(inSemestre!=''){
        document.getElementById('selectSemestre').value=inSemestre;
    }
}

window.onload= rellenar();