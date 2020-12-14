<?php include "Parciales/head.php";?>
<?php include "Parciales/menu.php";

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/Optica/Controlador/CitaControlador.php";
include "$root/Optica/login/helps/helps.php";

$resultado = array("estado"=>"true");
$extra = " Order by Fecha, Cita_ID ";
$arr_cita = CitaControlador::getAllCita($extra);


$arr_Cita_ID = $arr_cita["arr_Cita_ID"];
$arr_Fecha = $arr_cita["arr_Fecha"];
$arr_Hora = $arr_cita["arr_Hora"];
$arr_Cliente_ID = $arr_cita["arr_Cliente_ID"];
$arr_Medico_ID = $arr_cita["arr_Medico_ID"];
$arr_FechaMod = $arr_cita["arr_FechaMod"];
$arr_FechaIngreso = $arr_cita["arr_FechaIngreso"];
$arr_FechaSalida = $arr_cita["arr_FechaSalida"];
$arr_Status = $arr_cita["arr_Status"];
$arr_Observaciones = $arr_cita["arr_Observaciones"];

?>

<div class="container">
	<div class="starter-template">
		<br><br><br>
		<div class="row">
			<div class="col">
				<div class="panel panel-default">
					<div class="panel-body">
						<form id="frmCcitas" action="validarCodeCitas.php" method="POST" role="form">
							<legend><center>Consulta de Citas</center></legend>
							<table class="table table-bordered table-hover table-responsive-lg">
								<tr class="bg-info text-white">
								   <th><center> Numero <br>Cita </center></th>
								   <th><center> Fecha </center></th>
								   <th><center> Hora </center></th>
								   <th><center> Cliente </center></th>
								   <th><center> Medico </center></th>
								   <th><center> Fecha <br>Modificacion </center></th>
								   <th><center> Fecha <br>Ingreso </center></th>
								   <th><center> Fecha <br>Salida </center></th>
								   <th><center> Status </center></th>
								   <th><center> Observa. </center></th>
								</tr>
								<?php
								$c = 0;
								foreach($arr_Cita_ID as $ncita){
								?>
								<tr>
								   <td><center><a href="MantoCita.php?transaccion=C&Cita_ID=<?php echo $ncita;?>">  <?php echo $ncita;?></a> </center></td>
								   <td>  <?php echo $arr_Fecha[$c];?> </td>
								   <td>  <?php echo $arr_Hora[$c];?></td>
								   <td><center><a href="MantoCliente.php?Cliente_ID=<?php echo $arr_Cliente_ID[$c];?>"><?php echo $arr_Cliente_ID[$c];?></a> </center></td>
								   <td>  <?php echo $arr_Medico_ID[$c];?> </td>
								   <td>  <?php echo $arr_FechaMod[$c];?> </td>
								   <td>  <?php echo $arr_FechaIngreso[$c];?> </td>
								   <td>  <?php echo $arr_FechaSalida[$c];?> </td>
								   <td>  <?php echo $arr_Status[$c];?> </td>
								   <td>  <?php echo $arr_Observaciones[$c];?> </td>
								</tr>
								<?php 
								    ++$c;
								}
								?>
							</table>
							<br><br><br>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

 <?php include "Parciales/footer.php";?>