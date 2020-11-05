<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
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
    <font class="text-bold" size='4' face='Arial'>Tarifa</font>
    <div class="box-tools">
        <a href="<?php echo site_url('tarifa/add'); ?>" class="btn btn-success btn-sm">Añadir</a> 
    </div>
</div>
<div class="col-md-6" style="padding-left: 0px">
    <div class="input-group">
        <span class="input-group-addon"> Buscar </span>           
        <input id="filtrar" type="text" class="form-control" placeholder="Ingrese el tipo de tarifa" autocomplete="off" autofocus>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
                        <th>#</th>
                        <th>Tipo</th>
                        <th>Desde</th>
                        <th>Hasta</th>
                        <th>Costo Agua</th>
                        <th>Costo Alcantarillado</th>
                        <th>Costo M3</th>
                        <th>Consumo Basico</th>
                        <th></th>
                    </tr>
                    <tbody class="buscar">
                    <?php
                    $i = 0;
                    foreach($tarifa as $t){ ?>
                    <tr>
                        <td class="text-center"><?php echo $i+1; ?></td>
                        <td class="text-bold" style="font-size: 12pt"><?php echo $t['tipo']; ?></td>
                        <td class="text-center"><?php echo $t['desde']; ?></td>
                        <td class="text-center"><?php echo $t['hasta']; ?></td>
                        <td class="text-right"><?php echo $t['costo_agua']; ?></td>
                        <td class="text-right"><?php echo $t['costo_alcant']; ?></td>
                        <td class="text-right"><?php echo $t['costo_mt3']; ?></td>
                        <td class="text-right"><?php echo $t['consumo_basico']; ?></td>
                        <td class="text-center">
                            <a href="<?php echo site_url('tarifa/edit/'.$t['id_tarifa']); ?>" class="btn btn-info btn-xs" title="Modificar la tarifa"><span class="fa fa-pencil"></span></a>
                        </td>
                    </tr>
                    <?php $i++; } ?>
                    </tbody>
                </table>
                                
            </div>
        </div>
    </div>
</div>
