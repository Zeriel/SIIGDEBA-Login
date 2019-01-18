/* Funcion que valida si hay datos en cuit y password para habilitar el submit */

function checkSubmit() {
    var usr = document.getElementById('user').value;
    var pas = document.getElementById('pass').value;
    var sub = document.getElementById('run');

    if (usr.length > 0 && pas.length > 0){
        sub.disabled = false;
    }
    else{
        sub.disabled = true;
    }
}

/* Funcion que restringe el rango del cuit a 11 digitos */

function validarCUIT(){
    var cuit = document.getElementById('user');
    if (cuit.value.length > cuit.maxLength){
        cuit.value = cuit.value.slice(0, cuit.maxLength);
    }
}

/* Codigo que bloquea los caracteres no-numericos del campo CUIT */

var cuit = document.getElementById('user');

var invalidChars = [
  "-",
  "+",
  "e",
  ".",
  ",",
];

cuit.addEventListener("keydown", function(e) {
  if (invalidChars.includes(e.key)) {
    e.preventDefault();
  }
});