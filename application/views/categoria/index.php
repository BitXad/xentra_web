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
    <font class="text-bold" size='4' face='Arial'>Categorias</font>
    <div class="box-tools">
        <a href="<?php echo site_url('categoria/add'); ?>" class="btn btn-success btn-sm">Añadir</a> 
    </div>
</div>
<div class="col-md-6" style="padding-left: 0px">
    <div class="input-group">
        <span class="input-group-addon"> Buscar </span>           
        <input id="filtrar" type="text" class="form-control" placeholder="Ingrese el nombre de la categoria, código" onkeypress="buscarasociado(event)" autocomplete="off">
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body table-responsive">
                <table class="table table-condensed" id="mitabla">
                    <tr>
                        <th>#</th>
                        <th>Categoria</th>
                        <th>Código</th>
                        <th></th>
                    </tr>
                    <tbody class="buscar">
                    <?php
                          $i = 0;
                          foreach($categorias as $c){ ?>
                    <tr>
                        <td class="text-center"><?php echo $i+1; ?></td>
                        <td class="text-bold" style="font-size: 12pt"><?php echo $c['categoria']; ?></td>
                        <td class="text-center"><?php echo $c['codigo_cat']; ?></td>
                        <td class="text-center">
                            <a href="<?php echo site_url('categoria/edit/'.$c['categoria']); ?>" class="btn btn-info btn-xs" title="Modificar categoria"><span class="fa fa-pencil"></span></a>
                            <!--<a href="<?php //echo site_url('categoria/remove/'.$c['categoria']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>-->
                        </td>
                    </tr>
                    <?php $i++; } ?>
                    </tbody>
                </table>
                                
            </div>
        </div>
    </div>
</div>
