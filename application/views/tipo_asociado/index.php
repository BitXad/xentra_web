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
    <font class="text-bold" size='4' face='Arial'>Tipo Asociado</font>
    <div class="box-tools">
        <a href="<?php echo site_url('tipo_asociado/add'); ?>" class="btn btn-success btn-sm">Añadir</a> 
    </div>
</div>
<div class="col-md-6" style="padding-left: 0px">
    <div class="input-group">
        <span class="input-group-addon"> Buscar </span>           
        <input id="filtrar" type="text" class="form-control" placeholder="Ingrese el tipo de asociado" autocomplete="off" autofocus>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body table-responsive">
                <table class="table table-condensed" id="mitabla">
                    <tr>
                        <th>#</th>
                        <th>Tipo Asociado</th>
                        <th></th>
                    </tr>
                    <tbody class="buscar">
                    <?php $i = 0;
                          foreach($tipo_asociado as $t){ ?>
                    <tr>
                        <td class="text-center"><?php echo $i+1; ?></td>
                        <td class="text-bold" style="font-size: 12pt"><?php echo $t['tipo_asoc']; ?></td>
                        <td class="text-center">
                            <a href="<?php echo site_url('tipo_asociado/edit/'.$t['tipo_asoc']); ?>" class="btn btn-info btn-xs" title="Modificar tipo de asociado"><span class="fa fa-pencil"></span></a>
                        </td>
                    </tr>
                    <?php $i++; } ?>
                    </tbody>
                </table>
                                
            </div>
        </div>
    </div>
</div>
