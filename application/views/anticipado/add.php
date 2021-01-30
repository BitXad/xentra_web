<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Factura Add</h3>
            </div>
            <?php echo form_open('factura/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="tipo_fact" class="control-label">Tipo Fact</label>
						<div class="form-group">
							<select name="tipo_fact" class="form-control">
								<option value="">select</option>
								<?php 
								$tipo_fact_values = array(
									'0'=>'RECIBO',
									'1'=>'FACTURA',
								);

								foreach($tipo_fact_values as $value => $display_text)
								{
									$selected = ($value == $this->input->post('tipo_fact')) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="estado_fact" class="control-label">Estado Fact</label>
						<div class="form-group">
							<select name="estado_fact" class="form-control">
								<option value="">select</option>
								<?php 
								$estado_fact_values = array(
									'PENDIENTE'=>'PENDIENTE',
									'CANCELADA'=>'CANCELADA',
									'ANULADA'=>'ANULADA',
								);

								foreach($estado_fact_values as $value => $display_text)
								{
									$selected = ($value == $this->input->post('estado_fact')) ? ' selected="selected"' : "";

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
						<label for="id_lec" class="control-label">Id Lec</label>
						<div class="form-group">
							<input type="text" name="id_lec" value="<?php echo $this->input->post('id_lec'); ?>" class="form-control" id="id_lec" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="num_fact" class="control-label">Num Fact</label>
						<div class="form-group">
							<input type="text" name="num_fact" value="<?php echo $this->input->post('num_fact'); ?>" class="form-control" id="num_fact" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="nit_fact" class="control-label">Nit Fact</label>
						<div class="form-group">
							<input type="text" name="nit_fact" value="<?php echo $this->input->post('nit_fact'); ?>" class="form-control" id="nit_fact" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="razon_fact" class="control-label">Razon Fact</label>
						<div class="form-group">
							<input type="text" name="razon_fact" value="<?php echo $this->input->post('razon_fact'); ?>" class="form-control" id="razon_fact" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="orden_fact" class="control-label">Orden Fact</label>
						<div class="form-group">
							<input type="text" name="orden_fact" value="<?php echo $this->input->post('orden_fact'); ?>" class="form-control" id="orden_fact" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="nitemisor_fact" class="control-label">Nitemisor Fact</label>
						<div class="form-group">
							<input type="text" name="nitemisor_fact" value="<?php echo $this->input->post('nitemisor_fact'); ?>" class="form-control" id="nitemisor_fact" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="llave_fact" class="control-label">Llave Fact</label>
						<div class="form-group">
							<input type="text" name="llave_fact" value="<?php echo $this->input->post('llave_fact'); ?>" class="form-control" id="llave_fact" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="fecha_fact" class="control-label">Fecha Fact</label>
						<div class="form-group">
							<input type="text" name="fecha_fact" value="<?php echo $this->input->post('fecha_fact'); ?>" class="has-datepicker form-control" id="fecha_fact" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="hora_fact" class="control-label">Hora Fact</label>
						<div class="form-group">
							<input type="text" name="hora_fact" value="<?php echo $this->input->post('hora_fact'); ?>" class="form-control" id="hora_fact" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="fechaemision_fact" class="control-label">Fechaemision Fact</label>
						<div class="form-group">
							<input type="text" name="fechaemision_fact" value="<?php echo $this->input->post('fechaemision_fact'); ?>" class="has-datepicker form-control" id="fechaemision_fact" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="montoparc_fact" class="control-label">Montoparc Fact</label>
						<div class="form-group">
							<input type="text" name="montoparc_fact" value="<?php echo $this->input->post('montoparc_fact'); ?>" class="form-control" id="montoparc_fact" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="desc_fact" class="control-label">Desc Fact</label>
						<div class="form-group">
							<input type="text" name="desc_fact" value="<?php echo $this->input->post('desc_fact'); ?>" class="form-control" id="desc_fact" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="cadenaqr_fact" class="control-label">Cadenaqr Fact</label>
						<div class="form-group">
							<input type="text" name="cadenaqr_fact" value="<?php echo $this->input->post('cadenaqr_fact'); ?>" class="form-control" id="cadenaqr_fact" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="codcontrol_fact" class="control-label">Codcontrol Fact</label>
						<div class="form-group">
							<input type="text" name="codcontrol_fact" value="<?php echo $this->input->post('codcontrol_fact'); ?>" class="form-control" id="codcontrol_fact" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="literal_fact" class="control-label">Literal Fact</label>
						<div class="form-group">
							<input type="text" name="literal_fact" value="<?php echo $this->input->post('literal_fact'); ?>" class="form-control" id="literal_fact" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="fechahora_fact" class="control-label">Fechahora Fact</label>
						<div class="form-group">
							<input type="text" name="fechahora_fact" value="<?php echo $this->input->post('fechahora_fact'); ?>" class="form-control" id="fechahora_fact" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="fechavenc_fact" class="control-label">Fechavenc Fact</label>
						<div class="form-group">
							<input type="text" name="fechavenc_fact" value="<?php echo $this->input->post('fechavenc_fact'); ?>" class="has-datepicker form-control" id="fechavenc_fact" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="totalconsumo_fact" class="control-label">Totalconsumo Fact</label>
						<div class="form-group">
							<input type="text" name="totalconsumo_fact" value="<?php echo $this->input->post('totalconsumo_fact'); ?>" class="form-control" id="totalconsumo_fact" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="totalaportes_fact" class="control-label">Totalaportes Fact</label>
						<div class="form-group">
							<input type="text" name="totalaportes_fact" value="<?php echo $this->input->post('totalaportes_fact'); ?>" class="form-control" id="totalaportes_fact" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="totalrecargos_fact" class="control-label">Totalrecargos Fact</label>
						<div class="form-group">
							<input type="text" name="totalrecargos_fact" value="<?php echo $this->input->post('totalrecargos_fact'); ?>" class="form-control" id="totalrecargos_fact" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="montototal_fact" class="control-label">Montototal Fact</label>
						<div class="form-group">
							<input type="text" name="montototal_fact" value="<?php echo $this->input->post('montototal_fact'); ?>" class="form-control" id="montototal_fact" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="exento_fact" class="control-label">Exento Fact</label>
						<div class="form-group">
							<input type="text" name="exento_fact" value="<?php echo $this->input->post('exento_fact'); ?>" class="form-control" id="exento_fact" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="ice_fact" class="control-label">Ice Fact</label>
						<div class="form-group">
							<input type="text" name="ice_fact" value="<?php echo $this->input->post('ice_fact'); ?>" class="form-control" id="ice_fact" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="id_ing" class="control-label">Id Ing</label>
						<div class="form-group">
							<input type="text" name="id_ing" value="<?php echo $this->input->post('id_ing'); ?>" class="form-control" id="id_ing" />
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