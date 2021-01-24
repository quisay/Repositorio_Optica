<?php include "Parciales/head.php";?>
<?php include "Parciales/menu.php";
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include_once "$root/Optica/Controlador/CarruselControlador.php";

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/Optica/login/helps/helps.php";


$resultado = array("estado"=>"true");
$arr_carrusel = CarruselControlador::getAllImgTxt();

$arr_Imagen_ID = $arr_carrusel["arr_Imagen_ID"];
$arr_Texto_ID = $arr_carrusel["arr_Texto_ID"];
$arr_FechaInicial = $arr_carrusel["arr_FechaInicial"];
$arr_FechaFinal = $arr_carrusel["arr_FechaFinal"];
$arr_Prioridad = $arr_carrusel["arr_Prioridad"];

//Obtener Imagen
$Imagenes= CarruselControlador::getAllImagen();
$arr_cat_Imagen_ID = $Imagenes['arr_Imagen_ID'];
$arr_cat_Descripcion = $Imagenes['arr_Descripcion'];

//Obtener Texto
$Textos= CarruselControlador::getAllTexto();
$arr_cat_Texto_ID = $Textos['arr_Texto_ID'];
$arr_cat_Texto = $Textos['arr_Texto'];
?>
<div class="container">
	<div class="starter-template">
		<br><br><br>
		<div class="row">
			<div class="col">
				<div class="panel panel-default">
					<div class="panel-body">
						<form id="frmAimgtxt" action="validarCodeimgtxtcarrusel.php" method="POST" role="form">
							<legend><center>Consulta de Carrusel</center></legend>
							<table class="table table-bordered table-hover table-responsive-lg">
								<tr class="bg-info text-white">
								   <th><center> Imagen </center></th>
								   <th><center> Texto </center></th>
								   <th><center> Fecha Inicial </center></th>
								   <th><center> Fecha Final </center></th>
								   <th><center> Prioridad </center></th>
								   <th><center> Eliminar </center></th>
								</tr>
								<?php
								$c = 0;
								foreach($arr_Imagen_ID as $Imagen){
								?>
								<tr>
								   
								   <td>  							
										<select name="txtImagen_ID<?php echo $c;?>" class="form-control" id="txtImagen_ID" autofocus="" 
												placeholder="Imagen">
								
										<?php 
										$cuenta = 0;
										foreach($arr_cat_Imagen_ID as $Imagen_ID){
											//Esto es la impresion del option
											echo "<option value='".$Imagen_ID."' "; 
											    if($arr_Imagen_ID[$c] == $Imagen_ID){
												   echo " selected ";
											    }
											echo " >".$arr_cat_Descripcion[$cuenta]." </option>";
											++ $cuenta;
										}
										?>
										</select>
								   </td>
								   
								
								   <td>  							
										<select name="txtTexto_ID<?php echo $c;?>" class="form-control" id="txtTexto_ID" autofocus="" 
												placeholder="Texto">
								
										<?php 
										$cuenta = 0;
										foreach($arr_cat_Texto_ID as $Texto_ID){
											echo "<option value='".$Texto_ID."' ";
												if($arr_Texto_ID[$c] == $Texto_ID){
												   echo " selected ";
											    }
											echo ">".$arr_cat_Texto[$cuenta]." </option>";
											++ $cuenta;
										}
										?>
										</select>
								   </td>
								   
								   
								    <td>
									<input type="date" maxlength="20" name="txtFechaInicial<?php echo $c;?>" class="form-control" id="txtFechaInicial" autofocus="" 
								placeholder="FechaInicial" value="<?php echo $arr_FechaInicial[$c]; ?>">  
								   </td>
								
								  
								   
								   
								   <td>
									<input type="date" maxlength="20" name="txtFechaFinal<?php echo $c;?>" class="form-control" id="txtFechaFinal" autofocus="" 
								placeholder="FechaFinal" value="<?php echo $arr_FechaFinal[$c]; ?>">  
								   </td>   
								   
								   <td>
									<input type="number" maxlength="20" name="txtPrioridad<?php echo $c;?>" class="form-control" id="txtPrioridad" autofocus="" 
								placeholder="# Prioridad" value="<?php echo $arr_Prioridad[$c]; ?>">  
								   </td>
								   
								     <td>
									<button type="submit"  class="btn btn-danger" name="borra_<?php echo $c;?>" value="si" >Eliminar</button>
								   </td>
								</tr>
						
								<?php 
								    ++$c;
								}
								?>
								<input type="hidden" name = "cuantos_imgtxt" value="<?php echo $c;?>" >
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