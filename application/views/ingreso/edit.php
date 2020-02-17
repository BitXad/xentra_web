<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Ingreso Edit</h3>
            </div>
			<?php echo form_open('ingreso/edit/'.$ingreso['id_ing']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="id_usu" class="control-label">Asociado</label>
						<div class="form-group">
							<select name="id_usu" class="form-control">
								<option value="">select asociado</option>
								<?php 
								foreach($all_asociado as $asociado)
								{
									$selected = ($asociado['id_asoc'] == $ingreso['id_usu']) ? ' selected="selected"' : "";

									echo '<option value="'.$asociado['id_asoc'].'" '.$selected.'>'.$asociado['nombres_asoc'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="estado_ing" class="control-label">Estado Ing</label>
						<div class="form-group">
							<select name="estado_ing" class="form-control">
								<option value="">select</option>
								<?php 
								$estado_ing_values = array(
									'ACTIVO'=>'ACTIVO',
									'INACTIVO'=>'INACTIVO',
								);

								foreach($estado_ing_values as $value => $display_text)
								{
									$selected = ($value == $ingreso['estado_ing']) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="tipo_ing" class="control-label">Tipo Ing</label>
						<div class="form-group">
							<select name="tipo_ing" class="form-control">
								<option value="">select</option>
								<?php 
								$tipo_ing_values = array(
									'INGRESO'=>'INGRESO',
									'EGRESO'=>'EGRESO',
								);

								foreach($tipo_ing_values as $value => $display_text)
								{
									$selected = ($value == $ingreso['tipo_ing']) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="detalle_ing" class="control-label">Detalle Ing</label>
						<div class="form-group">
							<input type="text" name="detalle_ing" value="<?php echo ($this->input->post('detalle_ing') ? $this->input->post('detalle_ing') : $ingreso['detalle_ing']); ?>" class="form-control" id="detalle_ing" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="nombre_ing" class="control-label"><span class="text-danger">*</span>Nombre Ing</label>
						<div class="form-group">
							<input type="text" name="nombre_ing" value="<?php echo ($this->input->post('nombre_ing') ? $this->input->post('nombre_ing') : $ingreso['nombre_ing']); ?>" class="form-control" id="nombre_ing" />
							<span class="text-danger"><?php echo form_error('nombre_ing');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="fechahora_ing" class="control-label">Fechahora Ing</label>
						<div class="form-group">
							<input type="text" name="fechahora_ing" value="<?php echo ($this->input->post('fechahora_ing') ? $this->input->post('fechahora_ing') : $ingreso['fechahora_ing']); ?>" class="form-control" id="fechahora_ing" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="monto_ing" class="control-label"><span class="text-danger">*</span>Monto Ing</label>
						<div class="form-group">
							<input type="text" name="monto_ing" value="<?php echo ($this->input->post('monto_ing') ? $this->input->post('monto_ing') : $ingreso['monto_ing']); ?>" class="form-control" id="monto_ing" />
							<span class="text-danger"><?php echo form_error('monto_ing');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="descripcion_ing" class="control-label">Descripcion Ing</label>
						<div class="form-group">
							<input type="text" name="descripcion_ing" value="<?php echo ($this->input->post('descripcion_ing') ? $this->input->post('descripcion_ing') : $ingreso['descripcion_ing']); ?>" class="form-control" id="descripcion_ing" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="numrec_ing" class="control-label">Numrec Ing</label>
						<div class="form-group">
							<input type="text" name="numrec_ing" value="<?php echo ($this->input->post('numrec_ing') ? $this->input->post('numrec_ing') : $ingreso['numrec_ing']); ?>" class="form-control" id="numrec_ing" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="numrec_egr" class="control-label">Numrec Egr</label>
						<div class="form-group">
							<input type="text" name="numrec_egr" value="<?php echo ($this->input->post('numrec_egr') ? $this->input->post('numrec_egr') : $ingreso['numrec_egr']); ?>" class="form-control" id="numrec_egr" />
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