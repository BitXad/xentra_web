<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Bitacora Add</h3>
            </div>
            <?php echo form_open('bitacora/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="fecha" class="control-label">Fecha</label>
						<div class="form-group">
							<input type="text" name="fecha" value="<?php echo $this->input->post('fecha'); ?>" class="has-datepicker form-control" id="fecha" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="hora" class="control-label">Hora</label>
						<div class="form-group">
							<input type="text" name="hora" value="<?php echo $this->input->post('hora'); ?>" class="form-control" id="hora" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="ope" class="control-label">Ope</label>
						<div class="form-group">
							<input type="text" name="ope" value="<?php echo $this->input->post('ope'); ?>" class="form-control" id="ope" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="usuario" class="control-label">Usuario</label>
						<div class="form-group">
							<input type="text" name="usuario" value="<?php echo $this->input->post('usuario'); ?>" class="form-control" id="usuario" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="sentenc" class="control-label">Sentenc</label>
						<div class="form-group">
							<textarea name="sentenc" class="form-control" id="sentenc"><?php echo $this->input->post('sentenc'); ?></textarea>
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