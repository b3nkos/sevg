<div class="container">

    <div class="row">

        <div class="col-md-8">

            <h3>Registrar personas/empresas</h3>

            <form action="<?php echo BASE_URL ?>persona/insert_or_update_person" id="form_guardar_persona_empresa" method="post" class="form-horizontal">

                <input type="hidden" name="id_persona_empresa" id="id_persona_empresa">

                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre completo</label>
                    <div class="col-md-4">
                        <input type="text" name="nombre_persona_empresa" id="nombre_persona_empresa" class="form-control" placeholder="Nombre completo">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Correo electronico</label>
                    <div class="col-md-4">
                        <input type="email" name="email_persona_empresa" id="email_persona_empresa" class="form-control" placeholder="Correo electronico">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Dirección</label>
                    <div class="col-md-4">
                        <input type="text" name="direccion_persona_empresa" id="direccion_persona_empresa" class="form-control" placeholder="Direccion">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Celular</label>
                    <div class="col-lg-4">
                        <input type="number" name="celular_persona_empresa" id="celular_persona_empresa" class="form-control" placeholder="Celular">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Telefono</label>
                    <div class="col-lg-4">
                        <input type="number" name="telefono_persona_empresa" id="telefono_persona_empresa" class="form-control" placeholder="Telefono">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Tipo de entidad</label>    
                    <div class="col-lg-4">
                        <select class="form-control" name="tipo_persona_empresa" id="tipo_persona_empresa">
                            <option value="persona">Persona</option>
                            <option value="empresa">Empresa</option>
                        </select>                    
                    </div> 
                </div> 


                <div class="form-group">
                    <label class="col-lg-3 control-label">Estado</label>    
                    <div class="col-lg-4">
                        <select class="form-control" name="estado_persona_empresa" id="estado_persona_empresa">
                            <option value="activado">Activado</option>
                            <option value="desactivado">Desactivado</option>
                        </select>                    
                    </div> 
                </div> 

                <div class="form-group">
                    <div class="col-lg-offset-3 col-lg-10">
                        <button type="submit" id="btn_guardar_persona_empresa" class="btn btn-primary">Guardar</button>                        
                    </div>
                </div>

            </form>

        </div>

        <div class="col-md-4">           

            <h3>Consultar persona/empresa</h3>

            <form action="<?php echo BASE_URL ?>persona/consultar_persona" id="form_consultar_persona_empresa" method="post">

                <div class="col-xs-9">
                    <input type="text" name="parametro_persona" id="parametro_persona" class="form-control" placeholder="Nombre, Correo electronico">
                </div>

                <button type="submit" id="btn_consultar_persona_empresa" class="btn btn-primary">Consultar</button>

            </form>

            <hr>

            <div id="errorPersonaEmpresaConsulta" class="alert alert-danger">                 
            </div>  

        </div>

    </div>  

    <div class="row">   

        <hr />

        <div class="col-md-8">

            <div id="successPersonaEmpresa" class="alert alert-success">
            </div>            

            <div id="errorPersonaEmpresa" class="alert alert-danger">
            </div>                        

        </div>         

    </div>

</div>

<div class="container">

    <hr />

    <div class="col-md-12">
        <div class="table-responsive">
            <table id="tabla_personas" class="table table-bordered table-hover" style="display: none">
                <thead>                                        
                <th class="success">Nombre</th>
                <th class="success">Correo electronico</th>
                <th class="success">Direccion</th>
                <th class="success">Celular</th>            
                <th class="success">Telefono</th>
                <th class="success">Tipo de entidad</th>
                <th class="success">Estado</th>
                <th class="success">Modificar</th>
                </thead>
                <tbody>
                    <!--resultados-->
                </tbody>
            </table>
        </div>
    </div>

</div>
