<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/multas.js'); ?>" type="text/javascript"></script>
<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editar Multa</h3>
            </div>
			
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-4 btn-primary">Buscar por:
		            <label for="apellido" class="control-label"> Apellido(s)</label>
		            <div class="form-group">
		              <input type="search" name="apellido" class="form-control" id="apellido" onkeypress="buscarasoc(event,2)" onKeyUp="this.value = this.value.toUpperCase();" autocomplete="off"  />
		            </div>  
		            </div>
		            
		            <div class="col-md-4 btn-primary">Buscar por:
		            <label for="nombre" class="control-label"> Nombre(s)</label>
		            <div class="form-group">
		              <input type="search" name="nombre" class="form-control" id="nombre" onkeypress="buscarasoc(event,3)" onKeyUp="this.value = this.value.toUpperCase();" autocomplete="off" />
		              
			            </div>
			        </div>
			        <?php echo form_open('multum/edit/'.$multum['id_multa']); ?>
			        <div class="col-md-4">
						<label for="nombre_asoc" class="control-label">Nombre Asociado</label>
						<div class="form-group">
							<input type="text" name="nombre_asoc" value="<?php echo ($this->input->post('nombre_asoc') ? $this->input->post('nombre_asoc') : $multum['nombre_asoc']); ?>" class="form-control" id="nombre_asoc" readonly/>
							<input type="hidden" name="id_asoc" value="<?php echo ($this->input->post('id_asoc') ? $this->input->post('id_asoc') : $multum['id_asoc']); ?>" class="form-control" id="id_asoc" />
						</div>
					</div>
					<div id="lista_asociados"></div>
					<div class="col-md-4">
						<label for="mes_multa" class="control-label">Mes</label>
						<div class="form-group">
							<select name="mes_multa" class="form-control">
								<option value="">-</option>
								<?php 
								

								foreach($all_mes as $mes)
								{
									$selected = ($mes['mes_lec'] == $multum['mes_multa']) ? ' selected="selected"' : "";

									echo '<option value="'.$mes['mes_lec'].'" '.$selected.'>'.$mes['mes_lec'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<label for="gestion_multa" class="control-label">Gestion</label>
						<div class="form-group">
							<select name="gestion_multa" class="form-control">
								<option value="">-</option>
								<?php 
								
								foreach($all_gestion as $gestion)
								{
									$selected = ($gestion['gestion_lec'] == $multum['gestion_multa']) ? ' selected="selected"' : "";

									echo '<option value="'.$gestion['gestion_lec'].'" '.$selected.'>'.$gestion['gestion_lec'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<label for="tipo_multa" class="control-label">Tipo</label>
						<div class="form-group">
							<select name="tipo_multa" class="form-control">
								
								<?php 
								$tipo_multa_values = array(
									'PARCIAL'=>'PARCIAL',
									'GENERAL'=>'GENERAL',
								);

								foreach($tipo_multa_values as $value => $display_text)
								{
									$selected = ($value == $multum['tipo_multa']) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					
					
					
					<div class="col-md-4">
						<label for="motivo_multa" class="control-label">Motivo</label>
						<div class="form-group">
							<input type="text" name="motivo_multa" value="<?php echo ($this->input->post('motivo_multa') ? $this->input->post('motivo_multa') : $multum['motivo_multa']); ?>" class="form-control" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="motivo_multa" />
						</div>
					</div>
					<div class="col-md-4">
						<label for="detalle_multa" class="control-label">Detalle</label>
						<div class="form-group">
							<input type="text" name="detalle_multa" value="<?php echo ($this->input->post('detalle_multa') ? $this->input->post('detalle_multa') : $multum['detalle_multa']); ?>" class="form-control" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="detalle_multa" />
						</div>
					</div>
					<div class="col-md-4">
						<label for="monto_multa" class="control-label">Monto</label>
						<div class="form-group">
							<input type="number" step="any" name="monto_multa" value="<?php echo ($this->input->post('monto_multa') ? $this->input->post('monto_multa') : $multum['monto_multa']); ?>" class="form-control" id="monto_multa" />
						</div>
					</div>
					<div class="col-md-4">
						<label for="estado_multa" class="control-label">Estado</label>
						<div class="form-group">
							<select name="estado_multa" class="form-control">
								
								<?php 
								$estado_multa_values = array(
									'ACTIVO'=>'ACTIVO',
									'INACTIVO'=>'INACTIVO',
								);

								foreach($estado_multa_values as $value => $display_text)
								{
									$selected = ($value == $multum['estado_multa']) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<!--<div class="col-md-4">
						<label for="fechahora_multa" class="control-label">Fechahora Multa</label>
						<div class="form-group">
							<input type="text" name="fechahora_multa" value="<?php echo ($this->input->post('fechahora_multa') ? $this->input->post('fechahora_multa') : $multum['fechahora_multa']); ?>" class="form-control" id="fechahora_multa" />
						</div>
					</div>
					
					<div class="col-md-4">
						<label for="exento_multa" class="control-label">Exento Multa</label>
						<div class="form-group">
							<input type="text" name="exento_multa" value="<?php echo ($this->input->post('exento_multa') ? $this->input->post('exento_multa') : $multum['exento_multa']); ?>" class="form-control" id="exento_multa" />
						</div>
					</div>
					<div class="col-md-4">
						<label for="ice_multa" class="control-label">Ice Multa</label>
						<div class="form-group">
							<input type="text" name="ice_multa" value="<?php echo ($this->input->post('ice_multa') ? $this->input->post('ice_multa') : $multum['ice_multa']); ?>" class="form-control" id="ice_multa" />
						</div>
					</div>-->
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> Guardar
                </button>
                <a href="<?php echo site_url('multum'); ?>" class="btn btn-danger">
                <i class="fa fa-times"></i> Cancelar</a>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>