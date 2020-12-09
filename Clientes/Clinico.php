<?php 
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include_once "Parciales/head.php";
include_once "Parciales/menu.php";
include_once "$root/Optica/Controlador/ClienteControlador.php";
include_once "$root/Optica/Controlador/ConfigControlador.php";
include_once "$root/Optica/Controlador/ClienteConfigControlador.php";

$transaccion = isset($_REQUEST['transaccion'])?$_REQUEST['transaccion']:"";
$cliente = null;
$Nombre = ""; 
$Apaterno = "";
$Amaterno = "";   
$arr_app_Config_ID = null;
$arr_apo_Config_ID = null;
$arr_ahf_Config_ID = null;

//Obtener APP
$Config_app= ConfigControlador::getConfig("APP");
$arr_Descripcion_app = $Config_app['arr_Descripcion'];
$arr_Catalogo_ID_app = $Config_app['arr_Catalogo_ID'];
//Obtener APO
$Config_apo= ConfigControlador::getConfig("APO");
$arr_Descripcion_apo = $Config_apo['arr_Descripcion'];
$arr_Catalogo_ID_apo = $Config_apo['arr_Catalogo_ID'];

//Obtener AHF
$Config_ahf= ConfigControlador::getConfig("AHF");
$arr_Descripcion_ahf = $Config_ahf['arr_Descripcion'];
$arr_Catalogo_ID_ahf = $Config_ahf['arr_Catalogo_ID'];
$Cliente_ID = "";

$maxima_config = count($arr_Catalogo_ID_app);
if($maxima_config<count($arr_Catalogo_ID_apo)) $maxima_config=count($arr_Catalogo_ID_apo);
if($maxima_config<count($arr_Catalogo_ID_ahf)) $maxima_config=count($arr_Catalogo_ID_ahf);

if(isset($_REQUEST['Cliente_ID'])){
   $Cliente_ID = $_REQUEST['Cliente_ID'];
   $resultado = array("estado"=>"true");
   $cliente = ClienteControlador::getCliente($Cliente_ID);
   $Nombre = $cliente->getNombre();  
   $Apaterno = $cliente->getApaterno();
   $Amaterno = $cliente->getAmaterno();
   
   $arr_app = ClienteConfigControlador::getConfig($Cliente_ID, "APP");
   $arr_app_Config_ID = $arr_app['arr_Config_ID'];  
   $arr_app_Observacion = $arr_app['arr_Observacion'];  
   
   $arr_apo = ClienteConfigControlador::getConfig($Cliente_ID, "APO");
   $arr_apo_Config_ID = $arr_apo['arr_Config_ID']; 
   $arr_apo_Observacion = $arr_apo['arr_Observacion'];
   
   $arr_ahf = ClienteConfigControlador::getConfig($Cliente_ID, "AHF");
   $arr_ahf_Config_ID = $arr_ahf['arr_Config_ID']; 
   $arr_ahf_Observacion = $arr_ahf['arr_Observacion'];    
   
   //print_r($arr_app_Observacion);
}

