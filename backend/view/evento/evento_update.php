<?php
//echo "<pre>";
//print_r($this->sciaf);
//exit();
?>
<div class="container">

    <form action="<?php echo BASE_URL ?>evento/insertar_evento" id="eventForm" class="form-horizontal"  method="post"><!empieza el formulario del evento>                
        <input type="hidden" name="event_id" value="<?php echo $this->event[0]['Id_Evento'] ?>" />

        <div class="row"><!se crea el espacio para trabajar, una fila> 

            <h2>Registrar evento</h2>                                      

            <div class="col-md-12"><!primera>               

                <div class="col-xs-3">
                    <label for="nombre_evento">Nombre de evento</label>                    
                    <input type="text" name="nombre_evento" id="nombre_evento" class="form-control" value="<?php echo $this->event[0]['Nombre'] ?>">
                </div>

                <div class="col-xs-3">
                    <label for="capacidad_area">Capacidad del area</label>                    
                    <input type="number" name="capacidad_area" id="capacidad_area" class="form-control" value="<?php echo $this->event[0]['Capacidad'] ?>">
                </div>

                <div class="col-xs-3">
                    <label>Aforo esperado</label>                    
                    <input type="number" name="aforo_esperado" id="aforo_esperado" class=" form-control" value="<?php echo $this->event[0]['Aforo'] ?>">
                </div>

                <div class="col-xs-3">
                    <label>Lugar de evento</label>   
                    <select class="form-control" name="lugar_evento" id="lugar_evento">
                        <?php foreach ($this->lugar_evento as $key => $value): ?>
                            <?php if (in_array($this->lugar_evento_event[0]['Id'], $value)): ?>
                                <option selected="selected" value="<?php echo $value['Id'] ?>"><?php echo $value['Nombre'] ?></option>
                            <?php else: ?>
                                <option value="<?php echo $value['Id'] ?>"><?php echo $value['Nombre'] ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>                    
                </div>

                <div class="col-xs-3">
                    <label>Fecha de inicio</label>                    
                    <input type="date" name="fecha_inicial" id="fecha_inicial" class="form-control" value="<?php echo $this->event[0]['Fecha_Inicial'] ?>">
                </div>

                <div class="col-xs-3">
                    <label>Hora de inicio</label>                    
                    <input type="time" name="hora_inicial" id="hora_inicial" class="form-control" value="<?php echo $this->event[0]['Hora_Inicio'] ?>">
                </div>

                <div class="col-xs-3">
                    <label>Carácter de evento</label>                    
                    <select class="form-control" name="caracter_evento" id="caracter_evento">
                        <?php foreach ($this->caracter_evento as $key => $value): ?>
                            <?php if (in_array($this->caracter_evento_event[0]['Id'], $value)): ?>
                                <option value="<?php echo $value['Id'] ?>" selected="selected"><?php echo $value['Nombre'] ?></option>
                            <?php else: ?>
                                <option value="<?php echo $value['Id'] ?>"><?php echo $value['Nombre'] ?></option>
                            <?php endif; ?>

                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-xs-3">
                    <label>Ingreso al evento</label>                    
                    <select class="form-control" name="ingreso_evento" id="ingreso_evento">
                        <?php foreach ($this->ingreso_evento as $key => $value): ?>
                            <?php if (in_array($this->ingreso_evento_event[0]['Id'], $value)): ?>
                                <option value="<?php echo $value['Id'] ?>" selected="selected"><?php echo $value['Nombre'] ?></option>
                            <?php else: ?>
                                <option value="<?php echo $value['Id'] ?>"><?php echo $value['Nombre'] ?></option>
                            <?php endif; ?>

                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-xs-3">
                    <label>fecha de fin</label>                    
                    <input type="date" name="fecha_final" id="fecha_final" class="form-control" value="<?php echo $this->event[0]['Fecha_Final'] ?>">
                </div>

                <div class="col-xs-3">
                    <label>Hora de fin</label>                    
                    <input type="time" name="hora_final" id="hora_final" class="form-control" value="<?php echo $this->event[0]['Hora_Final'] ?>">
                </div>

                <div class="col-xs-3">
                    <label>Sistema para control de ingreso</label>                    
                    <select class="form-control" name="sistema_control_ingreso_aforo" id="sistema_control_ingreso_aforo">
                        <?php foreach ($this->sistema_control_ingreso_aforo as $key => $value): ?>
                            <?php if (in_array($this->sciaf[0]['Id'], $value)): ?>
                                <option value="<?php echo $value['Id'] ?>" selected="selected"><?php echo $value['Nombre'] ?></option>
                            <?php else: ?>
                                <option value="<?php echo $value['Id'] ?>"><?php echo $value['Nombre'] ?></option>
                            <?php endif; ?>

                        <?php endforeach; ?>
                    </select>
                </div>  

                <div class="col-xs-3">
                    <label>Tipo de evento</label>                    
                    <select class="form-control" name="tipo_evento" id="tipo_evento">
                        <?php foreach ($this->tipo_evento as $key => $value): ?>

                            <?php if (in_array($this->tipo_evento_event[0]['Id'], $value)): ?>
                                <option value="<?php echo $value['Id'] ?>" selected="selected"><?php echo $value['Nombre'] ?></option>
                            <?php else: ?>
                                <option value="<?php echo $value['Id'] ?>"><?php echo $value['Nombre'] ?></option>
                            <?php endif; ?>


                        <?php endforeach; ?>
                    </select>
                </div>  

                <div class="col-xs-3">
                    <label>Estado</label>                    
                    <select class="form-control" name="estado_evento" id="estado_evento">
                        <?php if ($this->event[0]['Estado'] == 'activado'): ?>
                            <option value="activado" selected="selected">Activado</option>
                            <option value="desactivado">Desactivado</option>
                        <?php elseif ($this->event[0]['Estado'] == 'desactivado'): ?>
                            <option value="activado">Activado</option>
                            <option value="desactivado" selected="selected">Desactivado</option>
                        <?php endif; ?>

                    </select>
                </div>  

            </div>

        </div>

        <hr />

        <div class="row">

            <div class="col-md-6"><!primera>

                <h4>Recurso humano para el evento</h4> 

                <label>Cantidad</label>

                <?php foreach ($this->perfil_event as $key => $value): ?>

                    <div class="form-group">
                        <label for="<?php echo $value['Nombre'] ?>" class="control-label"><?php echo $value['Nombre'] ?></label>
                        <div class="col-xs-4">
                            <input type="text" class="form-control" name="recurso_humano_<?php echo $value['Id'] ?>" value="<?php echo $value['Cantidad'] ?>">
                        </div>
                    </div>                                       
                <?php endforeach; ?>
            </div>

            <div class="col-md-6"><!primera>

                <h4>Ubicación de los asistentes y cantidad</h4>

                <label>Cantidad</label>

                <?php foreach ($this->ubicacion_asistente_event as $key => $value): ?>

                    <div class="form-group">
                        <label for="<?php echo $value['Nombre'] ?>" class="control-label"><?php echo $value['Nombre'] ?></label>
                        <div class="col-xs-4">
                            <input type="text" class="form-control" name="ubicacion_asistente_<?php echo $value['Id'] ?>" value="<?php echo $value['Cantidad'] ?>">                            
                        </div>
                    </div>                                       
                <?php endforeach; ?>
            </div>  

            <div class="col-md-6">

                <div id="cargos_persona_empresa">
                    <h4>Personas involucradas y cargos asignados</h4>
                    <?php $cont = count($this->persona_empresa_event) ?>

                    <?php if ($cont == 0): ?>
                    <?php endif; ?>

                    <?php for ($i = 0; $i < $cont; $i++): ?>
                        <div class="col-md-12"><!primera>

                            <div class="col-xs-5">
                                <label>Cargo</label>   
                                <select class="form-control" name="cargo[]" id="persona_cargo">                            
                                    <?php foreach ($this->cargo as $key => $value): ?>
                                        <?php if ($this->persona_empresa_event[$i]['cargo_id'] == $value['Id']): ?>
                                            <option value="<?php echo $value['Id'] ?>" selected="selected"><?php echo $value['Nombre'] ?>  </option>
                                        <?php else: ?>
                                            <option value="<?php echo $value['Id'] ?>"><?php echo $value['Nombre'] ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-xs-5">
                                <label>Persona o empresa</label>  
                                <select class="form-control" name="persona_empresa[]" id="persona_empresa">
                                    <?php foreach ($this->persona_empresa as $key => $value): ?>
                                        <?php if ($this->persona_empresa_event[$i]['Id_Personas_Involucradas'] == $value['Id_Personas_Involucradas']): ?>
                                            <option value="<?php echo $value['Id_Personas_Involucradas'] ?>" selected="selected"><?php echo $value['Nombre'] ?></option>
                                        <?php else: ?>
                                            <option value="<?php echo $value['Id_Personas_Involucradas'] ?>"><?php echo $value['Nombre'] ?></option>
                                        <?php endif; ?>

                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <?php if ($i < $cont - 1): ?>
                                <div class="col-xs-2">
                                    <label>&nbsp;</label>  
                                    <button type="button" class="btn btn-default form-control remove"><span class="glyphicon glyphicon-minus-sign"></span></button>
                                </div>
                            <?php else: ?>
                                <div class="col-xs-2">
                                    <label>&nbsp;</label>  
                                    <button type="button" class="btn btn-default form-control add"><span class="glyphicon glyphicon-plus-sign"></span></button>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endfor; ?>
                </div>

            </div> 

            <div class="col-md-6"><!primera>

                <h4>Caracterización del publico que participa</h4>

                <?php foreach ($this->caracterizacion_publico_participa as $llave => $valor): ?>

                    <?php if (in_array($valor['Id'], $this->cpqp_event)): ?>
                        <label><input type="checkbox" name="caracterizacion[]" checked="checked" value="<?php echo $valor['Id'] ?>"> <?php echo $valor['Nombre'] ?> </label><br />
                    <?php else: ?>
                        <label><input type="checkbox" name="caracterizacion[]" value="<?php echo $valor['Id'] ?>"> <?php echo $valor['Nombre'] ?> </label><br />
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>

        </div>

        <hr />

        <button type="submit" id="buttonUpdateEvent" class="btn btn-primary">Modificar</button>

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

        <hr />

        <div class="col-sm-12">

            <div id="errorEventoConsulta" class="alert alert-info"><!mensaje que aparecera si no se registra>
            </div>

        </div>
    </div>
</div>