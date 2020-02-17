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
									$selected = ($value == $this->input->post('estado')) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="descip_param" class="control-label">Descip Param</label>
						<div class="form-group">
							<input type="text" name="descip_param" value="<?php echo $this->input->post('descip_param'); ?>" class="form-control" id="descip_param" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="dias_param" class="control-label">Dias Param</label>
						<div class="form-group">
							<input type="text" name="dias_param" value="<?php echo $this->input->post('dias_param'); ?>" class="form-control" id="dias_param" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="monto_param" class="control-label">Monto Param</label>
						<div class="form-group">
							<input type="text" name="monto_param" value="<?php echo $this->input->post('monto_param'); ?>" class="form-control" id="monto_param" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="detalle_param" class="control-label">Detalle Param</label>
						<div class="form-group">
							<input type="text" name="detalle_param" value="<?php echo $this->input->post('detalle_param'); ?>" class="form-control" id="detalle_param" />
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Save
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>