/* Control del modal del login */

// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
  btn.style.display = "none";
}

// When the user clicks on <span> (x), close the modal
//Lo reemplace por jquery
/* span.onclick = function() {
  modal.style.display = "none";
  btn.style.display = "block";
} */

$('.close').click(function(e){ 
  $('#myModal').fadeOut('fast');
  $('#myBtn').fadeIn('fast');
});

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
    btn.style.display = "block";
  }
}