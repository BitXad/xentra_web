<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Medidor Servicio Add</h3>
            </div>
            <?php echo form_open('medidor_servicio/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="id_med" class="control-label">Medidor</label>
						<div class="form-group">
							<select name="id_med" class="form-control">
								<option value="">select medidor</option>
								<?php 
								foreach($all_medidor as $medidor)
								{
									$selected = ($medidor['id_med'] == $this->input->post('id_med')) ? ' selected="selected"' : "";

									echo '<option value="'.$medidor['id_med'].'" '.$selected.'>'.$medidor['id_asoc'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="servicio" class="control-label">Servicio</label>
						<div class="form-group">
							<input type="text" name="servicio" value="<?php echo $this->input->post('servicio'); ?>" class="form-control" id="servicio" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="monto_serv" class="control-label">Monto Serv</label>
						<div class="form-group">
							<input type="text" name="monto_serv" value="<?php echo $this->input->post('monto_serv'); ?>" class="form-control" id="monto_serv" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="fecha_serv" class="control-label">Fecha Serv</label>
						<div class="form-group">
							<input type="text" name="fecha_serv" value="<?php echo $this->input->post('fecha_serv'); ?>" class="has-datepicker form-control" id="fecha_serv" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="hora_serv" class="control-label">Hora Serv</label>
						<div class="form-group">
							<input type="text" name="hora_serv" value="<?php echo $this->input->post('hora_serv'); ?>" class="form-control" id="hora_serv" />
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