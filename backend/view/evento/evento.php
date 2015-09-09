<div class="container">

    <form action="<?php echo BASE_URL ?>evento/insertar_evento" id="event_form" class="form-horizontal"  method="post"><!empieza el formulario del evento>                

        <div class="row"><!se crea el espacio para trabajar, una fila> 

            <h2>Registrar evento</h2>                                      

            <div class="col-md-12"><!primera>               

                <div class="col-xs-3">
                    <label for="nombre_evento">Nombre de evento</label>                    
                    <input type="text" name="nombre_evento" id="nombre_evento" class="form-control" placeholder="Nombre de evento">                    
                </div>

                <div class="col-xs-3">
                    <label for="capacidad_area">Capacidad del area</label>                    
                    <input type="number" name="capacidad_area" id="capacidad_area" class="form-control" placeholder="Capacidad del area">
                </div>

                <div class="col-xs-3">
                    <label>Aforo esperado</label>                    
                    <input type="number" name="aforo_esperado" id="aforo_esperado" class=" form-control" placeholder="Aforo esperado">
                </div>

                <div class="col-xs-3">
                    <label>Lugar de evento</label>   
                    <select class="form-control" name="lugar_evento" id="lugar_evento">
                        <?php foreach ($this->lugar_evento as $key => $value): ?>
                            <option value="<?php echo $value['Id'] ?>"><?php echo $value['Nombre'] ?></option>
                        <?php endforeach; ?>
                    </select>                    
                </div>

                <div class="col-xs-3">
                    <label>Fecha de inicio</label>                    
                    <input type="date" name="fecha_inicial" id="fecha_inicial" class=" form-control" placeholder="Fecha de inicio">
                </div>

                <div class="col-xs-3">
                    <label>Hora de inicio</label>                    
                    <input type="time" name="hora_inicial" id="hora_inicial" class=" form-control" placeholder="Hora de inicio">
                </div>

                <div class="col-xs-3">
                    <label>Carácter de evento</label>                    
                    <select class="form-control" name="caracter_evento" id="caracter_evento">
                        <?php foreach ($this->caracter_evento as $key => $value): ?>
                            <option value="<?php echo $value['Id'] ?>"><?php echo $value['Nombre'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-xs-3">
                    <label>Ingreso al evento</label>                    
                    <select class="form-control" name="ingreso_evento" id="ingreso_evento">
                        <?php foreach ($this->ingreso_evento as $key => $value): ?>
                            <option value="<?php echo $value['Id'] ?>"><?php echo $value['Nombre'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-xs-3">
                    <label>fecha de fin</label>                    
                    <input type="date" name="fecha_final" id="fecha_final" class="form-control" placeholder="fecha de fin">
                </div>

                <div class="col-xs-3">
                    <label>Hora de fin</label>                    
                    <input type="time" name="hora_final" id="hora_final" class="form-control" placeholder="Hora de fin">
                </div>

                <div class="col-xs-3">
                    <label>Sistema para control de ingreso</label>                    
                    <select class="form-control" name="sistema_control_ingreso_aforo" id="sistema_control_ingreso_aforo">
                        <?php foreach ($this->sistema_control_ingreso_aforo as $key => $value): ?>
                            <option value="<?php echo $value['Id'] ?>"><?php echo $value['Nombre'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>  

                <div class="col-xs-3">
                    <label>Tipo de evento</label>                    
                    <select class="form-control" name="tipo_evento" id="tipo_evento">
                        <?php foreach ($this->tipo_evento as $key => $value): ?>
                            <option value="<?php echo $value['Id'] ?>"><?php echo $value['Nombre'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>  

                <div class="col-xs-3">
                    <label>Estado</label>                    
                    <select class="form-control" name="estado_evento" id="estado_evento">
                        <option value="activado">Activado</option>
                        <option value="desactivado">Desactivado</option>
                    </select>
                </div>  

            </div>

        </div>

        <hr />

        <div class="row">

            <div class="col-md-6"><!primera>

                <h4>Recurso humano para el evento</h4> 

                <label>Cantidad</label>

                <?php foreach ($this->perfil as $key => $value): ?>

                    <div class="form-group">
                        <label for="<?php echo $value['Nombre'] ?>" class="control-label"><?php echo $value['Nombre'] ?></label>
                        <div class="col-xs-4">
                            <input type="text" class="form-control" name="recurso_humano_<?php echo $value['Id'] ?>" placeholder="Cantidad" value="0">
                        </div>
                    </div>                                       
                <?php endforeach; ?>
            </div>

            <div class="col-md-6"><!primera>

                <h4>Ubicación de los asistentes y cantidad</h4>

                <label>Cantidad</label>

                <?php foreach ($this->ubicacion_asistente as $key => $value): ?>

                    <div class="form-group">
                        <label for="<?php echo $value['Nombre'] ?>" class="control-label"><?php echo $value['Nombre'] ?></label>
                        <div class="col-xs-4">
                            <input type="text" class="form-control" name="ubicacion_asistente_<?php echo $value['Id'] ?>" placeholder="Cantidad" value="0">                            
                        </div>
                    </div>                                       
                <?php endforeach; ?>
            </div>  

            <div class="col-md-6">
                <div id="cargos_persona_empresa">
                    <h4>Personas involucradas y cargos asignados</h4>
                    <div class="col-md-12"><!primera>  

                        <div class="col-xs-5">
                            <label>Cargo</label>   
                            <select class="form-control" name="cargo[]" id="persona_cargo">                            
                                <?php foreach ($this->cargo as $key => $value): ?>
                                    <option value="<?php echo $value['Id'] ?>"><?php echo $value['Nombre'] ?></option>                                                                                                                
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-xs-5">
                            <label>Persona o empresa</label>  
                            <select class="form-control" name="persona_empresa[]" id="persona_empresa">
                                <?php foreach ($this->persona_empresa as $key => $value): ?>
                                    <option value="<?php echo $value['Id_Personas_Involucradas'] ?>"><?php echo $value['Nombre'] ?></option>                                                                                                                
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-xs-2">
                            <label>&nbsp;</label>  
                            <button type="button" class="btn btn-default form-control add"><span class="glyphicon glyphicon-plus-sign"></span></button>
                        </div>
                    </div>

                </div>
            </div> 

            <div class="col-md-6"><!primera>

                <h4>Caracterización del publico que participa</h4>

                <?php foreach ($this->caracterizacion_publico_participa as $key => $value): ?>
                    <label><input type="checkbox" name="caracterizacion[]" value="<?php echo $value['Id'] ?>"> <?php echo $value['Nombre'] ?> </label><br />
                <?php endforeach; ?>  
            </div>

        </div>

        <hr />

        <button type="submit" id="buttonSaveEvent" class="btn btn-primary">Guardar</button>

    </form>

    <hr />

    <div class="col-md-12"><!la columna para los mensajes>      

        <div id="successEvento" class="alert alert-success"><!mensaje que aparecera si se registra correctamente> 

        </div>

        <div id="errorEvento" class="alert alert-danger"><!mensaje que aparecera si no se registra>

        </div>

    </div>

    <hr />

</div><!se terminal la primer columna>

<div class="container">

    <div class="col-md-12"><!empieza la segunda columna>            

        <h2>Consultar evento</h2>

        <form action="<?php echo BASE_URL ?>evento/consultar_evento" id="form_consultar_evento" method="post"><!formulario para consultar el medicamento>


            <div class="col-xs-3"> 
                <label>Nombre o lugar</label>
                <input type="text" name="parametro_evento1" id="parametro_evento1" class="form-control" placeholder="Nombre, lugar">
            </div>

            <div class="col-xs-3">                
                <label>Fecha incial</label>
                <input type="date" name="parametro_evento2" id="parametro_evento2" class="form-control" placeholder="Nombre de evento">
            </div>

            <div class="col-xs-3">           
                <label>Fecha final</label>
                <input type="date" name="parametro_evento3" id="parametro_evento3" class="form-control" placeholder="Nombre de evento">
            </div>

            <button type="submit" id="btn_consultar_evento" class="btn btn-primary margen">Consultar</button>

        </form><!se termina el formulario de consultar>            

    </div><!se termina la segunda columna>

    <hr />

    <div class="col-sm-12">
        <div class="table-responsive">
            <table id ="tabla_eventos" class="table table-bordered table-hover" data-url-base="<?php echo BASE_URL ?>"><!tabla donde se listaran los usuarios>
                <thead>                

                <th class="success">Nombre</th>
                <th class="success">Inicio</th>
                <th class="success">Final</th>
                <th class="success">Lugar</th>
                <th class="success">Capacidad</th>                                
                <th class="success">Aforo</th>
                <th class="success">Estado</th>
                <th class="success">Modificar</th>
                <th class="success">Detalle</th>

                </thead>
                <tbody>

                </tbody>
            </table>

        </div>

        <div id="errorEventoConsulta" class="alert alert-info"><!mensaje que aparecera si no se registra>

        </div>

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-event" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form name="frmDetail" id="frmDetail" data-url="<?php echo BASE_URL.'evento/inOrUpDetails'?>">
            <input type="hidden" name="eventId" id="eventId" value="" />
            
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title text-center" id="myModalLabel">Medicamentos/Utensilios, herramientas y voluntarios</h4>
                </div>
                <div class="modal-body">
                    <div class="container">

                        <div class="row" id="selectMediUten">

                        </div>
                       
                        <hr/>
                        
                        <div class="row" id="selectHerramientas">

                        </div>
                        
                        <hr/>

                        <div class="row" id="selectVoluntarios">

                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <input type="hidden" name="clicked" id="clicked" value="off" />
                    <button type="submit" name="saveEventDetail" class="btn btn-primary">Guardar</button>
                </div>

                <div class="alert alert-danger" id="alert-error-detail-event">

                </div>

                <div class="alert alert-success" id="alert-success-detail-event">
                   
                </div>
            </div>
        </form>
    </div>
</div>