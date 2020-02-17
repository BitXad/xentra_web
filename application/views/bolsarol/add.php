<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Bolsarol Add</h3>
            </div>
            <?php echo form_open('bolsarol/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="estado_rol" class="control-label">Estado</label>
						<div class="form-group">
							<select name="estado_rol" class="form-control">
								<option value="">select estado</option>
								<?php 
								foreach($all_estados as $estado)
								{
									$selected = ($estado['estado'] == $this->input->post('estado_rol')) ? ' selected="selected"' : "";

									echo '<option value="'.$estado['estado'].'" '.$selected.'>'.$estado['estado'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_rol" class="control-label">Id Rol</label>
						<div class="form-group">
							<input type="text" name="id_rol" value="<?php echo $this->input->post('id_rol'); ?>" class="form-control" id="id_rol" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="rol" class="control-label"><span class="text-danger">*</span>Rol</label>
						<div class="form-group">
							<input type="text" name="rol" value="<?php echo $this->input->post('rol'); ?>" class="form-control" id="rol" />
							<span class="text-danger"><?php echo form_error('rol');?></span>
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