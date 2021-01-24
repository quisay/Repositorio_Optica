<?php 
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include_once "Parciales/head.php";
include_once "Parciales/menu.php";
include_once "$root/Optica/Controlador/ClienteControlador.php";
include_once "$root/Optica/Controlador/ConfigControlador.php";

$transaccion = isset($_REQUEST['transaccion'])?$_REQUEST['transaccion']:"";
$cliente = null;
$Nombre = ""; 
$Apaterno = "";
$Amaterno = "";   
$RFC = "";
$CURP = "";
$Direccion = "";
$Calle = "";
$Colonia = "";
$Municipio = "";
$Estado = "";
$CP = "";
$Numinterior = "";
$Numexterior = "";
$Fechanacimiento = "";
$Sexo = "";
$Ocupacion = "";
$Hobby = "";
$Estadocivil = "";
$Telcasa = "";
$Teloficina = "";
$Celular = "";
$Correo = "";
$FechaReg = "";
$Edad = "";
$Status = "";

//Obtener Sexo
$Config_sexo= ConfigControlador::getConfig("SEXO");
$arr_Descripcion_Sexo = $Config_sexo['arr_Descripcion'];
$arr_Catalogo_ID_Sexo = $Config_sexo['arr_Catalogo_ID'];
//Obtener Status
$Config_status= ConfigControlador::getConfig("STATUS");
$arr_Descripcion_Status = $Config_status['arr_Descripcion'];
$arr_Catalogo_ID_Status = $Config_status['arr_Catalogo_ID'];

//Obtener Tipo de Cliente
$Config_tipo= ConfigControlador::getConfig("TIPO");
$arr_Descripcion_Tipo = $Config_tipo['arr_Descripcion'];
$arr_Catalogo_ID_Tipo = $Config_tipo['arr_Catalogo_ID'];

