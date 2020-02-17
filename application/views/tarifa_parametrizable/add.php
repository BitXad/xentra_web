<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Tarifa Parametrizable Add</h3>
            </div>
            <?php echo form_open('tarifa_parametrizable/add'); ?>
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
						<label for="costo_m3" class="control-label">Costo M3</label>
						<div class="form-group">
							<input type="text" name="costo_m3" value="<?php echo $this->input->post('costo_m3'); ?>" class="form-control" id="costo_m3" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="costo_fijo" class="control-label">Costo Fijo</label>
						<div class="form-group">
							<input type="text" name="costo_fijo" value="<?php echo $this->input->post('costo_fijo'); ?>" class="form-control" id="costo_fijo" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="porc_alcant" class="control-label">Porc Alcant</label>
						<div class="form-group">
							<input type="text" name="porc_alcant" value="<?php echo $this->input->post('porc_alcant'); ?>" class="form-control" id="porc_alcant" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="porc_factura" class="control-label">Porc Factura</label>
						<div class="form-group">
							<input type="text" name="porc_factura" value="<?php echo $this->input->post('porc_factura'); ?>" class="form-control" id="porc_factura" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="montofijo_extra" class="control-label">Montofijo Extra</label>
						<div class="form-group">
							<input type="text" name="montofijo_extra" value="<?php echo $this->input->post('montofijo_extra'); ?>" class="form-control" id="montofijo_extra" />
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