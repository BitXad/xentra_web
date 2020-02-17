<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Ingreso Egresox Edit</h3>
            </div>
			<?php echo form_open('ingreso_egresox/edit/'.$ingreso_egresox['id_ing']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="id_usu" class="control-label">Id Usu</label>
						<div class="form-group">
							<input type="text" name="id_usu" value="<?php echo ($this->input->post('id_usu') ? $this->input->post('id_usu') : $ingreso_egresox['id_usu']); ?>" class="form-control" id="id_usu" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="detalle_ing" class="control-label">Detalle Ing</label>
						<div class="form-group">
							<input type="text" name="detalle_ing" value="<?php echo ($this->input->post('detalle_ing') ? $this->input->post('detalle_ing') : $ingreso_egresox['detalle_ing']); ?>" class="form-control" id="detalle_ing" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="nombre_ing" class="control-label">Nombre Ing</label>
						<div class="form-group">
							<input type="text" name="nombre_ing" value="<?php echo ($this->input->post('nombre_ing') ? $this->input->post('nombre_ing') : $ingreso_egresox['nombre_ing']); ?>" class="form-control" id="nombre_ing" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="fechahora_ing" class="control-label">Fechahora Ing</label>
						<div class="form-group">
							<input type="text" name="fechahora_ing" value="<?php echo ($this->input->post('fechahora_ing') ? $this->input->post('fechahora_ing') : $ingreso_egresox['fechahora_ing']); ?>" class="form-control" id="fechahora_ing" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="monto_ing" class="control-label">Monto Ing</label>
						<div class="form-group">
							<input type="text" name="monto_ing" value="<?php echo ($this->input->post('monto_ing') ? $this->input->post('monto_ing') : $ingreso_egresox['monto_ing']); ?>" class="form-control" id="monto_ing" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="descripcion_ing" class="control-label">Descripcion Ing</label>
						<div class="form-group">
							<input type="text" name="descripcion_ing" value="<?php echo ($this->input->post('descripcion_ing') ? $this->input->post('descripcion_ing') : $ingreso_egresox['descripcion_ing']); ?>" class="form-control" id="descripcion_ing" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="estado_ing" class="control-label">Estado Ing</label>
						<div class="form-group">
							<input type="text" name="estado_ing" value="<?php echo ($this->input->post('estado_ing') ? $this->input->post('estado_ing') : $ingreso_egresox['estado_ing']); ?>" class="form-control" id="estado_ing" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="tipo_ing" class="control-label">Tipo Ing</label>
						<div class="form-group">
							<input type="text" name="tipo_ing" value="<?php echo ($this->input->post('tipo_ing') ? $this->input->post('tipo_ing') : $ingreso_egresox['tipo_ing']); ?>" class="form-control" id="tipo_ing" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="numrec_ing" class="control-label">Numrec Ing</label>
						<div class="form-group">
							<input type="text" name="numrec_ing" value="<?php echo ($this->input->post('numrec_ing') ? $this->input->post('numrec_ing') : $ingreso_egresox['numrec_ing']); ?>" class="form-control" id="numrec_ing" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="numrec_egr" class="control-label">Numrec Egr</label>
						<div class="form-group">
							<input type="text" name="numrec_egr" value="<?php echo ($this->input->post('numrec_egr') ? $this->input->post('numrec_egr') : $ingreso_egresox['numrec_egr']); ?>" class="form-control" id="numrec_egr" />
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