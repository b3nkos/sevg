<div class="container">
    <!-- Example row of columns -->
    <div class="row">
        <div class="col-md-2">
        </div>

        <div class="col-md-8">
            <h1>Eventos</h1>
            <div class="table-responsive">
              <table class="table table-hover table-bordered">
                <thead>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Inicio</th>
                    <th class="text-center">Fin</th>
                    <th class="text-center">Lugar</th>
                    <th class="text-center">Participar</th>
                </thead>
                <tbody>
                    <?php foreach($eventos as $key => $value):?>
                        <tr>
                            <td class="text-center"><?php echo $value->Nombre?></td>
                            <td class="text-center">
                                <?php echo mdate('%d/%m/%Y', strtotime($value->Fecha_Inicial)) . ' ' . mdate('%h:%i %a', strtotime($value->Hora_Inicio))?>
                            </td>
                            <td class="text-center">
                                <?php echo mdate('%d/%m/%Y', strtotime($value->Fecha_Final)) . ' ' . mdate('%h:%i %a', strtotime($value->Hora_Final))?>
                            </td>
                            <td class="text-center"><?php echo $value->lugar?></td>
                            <td class="text-center">
                                <a data-toggle="modal" class="get-event-profiles" data-target="#myModal" 
                                href="#" data-url="<?php echo site_url('evento/get/'.$value->id) ?>"
                                data-url-profiles="<?php echo site_url('user/profiles') ?>">
                                    <span class="glyphicon glyphicon-hand-up"></span>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
              </table>
            </div>
        </div>
    </div>
    <hr>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title text-center" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
            <div class="row">
                <div class="col-md-8 col-md-offset-1">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="" class="col-sm-6 control-label">Participar como</label>
                            <div class="col-sm-6">
                                <select name="perfil" id="perfil" class="form-control"></select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div id="success-message" class="alert alert-success text-center"></div>
            <div id="error-message" class="alert alert-danger text-center"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="modal-close" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btn-participar" data-url="<?php echo site_url('user/participar')?>">
            Participar
        </button>
      </div>
    </div>
  </div>
</div>