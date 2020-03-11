<!-- --------------------------- script buscador ------------------------------------- -->
<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
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
        width: 100px;
        height: 100px;
        text-align: center;
    }
</style>

<!-- --------------------------- fin script buscador ------------------------------------- -->
<!-- ---------------- ESTILO DE LAS TABLAS --------------- -->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-- ---------------------------------------------------- -->
<div class="box-header">
    <font size='4' face='Arial'><b>Usuarios</b></font><br>
    <font size='2' face='Arial' id="encontrados">Registros Encontrados:<b><?php echo sizeof($usuario);  ?></b></font>
                <div class="box-tools">
                    <a href="<?php echo site_url('usuario/add'); ?>" class="btn btn-success btn-sm">+ Añadir</a> 
                </div>
            </div>
<div class="row">
    <div class="col-md-12">
        <!---- ----------------- parametro de buscador ------------------- -->
                  <div class="input-group"> <span class="input-group-addon">Buscar</span>
                    <input id="filtrar" type="text" class="form-control" placeholder="Ingrese el nombre, login">
                  </div>
            <!-- ------------------- fin parametro de buscador ------------------- -->
        <div class="box">
          
            <div class="box-body table-responsive">
                <table class="table table-striped table-condensed" id="mitabla">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Tipo Usuario</th>
                        <!--<th>Email</th>-->
                        <th>Login</th>
                        <th>Imagen</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                    <tbody class="buscar">
                  <?php
                      $i=1;
                      $cont = 0;

                      foreach($usuario as $u) {
                      $cont = $cont+1;
                  ?>

                    <tr>
                        <td><?php echo $cont ?></td>
                        <td>
                            <font face="Arial" size="3"><b><?php echo $u['nombre_usu']; ?></b></font>
                        </td>
                        <td style="text-align: center;"><?php echo $u['tipo_usuario']; ?></td>
                        <!--<td style="text-align: center;"><?php //echo $u['usuario_email']; ?></td>-->
                        <td  style="text-align: center;"><?php echo $u['login_usu']; ?></td>
                        <td class="text-center">
                            <?php if ($u['imagen_usu']!=null && $u['imagen_usu']!="") { ?>
                            <a class="btn btn-xs" data-toggle="modal" data-target="#mostrarimagen<?php echo $i; ?>" style="padding: 0px;">
                                <?php
                                echo " <img src='".site_url()."/resources/images/usuarios/"."thumb_".$u['imagen_usu']."' width='40' height='40' class='img-circle'>";
                                ?>
                            </a>
                           <!------------------------ INICIO modal para MOSTRAR imagen REAL ------------------->
                                    <div class="modal fade" id="mostrarimagen<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="mostrarimagenlabel<?php echo $i; ?>">
                                      <div class="modal-dialog" role="document">
                                            <br><br>
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                                            <font size="3"><b><?php echo $u['nombre_usu']; ?></b></font>
                                          </div>
                                            <div class="modal-body">
                                           <!------------------------------------------------------------------->
                                           <?php echo '<img style="max-height: 100%; max-width: 100%" src="'.site_url('/resources/images/usuarios/'.$u['imagen_usu']).'" />'; ?>
                                           <!------------------------------------------------------------------->
                                          </div>
                                          
                                        </div>
                                      </div>
                                    </div>
                            <!------------------------ FIN modal para MOSTRAR imagen REAL ------------------->
                             <?php } else { ?>
                            <div>
                                <img src="<?php echo site_url('/resources/images/usuarios/default_thumb.jpg'); ?>" width='40' height='40' class='img-circle' />
                            </div>
                            <?php }  ?>
                        </td>
                        <td style="text-align: center;"><?php echo $u['estado_usu']; ?></td>

                        <td>
                            <a href="<?php echo site_url('usuario/edit/'. $u['id_usu']); ?>" title="EDITAR" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a>
                            <!--<a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal<?php //echo $i; ?>"  title="Eliminar"><em class="fa fa-trash"></em></a>-->
                            <?php if($tipo_usuario == "ADMINISTRADOR"){ ?>
                            <a class="btn btn-soundcloud btn-xs" data-toggle="modal" data-target="#modalcambiar<?php echo $i; ?>"  title="Cambiar contraseña"><em class="fa fa-gear"></em></a>
                            <!------------------------ INICIO modal para cambiar PASSWORD ------------------->
                            <div class="modal fade" id="modalcambiar<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="modalcambiarlabel<?php echo $i; ?>">
                                <div class="modal-dialog" role="document">
                                    <br><br>
                                    <div class="modal-content">
                                        <div class="modal-header text-center text-bold" style="font-size: 12pt">
                                            <label>CAMBIAR CONTRASEÑA</label>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                                        </div>
                                        <?php
                                            echo form_open('usuario/nueva_clave/'.$u['id_usu']);
                                        ?>
                                        <div class="modal-body" style="font-size: 10pt">
                                            <!------------------------------------------------------------------->
                                            <div class="col-md-6">
						<label for="nuevo_pass<?php echo $u['id_usu'] ?>" class="control-label">Nueva Contraseña</label>
						<div class="form-group">
                                                    <input type="password" name="<?php echo "nuevo_pass".$u['id_usu'] ?>" class="form-control" id="nuevo_pass<?php echo $u['id_usu'] ?>" />
                                                    <span class="text-danger"><?php echo form_error('nuevo_pass'.$u['id_usu']);?></span>
						</div>
                                            </div>
                                            <div class="col-md-6">
						<label for="repita_pass<?php echo $u['id_usu'] ?>" class="control-label">Repita Contraseña</label>
						<div class="form-group">
                                                    <input type="password" name="<?php echo "repita_pass".$u['id_usu'] ?>" class="form-control" id="repita_pass<?php echo $u['id_usu'] ?>" />
                                                    <span class="text-danger"><?php echo form_error('repita_pass'.$u['id_usu']);?></span>
						</div>
                                            </div>
                                            <!------------------------------------------------------------------->
                                        </div>
                                        <div class="modal-footer aligncenter">
                                            <button type="submit" class="btn btn-success">
                                                <i class="fa fa-check"></i> Cambiar
                                            </button>
                                            <!--<a href="<?php //echo site_url('usuario/nueva_clave/'.$u['id_usu']); ?>" class="btn btn-success"><span class="fa fa-check"></span> Cambiar </a>-->
                                            <a href="#" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> Cancelar </a>
                                        </div>
                                        <?php
                                        echo form_close();
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <!------------------------ FIN modal para cambiar PASSWORD ------------------->
                            <?php
                            }
                            ?>
                            <!--<a href="<?php //echo site_url('usuario/password/'.$u['id_usu']); ?>" title="CAMBIAR CONTRASENA" class="btn btn-success btn-xs"><span class="fa fa-asterisk"></span></a>-->
                            <?php if($u['estado_usu']== "ACTIVO"){ ?>
                            <a href="<?php echo site_url('usuario/inactivar/'.$u['id_usu']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-ban"  title="INACTIVAR"></span></a>
                          <?php }else { ?>
                            <a href="<?php echo site_url('usuario/activar/'.$u['id_usu']); ?>" class="btn btn-facebook btn-xs"><span class="fa fa-reply"  title="ACTIVAR"></span></a>
                          <?php } ?>
                        </td>
                    </tr>
                    
                    <?php $i++; }?>  
                </table>
                
            </div>               
        </div>
    </div>
</div>
<?php
if(isset($mensaje)){
    if($mensaje == "a"){
?>
<script type="text/javascript">
    alert("Contraseña modificada con exito");
</script>
<?php
$mensaje = "";
    }elseif($mensaje == "b"){
?>
<script type="text/javascript">
    alert("Las contraseñas no coinciden");
</script>
<?php
$mensaje = "";
    }
}
?>