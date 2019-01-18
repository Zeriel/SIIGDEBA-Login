/* Funcion que controla la activacion del loader */

function toggleLoader(){
    var loader = document.getElementById('loaderContainer');
    var modal = document.getElementById('myModal');
    modal.style.display = "none";
    loader.style.display = "block";
}