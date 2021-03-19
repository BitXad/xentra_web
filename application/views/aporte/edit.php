<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Modificar Aporte</h3>
            </div>
			<?php echo form_open('aporte/edit/'.$aporte['id_ap']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-4">
						<label for="mes_ap" class="control-label">Mes</label>
						<div class="form-group">
							<select name="mes_ap" class="form-control">
								<option value="">-</option>
								<?php 
								

								foreach($all_mes as $mes)
								{
									$selected = ($mes['mes_lec'] == $aporte['mes_ap']) ? ' selected="selected"' : "";

									echo '<option value="'.$mes['mes_lec'].'" '.$selected.'>'.$mes['mes_lec'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<label for="gestion_ap" class="control-label">Gestion</label>
						<div class="form-group">
							<select name="gestion_ap" class="form-control">
								<option value="">-</option>
								<?php 
								
								foreach($all_gestion as $gestion)
								{
									$selected = ($gestion['gestion_lec'] == $aporte['gestion_ap']) ? ' selected="selected"' : "";

									echo '<option value="'.$gestion['gestion_lec'].'" '.$selected.'>'.$gestion['gestion_lec'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<label for="tipo_ap" class="control-label">Tipo</label>
						<div class="form-group">
							<select name="tipo_ap" class="form-control">
							
								<?php 
								$tipo_ap_values = array(
									'PARCIAL'=>'PARCIAL',
									'PERMANENTE'=>'PERMANENTE',
								);

								foreach($tipo_ap_values as $value => $display_text)
								{
									$selected = ($value == $aporte['tipo_ap']) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					
					
					<div class="col-md-2">
						<label for="exento_ap" class="control-label">Exento</label>
						<div class="form-group">
							<select name="exento_ap" class="form-control">
								<!--<option value="">select</option>-->
								<?php 
								$exento_ap_values = array(
									'SI'=>'SI',
									'NO'=>'NO',
								);

								foreach($exento_ap_values as $value => $display_text)
								{
									$selected = ($value == $aporte['exento_ap']) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-2">
						<label for="ice_ap" class="control-label">Ice</label>
						<div class="form-group">
							<select name="ice_ap" class="form-control">
								<!--<option value="">select</option>-->
								<?php 
								$ice_ap_values = array(
									'SI'=>'SI',
									'NO'=>'NO',
								);

								foreach($ice_ap_values as $value => $display_text)
								{
									$selected = ($value == $aporte['ice_ap']) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<label for="motivo_ap" class="control-label"><span class="text-danger">*</span>Motivo</label>
						<div class="form-group">
							<input type="text" name="motivo_ap" value="<?php echo ($this->input->post('motivo_ap') ? $this->input->post('motivo_ap') : $aporte['motivo_ap']); ?>" class="form-control" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="motivo_ap" required />
							<span class="text-danger"><?php echo form_error('motivo_ap');?></span>
						</div>
					</div>
					<div class="col-md-4">
						<label for="detalle_ap" class="control-label">Detalle</label>
						<div class="form-group">
							<input type="text" name="detalle_ap" value="<?php echo ($this->input->post('detalle_ap') ? $this->input->post('detalle_ap') : $aporte['detalle_ap']); ?>" class="form-control" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="detalle_ap" />
						</div>
					</div>
					<div class="col-md-4">
						<label for="monto_ap" class="control-label"><span class="text-danger">*</span>Monto</label>
						<div class="form-group">
							<input type="number" step="any" name="monto_ap" value="<?php echo ($this->input->post('monto_ap') ? $this->input->post('monto_ap') : $aporte['monto_ap']); ?>" class="form-control" id="monto_ap" required />
							<span class="text-danger"><?php echo form_error('monto_ap');?></span>
						</div>
					</div>
					<div class="col-md-4">
						<label for="estado_ap" class="control-label">Estado</label>
						<div class="form-group">
							<select name="estado_ap" class="form-control">
								
								<?php 
								$estado_ap_values = array(
									'ACTIVO'=>'ACTIVO',
									'INACTIVO'=>'INACTIVO',
								);

								foreach($estado_ap_values as $value => $display_text)
								{
									$selected = ($value == $aporte['estado_ap']) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> Guardar
                </button>
                <a href="<?php echo site_url('aporte'); ?>" class="btn btn-danger">
                <i class="fa fa-times"></i> Cancelar</a>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>