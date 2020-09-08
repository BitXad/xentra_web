<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editar Tipo Asociado</h3>
            </div>
            <?php echo form_open('tipo_asociado/edit/'.$tipo_asociado['tipo_asoc']); ?>
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-6">
                        <label for="tipo_asoc" class="control-label"><span class="text-danger">*</span>Tipo</label>
                        <div class="form-group">
                          <input type="text" step="any" name="tipo_asoc" value="<?php echo $tipo_asociado["tipo_asoc"] ?>" class="form-control" id="tipo_asoc" autocomplete="off"  onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"required/>
                          <span class="text-danger"><?php echo form_error('tipo_asoc');?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Guardar
            	</button>
            	<a href="<?php echo site_url('tipo_asociado'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar</a>
            </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>