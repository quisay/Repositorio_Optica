<?php include "Parciales/head.php";?>
<?php include "Parciales/menu.php";

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/Optica/Controlador/ClienteControlador.php";
include "$root/Optica/login/helps/helps.php";

$resultado = array("estado"=>"true");
$arr_clientes = ClienteControlador::getAllCliente();

$arr_Edad = $arr_clientes["arr_Edad"];

$arr_Cliente_ID = $arr_clientes["arr_Cliente_ID"];
$arr_Tipo = $arr_clientes["arr_Tipo"];
$arr_Nombre = $arr_clientes["arr_Nombre"];
$arr_Apaterno = $arr_clientes["arr_Apaterno"];
$arr_Amaterno = $arr_clientes["arr_Amaterno"];
$arr_RFC = $arr_clientes["arr_RFC"];
$arr_CURP = $arr_clientes["arr_CURP"];
$arr_Direccion = $arr_clientes["arr_Direccion"];
$arr_Calle = $arr_clientes["arr_Calle"];
$arr_correo = $arr_clientes["arr_Correo"];
$arr_Colonia = $arr_clientes["arr_Colonia"];
$arr_Municipio = $arr_clientes["arr_Municipio"];
$arr_Estado = $arr_clientes["arr_Estado"];
$arr_CP = $arr_clientes["arr_CP"];
$arr_Numinterior = $arr_clientes["arr_Numinterior"];
$arr_Numexterior = $arr_clientes["arr_Numexterior"];
$arr_Fechanacimiento = $arr_clientes["arr_Fechanacimiento"];
$arr_Sexo = $arr_clientes["arr_Sexo"];
$arr_Ocupacion = $arr_clientes["arr_Ocupacion"];
$arr_Hobby = $arr_clientes["arr_Hobby"];
$arr_Estadocivil = $arr_clientes["arr_Estadocivil"];
$arr_Telcasa = $arr_clientes["arr_Telcasa"];
$arr_Teloficina = $arr_clientes["arr_Teloficina"];
$arr_Celular = $arr_clientes["arr_Celular"];
$arr_FechaReg = $arr_clientes["arr_FechaReg"];
$arr_Status = $arr_clientes["arr_Status"];

?>

<div class="container">
	<div class="starter-template">
		<br><br><br>
		<div class="row">
			<div class="col">
				<div class="panel panel-default">
					<div class="panel-body">
						<form id="frmAcliente" action="validarCode.php" method="POST" role="form">
							<legend><center>Consulta de Clientes</center></legend>
							<table class="table table-bordered table-hover table-responsive-lg">
								<tr class="bg-info text-white">
								   <th><center> Numero Cliente </center></th>
								   <th><center> Nombre </center></th>
								   <th><center> Correo </center></th>
								   <th><center> Historial Clinico </center></th>
								</tr>
								<?php
								$c = 0;
								foreach($arr_Nombre as $nombre){
								?>
								<tr>
								   <td><center><a href="MantoCliente.php?transaccion=C&Cliente_ID=<?php echo $arr_Cliente_ID[$c];?>">  <?php echo $arr_Cliente_ID[$c];?></a> </center></td>
								   <td>  <?php echo $nombre. " " .$arr_Apaterno[$c]. " " .$arr_Amaterno[$c];?></td>
								   <td>  <?php echo $arr_correo[$c];?> </td>
								   <td><center><a href="Clinico.php?Cliente_ID=<?php echo $arr_Cliente_ID[$c];?>">Ver Clinico</a> </center></td>
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