if($transaccion=="C"){
   $Cliente_ID = $_REQUEST['Cliente_ID'];
   $resultado = array("estado"=>"true");
   $cliente = ClienteControlador::getCliente($Cliente_ID);
   $Nombre = $cliente->getNombre();  
   $Apaterno = $cliente->getApaterno();
   $Amaterno = $cliente->getAmaterno();
   $RFC = $cliente->getRFC();
   $CURP = $cliente->getCURP();
   $Direccion = $cliente->getDireccion();
   $Calle = $cliente->getCalle();
   $Colonia = $cliente->getColonia();
   $Municipio = $cliente->getMunicipio();
   $Estado = $cliente->getEstado();
   $CP = $cliente->getCP();
   $Numinterior = $cliente->getNuminterior();
   $Numexterior = $cliente->getNumexterior();
   $Fechanacimiento = $cliente->getFechanacimiento();
   $Sexo = $cliente->getSexo();
   $Ocupacion = $cliente->getOcupacion();
   $Hobby = $cliente->getHobby();
   $Estadocivil = $cliente->getEstadocivil();
   $Telcasa = $cliente->getTelcasa();
   $Teloficina = $cliente->getTeloficina();
   $Celular = $cliente->getCelular();
   $Correo = $cliente->getCorreo();
   $FechaReg = $cliente->getFechaReg();
   $Edad = $cliente->getEdad();
   $Status = $cliente->getStatus();
   //echo " esto tiene = ".$cliente->getCliente_ID();
}
?>
<div class="container">
	<div class="starter-template">
		<br><br><br>
		<div class="row">
			<div class="col">
				<div class="panel panel-default">
					<div class="panel-body">
						<form id="frmAcliente" action="validarCode.php" method="POST" role="form">
							<legend>Mantenimiento de Clientes</legend>
							
						<div class="col-4">
							<div class="form-group row">Tipo de Cliente
								<select name="txtTipo" class="form-control" id="txtTipo" autofocus="" 
								     placeholder="Tipo">
										 <?php 
										$cuenta = 0;
										foreach($arr_Catalogo_ID_Tipo as $Catalogo_ID){
											echo "<option value='".$Catalogo_ID."'>".$arr_Descripcion_Tipo[$cuenta]." </option>";
											++ $cuenta;
										}
										?>
								</select>
							</div>
						</div>

						
							<div class="form-group row">
								<div class="col">
									<label for="nombre">Nombre</label>
									<input type="text" maxlength="20" name="txtNombre" class="form-control" id="txtNombre" autofocus="" 
									placeholder="Nombre" value="<?php echo $Nombre; ?>" required>
								</div>								
								<div class="col">
									<label for="apellido paterno">Apellido Paterno</label>
									<input type="text" maxlength="20" name="txtApaterno" class="form-control" id="txtApaterno" autofocus="" 
									placeholder="Apellido Paterno" value="<?php echo $Apaterno; ?>" required>
								</div>												
								<div class="col">
									<label for="apellido materno">Apellido Materno</label>
									<input type="text" maxlength="20" name="txtAmaterno" class="form-control" id="txtAmaterno" autofocus="" 
									placeholder="Apellido Materno" value="<?php echo $Amaterno;?>">
								</div>
							</div>
							
							<div class="form-group row">
								<div class="col">
									<label for="RFC">RFC</label>
									<input type="text" maxlength="13" name="txtRFC" class="form-control" id="txtRFC" autofocus="" 
									placeholder="RFC" value="<?php echo $RFC;?>">  
								</div>
								<div class="col">
									<label for="CURP">CURP</label>
									<input type="text" maxlength="18" name="txtCURP" class="form-control" id="txtCURP" autofocus="" 
									placeholder="CURP" value="<?php echo $CURP;?>">  
								</div>
								<div class="col">
									<label for="fecha de Nacimiento">Fecha de Nacimiento</label>							
									<input type="date" maxlength="10" name="txtFechanacimiento" class="form-control" id="txtFechanacimiento" autofocus="" 
									placeholder="Fecha de Nacimiento" value="<?php echo $Fechanacimiento;?>">
								</div>
								<div class="col">
									<label for="edad">Edad</label>
									<input type="text" maxlength="2" name="txtEdad" class="form-control" id="txtEdad" autofocus="" 
									placeholder="Edad" value="<?php echo $Edad;?>">
								</div>
								<div class="col">
									<label for="sexo">Sexo</label>
									<select name="txtSexo" class="form-control" id="txtSexo" autofocus="" 
								placeholder="Sexo" >
									    <?php 
										$cuenta = 0;
										foreach($arr_Catalogo_ID_Sexo as $Catalogo_ID){
											echo "<option value='".$Catalogo_ID."'>".$arr_Descripcion_Sexo[$cuenta]." </option>";
											++ $cuenta;
										}
										?>
									</select>
								</div>
							</div>
							
							<div class="form-group row">							
								<div class="col">
									<label for="direccion">Direccion</label>
								</div>
							</div>
							<div class="form-group row">
								<div class="col">
									<label for="calle">Calle</label>
									<input type="text" maxlength="25" name="txtCalle" class="form-control" id="txtCalle" autofocus="" 
									placeholder="Calle" value="<?php echo $Calle;?>">
								</div>
								<div class="col">
									<label for="colonia">Colonia</label>
									<input type="text" maxlength="25" name="txtColonia" class="form-control" id="txtColonia" autofocus="" 
									placeholder="Colonia" value="<?php echo $Colonia;?>">
								</div>
								<div class="col">
									<label for="municipio">Municipio</label>
									<input type="text" maxlength="15" name="txtMunicipio" class="form-control" id="txtMunicipio" autofocus="" 
									placeholder="Municipio" value="<?php echo $Municipio;?>">
								</div>
							</div>
							<div class="form-group row">
								<div class="col">
									<label for="estado">Estado</label>								
									<input type="text" maxlength="15" name="txtEstado" class="form-control" id="txtEstado" autofocus="" 
									placeholder="Estado" value="<?php echo $Estado;?>">
								</div>
								<div class="col">
									<label for="cp">CP</label>							
									<input type="text" maxlength="5" name="txtCP" class="form-control" id="txtCP" autofocus="" 
									placeholder="CP" value="<?php echo $CP;?>">
								</div>
								<div class="col">
									<label for="numero Interior">Numero Interior</label>							
									<input type="text" maxlength="5" name="txtNuminterior" class="form-control" id="txtNuminterior" autofocus="" 
									placeholder="Numero Interior" value="<?php echo $Numinterior;?>">
								</div>
								<div class="col">
									<label for="numero exterior">Numero Exterior</label>							
									<input type="text" maxlength="5" name="txtNumexterior" class="form-control" id="txtNumexterior" autofocus="" 
									placeholder="Numero Exterior" value="<?php echo $Numexterior;?>">
								</div>
					
							</div>
							<div class="form-group row">
								<div class="col">
									<label for="ocupacion">Ocupacion</label>
									<input type="text" maxlength="25" name="txtOcupacion" class="form-control" id="txtOcupacion" autofocus="" 
									placeholder="Ocupacion" value="<?php echo $Ocupacion;?>">
								</div>
								<div class="col">
									<label for="hobby">Hobby</label>						
									<input type="text" maxlength="25" name="txtHobby" class="form-control" id="txtHobby" autofocus="" 
									placeholder="Hobby" value="<?php echo $Hobby;?>">
								</div>
								<div class="col">
									<label for="estado Civil">Estado Civil</label>								
									<input type="text" maxlength="10" name="txtEstadocivil" class="form-control" id="txtEstadocivil" autofocus="" 
									placeholder="Estado Civil" value="<?php echo $Estadocivil;?>">
								</div>
								<div class="col">
									<label for="telefono de Casa">Telefono de Casa</label>							
									<input type="text" maxlength="10" name="txtTelcasa" class="form-control" id="txtTelcasa" autofocus="" 
									placeholder="Telefono de Casa" value="<?php echo $Telcasa;?>">
								</div>
								<div class="col">
									<label for="telefono de Oficina">Telefono de Oficina</label>						
									<input type="text" maxlength="10" name="txtTeloficina" class="form-control" id="txtTeloficina" autofocus="" 
									placeholder="Telefono de Oficina" value="<?php echo $Teloficina;?>">
								</div>
								<div class="col">
									<label for="celular">Celular</label>								
									<input type="text" maxlength="10" name="txtCelular" class="form-control" id="txtCelular" autofocus="" 
									placeholder="Celular" value="<?php echo $Celular;?>">
								</div>
							</div>
							<div class="form-group row">
								<div class="col">
									<label for="fecha de Registro">Fecha de Registro</label>
									<input type="text" name="txtFechaReg" class="form-control" id="txtFechaReg" readonly autofocus="" 
									placeholder="Fecha de Registro" value="<?php echo $FechaReg;?>">
								</div>
								<div class="col">
									<label for="status">Status</label>								
									<select name="txtStatus" class="form-control" id="txtStatus" autofocus="" 
									placeholder="Status">
								
										<?php 
										$cuenta = 0;
										foreach($arr_Catalogo_ID_Status as $Catalogo_ID){
											echo "<option value='".$Catalogo_ID."'>".$arr_Descripcion_Status[$cuenta]." </option>";
											++ $cuenta;
										}
										?>
									</select>
										
								</div>
								<div class="col">
									<label for="correo">Correo</label>								
									<input type="text" maxlength="25" name="txtCorreo" class="form-control" id="txtCorreo" autofocus="" 
									placeholder="Correo" value="<?php echo $Correo;?>">
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