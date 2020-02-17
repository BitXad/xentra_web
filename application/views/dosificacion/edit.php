<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Dosificacion Edit</h3>
            </div>
			<?php echo form_open('dosificacion/edit/'.$dosificacion['id_dosif']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="estado_dosif" class="control-label">Estado Dosif</label>
						<div class="form-group">
							<select name="estado_dosif" class="form-control">
								<option value="">select</option>
								<?php 
								$estado_dosif_values = array(
									'ACTIVO'=>'ACTIVO',
									'INACTIVO'=>'INACTIVO',
								);

								foreach($estado_dosif_values as $value => $display_text)
								{
									$selected = ($value == $dosificacion['estado_dosif']) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="numorden_dosif" class="control-label"><span class="text-danger">*</span>Numorden Dosif</label>
						<div class="form-group">
							<input type="text" name="numorden_dosif" value="<?php echo ($this->input->post('numorden_dosif') ? $this->input->post('numorden_dosif') : $dosificacion['numorden_dosif']); ?>" class="form-control" id="numorden_dosif" />
							<span class="text-danger"><?php echo form_error('numorden_dosif');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="llave_dosif" class="control-label"><span class="text-danger">*</span>Llave Dosif</label>
						<div class="form-group">
							<input type="text" name="llave_dosif" value="<?php echo ($this->input->post('llave_dosif') ? $this->input->post('llave_dosif') : $dosificacion['llave_dosif']); ?>" class="form-control" id="llave_dosif" />
							<span class="text-danger"><?php echo form_error('llave_dosif');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="fechalim_dosif" class="control-label"><span class="text-danger">*</span>Fechalim Dosif</label>
						<div class="form-group">
							<input type="text" name="fechalim_dosif" value="<?php echo ($this->input->post('fechalim_dosif') ? $this->input->post('fechalim_dosif') : $dosificacion['fechalim_dosif']); ?>" class="has-datepicker form-control" id="fechalim_dosif" />
							<span class="text-danger"><?php echo form_error('fechalim_dosif');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="fechahora_dosif" class="control-label">Fechahora Dosif</label>
						<div class="form-group">
							<input type="text" name="fechahora_dosif" value="<?php echo ($this->input->post('fechahora_dosif') ? $this->input->post('fechahora_dosif') : $dosificacion['fechahora_dosif']); ?>" class="form-control" id="fechahora_dosif" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="numfact_dosif" class="control-label"><span class="text-danger">*</span>Numfact Dosif</label>
						<div class="form-group">
							<input type="text" name="numfact_dosif" value="<?php echo ($this->input->post('numfact_dosif') ? $this->input->post('numfact_dosif') : $dosificacion['numfact_dosif']); ?>" class="form-control" id="numfact_dosif" />
							<span class="text-danger"><?php echo form_error('numfact_dosif');?></span>
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