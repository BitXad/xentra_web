<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Detalle Factura Add</h3>
            </div>
            <?php echo form_open('detalle_factura/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="id_fact" class="control-label">Factura</label>
						<div class="form-group">
							<select name="id_fact" class="form-control">
								<option value="">select factura</option>
								<?php 
								foreach($all_factura as $factura)
								{
									$selected = ($factura['id_fact'] == $this->input->post('id_fact')) ? ' selected="selected"' : "";

									echo '<option value="'.$factura['id_fact'].'" '.$selected.'>'.$factura['num_fact'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="tipo_detfact" class="control-label">Tipo Detfact</label>
						<div class="form-group">
							<select name="tipo_detfact" class="form-control">
								<option value="">select</option>
								<?php 
								$tipo_detfact_values = array(
									'0'=>'NO EXENTO',
									'1'=>'VALOR EXENTO',
								);

								foreach($tipo_detfact_values as $value => $display_text)
								{
									$selected = ($value == $this->input->post('tipo_detfact')) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="cant_detfact" class="control-label">Cant Detfact</label>
						<div class="form-group">
							<input type="text" name="cant_detfact" value="<?php echo $this->input->post('cant_detfact'); ?>" class="form-control" id="cant_detfact" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="descip_detfact" class="control-label">Descip Detfact</label>
						<div class="form-group">
							<input type="text" name="descip_detfact" value="<?php echo $this->input->post('descip_detfact'); ?>" class="form-control" id="descip_detfact" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="punit_detfact" class="control-label">Punit Detfact</label>
						<div class="form-group">
							<input type="text" name="punit_detfact" value="<?php echo $this->input->post('punit_detfact'); ?>" class="form-control" id="punit_detfact" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="desc_detfact" class="control-label">Desc Detfact</label>
						<div class="form-group">
							<input type="text" name="desc_detfact" value="<?php echo $this->input->post('desc_detfact'); ?>" class="form-control" id="desc_detfact" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="total_detfact" class="control-label">Total Detfact</label>
						<div class="form-group">
							<input type="text" name="total_detfact" value="<?php echo $this->input->post('total_detfact'); ?>" class="form-control" id="total_detfact" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="exento_detfact" class="control-label">Exento Detfact</label>
						<div class="form-group">
							<input type="text" name="exento_detfact" value="<?php echo $this->input->post('exento_detfact'); ?>" class="form-control" id="exento_detfact" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="ice_detfact" class="control-label">Ice Detfact</label>
						<div class="form-group">
							<input type="text" name="ice_detfact" value="<?php echo $this->input->post('ice_detfact'); ?>" class="form-control" id="ice_detfact" />
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