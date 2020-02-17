<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Rol Add</h3>
            </div>
            <?php echo form_open('rol/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<div class="form-group">
							<input type="checkbox" name="estado_rol" value="1"  id="estado_rol" />
							<label for="estado_rol" class="control-label">Estado Rol</label>
						</div>
					</div>
					<div class="col-md-6">
						<label for="nom_rol" class="control-label"><span class="text-danger">*</span>Nom Rol</label>
						<div class="form-group">
							<input type="text" name="nom_rol" value="<?php echo $this->input->post('nom_rol'); ?>" class="form-control" id="nom_rol" />
							<span class="text-danger"><?php echo form_error('nom_rol');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="desc_rol" class="control-label">Desc Rol</label>
						<div class="form-group">
							<input type="text" name="desc_rol" value="<?php echo $this->input->post('desc_rol'); ?>" class="form-control" id="desc_rol" />
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