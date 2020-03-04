<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editar Imagen</h3>
            </div>
            <?php echo form_open_multipart('imagen_asociado/edit/'.$id_asoc.'/'.$imagen_asociado['imagenasoc_id']); ?>
                <div class="box-body">
                    <div class="row clearfix">
                        <div class="col-md-6">
                                <label for="imagenasoc_titulo" class="control-label"><span class="text-danger">*</span>Documento</label>
                                <div class="form-group">
                                        <input type="text" name="imagenasoc_titulo" value="<?php echo ($this->input->post('imagenasoc_titulo') ? $this->input->post('imagenasoc_titulo') : $imagen_asociado['imagenasoc_titulo']); ?>" class="form-control" id="imagenasoc_titulo" required />
                                </div>
                        </div>
                        <div class="col-md-6">
                                <label for="imagenasoc_descripcion" class="control-label">Descripción</label>
                                <div class="form-group">
                                        <input type="text" name="imagenasoc_descripcion" value="<?php echo ($this->input->post('imagenasoc_descripcion') ? $this->input->post('imagenasoc_descripcion') : $imagen_asociado['imagenasoc_descripcion']); ?>" class="form-control" id="imagenasoc_descripcion" />
                                </div>
                        </div>
                        <div class="col-md-6">
                                <label for="imagenasoc_archivo" class="control-label">Archivo</label>
                                <div class="form-group">
                                    <input type="file" name="imagenasoc_archivo" value="<?php echo $this->input->post('imagenasoc_archivo'); ?>" class="form-control" id="imagenasoc_archivo" accept="image/png, image/jpeg, image/jpg, image/gif" />
                                    <input type="hidden" name="imagenasoc_archivo1" value="<?php echo ($this->input->post('imagenasoc_archivo') ? $this->input->post('imagenasoc_archivo') : $imagen_asociado['imagenasoc_archivo']); ?>" class="form-control" id="imagenasoc_archivo1" />
                                </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
            	<button type="submit" class="btn btn-success">
			<i class="fa fa-check"></i> Guardar
		</button>
                            <a href="<?php echo site_url('imagen_asociado/catalogo/'.$id_asoc); ?>" class="btn btn-danger">
                                <i class="fa fa-times"></i> Cancelar</a>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>