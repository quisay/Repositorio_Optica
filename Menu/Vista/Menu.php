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
									<a class="dropdown-item" href="../../Clientes/MantoMedico.php">Agregar Medicos</a>
									<a class="dropdown-item" href="../../Clientes/ConsultaMedico.php">Consulta Medicos</a>
									<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="../../Clientes/ConsultaUsuario.php">Consulta de Usuarios</a>
									<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="../../Clientes/Mantoimgcarrusel.php">Imagen Carrusel</a>
										<a class="dropdown-item" href="../../Clientes/Mantotxtcarrusel.php">Texto Carrusel</a>
										<a class="dropdown-item" href="../../Clientes/Mantoimgtxtcarrusel.php">Relacion Imagen-Texto Carrusel</a>
										<a class="dropdown-item" href="../../Clientes/Consultaimgtxt.php">Consulta de Carrusel</a>
									
								</div>
								</div>
								<br> <br>
								<div class="btn-group">
									<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Citas
									</button>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="../../Clientes/ConsultaCitas.php">Consulta de Citas</a>
										<a class="dropdown-item" href="../../Clientes/MantoCita.php">Crear Cita</a>
									</div>
								</div>
								<br> <br>
								<div class="btn-group">
									<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Horario
									</button>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="../../rh/ConsultaFechaHorarios.php">Consulta Fecha de Horarios</a>
										<a class="dropdown-item" href="../../rh/MantoFecha.php">Crear Fecha de Horarios</a>
									</div>
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
