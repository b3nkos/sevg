<?php //var_dump($this->success);exit;?>
<div class="container" style="margin-top:1em">

	<div class="row">
		<div class="col-lg-4 col-lg-offset-4">

	    <?php if(isset($this->success) && $this->success && count($this->errors) == 0 ):?>
	        <div class = "message success">
	        		<div id="success-message-profile" class="alert alert-success text-center">
	            	<p>Registro realizado correctamente</p>
	        		</div>
	        </div>
	    <?php elseif( isset($this->success) && $this->success == false && count($this->errors) > 0):?>
	    	<div id="error-message-profile" class="alert alert-danger text-center">
	    		<?php foreach($this->errors as $key => $value):?>
	    			<p><?php echo $value?></p>
	    		<?php endforeach;?>
	    	</div>
	    <?php endif;?>      

		</div>
	</div>

	<div class="row">
		<div class="col-lg-4 col-lg-offset-4">
			<form class="form-horizontal" role="form" method="post" 
			action=" <?php echo BASE_URL.'usuario/profile'?>" id="form-profile">

				<div class="form-group">
					<label for="identificacion" class="col-sm-3 control-label">Identificación</label>
					<div class="col-sm-8">
						<input type="text" name="Profile[identificacion]" class="form-control" id="identificacion"
						value="<?php echo $this->data['Identificacion'] ?>">
					</div>
				</div>

				<div class="form-group">
					<label for="nombre" class="col-sm-3 control-label">Nombre</label>
					<div class="col-sm-8">
						<input type="text" name="Profile[nombre]" class="form-control" id="nombre"
						value="<?php echo $this->data['Nombres'] ?>">
					</div>
				</div>

				<div class="form-group">
					<label for="apellido" class="col-sm-3 control-label">Apellido</label>
					<div class="col-sm-8">
						<input type="text" name="Profile[apellido]" class="form-control" id="apellido"
						value="<?php echo $this->data['Apellidos'] ?>">
					</div>
				</div>

				<div class="form-group">
					<label for="email" class="col-sm-3 control-label">Email</label>
					<div class="col-sm-8">
						<input type="email" name="Profile[email]" class="form-control" id="email"
						value="<?php echo $this->data['Email'] ?>">
					</div>
				</div>

				<div class="form-group">
					<label for="direccion" class="col-sm-3 control-label">Dirección</label>
					<div class="col-sm-8">
						<input type="text" name="Profile[direccion]" class="form-control" id="direccion"
						value="<?php echo $this->data['Direccion'] ?>">
					</div>
				</div>

				<div class="form-group">
					<label for="telefono" class="col-sm-3 control-label">Teléfono</label>
					<div class="col-sm-8">
						<input type="text" name="Profile[telefono]" class="form-control" id="telefono"
						value="<?php echo $this->data['Telefono'] ?>">
					</div>
				</div>

				<div class="form-group">
					<label for="celular" class="col-sm-3 control-label">Celular</label>
					<div class="col-sm-8">
						<input type="text" name="Profile[celular]" class="form-control" id="celular"
						value="<?php echo $this->data['Celular'] ?>">
					</div>
				</div>

				<div class="form-group">
					<label for="barrio" class="col-sm-3 control-label">Barrio</label>
					<div class="col-sm-8">
						<input type="text" name="Profile[barrio]" class="form-control" id="barrio"
						value="<?php echo $this->data['Barrio'] ?>">
					</div>
				</div>

				<div class="form-group">
					<label for="password" class="col-sm-3 control-label">Contraseña</label>
					<div class="col-sm-8">
						<input type="password" name="Profile[password]" class="form-control" id="password">
					</div>
				</div>

				<div class="form-group">
					<label for="repassword" class="col-sm-3 control-label">Repetir contraseña</label>
					<div class="col-sm-8">
						<input type="password" name="Profile[repassword]" class="form-control" id="repassword">
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-10">
						<button type="submit" class="btn btn-default">Confirmar</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>