<?php include "Parciales/head.php";?>
<?php include "Parciales/menu.php";?>
<div class="container">
	<div class="starter-template">
		<br><br><br>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-body">
						<form  action="registroCode.php" method="POST" role="form">
							<legend>Registro de Usuario</legend>

							<div class="form-group">
								<label for="email">Correo</label>
								<input type="email" name="txtCorreo" class="form-control" id="correo" autofocus="required" placeholder="Ingresa tu direccion de e-mail">
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" name="txtPassword" class="form-control" id="password" autofocus="required" placeholder="****">
							</div>
							<div class="form-group">
								<label for="paterno">Ap. Paterno</label>
								<input type="text" name="txtPaterno" class="form-control" id="paterno" autofocus="required" placeholder="Ingresa tu Apellido Paterno">
							</div>
							<div class="form-group">
								<label for="materno">Ap. Materno</label>
								<input type="text" name="txtMaterno" class="form-control" id="materno" autofocus="required" placeholder="Ingresa tu Apellido Materno">
							</div>
							<div class="form-group">
								<label for="nombre">Nombre</label>
								<input type="text" name="txtNombre" class="form-control" id="nombre" autofocus="required" placeholder="Ingresa tu(s) nombre(s)">
							</div>

							<button type="submit" class="btn btn-success">Ingresar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

 <?php include "Parciales/footer.php";?>