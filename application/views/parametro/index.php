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
    <font class="text-bold" size='4' face='Arial'>Parametros</font>
    <div class="box-tools">
        <a href="<?php echo site_url('parametro/add'); ?>" class="btn btn-success btn-sm">Registrar</a>
    </div>
</div>
<div class="col-md-6" style="padding-left: 0px">
    <div class="input-group">
        <span class="input-group-addon"> Buscar </span>           
        <input id="filtrar" type="text" class="form-control" placeholder="Ingrese ela decripcion, eldetalle,..." autocomplete="off" autofocus>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
                        <th>#</th>
                        <th>Descripción</th>
                        <th>Dias</th>
                        <th>Monto</th>
                        <th>Detalle</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                    <tbody class="buscar">
                    <?php
                    $i = 0;
                    foreach($parametros as $p){ ?>
                    <tr>
                        <td><?php echo $i+1; ?></td>
                        <td><?php echo $p['descip_param']; ?></td>
                        <td><?php echo $p['dias_param']; ?></td>
                        <td><?php echo number_format($p['monto_param'],'2','.',',');?></td>
                        <td><?php echo $p['detalle_param']; ?></td>
                        <td><?php echo $p['estado']; ?></td>
                        <td>
                            <a href="<?php echo site_url('parametro/edit/'.$p['id_param']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a> 
                            <!--<a href="<?php // echo site_url('parametro/remove/'.$p['id_param']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>-->
                        </td>
                    </tr>
                    <?php $i++; } ?>
                    </tbody>
                </table>
                                
            </div>
        </div>
    </div>
</div>
