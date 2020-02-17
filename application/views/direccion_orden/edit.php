<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Direccion Orden Edit</h3>
            </div>
			<?php echo form_open('direccion_orden/edit/'.$direccion_orden['id_dir']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="nombre_dir" class="control-label"><span class="text-danger">*</span>Nombre Dir</label>
						<div class="form-group">
							<input type="text" name="nombre_dir" value="<?php echo ($this->input->post('nombre_dir') ? $this->input->post('nombre_dir') : $direccion_orden['nombre_dir']); ?>" class="form-control" id="nombre_dir" />
							<span class="text-danger"><?php echo form_error('nombre_dir');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="orden_dir" class="control-label">Orden Dir</label>
						<div class="form-group">
							<input type="text" name="orden_dir" value="<?php echo ($this->input->post('orden_dir') ? $this->input->post('orden_dir') : $direccion_orden['orden_dir']); ?>" class="form-control" id="orden_dir" />
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