<div class="container"><!se crea el cuadro para trabajar>

    <form action="<?php echo BASE_URL ?>usuario/insert_or_update_users" id="form_guardar_usuario" method="post" class="form-horizontal"><!empieza el formulario del usuario>

        <div class="row"><!se crea una fila para trabajar>       

            <div class="col-md-12"><!la fila que se creo tendra dos columnas aqui creo la primera columna>            

                <h2>Registrar usuario</h2>            

                <input type="hidden" name="id_usuario" id="id_usuario" value=""/><!este input invisible es para validar el tipo de accion que se realizara insertar o modificar>

                <div class="col-xs-3">
                    <label for="identificacion">Identificación</label>
                    <input type="number" name="identificacion" id="identificacion" class="form-control" placeholder="Identificación">
                </div>                                                               

                <div class="col-xs-3">
                    <label for="nombres">Nombres</label>
                    <input type="text" name="nombres" id="nombres" class="form-control" placeholder="Nombres">
                </div>

                <div class="col-xs-3">
                    <label for="apellidos">Apellidos</label>                    
                    <input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="Apellidos">                    
                </div>

                <div class="col-xs-3">
                    <label for="direccion">Dirección </label>                    
                    <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Dirección">                    
                </div>

                <div class="col-xs-3">
                    <label for="telefono">Telefono</label>                    
                    <input type="number" name="telefono" id="telefono" class="form-control" placeholder="Telefono">                    
                </div>

                <div class="col-xs-3">
                    <label for="celular">Celular</label>                    
                    <input type="number" name="celular" id="celular" class="form-control" placeholder="Celular">                    
                </div>

                <div class="col-xs-3">
                    <label for="barrio">Barrio</label>                    
                    <input type="text" name="barrio" id="barrio" class="form-control"  placeholder="Barrio">                    
                </div>

                <div class="col-xs-3">
                    <label for="email">Correo electronico</label>                    
                    <input type="email" name="email" id="email" class="form-control" placeholder="Correo Electronico">                    
                </div>

                <div class="col-xs-3">
                    <label for="estado_cuenta">Estado cuenta</label>                    
                    <select class="form-control" name="estado_cuenta" id="estado_cuenta">
                        <option value="activado">Activada</option>
                        <option value="desactivado">Desactivada</option>
                    </select>                    
                </div>               

                <div class="col-xs-3">
                    <label for="tipo_cuenta">Tipo de cuenta</label>                    
                    <select class="form-control" name="tipo_cuenta" id="tipo_cuenta">                        
                        <option value="usuario">Usuario</option>
                        <option value="administrador">Administrador</option>
                    </select>                    
                </div>

            </div>                         

        </div>  

        <hr />

        <div class="row">

            <div class="col-md-12">

                <h4>Perfiles que puede desempeñar</h4>    

                <?php foreach ($this->perfil as $key => $value): ?>
                    <label><input type="checkbox" name="perfiles[]" value="<?php echo $value['Id'] ?>"> <?php echo $value['Nombre'] ?></label>
                <?php endforeach; ?>  

            </div>

        </div>  

        <br />

        <button type="submit" id="btn_guardar_usuario" class="btn btn-primary">Guardar</button>

    </form><!se termina el primer formulario>                        

    <hr />    

    <div class="col-md-12"><!se crea otra columna para que los mensajes queden debajo>

        <div id="successUsuario" class="alert alert-success"><!mensaje que aparecera si se registra correctamente> 

        </div>            

        <div id="errorUsuario" class="alert alert-danger"><!mensaje que aparecera si no se registra>

        </div>

    </div>

    <hr />

</div>    

<div class="container"><!--se crea otra fila para trabajar-->

    <div class="col-md-12"><!empieza la segunda columna>

        <h2>Consultar usuario</h2>

        <form action="<?php echo BASE_URL ?>usuario/consultar_usuario" id="form_consultar_usuario" 
        data-url-reset-password="<?php echo BASE_URL ?>usuario/reset_password"
        data-url-profiles="<?php echo BASE_URL ?>usuario/get_perfiles_usuario"
        method="post"><!formulario para consultar usuarios>                

            <div class="col-xs-5">
                <input type="text" name="parametro_usuario1" id="parametro_usuario1" class="form-control" placeholder="Identificación, Nombres, Apellidos, Barrio, Correo Electronico">
            </div>

            <button type="submit" id="btn_consultar_usuario" class="btn btn-primary">
                Consultar
            </button>
        </form>

    </div>                            

    <hr />       

    <div class="col-md-12">
        <div id="errorUsuarioConsulta" class="alert alert-danger">
        </div>
    </div>

    <div class="table-responsive"><!tabla donde se listaran los resultados de las consultas>
        <table id="tabla_usuarios" class ="table table-bordered table-hover"   style ="display: none">
            <thead>                    
                <th class="success">Identificación</th>
                <th class="success">Nombres</th>
                <th class="success">Apellidos</th>
                <th class="hidden">Direccion</th>
                <th class="success">Telefono</th>
                <th class="success">Celular</th>
                <th class="success">Correo</th>                    
                <th class="success">Perfiles</th>        
                <th class="success">Contraseña</th>        
                <th class="success">Modificar</th>
            </thead>
            <tbody>
                <!Aqui iran los resultados de las consultas>
            </tbody>
        </table>  
    </div>

</div>