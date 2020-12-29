<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/asociado_inf.js'); ?>" type="text/javascript"></script>

<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />

<div class="box-header text-center">
    <font size='4' face='Arial'>Bienvenido<br> <b><?php echo $asociado['apellidos_asoc']." ".$asociado['nombres_asoc'] ?></b></font><br>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
                <div class="col-md-2">
                    <a class="btn btn-soundcloud form-control" data-toggle="modal" data-target="#modalcambiar"  title="Cambiar contraseña"><span class="fa fa-gear"></span> Cambiar Contraseña</a>
                </div>
            <!------------------------ INICIO modal para cambiar PASSWORD ------------------->
            <div class="modal fade" id="modalcambiar" tabindex="-1" role="dialog" aria-labelledby="modalcambiarlabel">
                <div class="modal-dialog" role="document">
                    <br><br>
                    <div class="modal-content">
                        <div class="modal-header text-center text-bold" style="font-size: 12pt">
                            <label>CAMBIAR CONTRASEÑA</label>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                        </div>
                        <div class="modal-body" style="font-size: 10pt">
                            <!------------------------------------------------------------------->
                            <div class="col-md-6">
                                <label for="nuevo_pass" class="control-label">Nueva Contraseña</label>
                                <div class="form-group">
                                    <input type="password" name="nuevo_pass" class="form-control" id="nuevo_pass" placeholder="Mínimo tres caracteres" />
                                    <span class="text-danger"><?php echo form_error('nuevo_pass');?></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="repita_pass" class="control-label">Repita Contraseña</label>
                                <div class="form-group">
                                    <input type="password" name="repita_pass" class="form-control" id="repita_pass" placeholder="Mínimo tres caracteres" />
                                    <span class="text-danger"><?php echo form_error('repita_pass');?></span>
                                </div>
                            </div>
                            <!------------------------------------------------------------------->
                        </div>
                        <div class="modal-footer" style="text-align: center">
                            <a class="btn btn-success" onclick="cambiarcon()"><i class="fa fa-check"></i> Cambiar</a>
                            <a href="#" class="btn btn-danger" data-dismiss="modal" onclick="borrar_campos"><span class="fa fa-times"></span> Cancelar </a>
                        </div>
                    </div>
                </div>
            </div>
            <!------------------------ FIN modal para cambiar PASSWORD ------------------->
            
                          
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