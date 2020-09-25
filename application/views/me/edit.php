<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Modificar Mes</h3>
            </div>
            <?php echo form_open('me/edit/'.$me['id_mes']); ?>
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-6">
                        <label for="mes_lec" class="control-label"><span class="text-danger">*</span>Mes</label>
                        <div class="form-group">
                            <input type="text" name="mes_lec" value="<?php echo ($this->input->post('mes_lec') ? $this->input->post('mes_lec') : $me['mes_lec']); ?>" class="form-control" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="mes_lec" required />
                            <span class="text-danger"><?php echo form_error('mes_lec');?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
            	<button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> Guardar
                </button>
                <a href="<?php echo site_url('me'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar</a>
            </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>