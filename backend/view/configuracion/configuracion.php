<div class="container">

    <div class="row">

        <h2>Configuraciones</h2>

        <hr>

        <div class="col-md-1"></div><!Primera columna>

        <div class="col-md-5"><!Segunda columna>
            <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#tipo_evento_modal">Tipo de evento</button>
            <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#caracter_evento_modal">Carácter del evento</button>
            <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#ingreso_evento_modal">Ingreso al evento</button>
            <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#sistema_control_ingreso_aforo_modal">Sistema para control de ingreso y aforo</button>
            <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#caracterizacion_publico_participa_modal">Caracterización del publico que participa</button>
        </div>

        <div class="col-md-5"><!Tercera columna>
            <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#lugar_evento_modal">Lugar del evento</button>
            <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#ubicacion_asistente_modal">Ubicacion de los asistentes</button>            
            <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#cargo_modal">Cargos</button>
            <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#perfil_modal">Perfiles</button>
            <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#presentacion_modal">Presentaciones</button>
        </div>

    </div>
</div>

<!aqui comienzan los modal>

<!-- 1 Tipo_evento_modal-->       
<div class="modal fade" id="tipo_evento_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Tipo de evento</h4>
            </div>

            <div class="row">
                <div class ="col-md-12"><!Primera columna>
                    <div class="modal-body">

                        <form action="<?php echo BASE_URL ?>configuracion/insertar_modificar_tipo_evento" id="form_guardar_tipo_evento" class="form-inline">

                            <input type="hidden" name="id_tipo_evento" id="id_tipo_evento" value="">

                            <div class="form-group">
                                <label class="control-label">Nombre</label>
                                <input type="text" name="nombre_tipo_evento" id="nombre_tipo_evento" class="form-control" placeholder="Nombre">
                            </div>

                            <div class="form-group">
                                <label class="control-label">Estado</label>
                                <select class="form-control" name="estado_tipo_evento" id="estado_tipo_evento">
                                    <option value="activado">Activado</option>
                                    <option value="desactivado">Desactivado</option>
                                </select> 
                            </div>

                            <button type="submit" id="btn_guardar_tipo_evento" class="btn btn-primary margen">Guardar</button>

                        </form>

                        <hr />

                        <div id="successTipoEvento" class="alert alert-success"><!mensaje que aparecera si se registra correctamente> 
                        </div>                        

                        <div id="errorTipoEvento" class="alert alert-danger"><!mensaje que aparecera si no se registra>
                        </div>

                        <hr />

                        <div class="table-responsive"><!tabla donde se listaran los resultados de las consultas>
                            <table class="table table-bordered table-hover" id="tabla_tipo_evento" data-url="<?php echo BASE_URL ?>configuracion/configuration_consult">
                                <thead>                                                                        
                                <th class="success">Id</th>
                                <th class="success">Tipo de evento</th>
                                <th class="success">Estado</th>
                                <th class="success">Modificar</th>                                                                     
                                </thead>
                                <tbody>
                                    <!Aqui iran los resultados de las consultas>
                                </tbody>
                            </table>
                        </div>


                    </div><!-- /.modal-content -->
                </div>
            </div>
        </div>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- 2 Modal caracter_evento_modal-->
<div class="modal fade" id="caracter_evento_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Carácter del evento</h4>
            </div>

            <div class="row">
                <div class ="col-md-12">
                    <div class="modal-body">

                        <form action="<?php echo BASE_URL ?>configuracion/insertar_modificar_caracter_evento" id="form_guardar_caracter_evento" class="form-inline">

                            <input type="hidden" name="id_caracter_evento" id="id_caracter_evento" value="">

                            <div class="form-group">
                                <label class="control-label">Nombre</label>
                                <input type="text" name="nombre_caracter_evento" id="nombre_caracter_evento" class="form-control" placeholder="Nombre">
                            </div>

                            <div class="form-group">
                                <label class="control-label">Estado</label>
                                <select class="form-control" name="estado_caracter_evento" id="estado_caracter_evento">
                                    <option value="activado">Activado</option>
                                    <option value="desactivado">Desactivado</option>
                                </select> 
                            </div>

                            <button type="submit" id="btn_guardar_caracter_evento" class="btn btn-primary margen">Guardar</button>

                        </form>

                        <hr />

                        <div id="successCaracterEvento" class="alert alert-success"><!mensaje que aparecera si se registra correctamente> 
                        </div>                        

                        <div id="errorCaracterEvento" class="alert alert-danger"><!mensaje que aparecera si no se registra>
                        </div>

                        <hr />

                        <div class="table-responsive"><!tabla donde se listaran los resultados de las consultas>
                            <table class="table table-bordered table-hover" id="tabla_caracter_evento" data-url="<?php echo BASE_URL ?>configuracion/configuration_consult">
                                <thead>
                                <th class="success">Id</th>                                    
                                <th class="success">Caracter de evento</th>
                                <th class="success">Estado</th>
                                <th class="success">Modificar</th>                                    
                                </thead>
                                <tbody>
                                    <!Aqui iran los resultados de las consultas>
                                </tbody>
                            </table>
                        </div>                        

                    </div><!-- /.modal-content -->
                </div>
            </div>
        </div>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- 3 ingreso_evento_modal-->
