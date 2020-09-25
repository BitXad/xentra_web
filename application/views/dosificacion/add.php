<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Añadir Dosificación</h3>
            </div>
            <?php echo form_open('dosificacion/add'); ?>
            <div class="box-body">
                <div class="row clearfix">
					<div class="col-md-6">
						<label for="numorden_dosif" class="control-label"><span class="text-danger">*</span>Autorización</label>
						<div class="form-group">
							<input type="text" name="numorden_dosif" value="<?php echo $this->input->post('numorden_dosif'); ?>" class="form-control" id="numorden_dosif" required />
							<span class="text-danger"><?php echo form_error('numorden_dosif');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="llave_dosif" class="control-label"><span class="text-danger">*</span>Llave</label>
						<div class="form-group">
							<input type="text" name="llave_dosif" value="<?php echo $this->input->post('llave_dosif'); ?>" class="form-control" id="llave_dosif" requiered />
							<span class="text-danger"><?php echo form_error('llave_dosif');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="fechalim_dosif" class="control-label"><span class="text-danger">*</span>Fecha Limite</label>
						<div class="form-group">
							<input type="text" name="fechalim_dosif" value="<?php echo $this->input->post('fechalim_dosif'); ?>" class="has-datepicker form-control" id="fechalim_dosif" required />
							<span class="text-danger"><?php echo form_error('fechalim_dosif');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="fechahora_dosif" class="control-label">Fecha Hora</label>
						<div class="form-group">
							<input type="text" name="fechahora_dosif" value="<?php echo $this->input->post('fechahora_dosif'); ?>" class="form-control" id="fechahora_dosif" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="numfact_dosif" class="control-label"><span class="text-danger">*</span>Num.Factura</label>
						<div class="form-group">
							<input type="text" name="numfact_dosif" value="<?php echo $this->input->post('numfact_dosif'); ?>" class="form-control" id="numfact_dosif" required />
							<span class="text-danger"><?php echo form_error('numfact_dosif');?></span>
						</div>
					</div>
                </div>
            </div>
            <div class="box-footer">
            	<button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> Guardar
            	</button>
                <a href="<?php echo site_url('dosificacion'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar</a>
            </div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>