?>
<div class="container">
	<div class="starter-template">
		<br><br><br>
		<div class="row">
			<div class="col">
				<div class="panel panel-default">
					<div class="panel-body">
						<form id="frmAClinico" action="validarCodeClinico.php" method="POST" role="form">
							<legend><center>Clinico</center></legend>
							<table class="table table-bordered table-responsive-lg">
								<tr class="bg-info text-white">
								   <th><center> AHF </center></th>
								   <th><center> Observaciones </center></th>
								   <th><center> APP </center></th>
								   <th><center> Observacion </center></th>
								   <th><center> APO </center></th>
								   <th><center> Observacion </center></th>
								</tr>
							    <input type="hidden" name = "Cliente_ID" value = "<?php echo $Cliente_ID; ?>">
							    <center><label><?php echo $Cliente_ID . " - ". $Nombre." ".$Apaterno." ".$Amaterno;?></label></center>
							
							     
								<tr>
								<!-- un solo for para obtener el total de filas -->
							    <td><div>
								<?php
								for($i=1;$i<=$maxima_config;++$i){
									$check_ahf = "";
									$check_app = "";
									$check_apo = "";
									//Obtenemos la descripcion de nuestro catalogo ahf
									$descripcion_ahf = isset($arr_Descripcion_ahf[$i-1])?$arr_Descripcion_ahf[$i-1]:"";
									$observacion_ahf = isset($arr_ahf_Observacion[$i])?$arr_ahf_Observacion[$i]:"";

									if($arr_ahf_Config_ID!=null){
									   //Obtenemos la clave o indice donde se encuntra el elemento a identificar de nuestro array
									   $clave = array_search($i, $arr_ahf_Config_ID);
									   if(trim($clave)!=""){
										  $check_ahf="checked";
										  
									   }
									}
									
									$descripcion_app = isset($arr_Descripcion_app[$i-1])?$arr_Descripcion_app[$i-1]:"";
									$observacion_app = isset($arr_app_Observacion[$i])?$arr_app_Observacion[$i]:"";
									
									if($arr_app_Config_ID!=null){
									   //Obtenemos la clave o indice donde se encuntra el elemento a identificar de nuestro array
									   $clave = array_search($i, $arr_app_Config_ID);
									   if(trim($clave)!=""){
										  $check_app="checked";
										  
									   }
									}
									
									$descripcion_apo = isset($arr_Descripcion_apo[$i-1])?$arr_Descripcion_apo[$i-1]:"";
									$observacion_apo = isset($arr_apo_Observacion[$i])?$arr_apo_Observacion[$i]:"";
									
									
									if($arr_apo_Config_ID!=null){
									   //Obtenemos la clave o indice donde se encuntra el elemento a identificar de nuestro array
									   $clave = array_search($i, $arr_apo_Config_ID);
									   if(trim($clave)!=""){
										  $check_apo="checked";
										  
									   }
									}
								?>
									<tr class="bg-info text-white"> 
									
									<td>
									<?php 
									if($descripcion_ahf!=""){
									?>
									 <input type="checkbox" name="AHF<?php echo $i;?>" <?php echo $check_ahf ?>  >   <?php echo $descripcion_ahf; ?>	
									 <?php
								    }
									 ?>
									<td>
									<?php 
									if($descripcion_ahf!=""){
									?>
									 <textarea name="Observacion_AHF<?php echo $i;?>" cols="20" rows="1"><?php echo $observacion_ahf; ?></textarea>
									 <?php
								    }
									 ?>
									 
									 
									 
									<td>
									<?php 
									if($descripcion_app!=""){
									?>
									 <input type="checkbox" name="APP<?php echo $i;?>" <?php echo $check_app ?>  >   <?php echo $descripcion_app; ?>	
									 <?php
								    }
									 ?>
									<td>
									<?php 
									if($descripcion_app!=""){
									?>
									 <textarea name="Observacion_APP<?php echo $i;?>" cols="20" rows="1"><?php echo $observacion_app; ?></textarea>
									 <?php
								    }
									?>
									
									
																		<td>
									<?php 
									if($descripcion_apo!=""){
									?>
									 <input type="checkbox" name="APO<?php echo $i;?>" <?php echo $check_apo ?>  >   <?php echo $descripcion_apo; ?>	
									 <?php
								    }
									 ?>
									<td>
									<?php 
									if($descripcion_apo!=""){
									?>
									 <textarea name="Observacion_APO<?php echo $i;?>" cols="20" rows="1"><?php echo $observacion_apo; ?></textarea>
									 <?php
								    }
									 ?>
									
								<?php	
								}
								?>
								</tr>
								
								
								
							
							</table>

							<center><button type="submit" class="btn btn-success">Guardar</button></center>
							<input type="hidden" name="maxima_config" value="<?php echo $maxima_config;?>">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

 <?php include "Parciales/footer.php";?>