<div class="modal fade" id="ingreso_evento_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Ingreso al evento</h4>
            </div>

            <div class="row">
                <div class ="col-md-12">
                    <div class="modal-body">

                        <form action="<?php echo BASE_URL ?>configuracion/insertar_modificar_ingreso_evento" id="form_guardar_ingreso_evento" class="form-inline">

                            <input type="hidden" name="id_ingreso_evento" id="id_ingreso_evento" value="">

                            <div class="form-group">
                                <label class="control-label">Nombre</label>
                                <input type="text" name="nombre_ingreso_evento" id="nombre_ingreso_evento" class="form-control" placeholder="Nombre">
                            </div>

                            <div class="form-group">
                                <label class="control-label">Estado</label>
                                <select class="form-control" name="estado_ingreso_evento" id="estado_ingreso_evento">
                                    <option value="activado">Activado</option>
                                    <option value="desactivado">Desactivado</option>
                                </select> 
                            </div>

                            <button type="submit" id="btn_guardar_ingreso_evento" class="btn btn-primary margen">Guardar</button>

                        </form>

                        <hr />

                        <div id="successIngresoEvento" class="alert alert-success"><!mensaje que aparecera si se registra correctamente>                             
                        </div>                        

                        <div id="errorIngresoEvento" class="alert alert-danger"><!mensaje que aparecera si no se registra>                            
                        </div>

                        <hr />

                        <div class="table-responsive"><!tabla donde se listaran los resultados de las consultas>
                            <table class ="table table-bordered table-hover" id="tabla_ingreso_evento" data-url="<?php echo BASE_URL ?>configuracion/configuration_consult">
                                <thead>
                                <th class="success">Id</th>                                    
                                <th class="success">Ingreso de evento</th>
                                <th class="success">Estado</th>
                                <th class="success">Modificar</th>                                    
                                </thead>
                                <tbody>
                                    <!Aqui iran los resultados de las consultas>
                                </tbody>
                            </table>
                        </div>

                    </div><!-- /.modal-content -->
                </div>
            </div>
        </div>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- 4 sistema_control_ingreso_aforo_modal-->
<div class="modal fade" id="sistema_control_ingreso_aforo_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Sistema para control de ingreso y aforo</h4>
            </div>

            <div class="row">
                <div class ="col-md-12">
                    <div class="modal-body">

                        <form action="<?php echo BASE_URL ?>configuracion/insertar_modificar_sistema_control_ingreso_aforo" id="form_guardar_sistema_control_ingreso_aforo" class="form-inline">

                            <input type="hidden" name="id_sistema_control_ingreso_aforo" id="id_sistema_control_ingreso_aforo" value="">

                            <div class="form-group">
                                <label class="control-label">Nombre</label>
                                <input type="text" name="nombre_sistema_control_ingreso_aforo" id="nombre_sistema_control_ingreso_aforo" class="form-control" placeholder="Nombre">
                            </div>

                            <div class="form-group">
                                <label class="control-label">Estado</label>
                                <select class="form-control" name="estado_sistema_control_ingreso_aforo" id="estado_sistema_control_ingreso_aforo">
                                    <option value="activado">Activado</option>
                                    <option value="desactivado">Desactivado</option>
                                </select> 
                            </div>

                            <button type="submit" id="btn_guardar_sistema_control_ingreso_aforo" class="btn btn-primary margen">Guardar</button>

                        </form>

                        <hr />

                        <div id="successSistemaControl" class="alert alert-success"><!mensaje que aparecera si se registra correctamente>

                        </div>                        

                        <div id="errorSistemaControl" class="alert alert-danger"><!mensaje que aparecera si no se registra>

                        </div>   

                        <hr />


                        <div class="table-responsive"><!tabla donde se listaran los resultados de las consultas>
                            <table class="table table-bordered table-hover" id="tabla_sistema_control_ingreso_aforo" data-url="<?php echo BASE_URL ?>configuracion/configuration_consult">
                                <thead>
                                <th class="success">Id</th>                                    
                                <th class="success">Sistema de control</th>
                                <th class="success">Estado</th>
                                <th class="success">Modificar</th>                                    
                                </thead>
                                <tbody>
                                    <!Aqui iran los resultados de las consultas>
                                </tbody>
                            </table>
                        </div>


                    </div><!-- /.modal-content -->
                </div>
            </div>
        </div>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- 5 caracterizacion_publico_participa_modal-->
