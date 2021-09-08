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
    <font class="text-bold" size='4' face='Arial'>Configuración</font>
    <div class="box-tools">
        <a href="<?php echo site_url('configuracion/add'); ?>" class="btn btn-success btn-sm">Añadir</a> 
    </div>
</div>
<div class="col-md-6" style="padding-left: 0px">
    <div class="input-group">
        <span class="input-group-addon"> Buscar </span>           
        <input id="filtrar" type="text" class="form-control" placeholder="Ingrese la opción" autocomplete="off" autofocus>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
                        <th>Num.</th>
                        <th>Opción</th>
                        <th>Valor</th>
                        <th>Parametro</th>
                        <th></th>
                    </tr>
                    <?php foreach($configuracion as $c){ ?>
                    <tr>
                        <td class="text-center"><?php echo $c['num']; ?></td>
                        <td class="text-bold" style="font-size: 10pt"><?php echo $c['opcion']; ?></td>
                        <td class="text-center"><?php echo $c['valor']; ?></td>
                        <td><?php echo $c['parametro']; ?></td>
                        <td>
                            <a href="<?php echo site_url('configuracion/edit/'.$c['num']); ?>" class="btn btn-info btn-xs" title="Modificar configuración"><span class="fa fa-pencil"></span> </a> 
                            <!--<a href="<?php //echo site_url('configuracion/remove/'.$c['num']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>-->
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
