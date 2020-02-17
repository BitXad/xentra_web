<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Rol Usuario Edit</h3>
            </div>
			<?php echo form_open('rol_usuario/edit/'.$rol_usuario['']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<div class="form-group">
							<input type="checkbox" name="estado_rol" value="1" <?php echo ($rol_usuario['estado_rol']==1 ? 'checked="checked"' : ''); ?> id='estado_rol' />
							<label for="estado_rol" class="control-label">Estado Rol</label>
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_usu" class="control-label">Usuario</label>
						<div class="form-group">
							<select name="id_usu" class="form-control">
								<option value="">select usuario</option>
								<?php 
								foreach($all_usuario as $usuario)
								{
									$selected = ($usuario['id_usu'] == $rol_usuario['id_usu']) ? ' selected="selected"' : "";

									echo '<option value="'.$usuario['id_usu'].'" '.$selected.'>'.$usuario['nombre_usu'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_rol" class="control-label">Id Rol</label>
						<div class="form-group">
							<input type="text" name="id_rol" value="<?php echo ($this->input->post('id_rol') ? $this->input->post('id_rol') : $rol_usuario['id_rol']); ?>" class="form-control" id="id_rol" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="fecha" class="control-label">Fecha</label>
						<div class="form-group">
							<input type="text" name="fecha" value="<?php echo ($this->input->post('fecha') ? $this->input->post('fecha') : $rol_usuario['fecha']); ?>" class="has-datetimepicker form-control" id="fecha" />
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