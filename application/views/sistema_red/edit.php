<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editar Tipo de Inmueble</h3>
            </div>
            <?php echo form_open('sistema_red/edit/'.$sistema_red['id_sred']); ?>
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-6">
                            <label for="nombre_sred" class="control-label"><span class="text-danger">*</span>Nombre</label>
                            <div class="form-group">
                                <input type="text" name="nombre_sred" value="<?php echo $sistema_red["nombre_sred"] ?>" class="form-control" id="nombre_sred" autofocus required onclick="this.select();" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"/>
                            </div>
                    </div>         
                    <div class="col-md-3">
                            <label for="codigo_sred" class="control-label"><span class="text-danger">*</span>Código</label>
                            <div class="form-group">
                                    <input type="text" name="codigo_sred" value="<?php echo $sistema_red["codigo_sred"]; ?>" class="form-control" id="codigo_sred" required onclick="this.select();" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"/>
                            </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
            	<button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> Guardar
                </button>
                <a href="<?php echo site_url('sistema_red'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar</a>
	        </div>				
                    <?php echo form_close(); ?>
		</div>
    </div>
</div>