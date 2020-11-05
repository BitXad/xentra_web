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
    <font class="text-bold" size='4' face='Arial'>Descuentos</font>
    <div class="box-tools">
        <a href="<?php echo site_url('descuento/add'); ?>" class="btn btn-success btn-sm">Registrar</a> 
    </div>
</div>
<div class="col-md-6" style="padding-left: 0px">
    <div class="input-group">
        <span class="input-group-addon"> Buscar </span>           
        <input id="filtrar" type="text" class="form-control" placeholder="Ingrese el nombre, concepto,..." autocomplete="off" autofocus>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
                        <th>#</th>
                        <th>Asociado</th>
                        <th>Concepto</th>
                        <th>Monto</th>
                        <th>F. Inicio</th>
                        <th>F. Fin</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                    <tbody class="buscar">
                    <?php
                    $i = 0;
                    foreach($all_descuento as $a){ ?>
                    <tr>
                        <td><?php echo $i+1; ?></td>
                        <td><?php echo $a['apellidos_asoc']." ".$a['nombres_asoc']; ?></td>
                        <td><?php echo $a['nom_desc']; ?></td>
                        <td><?php echo $a['monto_desc']; ?></td>
                        <td><?php echo date('d/m/Y',strtotime($a['inicio_desc'])); ?></td>
                        <td><?php echo date('d/m/Y',strtotime($a['vigencia_desc'])); ?></td>
                        <td><?php echo $a['estado_desc']; ?></td>
                        <td>
                            <a href="<?php echo site_url('descuento/edit/'.$a['id_desc']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a> 
                        </td>
                    </tr>
                    <?php $i++; } ?>
                    </tbody>
                </table>
                                
            </div>
        </div>
    </div>
</div>
