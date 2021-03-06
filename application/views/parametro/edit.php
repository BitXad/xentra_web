<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Modificar Parametro</h3>
            </div>
			<?php echo form_open('parametro/edit/'.$parametro['id_param']); ?>
			<div class="box-body">
				<div class="row clearfix">
					
					<div class="col-md-6">
						<label for="descip_param" class="control-label">Descripción</label>
						<div class="form-group">
							<input type="text" name="descip_param" value="<?php echo ($this->input->post('descip_param') ? $this->input->post('descip_param') : $parametro['descip_param']); ?>" class="form-control" id="descip_param" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"/>
						</div>
					</div>
					<div class="col-md-6">
						<label for="dias_param" class="control-label">Dias</label>
						<div class="form-group">
							<input type="number" name="dias_param" value="<?php echo ($this->input->post('dias_param') ? $this->input->post('dias_param') : $parametro['dias_param']); ?>" class="form-control" id="dias_param" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="monto_param" class="control-label">Monto (Bs)</label>
						<div class="form-group">
							<input type="number" step="any" name="monto_param" value="<?php echo ($this->input->post('monto_param') ? $this->input->post('monto_param') : $parametro['monto_param']); ?>" class="form-control" id="monto_param" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="detalle_param" class="control-label">Detalle</label>
						<div class="form-group">
							<input type="text" name="detalle_param" value="<?php echo ($this->input->post('detalle_param') ? $this->input->post('detalle_param') : $parametro['detalle_param']); ?>" class="form-control" id="detalle_param" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="estado" class="control-label">Estado</label>
						<div class="form-group">
							<select name="estado" class="form-control">
								<option value="">select</option>
								<?php 
								$estado_values = array(
									'ACTIVO'=>'ACTIVO',
									'INACTIVO'=>'INACTIVO',
								);

								foreach($estado_values as $value => $display_text)
								{
									$selected = ($value == $parametro['estado']) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
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