    <div class="alert alert-success" role="alert">
		<h4 class="alert-heading">Bienvenido <?php echo $_SESSION['Nombre'];?></h4>
		<p>Registra los siguiente datos personales del Primer Ejecutivo.</p>
		<p class="mb-0">Fecha de Ingreso: <?php echo date("Y-m-d");?></p>
		<hr>
		<div class="card">
			<div class="card-header">
				REGISTRO DE DATOS
			</div>
			<div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputId">Ci:</label>
                        <input type="text" class="form-control" id="inputId" name="Id" value=<?php echo $_SESSION["IdUser"];?>>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputNombres">Nombre(s):</label>
                        <input type="text" class="form-control" id="inputNombres" placeholder="Ingrese su nombre" name="Nombre" value="<?php echo $nombre;?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputApellidos">Apellido(s)</label>
                        <input type="text" class="form-control" id="inputApellidos" placeholder="Ingrese su apellido" name="Apellido" value="<?php echo $apellidos;?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="inputCI">Cédula de Identidad:</label>
                        <input type="text" class="form-control" id="inputCI" placeholder="Ingrese su CI" name="CI" value="<?php echo $ci;?>">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputFechaNac">Fecha de Nacimiento:</label>
                        <input type="date" class="form-control" id="inputFechaNac" name="FechaNac" value="<?php echo $fechaNac;?>">
                    </div>
                </div>
			</div>
		</div>
	</div>