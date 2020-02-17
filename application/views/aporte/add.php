<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Aporte Add</h3>
            </div>
            <?php echo form_open('aporte/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="mes_ap" class="control-label">Mes Ap</label>
						<div class="form-group">
							<select name="mes_ap" class="form-control">
								<option value="">select</option>
								<?php 
								$mes_ap_values = array(
									'ENERO'=>'ENERO',
									'FEBRERO'=>'FEBRERO',
									'MARZO'=>'MARZO',
									'ABRIL'=>'ABRIL',
									'MAYO'=>'MAYO',
									'JUNIO'=>'JUNIO',
									'JULIO'=>'JULIO',
									'AGOSTO'=>'AGOSTO',
									'SEPTIEMBRE'=>'SEPTIEMBRE',
									'OCTUBRE'=>'OCTUBRE',
									'NOVIEMBRE'=>'NOVIEMBRE',
									'DICIEMBRE'=>'DICIEMBRE',
								);

								foreach($mes_ap_values as $value => $display_text)
								{
									$selected = ($value == $this->input->post('mes_ap')) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="gestion_ap" class="control-label">Gestion Ap</label>
						<div class="form-group">
							<select name="gestion_ap" class="form-control">
								<option value="">select</option>
								<?php 
								$gestion_ap_values = array(
									'2018'=>'2018',
									'2019'=>'2019',
									'2020'=>'2020',
									'2021'=>'2021',
									'2022'=>'2022',
									'2023'=>'2023',
									'2024'=>'2024',
									'2025'=>'2025',
									'2026'=>'2026',
									'2027'=>'2027',
									'2028'=>'2028',
									'2029'=>'2029',
									'2030'=>'2030',
								);

								foreach($gestion_ap_values as $value => $display_text)
								{
									$selected = ($value == $this->input->post('gestion_ap')) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="tipo_ap" class="control-label">Tipo Ap</label>
						<div class="form-group">
							<select name="tipo_ap" class="form-control">
								<option value="">select</option>
								<?php 
								$tipo_ap_values = array(
									'PARCIAL'=>'PARCIAL',
									'PERMANENTE'=>'PERMANENTE',
								);

								foreach($tipo_ap_values as $value => $display_text)
								{
									$selected = ($value == $this->input->post('tipo_ap')) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="estado_ap" class="control-label">Estado Ap</label>
						<div class="form-group">
							<select name="estado_ap" class="form-control">
								<option value="">select</option>
								<?php 
								$estado_ap_values = array(
									'ACTIVO'=>'ACTIVO',
									'INACTIVO'=>'INACTIVO',
								);

								foreach($estado_ap_values as $value => $display_text)
								{
									$selected = ($value == $this->input->post('estado_ap')) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_usu" class="control-label">Usuario</label>
						<div class="form-group">
							<select name="id_usu" class="form-control">
								<option value="">select usuario</option>
								<?php 
								foreach($all_usuario as $usuario)
								{
									$selected = ($usuario['id_usu'] == $this->input->post('id_usu')) ? ' selected="selected"' : "";

									echo '<option value="'.$usuario['id_usu'].'" '.$selected.'>'.$usuario['nombre_usu'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="exento_ap" class="control-label">Exento Ap</label>
						<div class="form-group">
							<select name="exento_ap" class="form-control">
								<option value="">select</option>
								<?php 
								$exento_ap_values = array(
									'SI'=>'SI',
									'NO'=>'NO',
								);

								foreach($exento_ap_values as $value => $display_text)
								{
									$selected = ($value == $this->input->post('exento_ap')) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="ice_ap" class="control-label">Ice Ap</label>
						<div class="form-group">
							<select name="ice_ap" class="form-control">
								<option value="">select</option>
								<?php 
								$ice_ap_values = array(
									'SI'=>'SI',
									'NO'=>'NO',
								);

								foreach($ice_ap_values as $value => $display_text)
								{
									$selected = ($value == $this->input->post('ice_ap')) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="motivo_ap" class="control-label"><span class="text-danger">*</span>Motivo Ap</label>
						<div class="form-group">
							<input type="text" name="motivo_ap" value="<?php echo $this->input->post('motivo_ap'); ?>" class="form-control" id="motivo_ap" />
							<span class="text-danger"><?php echo form_error('motivo_ap');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="detalle_ap" class="control-label">Detalle Ap</label>
						<div class="form-group">
							<input type="text" name="detalle_ap" value="<?php echo $this->input->post('detalle_ap'); ?>" class="form-control" id="detalle_ap" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="monto_ap" class="control-label"><span class="text-danger">*</span>Monto Ap</label>
						<div class="form-group">
							<input type="text" name="monto_ap" value="<?php echo $this->input->post('monto_ap'); ?>" class="form-control" id="monto_ap" />
							<span class="text-danger"><?php echo form_error('monto_ap');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="fechahora_ap" class="control-label">Fechahora Ap</label>
						<div class="form-group">
							<input type="text" name="fechahora_ap" value="<?php echo $this->input->post('fechahora_ap'); ?>" class="form-control" id="fechahora_ap" />
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