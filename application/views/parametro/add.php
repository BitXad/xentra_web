<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Parametro Add</h3>
            </div>
            <?php echo form_open('parametro/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					
					<div class="col-md-6">
						<label for="descip_param" class="control-label">Descripción</label>
						<div class="form-group">
							<input type="text" name="descip_param" value="<?php echo $this->input->post('descip_param'); ?>" class="form-control" id="descip_param" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"/>
						</div>
					</div>
					<div class="col-md-6">
						<label for="dias_param" class="control-label">Dias</label>
						<div class="form-group">
							<input type="text" name="dias_param" value="<?php echo $this->input->post('dias_param'); ?>" class="form-control" id="dias_param" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="monto_param" class="control-label">Monto (Bs)</label>
						<div class="form-group">
							<input type="text" name="monto_param" value="<?php echo $this->input->post('monto_param'); ?>" class="form-control" id="monto_param" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="detalle_param" class="control-label">Detalle</label>
						<div class="form-group">
							<input type="text" name="detalle_param" value="<?php echo $this->input->post('detalle_param'); ?>" class="form-control" id="detalle_param" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"/>
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> Guardar
                </button>
                <a href="<?php echo site_url('parametro'); ?>" class="btn btn-danger">
                <i class="fa fa-times"></i> Cancelar</a>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>