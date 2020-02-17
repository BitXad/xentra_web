<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Asociado Aux Edit</h3>
            </div>
			<?php echo form_open('asociado_aux/edit/'.$asociado_aux['num']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="id_asoc" class="control-label">Id Asoc</label>
						<div class="form-group">
							<input type="text" name="id_asoc" value="<?php echo ($this->input->post('id_asoc') ? $this->input->post('id_asoc') : $asociado_aux['id_asoc']); ?>" class="form-control" id="id_asoc" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="nombre_asoc" class="control-label">Nombre Asoc</label>
						<div class="form-group">
							<input type="text" name="nombre_asoc" value="<?php echo ($this->input->post('nombre_asoc') ? $this->input->post('nombre_asoc') : $asociado_aux['nombre_asoc']); ?>" class="form-control" id="nombre_asoc" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="codigo" class="control-label">Codigo</label>
						<div class="form-group">
							<input type="text" name="codigo" value="<?php echo ($this->input->post('codigo') ? $this->input->post('codigo') : $asociado_aux['codigo']); ?>" class="form-control" id="codigo" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="direccion" class="control-label">Direccion</label>
						<div class="form-group">
							<input type="text" name="direccion" value="<?php echo ($this->input->post('direccion') ? $this->input->post('direccion') : $asociado_aux['direccion']); ?>" class="form-control" id="direccion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="servicio" class="control-label">Servicio</label>
						<div class="form-group">
							<input type="text" name="servicio" value="<?php echo ($this->input->post('servicio') ? $this->input->post('servicio') : $asociado_aux['servicio']); ?>" class="form-control" id="servicio" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="lectura_ant" class="control-label">Lectura Ant</label>
						<div class="form-group">
							<input type="text" name="lectura_ant" value="<?php echo ($this->input->post('lectura_ant') ? $this->input->post('lectura_ant') : $asociado_aux['lectura_ant']); ?>" class="form-control" id="lectura_ant" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="lectura_act" class="control-label">Lectura Act</label>
						<div class="form-group">
							<input type="text" name="lectura_act" value="<?php echo ($this->input->post('lectura_act') ? $this->input->post('lectura_act') : $asociado_aux['lectura_act']); ?>" class="form-control" id="lectura_act" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="consumo" class="control-label">Consumo</label>
						<div class="form-group">
							<input type="text" name="consumo" value="<?php echo ($this->input->post('consumo') ? $this->input->post('consumo') : $asociado_aux['consumo']); ?>" class="form-control" id="consumo" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="fecha" class="control-label">Fecha</label>
						<div class="form-group">
							<input type="text" name="fecha" value="<?php echo ($this->input->post('fecha') ? $this->input->post('fecha') : $asociado_aux['fecha']); ?>" class="has-datepicker form-control" id="fecha" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="hora" class="control-label">Hora</label>
						<div class="form-group">
							<input type="text" name="hora" value="<?php echo ($this->input->post('hora') ? $this->input->post('hora') : $asociado_aux['hora']); ?>" class="form-control" id="hora" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="estado" class="control-label">Estado</label>
						<div class="form-group">
							<input type="text" name="estado" value="<?php echo ($this->input->post('estado') ? $this->input->post('estado') : $asociado_aux['estado']); ?>" class="form-control" id="estado" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="gestion" class="control-label">Gestion</label>
						<div class="form-group">
							<input type="text" name="gestion" value="<?php echo ($this->input->post('gestion') ? $this->input->post('gestion') : $asociado_aux['gestion']); ?>" class="form-control" id="gestion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="mes" class="control-label">Mes</label>
						<div class="form-group">
							<input type="text" name="mes" value="<?php echo ($this->input->post('mes') ? $this->input->post('mes') : $asociado_aux['mes']); ?>" class="form-control" id="mes" />
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