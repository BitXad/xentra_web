<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Configuracion Add</h3>
            </div>
            <?php echo form_open('configuracion/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<div class="form-group">
							<input type="checkbox" name="valor" value="1"  id="valor" />
							<label for="valor" class="control-label">Valor</label>
						</div>
					</div>
					<div class="col-md-6">
						<label for="parametro" class="control-label">Parametro</label>
						<div class="form-group">
							<input type="text" name="parametro" value="<?php echo $this->input->post('parametro'); ?>" class="form-control" id="parametro" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="num" class="control-label">Num</label>
						<div class="form-group">
							<input type="text" name="num" value="<?php echo $this->input->post('num'); ?>" class="form-control" id="num" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="opcion" class="control-label"><span class="text-danger">*</span>Opcion</label>
						<div class="form-group">
							<input type="text" name="opcion" value="<?php echo $this->input->post('opcion'); ?>" class="form-control" id="opcion" />
							<span class="text-danger"><?php echo form_error('opcion');?></span>
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