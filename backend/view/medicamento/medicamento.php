<div class="container">

    <div class="row">

        <div class="col-md-8">

            <h3>Registrar medicamento/utensilio</h3>

            <form action="<?php echo BASE_URL ?>medicamento/insert_or_update_medicine" id="form_guardar_medicamento" method="post" class="form-horizontal">

                <input type="hidden" name="id_medicamento" id="id_medicamento" value="">

                <div class="form-group">
                    <label class="col-lg-3 control-label">Presentacion</label>
                    <div class="col-lg-4">
                        <select class="form-control" name="select_presentacion" id="select_presentacion">
                            <?php foreach ($this->presentacion as $key => $value): ?>
                                <option value="<?php echo $value['Id'] ?>"><?php echo $value['Nombre'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre</label>
                    <div class="col-md-4">
                        <input type="text" name="nombre_medicamento" id="nombre_medicamento"class="form-control" placeholder="Nombre">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Lote</label>
                    <div class="col-lg-4">
                        <input type="text" name="lote" id="lote" class="form-control" placeholder="Lote">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Fecha de vencimiento</label>
                    <div class="col-lg-4">
                        <input type="date" name="fecha_vencimiento" id="fecha_vencimiento" class="form-control" placeholder="Fecha de vencimiento">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Cantidad</label>
                    <div class="col-lg-4">
                        <input type="number" name="cantidad_medicamento" id="cantidad_medicamento" class="form-control" placeholder="Cantidad">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Estado</label>    
                    <div class="col-lg-4">
                        <select class="form-control" name="estado_medicamento" id="estado_medicamento">
                            <option value="activado">Activado</option>
                            <option value="desactivado">Desactivado</option>
                        </select>                    
                    </div> 
                </div> 

                <div class="form-group">
                    <div class="col-lg-offset-3 col-lg-10">
                        <button type="submit" id="btn_guardar_medicamento" class="btn btn-primary">Guardar</button>                        
                    </div>
                </div>

            </form>

        </div>

        <div class="col-md-4">

            <h3>Consultar medicamento/utensilio</h3>            

            <form action="<?php echo BASE_URL ?>medicamento/consultar_medicamento_" id="form_consultar_medicamento" method="post">

                <div class="col-xs-9">
                    <input type="text" name="parametro_medicamento" id="parametro_medicamento" class="form-control" placeholder="Nombre, lote, presentacion">
                </div>

                <button type="submit" id="btn_consultar_medicamento" class="btn btn-primary">Consultar</button>

            </form>            

            <hr>

            <div id="errorMedicamentoConsulta" class="alert alert-danger">                 
            </div>      

        </div>

    </div>

    <div class="row">

        <hr>

        <div class="col-md-8">

            <div id="successMedicamento" class="alert alert-success">                
            </div>            

            <div id="errorMedicamento" class="alert alert-danger">                
            </div>                        

        </div>                

    </div>

</div> 

<div class="container">   

    <hr>

    <div class="col-md-12">
        <div class="table-responsive">
            <table id="tabla_medicamentos" class="table table-bordered table-hover" style="display: none">
                <thead>                        
                <th class="success">Nombre</th>
                <th class="success">Presentación</th>
                <th class="hidden">id presentacion</th>
                <th class="success">Lote</th>
                <th class="success">Fecha de vencimiento</th>
                <th class="success">Cantidad</th>
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



