<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editar Servicio</h3>
            </div>
            <?php echo form_open('servicio/edit/'.$servicio['servicio']); ?>
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-6">
                        <label for="servicio" class="control-label"><span class="text-danger">*</span>Servicio</label>
                        <div class="form-group">
                            <input type="text" name="servicio" value="<?php echo $servicio["servicio"] ?>" class="form-control" id="servicio" autofocus required onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"/>
                            <span class="text-danger"><?php echo form_error('servicio');?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
            	<button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> Guardar
                </button>
                <a href="<?php echo site_url('servicio'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar</a>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>