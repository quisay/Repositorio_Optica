<?php include "Parciales/head.php";?>
<?php include "Parciales/menu.php";
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include_once "$root/Optica/Controlador/ConfigControlador.php";

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/Optica/Controlador/UsuarioControlador.php";
include "$root/Optica/login/helps/helps.php";

//Obtener Status
$Config_status= ConfigControlador::getConfig("STATUS");
$arr_Descripcion_Status = $Config_status['arr_Descripcion'];
$arr_Catalogo_ID_Status = $Config_status['arr_Catalogo_ID'];

//Obtener Privilegio
$Config_privilegio= ConfigControlador::getConfig("PRIVILEGIO");
$arr_Descripcion_Privilegio = $Config_privilegio['arr_Descripcion'];
$arr_Catalogo_ID_Privilegio = $Config_privilegio['arr_Catalogo_ID'];

$resultado = array("estado"=>"true");
$arr_usuario = UsuarioControlador::getAllUsuarios();

$arr_Correo = $arr_usuario["arr_Correo"];
$arr_Password = $arr_usuario["arr_Password"];
$arr_Status = $arr_usuario["arr_Status"];
$arr_Privilegio = $arr_usuario["arr_Privilegio"];
$arr_FechaReg = $arr_usuario["arr_FechaReg"];
$arr_Cliente_ID = $arr_usuario["arr_Cliente_ID"];
?>
<div class="container">
	<div class="starter-template">
		<br><br><br>
		<div class="row">
			<div class="col">
				<div class="panel panel-default">
					<div class="panel-body">
						<form id="frmAusuario" action="validarCodeUsuario.php" method="POST" role="form">
							<legend><center>Consulta de Usuario</center></legend>
							<table class="table table-bordered table-hover table-responsive-lg">
								<tr class="bg-info text-white">
								   <th><center> Correo </center></th>
								   <th><center> Password </center></th>
								   <th><center> Estatus </center></th>
								   <th><center> Privilegio </center></th>
								   <th><center> Fecha Registro </center></th>
								   <th><center> No. Cliente </center></th>
								</tr>
								<?php
								$c = 0;
								foreach($arr_Cliente_ID as $cliente_id){
								?>
								<tr>
								   <td><input type="text" maxlength="50" name="txtCorreo<?php echo $c;?>" class="form-control" id="txtCorreo" autofocus="" 
								placeholder="Correo" value="<?php echo $arr_Correo[$c]; ?>">  </td>
								   <td>  <input type="text" maxlength="50" name="txtPassword<?php echo $c;?>" class="form-control" id="txtPassword" autofocus="" 
								placeholder="Password" value="<?php echo $arr_Password[$c]; ?>">  </td>
								   <td>  
																	
										<select name="txtStatus<?php echo $c;?>" class="form-control" id="txtStatus" autofocus="" 
												placeholder="Status">
								
										<?php 
										$cuenta = 0;
										foreach($arr_Catalogo_ID_Status as $Catalogo_ID){
											//Esto es la impresion del option
											echo "<option value='".$Catalogo_ID."' "; 
											    if($arr_Status[$c] == $Catalogo_ID){
												   echo " selected ";
											    }
											echo " >".$arr_Descripcion_Status[$cuenta]." </option>";
											++ $cuenta;
										}
										?>
										</select>
								   </td>
								   <td>  
																	
										<select name="txtPrivilegio<?php echo $c;?>" class="form-control" id="txtPrivilegio" autofocus="" 
												placeholder="Privilegio">
								
										<?php 
										$cuenta = 0;
										foreach($arr_Catalogo_ID_Privilegio as $Catalogo_ID){
											echo "<option value='".$Catalogo_ID."' ";
												if($arr_Privilegio[$c] == $Catalogo_ID){
												   echo " selected ";
											    }
											echo ">".$arr_Descripcion_Privilegio[$cuenta]." </option>";
											++ $cuenta;
										}
										?>
										</select>
								   </td>
								   <td>  <?php echo $arr_FechaReg[$c];?> </td>
								   <td><center><a href="MantoCliente.php?transaccion=C&Cliente_ID=<?php echo $arr_Cliente_ID[$c];?>">  <?php echo $arr_Cliente_ID[$c];?></a> </center></td>
								</tr>
								<input type="hidden" name = "txtCliente_ID<?php echo $c;?>" value="<?php echo $arr_Cliente_ID[$c];?>" >
								<input type="hidden" name = "txtFechaReg<?php echo $c;?>" value="<?php echo $arr_FechaReg[$c];?>" >
								<?php 
								    ++$c;
								}
								?>
								<input type="hidden" name = "cuantos_usuarios" value="<?php echo $c;?>" >
							</table>
							
							<button type="submit" class="btn btn-success">Guardar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

 <?php include "Parciales/footer.php";?>