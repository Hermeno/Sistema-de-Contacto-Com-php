/*var nome = document.getElementById('nome').value;
document.getElementById('empresa')
document.getElementById('nome')
var error_message = document.getElementById("error_message");

error_message.style.padding = "10px";


if(isNan(contacto) || contacto.length != 10) {
	text= "Por favor escreva um numero valido";

	error_message.innerHTML = text;
	return false;

}*/

var butao = document.getElementById("form-id");
butao.addEventListener("click", function(event) {
	event.stopPropagation();
});



//document.getElementById("stot_popo").addEventListener("")