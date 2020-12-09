<?php include "Parciales/head.php";?>
<?php include "Parciales/menu.php";?>
<div class="container">
	<div class="starter-template">
		<br><br><br>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-body">
						<form id="loginForm" action="validarCode.php" method="POST" role="form">
							<legend>Inicial Sesión</legend>
							<div class="form-group">
								<label for="email">Correo</label>
								<input type="email" name="txtCorreo" class="form-control" id="correo" autofocus="required" placeholder="correo">
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" name="txtPassword" class="form-control" id="password" autofocus="required" placeholder="****">
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