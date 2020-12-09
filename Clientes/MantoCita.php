<?php 
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include_once "Parciales/head.php";
include_once "Parciales/menu.php";
include_once "$root/Optica/Controlador/CitaControlador.php";

$transaccion = isset($_REQUEST['transaccion'])?$_REQUEST['transaccion']:"";
$cliente = null;
$Cita_ID = ""; 
$Fecha = "";
$Hora = "";   
$Cliente_ID = "";
$Medico_ID = "";
$FechaMod = "";
$FechaIngreso = "";
$FechaSalida = "";
$Status = "";
$Observaciones = "";

//Obtener Sexo
/*
$Config_sexo= ConfigControlador::getConfig("SEXO");
$arr_Descripcion_Sexo = $Config_sexo['arr_Descripcion'];
$arr_Catalogo_ID_Sexo = $Config_sexo['arr_Catalogo_ID'];
*/
if($transaccion=="C"){
   $Cita_ID = $_REQUEST['Cita_ID'];
   $resultado = array("estado"=>"true");
   $cita = CitaControlador::getCita($Cita_ID);
   $Cita_ID = $cita->getCita_ID();  
   $Fecha = $cita->getFecha();
   $Hora = $cita->getHora();
   $Cliente_ID = $cita->getCliente_ID();
   $Medico_ID = $cita->getMedico_ID();
   $FechaMod = $cita->getFechaMod();
   $FechaIngreso = $cita->getFechaIngreso();
   $FechaSalida = $cita->getFechaSalida();
   $Status = $cita->getStatus();
   $Observaciones = $cita->getObservaciones();
   
}
?>
<div class="container">
	<div class="starter-template">
		<br><br><br>
		<div class="row">
			<div class="col">
				<div class="panel panel-default">
					<div class="panel-body">
						<form id="frmAcita" action="validarCodeMantoCita.php" method="POST" role="form">
							<legend>Mantenimiento de Citas</legend>
						
						
							<div class="form-group row">
								<div class="col">
									<label for="Cita_ID">Numero de Cita</label>
									<input type="text" maxlength="20" name="txtCita_ID" class="form-control" id="txtCita_ID" autofocus="" 
									placeholder="Numero de Cita" value="<?php echo $Cita_ID; ?>">
								</div>								
								<div class="col">
									<label for="Fecha">Fecha</label>
									<input type="date" maxlength="10" name="txtFecha" class="form-control" id="txtFecha" autofocus="" 
									placeholder="Fecha" value="<?php echo $Fecha; ?>">
								</div>												
								<div class="col">
									<label for="Hora">Hora</label>
									<input type="time" maxlength="5" name="txtHora" class="form-control" id="txtHora" autofocus="" 
									placeholder="Hora" value="<?php echo $Hora;?>">
								</div>
							</div>
							
							<div class="form-group row">
								<div class="col">
									<label for="Cliente_ID">Numero de Cliente</label>
									<input type="text" maxlength="10" name="txtCliente_ID" class="form-control" id="txtCliente_ID" autofocus="" 
									placeholder="Cliente_ID" value="<?php echo $Cliente_ID;?>">  
								</div>
								<div class="col">
									<label for="Medico_ID">Numero de Medico</label>
									<input type="text" maxlength="10" name="txtMedico_ID" class="form-control" id="txtMedico_ID" autofocus="" 
									placeholder="Medico_ID" value="<?php echo $Medico_ID;?>">  
								</div>
								<div class="col">
									<label for="FechaMod">Fecha de Modificacion</label>							
									<input type="text" maxlength="20" name="txtFechaMod" class="form-control" id="txtFechaMod" autofocus="" 
									placeholder="FechaMod" readonly value="<?php echo $FechaMod;?>">
								</div>
								<div class="col">
									<label for="FechaIngreso">Fecha de Ingreso</label>
									<input type="datetime-local" maxlength="20" name="txtFechaIngreso" class="form-control" id="txtFechaIngreso" autofocus="" 
									placeholder="FechaIngreso" value="<?php echo $FechaIngreso;?>">
								</div>
							
							</div>
							
							
							<div class="form-group row">
								<div class="col">
									<label for="FechaSalida">Fecha de Salida</label>
									<input type="datetime-local" maxlength="20" name="txtFechaSalida" class="form-control" id="txtFechaSalida" autofocus="" 
									placeholder="FechaSalida" value="<?php echo $FechaSalida;?>">
								</div>
								<div class="col">
									<label for="Status">Status</label>
									<input type="text" name="txtStatus" class="form-control" id="txtStatus"  autofocus="" 
									placeholder="Status" value="<?php echo $Status;?>">
								</div>
								<div class="col">
									<label for="Observaciones">Observaciones</label>
									<input type="text" name="txtObservaciones" class="form-control" id="txtObservaciones"  autofocus="" 
									placeholder="Observaciones" value="<?php echo $Observaciones;?>">
								</div>
					
							</div>

							<div class="form-group">
							<button type="submit" class="btn btn-success">Guardar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

 <?php include "Parciales/footer.php";?>