<div class="modal fade" id="caracterizacion_publico_participa_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Caracterización del publico que participa</h4>
            </div>

            <div class="row">
                <div class ="col-md-12">
                    <div class="modal-body">

                        <form action="<?php echo BASE_URL ?>configuracion/insertar_modificar_caracterizacion_evento" id="form_guardar_caracterizacion_publico_participa" class="form-inline">

                            <input type="hidden" name="id_caracterizacion_publico_participa" id="id_caracterizacion_publico_participa" value="">

                            <div class="form-group">
                                <label class="control-label">Nombre</label>
                                <input type="text" name="nombre_caracterizacion_publico_participa" id="nombre_caracterizacion_publico_participa" class="form-control" placeholder="Nombre">
                            </div>

                            <div class="form-group">
                                <label class="control-label">Estado</label>
                                <select class="form-control" name="estado_caracterizacion_publico_participa" id="estado_caracterizacion_publico_participa">
                                    <option value="activado">Activado</option>
                                    <option value="desactivado">Desactivado</option>
                                </select> 
                            </div>

                            <button type="submit" id="btn_guardar_caracterizacion_publico_participa" class="btn btn-primary margen">Guardar</button>

                        </form>

                        <hr />

                        <div id="successCaracterizacionEvento" class="alert alert-success"><!mensaje que aparecera si se registra correctamente>

                        </div>                        

                        <div id="errorCaracterizacionEvento" class="alert alert-danger"><!mensaje que aparecera si no se registra>

                        </div>

                        <hr />

                        <div class="table-responsive"><!tabla donde se listaran los resultados de las consultas>
                            <table id="tabla_caracterizacion_evento" data-url="<?php echo BASE_URL ?>configuracion/configuration_consult" class ="table table-bordered table-condensed">
                                <thead>
                                <th class="success">Id</th>                                    
                                <th class="success">Caracterización de evento</th>
                                <th class="success">Estado</th>
                                <th class="success">Modificar</th>                                    
                                </thead>
                                <tbody>
                                    <!Aqui iran los resultados de las consultas>
                                </tbody>
                            </table>
                        </div>                        

                    </div><!-- /.modal-content -->
                </div>
            </div>
        </div>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- 6 lugar_evento_modal-->
<div class="modal fade" id="lugar_evento_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Lugar del evento</h4>
            </div>

            <div class="row">
                <div class ="col-md-12">
                    <div class="modal-body">

                        <form action="<?php echo BASE_URL ?>configuracion/insertar_modificar_lugar_evento" id="form_guardar_lugar_evento" class="form-inline">

                            <input type="hidden" name="id_lugar_evento" id="id_lugar_evento" value="">

                            <div class="form-group">
                                <label class="control-label">Nombre</label>
                                <input type="text" name="nombre_lugar_evento" id="nombre_lugar_evento" class="form-control" placeholder="Nombre">
                            </div>

                            <div class="form-group">
                                <label class="control-label">Estado</label>
                                <select class="form-control" name="estado_lugar_evento" id="estado_lugar_evento">
                                    <option value="activado">Activado</option>
                                    <option value="desactivado">Desactivado</option>
                                </select> 
                            </div>

                            <button type="submit" id="btn_guardar_lugar_evento" class="btn btn-primary margen">Guardar</button>

                        </form>

                        <hr />

                        <div id="successLugarEvento" class="alert alert-success"><!mensaje que aparecera si se registra correctamente>

                        </div>                        

                        <div id="errorLugarEvento" class="alert alert-danger"><!mensaje que aparecera si no se registra>

                        </div>

                        <hr />

                        <center>
                            <div class="table-responsive"><!tabla donde se listaran los resultados de las consultas>
                                <table class="table table-bordered table-hover" data-url="<?php echo BASE_URL ?>configuracion/configuration_consult" id="tabla_lugar_evento">
                                    <thead>
                                    <th class="success">Id</th>                                    
                                    <th class="success">Lugar de evento</th>
                                    <th class="success">Estado</th>
                                    <th class="success">Modificar</th>                                    
                                    </thead>
                                    <tbody>
                                        <!Aqui iran los resultados de las consultas>
                                    </tbody>
                                </table>
                            </div>
                        </center>

                    </div><!-- /.modal-content -->
                </div>
            </div>
        </div>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- 7 ubicacion_asistente_modal-->
