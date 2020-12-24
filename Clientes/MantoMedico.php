<?php 
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include_once "Parciales/head.php";
include_once "Parciales/menu.php";
include_once "$root/Optica/Controlador/MedicoControlador.php";
//include_once "$root/Optica/Controlador/ConfigControlador.php";

$transaccion = isset($_REQUEST['transaccion'])?$_REQUEST['transaccion']:"";
$medico = null;
$Medico_ID = ""; 
$Nombre = ""; 
$Apaterno = "";
$Amaterno = "";   

//Obtener Medico
//$Config_medico= ConfigControlador::getConfig("MEDICO");
//$arr_Descripcion_Medico = $Config_medico['arr_Descripcion'];
//$arr_Catalogo_ID_Medico = $Config_medico['arr_Catalogo_ID'];

if($transaccion=="C"){
   $Medico_ID = $_REQUEST['Medico_ID'];
   $resultado = array("estado"=>"true");
   $medico = MedicoControlador::getMedico($Medico_ID);
   $Nombre = $medico->getNombre();  
   $Apaterno = $medico->getApaterno();
   $Amaterno = $medico->getAmaterno();
   //echo " esto tiene = ".$medico->getMedico_ID();
}
?>
<div class="container">
	<div class="starter-template">
		<br><br><br>
		<div class="row">
			<div class="col">
				<div class="panel panel-default">
					<div class="panel-body">
						<form id="frmAmedico" action="validarCodeMedico.php" method="POST" role="form">
							<legend>Mantenimiento de Medicos</legend>
							
						<div class="col-4"></div>

							
							<div class="form-group row">
								<div class="col-4">
									<label for="medico_ID">Medico_ID</label>
									<input readonly type="text" maxlength="20" name="txtMedico_ID" class="form-control" id="txtMedico_ID" autofocus="" 
									placeholder="Medico_ID" value="<?php echo $Medico_ID; ?>">
								</div>								
							</div>
							
							<div class="form-group row">
								<div class="col">
									<label for="nombre">Nombre</label>
									<input type="text" maxlength="20" name="txtNombre" class="form-control" id="txtNombre" autofocus="" 
									placeholder="Nombre" value="<?php echo $Nombre; ?>">
								</div>								
								<div class="col">
									<label for="apellido paterno">Apellido Paterno</label>
									<input type="text" maxlength="20" name="txtApaterno" class="form-control" id="txtApaterno" autofocus="" 
									placeholder="Apellido Paterno" value="<?php echo $Apaterno; ?>">
								</div>												
								<div class="col">
									<label for="apellido materno">Apellido Materno</label>
									<input type="text" maxlength="20" name="txtAmaterno" class="form-control" id="txtAmaterno" autofocus="" 
									placeholder="Apellido Materno" value="<?php echo $Amaterno;?>">
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