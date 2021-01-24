<?php include "Parciales/head.php";?>
<?php include "Parciales/menu.php";
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include_once "$root/Optica/Controlador/MedicoControlador.php";

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/Optica/login/helps/helps.php";


$resultado = array("estado"=>"true");
$arr_medico = MedicoControlador::getAllMedico();

$arr_Medico_ID = $arr_medico["arr_Medico_ID"];
$arr_Nombre = $arr_medico["arr_Nombre"];
$arr_Apaterno = $arr_medico["arr_Apaterno"];
$arr_Amaterno = $arr_medico["arr_Amaterno"];


?>
<div class="container">
	<div class="starter-template">
		<br><br><br>
		<div class="row">
			<div class="col">
				<div class="panel panel-default">
					<div class="panel-body">
						<form id="frmAmedico" action="validarCodeConsultaMedico.php" method="POST" role="form">
							<legend><center>Consulta de Medicos</center></legend>
							<table class="table table-bordered table-hover table-responsive-lg">
								<tr class="bg-info text-white">
								   <th><center> Medico </center></th>
								   <th><center> Nombre </center></th>
								   <th><center> Apaterno </center></th>
								   <th><center> Amaterno </center></th>
								</tr>
								<?php
								$c = 0;
								foreach($arr_Medico_ID as $Medico){
								?>
								<tr>
								   
								   <td>  							
										<input readonly name="txtMedico_ID<?php echo $c;?>" class="form-control" id="txtMedico_ID" autofocus="" 
												placeholder="Medico_ID" value="<?php echo $arr_Medico_ID[$c]; ?>">
								
										
								   </td>
								   
								
								   <td>  							
										<input type="text" maxlength="20" name="txtNombre<?php echo $c;?>" class="form-control" id="txtNombre" autofocus="" 
								placeholder="Nombre" value="<?php echo $arr_Nombre[$c]; ?>">  
								   </td>
								   
								   
								    <td>
									<input type="text" maxlength="20" name="txtApaterno<?php echo $c;?>" class="form-control" id="txtApaterno" autofocus="" 
								placeholder="Apellido Paterno" value="<?php echo $arr_Apaterno[$c]; ?>">  
								   </td>
								
								   
								   
								   <td>
									<input type="text" maxlength="20" name="txtAmaterno<?php echo $c;?>" class="form-control" id="txtAmaterno" autofocus="" 
								placeholder="Apellido Materno" value="<?php echo $arr_Amaterno[$c]; ?>">  
								   </td>
								   
								     <td>
									<button type="submit"  class="btn btn-danger" name="borra_<?php echo $c;?>" value="si">Eliminar</button>
								   </td>
								</tr>
						
								<?php 
								    ++$c;
								}
								?>
								<input type="hidden" name = "cuantos_medicos" value="<?php echo $c;?>" >
							</table>
							
							<button type="submit" class="btn btn-success" name="guarda" value="si">Guardar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

 <?php include "Parciales/footer.php";?>