<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Categoria Egreso Add</h3>
            </div>
            <?php echo form_open('categoria_egreso/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="nom_categr" class="control-label"><span class="text-danger">*</span>Nombre</label>
						<div class="form-group">
							<input type="text" name="nom_categr" value="<?php echo $this->input->post('nom_categr'); ?>" class="form-control" id="nom_categr" />
							<span class="text-danger"><?php echo form_error('nom_categr');?></span>
						</div>
					</div>
					<div class="col-md-6 hidden">
						<label for="id_gegr" class="control-label">Id Ging</label>
						<div class="form-group">
							<input type="text" name="id_gegr" value="<?php echo $this->input->post('id_gegr'); ?>" class="form-control" id="id_gegr" />
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