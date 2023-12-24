<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<script type="text/javascript">
    $(document).ready(function () {
        (function ($) {
            $('#filtrar').keyup(function () {
                var rex = new RegExp($(this).val(), 'i');
                $('.buscar tr').hide();
                $('.buscar tr').filter(function () {
                    return rex.test($(this).text());
                }).show();
            })
        }(jQuery));
    });
</script>
<div class="box-header" style="padding-left: 0px">
    <font class="text-bold" size='4' face='Arial'>Aportes</font>
    <div class="box-tools">
        <a href="<?php echo site_url('aporte/add'); ?>" class="btn btn-success btn-sm">Registrar</a> 
    </div>
</div>
<div class="col-md-6" style="padding-left: 0px">
    <div class="input-group">
        <span class="input-group-addon"> Buscar </span>           
        <input id="filtrar" type="text" class="form-control" placeholder="Ingrese el motivo, mes,..." autocomplete="off" autofocus>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            
            <div class="box-body table-responsive">
                <table class="table table-striped" id="mitabla">
                    <tr>
                        <th>#</th>
                        <th>Mes</th>
                        <th>Gestion</th>
                        <th>Tipo</th>
                        <<th>Exento</th>
                        <th>Ice</th>
                        <th>Motivo</th>
                        <th>Detalle</th>
                        <th>Monto</th>
                        <th>Fecha Hora</th>
                        <th>Aplicacion</th>
                        <th>Estado</th>
                        <th>Usuario</th>
                        <th></th>
                    </tr>
                    <tbody class="buscar">
                    <?php
                    $i = 0;
                    foreach($aporte as $a){ ?>
                    <tr>
                        <td><?php echo $i+1; ?></td>
                        <td><?php echo $a['mes_ap']; ?></td>
                        <td><?php echo $a['gestion_ap']; ?></td>
                        <td><?php echo $a['tipo_ap']; ?></td>
                        <td class="text-center"><?php echo $a['exento_ap']; ?></td>
                        <td class="text-center"><?php echo $a['ice_ap']; ?></td>
                        <td><?php echo $a['motivo_ap']; ?></td>
                        <td><?php echo $a['detalle_ap']; ?></td>
                        <td><?php echo number_format($a['monto_ap'], 2, ".", ","); ?></td>
                        <td><?php echo date('d/m/Y H:i:s',strtotime($a['fechahora_ap']));?></td>
                        <td><?php echo $a['tipo_asoc']; ?></td>
                        <td><?php echo $a['estado_ap']; ?></td>
                        <td><?php echo $a['nombre_usu']; ?></td>
                        <td>
                            <a href="<?php echo site_url('aporte/edit/'.$a['id_ap']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a> 
                            <!--<a href="<?php echo site_url('aporte/remove/'.$a['id_ap']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>-->
                            <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#confirmarEliminar_<?php echo $a['id_ap']; ?>">
                                <span class="fa fa-trash"></span>
                            </a>
                        </td>
                    </tr>

                        <!-- Modal de confirmación -->
                        <div class="modal fade" id="confirmarEliminar_<?php echo $a['id_ap']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmar Eliminación</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                ¿Estás seguro de que deseas eliminar este elemento?
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <a href="<?php echo site_url('aporte/remove/'.$a['id_ap']); ?>" class="btn btn-danger">Eliminar</a>
                              </div>
                            </div>
                          </div>
                        </div>
                     
                    <?php $i++; } ?>
                    </tbody>
                </table>
                                
            </div>
        </div>
    </div>
</div>

<!-- Enlace con el modal -->
