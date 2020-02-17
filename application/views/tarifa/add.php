<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Tarifa Add</h3>
            </div>
            <?php echo form_open('tarifa/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="tipo" class="control-label">Tipo</label>
						<div class="form-group">
							<select name="tipo" class="form-control">
								<option value="">select</option>
								<?php 
								$tipo_values = array(
									'ASOCIADO'=>'ASOCIADO',
									'EXTERNO'=>'EXTERNO',
								);

								foreach($tipo_values as $value => $display_text)
								{
									$selected = ($value == $this->input->post('tipo')) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="desde" class="control-label">Desde</label>
						<div class="form-group">
							<input type="text" name="desde" value="<?php echo $this->input->post('desde'); ?>" class="form-control" id="desde" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="hasta" class="control-label">Hasta</label>
						<div class="form-group">
							<input type="text" name="hasta" value="<?php echo $this->input->post('hasta'); ?>" class="form-control" id="hasta" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="costo_agua" class="control-label">Costo Agua</label>
						<div class="form-group">
							<input type="text" name="costo_agua" value="<?php echo $this->input->post('costo_agua'); ?>" class="form-control" id="costo_agua" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="costo_alcant" class="control-label">Costo Alcant</label>
						<div class="form-group">
							<input type="text" name="costo_alcant" value="<?php echo $this->input->post('costo_alcant'); ?>" class="form-control" id="costo_alcant" />
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