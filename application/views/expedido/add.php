<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Añadir Expedido C.I.</h3>
            </div>
            <?php echo form_open('expedido/add'); ?>
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-6">
                        <label for="ciudad" class="control-label"><span class="text-danger">*</span>Ciudad</label>
                        <div class="form-group">
                            <input type="text" name="ciudad" value="<?php echo $this->input->post('ciudad'); ?>" class="form-control" id="ciudad" autocomplete="off" autofocus required onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            <span class="text-danger"><?php echo form_error('ciudad');?></span>
                        </div>
                    </div>
		</div>
            </div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> Guardar
                </button>
                <a href="<?php echo site_url('expedido'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar</a>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>