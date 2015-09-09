<div class="container">

    <div class="row">

        <div class="col-md-8">

            <h2>Registrar herramienta</h2>

            <form action="<?php echo BASE_URL ?>herramienta/insert_or_update_tool" id="form_guardar_herramienta" method="post" class="form-horizontal">

                <input type="hidden" name="id_herramienta" id="id_herramienta" value="">

                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre</label>
                    <div class="col-md-4">
                        <input type="text" name="nombre_herramienta" id="nombre_herramienta" class="form-control" placeholder="Nombre">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Codigo</label>
                    <div class="col-lg-4">
                        <input type="text" name="codigo_herramienta" id="codigo_herramienta" class="form-control" placeholder="Codigo">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Estado</label>
                    <div class="col-lg-4">
                        <select class="form-control" name="estado_herramienta" id="estado_herramienta">
                            <option value="activado">Activado</option>
                            <option value="desactivado">Desactivado</option>
                        </select>
                    </div>
                </div>                                

                <div class="form-group">
                    <div class="col-lg-offset-3 col-lg-10">
                        <button type="submit" id="btn_guardar_herramienta" class="btn btn-primary">Guardar</button>                        
                    </div>
                </div>

            </form>

        </div>

        <div class="col-md-4">

            <h2>Consultar herramienta</h2>

            <form action="<?php echo BASE_URL ?>herramienta/consultar_herramienta" id="form_consultar_herramienta" method="post">
                <div class="col-xs-9">
                    <input type="text" name="parametro_herramienta" id="parametro_herramienta" class="form-control" placeholder="Nombre, codigo">
                </div>

                <button type="submit" id="btn_consultar_herramienta" class="btn btn-primary">Consultar</button>

            </form>

            <hr>

            <div id="errorHerramientaConsulta" class="alert alert-danger">                  
            </div>      

        </div>

    </div>   

    <div class="row">

        <hr>

        <div class="col-md-8">

            <div id="successHerramienta" class="alert alert-success">            
            </div>        

            <div id="errorHerramienta" class="alert alert-danger">            
            </div>

        </div>

    </div>

</div>

<div class="container">

    <hr>

    <div class="col-md-12">
        <div class="table-responsive">
            <table id ="tabla_herramientas" class="table table-bordered table-hover" style="display: none">
                <thead>                
                <th class="success">Nombre</th>
                <th class="success">Codigo</th>
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






