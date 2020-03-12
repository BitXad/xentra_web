

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                EDITAR ingreso
            </div>
            <div class="panel-body">
                
			 			
						<?php echo form_open('ingreso/edit/'.$ingreso['id_ing']); ?>
				<div class="box-body">
          		<div class="row clearfix">
						
							
							<div class="col-md-4">
								<label for="nombre_ing" class="control-label">Nombre</label>
								<div class="form-group">
									<input type="text" name="nombre_ing" value="<?php echo ($this->input->post('nombre_ing') ? $this->input->post('nombre_ing') : $ingreso['nombre_ing']); ?>" class="form-control" id="nombre_ing" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"  required/>
								</div>
							</div>
							<div class="col-md-4">
								<label for="monto_ing" class="control-label">Monto</label>
								<div class="form-group">
									<input type="number" step="any" min="0" name="monto_ing" value="<?php echo ($this->input->post('monto_ing') ? $this->input->post('monto_ing') : $ingreso['monto_ing']); ?>" class="form-control" id="monto_ing" required/>
								</div>
							</div>
							
								<div class="col-md-4">
									<label for="detalle_ing" class="control-label">Categoria</label>
									<div class="form-group">
									<select name="detalle_ing" class="form-control" >
                <option value="">Selecciona categoria ingreso</option>
                <?php 
                foreach($all_categoria_ingreso as $categoria_ingreso)
                {
                  $selected = ($categoria_ingreso['nom_cating'] == $ingreso['detalle_ing']) ? ' selected="selected"' : "";

                  echo '<option value="'.$categoria_ingreso['nom_cating'].'" '.$selected.'>'.$categoria_ingreso['nom_cating'].'</option>';
                } 
                ?>
              </select>
									</div>
								</div>
							<div class="col-md-4">
								<label for="descripcion_ing" class="control-label">Concepto</label>
								<div class="form-group">
									<input type="text" name="descripcion_ing" value="<?php echo ($this->input->post('descripcion_ing') ? $this->input->post('descripcion_ing') : $ingreso['descripcion_ing']); ?>" class="form-control" id="descripcion_ing" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"  />
								</div>
							</div>
							<div class="col-md-2">
									<label for="estado_ing" class="control-label">Estado</label>
									<div class="form-group">
										<select name="estado_ing" class="form-control" required>
											<option value="ACTIVO" <?php if ($ingreso['estado_ing']=='ACTIVO'){ echo "selected"; } ?> >- ACTIVO -</option>
\
											<option value="INACTIVO" <?php if ($ingreso['estado_ing']=='INACTIVO'){ echo "selected"; } ?> >- INACTIVO -</option>
									
										</select>
									</div>
								</div>
							<div class="col-md-2 hidden">
								<label for="numrec_ing" class="control-label">Numero de ingreso</label>
								<div class="form-group">
									<input type="text" readonly="readonly" name="numrec_ing" value="<?php echo ($this->input->post('numrec_ing') ? $this->input->post('numrec_ing') : $ingreso['numrec_ing']); ?>" class="form-control" id="numrec_ing" required />
								</div>
							</div>
							
							<div class="col-md-2 hidden">
								<label for="fechahora_ing" class="control-label">Fecha</label>
								<div class="form-group">
									<input type="datetime" name="fechahora_ing" value="<?php echo ($this->input->post('fechahora_ing') ? $this->input->post('fechahora_ing') : $ingreso['fechahora_ing']); ?>" class="form-control" id="fechahora_ing" required />
								</div>
							</div>
							
					
							
							<div class="col-md-4">
								
									<button type="submit" class="btn btn-success">
										<i class="fa fa-check"></i> Guardar
									</button>
									<a href="javascript:history.back()"><button type="button" class="btn btn-danger">
            		<i class="fa fa-times"></i> Cancelar
            	</button></a>
						       
							</div>
							
						<?php echo form_close(); ?>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>