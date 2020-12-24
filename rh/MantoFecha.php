<?php 
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include_once "Parciales/head.php";
include_once "Parciales/menu.php";
include_once "$root/Optica/Controlador/HorarioControlador.php";
include_once "$root/Optica/Utilidades/ClsFunciones.php";

$transaccion = isset($_REQUEST['transaccion'])?$_REQUEST['transaccion']:"";
$Horario_ID = ""; 
$Fecha = "";
$Hora = "";   
$Medico_ID = "";
$FechaMod = "";
//Array de Dias de la semana
$arr_DiasSemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");
//Obtenemos semana actual
$SemanaActual = date("W");
$SemanaProgramar = date("W");
$Anio = date("Y");
$dia_Actual = date("w");

//Obtener Sexo
/*
$Config_sexo= ConfigControlador::getConfig("SEXO");
$arr_Descripcion_Sexo = $Config_sexo['arr_Descripcion'];
$arr_Catalogo_ID_Sexo = $Config_sexo['arr_Catalogo_ID'];
*/
if($transaccion=="C"){
   $Horario_ID = $_REQUEST['Horario_ID'];
   $Fecha = $_REQUEST['Fecha'];
   $resultado = array("estado"=>"true");
   $horario = HorarioControlador::getHorario($Horario_ID, $Fecha);
   $Horario_ID = $horario->getHorario_ID();  
   $Fecha = $horario->getFecha();
   $Hora = str_pad($horario->getHora(),4,"0",STR_PAD_LEFT);
   $Hora = substr($Hora,0,2) . ":".substr($Hora,2,2);
   $Semana = $horario->getSemana();
   $FechaMod = $horario->getFechaMod();
   $FechaMod = str_replace(" ","T",$FechaMod);
}

?>
<div class="container">
	<div class="starter-template">
		<br><br><br>
		<div class="row">
			<div class="col">
				<div class="panel panel-default">
					<div class="panel-body">
						<form id="frmAhorario" action="validarCodeMantoFecha.php" method="POST" role="form">
							<legend>Mantenimiento de Horario</legend>
						
						
							<div class="form-group row">
								<div class="col">
									<label for="Horario_ID"> Horario</label>
									<input type="text" maxlength="5" name="txtHorario_ID" class="form-control" id="txtHorario_ID" autofocus="" 
									placeholder="Numero de Horario" readonly value="<?php echo $Horario_ID; ?>">
								</div>															
								
								<div class="col">
									<label for="SemanaActual">Medico</label>
									<input type="text" maxlength="10" name="txtMedico" class="form-control" id="txtMedico" autofocus="" 
									placeholder="Medico"  value="<?php echo $Medico_ID;?>">
								</div>
					
							</div>
							<div class="form-group row">
								<div class="col">
									<label for="AnioProgramar">A&ntilde;o</label>
									<input type="number" maxlength="4" name="txtAnioprogramar" class="form-control" id="txtAnioprogramar" autofocus="" 
									placeholder="Anio Programar" value="<?php echo $Anio;?>">
								</div>
							    <div class="col">
									<label for="SemanaProgramar">Semana Programar</label>
									<input type="number" maxlength="3" name="txtSemanaprogramar" class="form-control" id="txtSemanaprogramar" autofocus="" 
									placeholder="Semana Programar" value="<?php echo $SemanaProgramar;?>">
								</div>
							
								<div class="col">
									<label for="SemanaActual">Semana Actual</label>
									<input type="number" maxlength="3" name="txtSemanaactual" class="form-control" id="txtSemanaactual" autofocus="" 
									placeholder="Semana Actual" readonly value="<?php echo $SemanaActual;?>">
								</div>
							</div>

							<table class="table table-bordered table-hover table-responsive-lg">
								<tr class="bg-info text-white">
								   <th><center> Semana </center></th>
								   <th><center> Fecha </center></th>
								   <th><center> Agregar </center></th>
								   <th><center> Laborar </center></th>
								</tr>
								<?php
								$c_dia = 0;
								//Obtenemos el Domingo
								$fecha_inicial = ClsFunciones::AgregaDias(date("d-m-Y"),($dia_Actual*-1)-1, "d/m/Y");
								$Fecha = $fecha_inicial;
								foreach($arr_DiasSemana as $Dia){
									$Fecha = ClsFunciones::AgregaDias($Fecha,+1, "Y/m/d");
									$Fecha = str_replace("/","-",$Fecha);
									$Horario = "12:00";
								?>
								<tr>
									<th><?php echo $Dia; ?></th>
									<td>
										<label for="fecha"></label>							
										<input type="date" maxlength="10" name="txtFecha<?php echo $c_dia; ?>" class="form-control" id="txtFecha" autofocus="" 
										placeholder="Fecha" value="<?php echo $Fecha;?>">
									
									</td>
									<td style="text-align: center; vertical-align: middle;">
										<button type="button" class="btn btn-success" onclick = "agregar(<?php echo $c_dia; ?>);" >+</button>
										 
										
									</td>	
									<td style="text-align: center; vertical-align: middle;">
										<label><input type="checkbox" id="cbox<?php echo $c_dia; ?>" name="cbox<?php echo $c_dia; ?>" value=""></label><br>
									</td>
								</tr>
								<?php
									++$c_dia;
								}
								?>
							</table>
	
							<center>
							   <div class="form-group">
							      <button type="submit" class="btn btn-success">Guardar</button>
							   </div>
							</center>
							   
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	
	 <?php include "Parciales/footer.php";?>