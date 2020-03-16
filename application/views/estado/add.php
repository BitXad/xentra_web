<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Añadir Estado</h3>
            </div>
            <?php echo form_open('estado/add'); ?>
          	<div class="box-body">
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="estado" class="control-label"><span class="text-danger">*</span>Nombre</label>
                            <div class="form-group">
                                <input type="text" name="estado" value="<?php echo $this->input->post('estado'); ?>" class="form-control" id="estado" autocomplete="off" autofocus required onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                    </div>
                </div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> Guardar
            	</button>
                <a href="<?php echo site_url('tipo_inmueble'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Estado</a>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>