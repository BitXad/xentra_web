<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Imagen Asociado Add</h3>
            </div>
            <?php echo form_open('imagen_asociado/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="asociado_id" class="control-label">Asociado</label>
						<div class="form-group">
							<select name="asociado_id" class="form-control">
								<option value="">select asociado</option>
								<?php 
								foreach($all_asociado as $asociado)
								{
									$selected = ($asociado['id_asoc'] == $this->input->post('asociado_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$asociado['id_asoc'].'" '.$selected.'>'.$asociado['nombres_asoc'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="imagenasoc_titulo" class="control-label">Imagenasoc Titulo</label>
						<div class="form-group">
							<input type="text" name="imagenasoc_titulo" value="<?php echo $this->input->post('imagenasoc_titulo'); ?>" class="form-control" id="imagenasoc_titulo" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="imagenasoc_archivo" class="control-label">Imagenasoc Archivo</label>
						<div class="form-group">
							<input type="text" name="imagenasoc_archivo" value="<?php echo $this->input->post('imagenasoc_archivo'); ?>" class="form-control" id="imagenasoc_archivo" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="imagenasoc_descripcion" class="control-label">Imagenasoc Descripcion</label>
						<div class="form-group">
							<input type="text" name="imagenasoc_descripcion" value="<?php echo $this->input->post('imagenasoc_descripcion'); ?>" class="form-control" id="imagenasoc_descripcion" />
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