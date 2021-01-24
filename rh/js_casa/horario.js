//funcion que agrega a un control un div contenedor
function agregacontrol(id) {
	var nuevoctrl = "";
	var cuentahorasmodal = 0;
	var fecha = document.getElementById('fecha').value;
	ctrl = document.getElementById(id);
	cuentahorasmodal = document.getElementById('cuentahorasmodal');
	cuentahorasmodal.value = parseInt(cuentahorasmodal.value) + 1;
	nuevoctrl = "<div class='form-group row'><div class='col'>Horario "+cuentahorasmodal.value+":</div><div class='col'><input type='time' id='hora"+cuentahorasmodal.value+"' name='hora"+cuentahorasmodal.value+"'></div><div class='col'></div></div>";
    ctrl.innerHTML = ctrl.innerHTML + nuevoctrl;
	document.getElementById('fecha').value = fecha;
}
function muestramodal(id) {
	var Fecha = document.getElementById("Fecha"+id).value;
	$('#ModalHorario').modal('show');  
	document.getElementById("fecha").value = Fecha;
}