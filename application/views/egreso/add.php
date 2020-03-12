
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>REGISTRAR EGRESO</h4>
            </div>
            <div class="panel-body">
                
                        
						<?php echo form_open('egreso/add/'); ?>
<div class="box-body">
          		<div class="row clearfix">
					
							
							<div class="col-md-4">
								<label for="nombre_egr" class="control-label">Nombre</label>
								<div class="form-group">
									<input type="text" name="nombre_egr" value="<?php echo $this->input->post('nombre_egr'); ?>" class="form-control" id="nombre_egr" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" autofocus required/>
								</div>
							</div>
							<div class="col-md-4">
								<label for="monto_egr" class="control-label">Monto</label>
								<div class="form-group">
									<input type="number" step="any" min="0" name="monto_egr" value="<?php echo $this->input->post('monto_egr'); ?>" class="form-control" id="monto_egr" required/>
								</div>
							</div>
							
							<div class="col-md-4">
									<label for="detalle_egr" class="control-label">Categoria</label>
									<div class="form-group">
										
										<select name="detalle_egr" class="form-control">
                <option value="">- CATEGORIA EGRESO -</option>
                <?php 
                foreach($all_categoria_egreso as $categoria_egreso)
                {
                  $selected = ($categoria_egreso['nom_categr'] == $this->input->post('detalle_egr')) ? ' selected="selected"' : "";

                  echo '<option value="'.$categoria_egreso['nom_categr'].'" '.$selected.'>'.$categoria_egreso['nom_categr'].'</option>';
                } 
                ?>
              </select>
									</div>
								</div>
							<div class="col-md-6">
								<label for="descripcion_egr" class="control-label">Concepto</label>
								<div class="form-group">
									<input type="text" name="descripcion_egr" value="<?php echo $this->input->post('descripcion_egr'); ?>" class="form-control" id="descripcion_egr" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" required/>
								</div>
							</div>
						
							</div>
							
							
							<div class="col-md-4">
								
									<button type="submit" class="btn btn-success">
										<i class="fa fa-check"></i> GUARDAR
									</button>
									<a href="index"><button type="button" class="btn btn-danger">
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