<div class="modal fade" id="ubicacion_asistente_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Ubicación de los asistentes</h4>
            </div>

            <div class="row">
                <div class ="col-md-12">
                    <div class="modal-body">

                        <form action="<?php echo BASE_URL ?>configuracion/insertar_modificar_ubicacion_asistente" id="form_guardar_ubicacion_asistente" class="form-inline">

                            <input type="hidden" name="id_ubicacion_asistente" id="id_ubicacion_asistente" value="">

                            <div class="form-group">
                                <label class="control-label">Nombre</label>
                                <input type="text" name="nombre_ubicacion_asistente" id="nombre_ubicacion_asistente" class="form-control" placeholder="Nombre">
                            </div>

                            <div class="form-group">
                                <label class="control-label">Estado</label>
                                <select class="form-control" name="estado_ubicacion_asistente" id="estado_ubicacion_asistente">
                                    <option value="activado">Activado</option>
                                    <option value="desactivado">Desactivado</option>
                                </select> 
                            </div>

                            <button type="submit" id="btn_guardar_ubicacion_asistente" class="btn btn-primary margen">Guardar</button>

                        </form>

                        <hr />

                        <div id="successUbicacionAsistente" class="alert alert-success"><!mensaje que aparecera si se registra correctamente>

                        </div>                        

                        <div id="errorUbicacionAsistente" class="alert alert-danger"><!mensaje que aparecera si no se registra>

                        </div>

                        <hr />

                        <center>
                            <div class="table-responsive"><!tabla donde se listaran los resultados de las consultas>
                                <table class="table table-bordered table-hover" data-url="<?php echo BASE_URL ?>configuracion/configuration_consult" id="tabla_ubicacion_asistente">
                                    <thead>
                                    <th class="success">Id</th>                                    
                                    <th class="success">Ubicación</th>
                                    <th class="success">Estado</th>
                                    <th class="success">Modificar</th>                                    
                                    </thead>
                                    <tbody>
                                        <!Aqui iran los resultados de las consultas>
                                    </tbody>
                                </table>
                            </div>
                        </center>

                    </div><!-- /.modal-content -->
                </div>
            </div>
        </div>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- 8 Modal cargos_modal-->
<div class="modal fade" id="cargo_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Cargos</h4>
            </div>

            <div class="row">
                <div class ="col-md-12">
                    <div class="modal-body">

                        <form action="<?php echo BASE_URL ?>configuracion/insertar_modificar_cargo" id="form_guardar_cargo" class="form-inline">

                            <input type="hidden" name="id_cargo" id="id_cargo" value="">

                            <div class="form-group">
                                <label class="control-label">Nombre</label>
                                <input type="text" name="nombre_cargo" id="nombre_cargo" class="form-control" placeholder="Cargo">
                            </div>

                            <div class="form-group">
                                <label class="control-label">Estado</label>
                                <select class="form-control" name="estado_cargo" id="estado_cargo">
                                    <option value="activado">Activado</option>
                                    <option value="desactivado">Desactivado</option>
                                </select> 
                            </div>

                            <button type="submit" id="btn_guardar_cargo" class="btn btn-primary margen">Guardar</button>

                        </form>

                        <hr />

                        <div id="successCargo" class="alert alert-success"><!mensaje que aparecera si se registra correctamente> 

                        </div>                        

                        <div id="errorCargo" class="alert alert-danger"><!mensaje que aparecera si no se registra>

                        </div>

                        <hr />

                        <center>
                            <div class="table-responsive"><!tabla donde se listaran los resultados de las consultas>
                                <table id="tabla_cargo" data-url="<?php echo BASE_URL ?>configuracion/configuration_consult" class ="table table-bordered table-hover">
                                    <thead>
                                    <th class="success">Id</th>                                    
                                    <th class="success">Cargo</th>
                                    <th class="success">Estado</th>
                                    <th class="success">Modificar</th>                                    
                                    </thead>
                                    <tbody>
                                        <!Aqui iran los resultados de las consultas>
                                    </tbody>
                                </table>
                            </div>
                        </center>
                    </div><!-- /.modal-content -->
                </div>
            </div>
        </div>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- 9 perfil_modal-->
