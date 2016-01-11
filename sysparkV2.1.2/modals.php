
<!-- modal de login -->
<div class="modal fade bs-example-modal-sm" id='login' tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<center><h2>Login</h2>
				<form role="form" method="POST" action="return false" onsubmit="return false">
					<div class="form-group">
						<div id="resultado"></div>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="CedulaAdmin" id="CedulaAdmin" value="" placeholder="Ingrese su Cédula">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="ClaveAdmin" id="ClaveAdmin" value=""  placeholder="Ingrese la Clave">
					</div>                                    
					<button onclick="Validar(document.getElementById('CedulaAdmin').value, document.getElementById('ClaveAdmin').value);" class="btn btn-primary btn-lg">Enviar</button>
				</form>
				<h5>Si no tienes la clave <button type="button" class="btn btn-primary" data-toggle="modal" data-dismiss="modal" data-target=".bs-example-modal-lg">Registrate</button></h5>
			</center>
		</div>
	</div>
</div>


<!-- modal de registro -->

<div class="modal fade bs-example-modal-lg" id='registro' tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<center><h3>Ingresa tus datos y registrate...</h3>
				<form role="form-horizontal" method="POST" action="return false" onsubmit="return false">
					<div class="form-group">
						<div id="resp"></div>
					</div>
					<div class="form-group ">
						<label for="CedulaA" class="col-sm-2 control-label">Cedula</label>
						<div class="col-sm-10">
							<input type="text"  class="form-control" name="CedulaA" id="CedulaA" pattern='[0-9]{10,10}' required />                                
						</div>
					</div>
					.
					<div class="form-group">
						<label for="NombreAdmin" class="col-sm-2 control-label">Nombre</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="NombreAdmin" id="NombreAdmin" value="" required />
						</div>
					</div>
					.
					<div class="form-group">
						<label for="ApellidoAdmin" class="col-sm-2 control-label">Apellido</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="ApellidoAdmin" id="ApellidoAdmin" value="" required />
						</div>
					</div>
					.
					<div class="form-group">
						<label for="CorreoAdmin" class="col-sm-2 control-label">Correo</label>
						<div class="col-sm-10">
							<input type="email" class="form-control"  name="CorreoAdmin" id="CorreoAdmin" value="" required />
						</div>
					</div>
					.
					<div class="form-group">
						<label for="TelefonoAdmin" class="col-sm-2 control-label">Telefono</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="TelefonoAdmin" id="TelefonoAdmin" value="" required />
						</div>
					</div>
					.
					<div class="form-group">
						<label for="ClaveA" class="col-sm-2 control-label">Clave</label>
						<div class="col-sm-10">

							<input type="text" class="form-control" name="ClaveA" id="ClaveA" value="" required />
						</div>
					</div>
					

					<input type='submit' onclick="registrar(document.getElementById('CedulaA').value, 
					document.getElementById('NombreAdmin').value, 
					document.getElementById('ApellidoAdmin').value, 
					document.getElementById('CorreoAdmin').value,
					document.getElementById('TelefonoAdmin').value, 
					document.getElementById('ClaveA').value);" class="btn btn-primary btn-lg"/>
				</form>
				<hr>                   
			</center>

		</div>
	</div>
</div>

<!-- modal de cerrar session -->

<div class="modal fade logout" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<center class='s'><h3>Cerrando Sesion...</h3>

			</center>

		</div>
	</div>
</div>

<!-- modal de actualizacion de sitio -->

<div class="modal fade update" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-lg">
		<div class="modal-content" id='res'>              

		</div>
	</div>
</div>
