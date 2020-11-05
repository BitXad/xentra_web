<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Añadir Tarifa</h3>
            </div>
            <?php echo form_open('tarifa/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-4">
                        <label for="tipo" class="control-label">Tipo</label>
                        <div class="form-group">
                            <select name="tipo" class="form-control" id="tipo" required>
                                <!--<option value="">select</option>-->
                                <?php
                                foreach($all_tipo_asociado as $tipo_asociado)
                                {
                                    $selected = ($tipo_asociado["tipo_asoc"] == $this->input->post('tipo_asoc')) ? ' selected="selected"' : "";
                                    echo '<option value="'.$tipo_asociado["tipo_asoc"].'" '.$selected.'>'.$tipo_asociado["tipo_asoc"].'</option>';
                                } 
                                ?>
                            </select>
                        </div>
                    </div>
					<div class="col-md-4">
						<label for="desde" class="control-label">Desde (M3)</label>
						<div class="form-group">
							<input type="number" step="any" name="desde" value="0" class="form-control" id="desde" required/>
						</div>
					</div>
					<div class="col-md-4">
						<label for="hasta" class="control-label">Hasta (M3)</label>
						<div class="form-group">
							<input type="number" step="any" name="hasta" value="<?php echo $this->input->post('hasta'); ?>" class="form-control" id="hasta" required/>
						</div>
					</div>
					<div class="col-md-3">
						<label for="costo_agua" class="control-label">Costo Agua (Bs)</label>
						<div class="form-group">
							<input type="number" step="any" name="costo_agua" value="<?php echo $this->input->post('costo_agua'); ?>" class="form-control" id="costo_agua" required />
						</div>
					</div>
					<div class="col-md-3">
						<label for="costo_alcant" class="control-label">Costo Alcantarilla (Bs)</label>
						<div class="form-group">
							<input type="number" step="any" name="costo_alcant" value="<?php echo $this->input->post('costo_alcant'); ?>" class="form-control" id="costo_alcant" required/>
						</div>
					</div>
          <div class="col-md-3">
            <label for="costo_mt3" class="control-label">Costo (M3)</label>
            <div class="form-group">
              <input type="number" step="any" name="costo_mt3" value="<?php echo $this->input->post('costo_mt3'); ?>" class="form-control" id="costo_mt3" required/>
            </div>
          </div>
          <div class="col-md-3">
            <label for="consumo_basico" class="control-label">Consumo Basico (M3)</label>
            <div class="form-group">
              <input type="number" step="any" name="consumo_basico" value="<?php echo $this->input->post('consumo_basico'); ?>" class="form-control" id="consumo_basico" required/>
            </div>
          </div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Guardar
            	</button>
            	<a href="<?php echo site_url('tarifa'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar</a>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>