<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Tarifa Edit</h3>
            </div>
			<?php echo form_open('tarifa/edit/'.$tarifa['id_tarifa']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
                        <label for="tipo_asoc" class="control-label">Tipo</label>
                        <div class="form-group">
                            <select name="tipo_asoc" class="form-control">
                                <!--<option value="">select</option>-->
                                <?php 
                                foreach($all_tipo_asociado as $tipo_asociado)
                                {
                                    $selected = ($tipo_asociado["tipo_asoc"] == $asociado["tipo_asoc"]) ? ' selected="selected"' : "";
                                    echo '<option value="'.$tipo_asociado["tipo_asoc"].'" '.$selected.'>'.$tipo_asociado["tipo_asoc"].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
					<div class="col-md-6">
						<label for="desde" class="control-label">Desde</label>
						<div class="form-group">
							<input type="text" name="desde" value="<?php echo ($this->input->post('desde') ? $this->input->post('desde') : $tarifa['desde']); ?>" class="form-control" id="desde" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="hasta" class="control-label">Hasta</label>
						<div class="form-group">
							<input type="text" name="hasta" value="<?php echo ($this->input->post('hasta') ? $this->input->post('hasta') : $tarifa['hasta']); ?>" class="form-control" id="hasta" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="costo_agua" class="control-label">Costo Agua</label>
						<div class="form-group">
							<input type="text" name="costo_agua" value="<?php echo ($this->input->post('costo_agua') ? $this->input->post('costo_agua') : $tarifa['costo_agua']); ?>" class="form-control" id="costo_agua" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="costo_alcant" class="control-label">Costo Alcant</label>
						<div class="form-group">
							<input type="text" name="costo_alcant" value="<?php echo ($this->input->post('costo_alcant') ? $this->input->post('costo_alcant') : $tarifa['costo_alcant']); ?>" class="form-control" id="costo_alcant" />
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Guardar
				</button><a href="<?php echo site_url('tarifa'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar</a>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>