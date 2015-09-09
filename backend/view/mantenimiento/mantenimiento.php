<div class="container">

    <div class="row">

        <div class="col-md-8">

            <h2>Registrar mantenimiento</h2>

            <form action="<?php echo BASE_URL ?>mantenimiento/insert_or_update_maintenance" id="form_guardar_mantenimiento" class="form-horizontal">

                <input type="hidden" name="id_mantenimiento" id="id_mantenimiento" value=""/>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Herramienta</label>
                    <div class="col-lg-4">

                        <select class="form-control" name="select_herramienta" id="select_herramienta">
                            <?php foreach ($this->herramienta as $key => $value): ?>
                                <option value="<?php echo $value['Id_Herramienta'] ?>"><?php echo $value['Nombre'] ?> - <?php echo $value['Codigo'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Fecha de mantenimiento</label>
                    <div class="col-lg-4">
                        <input type="date" name="fecha_mantenimiento" id="fecha_mantenimiento" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Proximo mantenimiento</label>
                    <div class="col-lg-4">
                        <input type="date" name="proximo_mantenimiento" id="proximo_mantenimiento" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Detalle</label>
                    <div class="col-lg-4">
                        <textarea  rows="4" name="detalle" id="detalle" class="form-control"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-offset-3 col-lg-10">
                        <button type="submit" id="btn_guardar_mantenimiento" class="btn btn-primary">Guardar</button>
                    </div>
                </div>                

            </form>

        </div>

        <div class="col-md-4"><!empieza la segunda columna>

            <h2>Consultar mantenimiento</h2>

            <form action="<?php echo BASE_URL ?>mantenimiento/consultar_mantenimiento" id="form_consultar_mantenimiento" method="post">

                <div class="col-xs-9">                    
                    <input type="text" name="parametro_mantenimiento" id="parametro_mantenimiento" class="form-control" placeholder="Nombre, codigo">
                </div>

                <button type="submit" id="btn_consultar_mantenimiento" class="btn btn-primary">Consultar</button>

            </form>

            <hr>

            <div id="errorMantenimientoConsulta" class="alert alert-danger">                 
            </div> 

        </div>

    </div>

    <div class="row">

        <hr>

        <div class="col-md-8">

            <div id="successMantenimiento" class="alert alert-success">                
            </div>            

            <div id="errorMantenimiento" class="alert alert-danger">
            </div>       

        </div>

    </div>

</div>

<div class="container">

    <hr>

    <div class="col-md-12">
        <div class="table-responsive"><!tabla donde se listaran los mantenimientos o las consultas>
            <table id ="tabla_mantenimientos" class="table table-bordered table-hover" style="display: none">
                <thead>                                
                <th class="success">Herramienta</th>
                <th class="success">Codigo</th>
                <th class="success">Fecha de mantenimiento</th>
                <th class="success">Proximo mantenimiento</th>
                <th class="success">Detalle</th>
                <th class="success">Modificar</th> 
                </thead>
                <tbody>
                    <!--resultados-->
                </tbody>
            </table>
        </div>
    </div>
</div>




