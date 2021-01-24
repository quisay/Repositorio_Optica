<?php include "Parciales/head.php";?>
<?php include "Parciales/menu.php";

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/Optica/Controlador/HorarioControlador.php";


$resultado = array("estado"=>"true");
$extra = " Order by Horario, Horario_ID ";
$arr_horario = HorarioControlador::getAllHorario($extra);


$arr_Horario_ID = $arr_horario["arr_Horario_ID"];
$arr_Descripcion = $arr_horario["arr_Descripcion"];
$arr_Dia = $arr_horario["arr_Dia"];
$arr_Hora = $arr_horario["arr_Hora"];
$arr_Medico_ID = $arr_horario["arr_Medico_ID"];
$arr_FechaMod = $arr_horario["arr_FechaMod"];
$arr_Usuario = $arr_horario["arr_Usuario"];

print_r($arr_Descripcion);

?>

<div class="container">
	<div class="starter-template">
		<br><br><br>
		<div class="row">
			<div class="col">
				<div class="panel panel-default">
					<div class="panel-body">
						<form id="frmChorario" action="validarCodeHorario.php" method="POST" role="form">
							<legend><center>Consulta de Horario</center></legend>
							<table class="table table-bordered table-hover table-responsive-lg">
								<tr class="bg-info text-white">
								   <th><center> Horario </center></th>
								   <th><center> Fecha </center></th>
								   <th><center> Hora </center></th>
								   <th><center> Medico </center></th>
								   <th><center> Semana </center></th>
								   <th><center> Fecha <br>Modificacion </center></th>
								</tr>
								<?php
								$c = 0;
								if(isset($arr_horario_ID)){
									foreach($arr_horario_ID as $nhorario){
									?>
									<tr>
									<td><center><a href="MantoHorario.php?transaccion=C&Horario_ID=<?php echo $nhorario;?>&Fecha=<?php echo $arr_Fecha[$c];?>">  <?php echo $nhorario;?></a> </center></td>
									<td>  <?php echo $arr_Fecha[$c];?> </td>
									<td>  <?php
											$arr_Hora[$c] = str_pad($arr_Hora[$c],4,"0",STR_PAD_LEFT);
											$arr_Hora[$c] = substr($arr_Hora[$c],0,2) . ":".substr($arr_Hora[$c],2,2);								   
											echo $arr_Hora[$c];
											?>
									</td>
									<td><center><a href="MantoHorario.php?transaccion=C&Horario_ID=<?php echo $arr_Horario_ID[$c];?>"><?php echo $arr_Horario_ID[$c];?></a> </center></td>
									<td>  <?php echo $arr_Horario_ID[$c];?> </td>
									<td>  <?php echo $arr_Fecha[$c];?> </td>
									<td>  <?php echo $arr_Hora[$c];?> </td>
									<td>  <?php echo $arr_Semana[$c];?> </td>
									<td>  <?php echo $arr_FechaMod[$c];?> </td>
									<td>  <?php echo $arr_Medico_ID[$c];?> </td>
									</tr>
									<?php 
										++$c;
									}
								}else{
									echo "<legend><center>No existen Datos</center></legend>";
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