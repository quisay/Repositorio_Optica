<?php include "Parciales/head.php";?>
<?php include "Parciales/menu.php";?>
<br><br>
<div class="container">
	<div class="starter-template">
		<br><br><br>
		<div class="row">
			
			<div class="panel panel-default">
				<div class="panel-body">
					
						<form id="frmMenu" action="validarCode.php" method="POST" role="form">
							<legend>Menu Principal</legend>
							<br>
							<div class="col-md-4 col-md-offset-4">
								<div class="btn-group">
								<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Clientes/Usuarios
								</button>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="../../Clientes/ConsultaCliente.php">Consulta de Clientes</a>
									<a class="dropdown-item" href="../../Clientes/MantoCliente.php">Agregar Clientes</a>
									<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="../../Clientes/ConsultaUsuario.php">Consulta de Usuarios</a>
									
									</div>
								</div>
								<br> <br>
								<div class="btn-group">
								<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Citas
								</button>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="../../Clientes/ConsultaCita.php">Consulta de Citas</a>
									<a class="dropdown-item" href="../../Clientes/MantoCita.php">Crear Cita</a>
								</div>
							</div>
						</form>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
<br><br><br><br><br><br>
 <?php include "Parciales/footer.php";?>