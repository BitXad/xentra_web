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
    <h3 class="box-title">Zonas</h3>
    <div class="box-tools">
        <a href="<?php echo site_url('zona/add'); ?>" class="btn btn-success btn-sm">Añadir</a>
    </div>
</div>
<div class="col-md-6" style="padding-left: 0px">
    <div class="input-group">
        <span class="input-group-addon"> Buscar </span>           
        <input id="filtrar" type="text" class="form-control" placeholder="Ingrese la zona, código" autocomplete="off" autofocus>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body table-responsive">
                <table class="table table-condensed" id="mitabla">
                    <tr>
                        <th>#</th>
                        <th>Zona</th>
                        <th>Código</th>
                        <th></th>
                    </tr>
                    <tbody class="buscar">
                    <?php
                         $i = 0;
                         foreach($zonas as $z){ ?>
                    <tr>
                        <td class="text-center"><?php echo $i+1; ?></td>
                        <td class="text-bold" style="font-size: 12pt"><?php echo $z['zona_med']; ?></td>
                        <td class="text-center"><?php echo $z['codigozona_med']; ?></td>
                        <td class="text-center">
                            <?php $estazona = str_replace("-", "a123k", $z['zona_med']); ?>
                            <a href="<?php echo site_url('zona/edit/'.$estazona); ?>" class="btn btn-info btn-xs" title="Modificar zona"><span class="fa fa-pencil"></span></a> 
                            <!--<a href="<?php //echo site_url('zona/remove/'.$z['zona_med']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>-->
                        </td>
                    </tr>
                    <?php $i++; } ?>
                    </tbody>
                </table>
                                
            </div>
        </div>
    </div>
</div>
