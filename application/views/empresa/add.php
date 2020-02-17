<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Empresa Add</h3>
            </div>
            <?php echo form_open('empresa/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="nombre_emp" class="control-label"><span class="text-danger">*</span>Nombre Emp</label>
						<div class="form-group">
							<input type="text" name="nombre_emp" value="<?php echo $this->input->post('nombre_emp'); ?>" class="form-control" id="nombre_emp" />
							<span class="text-danger"><?php echo form_error('nombre_emp');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="eslogan_emp" class="control-label">Eslogan Emp</label>
						<div class="form-group">
							<input type="text" name="eslogan_emp" value="<?php echo $this->input->post('eslogan_emp'); ?>" class="form-control" id="eslogan_emp" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="direccion_emp" class="control-label">Direccion Emp</label>
						<div class="form-group">
							<input type="text" name="direccion_emp" value="<?php echo $this->input->post('direccion_emp'); ?>" class="form-control" id="direccion_emp" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="telefono_emp" class="control-label">Telefono Emp</label>
						<div class="form-group">
							<input type="text" name="telefono_emp" value="<?php echo $this->input->post('telefono_emp'); ?>" class="form-control" id="telefono_emp" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="sucursal_emp" class="control-label">Sucursal Emp</label>
						<div class="form-group">
							<input type="text" name="sucursal_emp" value="<?php echo $this->input->post('sucursal_emp'); ?>" class="form-control" id="sucursal_emp" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="ubicacion_emp" class="control-label">Ubicacion Emp</label>
						<div class="form-group">
							<input type="text" name="ubicacion_emp" value="<?php echo $this->input->post('ubicacion_emp'); ?>" class="form-control" id="ubicacion_emp" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="actividad_emp" class="control-label">Actividad Emp</label>
						<div class="form-group">
							<input type="text" name="actividad_emp" value="<?php echo $this->input->post('actividad_emp'); ?>" class="form-control" id="actividad_emp" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="nit_emp" class="control-label">Nit Emp</label>
						<div class="form-group">
							<input type="text" name="nit_emp" value="<?php echo $this->input->post('nit_emp'); ?>" class="form-control" id="nit_emp" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="logo_emp" class="control-label">Logo Emp</label>
						<div class="form-group">
							<input type="text" name="logo_emp" value="<?php echo $this->input->post('logo_emp'); ?>" class="form-control" id="logo_emp" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="zona_emp" class="control-label">Zona Emp</label>
						<div class="form-group">
							<input type="text" name="zona_emp" value="<?php echo $this->input->post('zona_emp'); ?>" class="form-control" id="zona_emp" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="sis_emp" class="control-label">Sis Emp</label>
						<div class="form-group">
							<input type="text" name="sis_emp" value="<?php echo $this->input->post('sis_emp'); ?>" class="form-control" id="sis_emp" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="anuncio_emp" class="control-label">Anuncio Emp</label>
						<div class="form-group">
							<input type="text" name="anuncio_emp" value="<?php echo $this->input->post('anuncio_emp'); ?>" class="form-control" id="anuncio_emp" />
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