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
<style type="text/css">
    #contieneimg{
        width: 45px;
        height: 45px;
        text-align: center;
    }
    #contieneimg img{
        width: 45px;
        height: 45px;
        text-align: center;
    }
    #horizontal{
        display: flex;
        white-space: nowrap;
        border-style: none !important;
    }
    #masg{
        font-size: 12px;
    }
    td div div{
        
    }
</style>
<div class="box-header" style="padding-left: 0px">
    <font class="text-bold" size='4' face='Arial'>Empresa</font>
</div>
<div class="col-md-12" style="padding-left: 0px">
    <div class="input-group">
        <span class="input-group-addon"> Buscar </span>           
        <input id="filtrar" type="text" class="form-control" placeholder="Ingrese el nombre" autocomplete="off" autofocus>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body table-responsive">
                <table class="table table-condensed" id="mitabla">
                    <tr>
                        <th>#</th>
                        <th>Empresa</th>
                        <th>Sucursal</th>
                        <th>Ubicacion</th>
                        <th>Actividad</th>
                        <th>Nit</th>
                        <th>Zona</th>
                        <th>Sis</th>
                        <th>Anuncio</th>
                        <th></th>
                    </tr>
                    <tbody class="buscar">
                    <?php $i = 0;
                          foreach($empresa as $e){ ?>
                    <tr>
                        <td><?php echo $i+1; ?></td>
                        <td>
                            <div id="horizontal">
                                <?php
                                if($e['logo_emp']){
                                    $mimagen = "thumb_".$e['logo_emp'];
                                ?>
                                <div id="contieneimg">
                                    <a class="btn  btn-xs" data-toggle="modal" data-target="#mostrarimagen<?php echo $i; ?>" style="padding: 0px;">
                                    <?php
                                        echo '<img src="'.site_url('/resources/images/empresas/'.$mimagen).'" />';
                                    ?>
                                    </a>
                                </div>
                                <?php
                                }else{
                                   //echo '<img style src="'.site_url('/resources/images/usuarios/thumb_default.jpg').'" />'; 
                                }
                                ?>
                                <div style="padding-left: 4px">
                                    <?php echo "<b id='masg'>".$e['nombre_emp']."</b>";
                                    if($e['eslogan_emp']){
                                        echo "<br><b></b>".$e['eslogan_emp'];
                                    }
                                    if($e['direccion_emp']){
                                        echo "<br><b>Dir.: </b>".$e['direccion_emp'];
                                    }
                                    if($e['telefono_emp']){
                                        echo "<br><b>Telef.: </b>".$e['telefono_emp'];
                                    }
                                    /*if($e['empresa_codigo']){
                                        echo "<br><b>Código: </b>".$e['empresa_codigo'];
                                    }*/
                                    ?>
                                </div>
                            </div>
                        </td>
                        <td><?php echo $e['sucursal_emp']; ?></td>
                        <td><?php echo $e['ubicacion_emp']; ?></td>
                        <td><?php echo $e['actividad_emp']; ?></td>
                        <td><?php echo $e['nit_emp']; ?></td>
                        <td><?php echo $e['zona_emp']; ?></td>
                        <td><?php echo $e['sis_emp']; ?></td>
                        <td><?php echo $e['anuncio_emp']; ?></td>
                        <td>
                            <a href="<?php echo site_url('empresa/edit/'.$e['id_emp']); ?>" class="btn btn-info btn-xs" title="Modificar informacion"><span class="fa fa-pencil"></span></a> 
                            <!--<a href="<?php //echo site_url('empresa/remove/'.$e['id_emp']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>-->
                            <!------------------------ INICIO modal para MOSTRAR imagen REAL ------------------->
                            <div class="modal fade" id="mostrarimagen<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="mostrarimagenlabel<?php echo $i; ?>">
                              <div class="modal-dialog" role="document">
                                    <br><br>
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                                    <font size="3"><b><?php echo $e['nombre_emp']; ?></b></font>
                                  </div>
                                    <div class="modal-body">
                                   <!------------------------------------------------------------------->
                                   <?php echo '<img style="max-height: 100%; max-width: 100%" src="'.site_url('/resources/images/empresas/'.$e['logo_emp']).'" />'; ?>
                                   <!------------------------------------------------------------------->
                                  </div>

                                </div>
                              </div>
                            </div>
                            <!------------------------ FIN modal para MOSTRAR imagen REAL ------------------->
                        </td>
                    </tr>
                    <?php $i++; } ?>
                    </tbody>
                </table>
                                
            </div>
        </div>
    </div>
</div>