<div class="modal fade" id="perfil_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Perfiles</h4>
            </div>

            <div class="row">
                <div class ="col-md-12">
                    <div class="modal-body">

                        <form action="<?php echo BASE_URL ?>configuracion/insertar_modificar_perfil" id="form_guardar_perfil" class="form-inline">

                            <input type="hidden" name="id_perfil" id="id_perfil" value="">

                            <div class="form-group">
                                <label class="control-label">Nombre</label>
                                <input type="text" name="nombre_perfil" id="nombre_perfil" class="form-control" placeholder="Nombre">
                            </div>

                            <div class="form-group">
                                <label class="control-label">Estado</label>
                                <select class="form-control" name="estado_perfil" id="estado_perfil">
                                    <option value="activado">Activado</option>
                                    <option value="desactivado">Desactivado</option>
                                </select> 
                            </div>

                            <button type="submit" id="btn_guardar_perfil" class="btn btn-primary margen">Guardar</button>

                        </form>

                        <hr />

                        <div id="successPerfil" class="alert alert-success"><!mensaje que aparecera si se registra correctamente>

                        </div>                        

                        <div id="errorPerfil" class="alert alert-danger"><!mensaje que aparecera si no se registra>

                        </div>

                        <hr />

                        <center>
                            <div class="table-responsive"><!tabla donde se listaran los resultados de las consultas>
                                <table class="table table-bordered table-hover" data-url="<?php echo BASE_URL ?>configuracion/configuration_consult" id="tabla_perfil">
                                    <thead>
                                    <th class="success">Id</th>                                    
                                    <th class="success">Perfil</th>
                                    <th class="success">Estado</th>
                                    <th class="success">Modificar</th>                                    
                                    </thead>
                                    <tbody>
                                        <!Aqui iran los resultados de las consultas>
                                    </tbody>
                                </table>
                            </div>
                        </center>

                    </div><!-- /.modal-content -->
                </div>
            </div>
        </div>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- 10 presentacion_modal-->
<div class="modal fade" id="presentacion_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Presentaciones</h4>
            </div>

            <div class="row">
                <div class ="col-md-12">
                    <div class="modal-body">

                        <form action="<?php echo BASE_URL ?>configuracion/insertar_modificar_presentacion" id="form_guardar_presentacion" class="form-inline">

                            <input type="hidden" name="id_presentacion" id=" id_presentacion" value="">

                            <div class="form-group">
                                <label class="control-label">Nombre</label>
                                <input type="text" name="nombre_presentacion" id="nombre_presentacion" class="form-control" placeholder="Nombre">
                            </div>

                            <div class="form-group">
                                <label class="control-label">Estado</label>
                                <select class="form-control" name="estado_presentacion" id="estado_presentacion">
                                    <option value="activado">Activado</option>
                                    <option value="desactivado">Desactivado</option>
                                </select> 
                            </div>

                            <button type="submit" id="btn_guardar_presentacion" class="btn btn-primary margen">Guardar</button>

                        </form>

                        <hr />

                        <div id="successPresentacion" class="alert alert-success"><!mensaje que aparecera si se registra correctamente>

                        </div>                        

                        <div id="errorPresentacion" class="alert alert-danger"><!mensaje que aparecera si no se registra>

                        </div>

                        <hr />

                        <center>
                            <div class="table-responsive"><!tabla donde se listaran los resultados de las consultas>
                                <table class="table table-bordered table-hover" data-url="<?php echo BASE_URL ?>configuracion/configuration_consult" id="tabla_Presentacion">
                                    <thead>
                                    <th class="success">Id</th>                                    
                                    <th class="success">Presentacion</th>
                                    <th class="success">Estado</th>
                                    <th class="success">Modificar</th>                                    
                                    </thead>
                                    <tbody>
                                        <!Aqui iran los resultados de las consultas>
                                    </tbody>
                                </table>
                            </div>
                        </center>

                    </div><!-- /.modal-content -->
                </div>
            </div>
        </div>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->