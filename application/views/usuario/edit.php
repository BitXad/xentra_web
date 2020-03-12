<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editar Usuario</h3>
            </div>
			<?php echo form_open_multipart('usuario/edit/'.$usuario['id_usu']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="nombre_usu" class="control-label"><span class="text-danger">*</span>Nombre</label>
						<div class="form-group">
							<input type="text" name="nombre_usu" value="<?php echo ($this->input->post('nombre_usu') ? $this->input->post('nombre_usu') : $usuario['nombre_usu']); ?>" class="form-control" id="nombre_usu" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" required />
						</div>
					</div>
					<div class="col-md-6">
						<label for="tipo_usuario" class="control-label"><span class="text-danger">*</span>Tipo</label>
						<div class="form-group">
							<select name="tipo_usuario" class="form-control" required>
								<!--<option value="">- TIPO USUARIO -</option>-->
								<?php 
								foreach($all_tipo_usuario as $tipo_usuario)
								{
									$selected = ($tipo_usuario['tipo_usuario'] == $usuario['tipo_usuario']) ? ' selected="selected"' : "";

									echo '<option value="'.$tipo_usuario['tipo_usuario'].'" '.$selected.'>'.$tipo_usuario['tipo_usuario'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					
					
					<!--<div class="col-md-6">
						<label for="usuario_email" class="control-label">Email</label>
						<div class="form-group">
							<input type="text" name="usuario_email" value="<?php //echo ($this->input->post('usuario_email') ? $this->input->post('usuario_email') : $usuario['usuario_email']); ?>" class="form-control" id="usuario_email" />
						</div>
					</div>-->
					<div class="col-md-6">
						<label for="login_usu" class="control-label"><span class="text-danger">*</span>Login</label>
						<div class="form-group">
							<input type="text" name="login_usu" value="<?php echo ($this->input->post('login_usu') ? $this->input->post('login_usu') : $usuario['login_usu']); ?>" class="form-control" id="login_usu" required/>
							<span class="text-danger"><?php echo form_error('login_usu');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="imagen_usu" class="control-label">Imagen</label>
						<div class="form-group">
							<input type="file" name="imagen_usu" value="<?php echo ($this->input->post('imagen_usu') ? $this->input->post('imagen_usu') : $usuario['imagen_usu']); ?>" class="form-control" id="imagen_usu" />
							<input type="hidden" name="imagen_usu1" value="<?php echo ($this->input->post('imagen_usu') ? $this->input->post('imagen_usu') : $usuario['imagen_usu']); ?>" class="form-control" id="imagen_usu1" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="estado_usu" class="control-label"><span class="text-danger">*</span>Estado</label>
						<div class="form-group">
							<select name="estado_usu" class="form-control" required>
								<!--<option value="">- ESTADO -</option>-->
								<?php 
								foreach($all_estado as $estado)
								{
									$selected = ($estado['estado'] == $usuario['estado_usu']) ? ' selected="selected"' : "";

									echo '<option value="'.$estado['estado'].'" '.$selected.'>'.$estado['estado'].'</option>';
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
                     <a href="<?php echo site_url('usuario'); ?>" class="btn btn-danger">
                                <i class="fa fa-times"></i> Cancelar</a>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>