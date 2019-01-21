/* Control del modal de errores */

// Get the modal
var errorModal = document.getElementById('errorModal');


// Get the <span> element that closes the modal
var errorClose = document.getElementsByClassName("errorClose")[0];

// When the user clicks on <span> (x), close the modal
/* Volvi a codificar las funciones pero usando JQuery, para el fadeOut */

$('#errorClose').click(function(e){ 
  $('#errorModal').fadeOut('fast');
});

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == errorModal) {
    $('#errorModal').fadeOut('fast');
  }
}