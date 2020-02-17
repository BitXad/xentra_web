<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Categoria Ingreso Add</h3>
            </div>
            <?php echo form_open('categoria_ingreso/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="nom_cating" class="control-label"><span class="text-danger">*</span>Nom Cating</label>
						<div class="form-group">
							<input type="text" name="nom_cating" value="<?php echo $this->input->post('nom_cating'); ?>" class="form-control" id="nom_cating" />
							<span class="text-danger"><?php echo form_error('nom_cating');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_ging" class="control-label">Id Ging</label>
						<div class="form-group">
							<input type="text" name="id_ging" value="<?php echo $this->input->post('id_ging'); ?>" class="form-control" id="id_ging" />
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