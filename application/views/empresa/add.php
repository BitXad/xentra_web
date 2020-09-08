<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Añadir Empresa</h3>
            </div>
            <?php echo form_open_multipart('empresa/add'); ?>
          	<div class="box-body">
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="nombre_emp" class="control-label"><span class="text-danger">*</span>Nombre</label>
                            <div class="form-group">
                                <input type="text" name="nombre_emp" value="<?php echo $this->input->post('nombre_emp'); ?>" class="form-control" id="nombre_emp" required onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                                <span class="text-danger"><?php echo form_error('nombre_emp');?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="eslogan_emp" class="control-label">Eslogan</label>
                            <div class="form-group">
                                <input type="text" name="eslogan_emp" value="<?php echo $this->input->post('eslogan_emp'); ?>" class="form-control" id="eslogan_emp" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="direccion_emp" class="control-label">Dirección</label>
                            <div class="form-group">
                                <input type="text" name="direccion_emp" value="<?php echo $this->input->post('direccion_emp'); ?>" class="form-control" id="direccion_emp" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="telefono_emp" class="control-label">Teléfono</label>
                            <div class="form-group">
                                <input type="text" name="telefono_emp" value="<?php echo $this->input->post('telefono_emp'); ?>" class="form-control" id="telefono_emp" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="sucursal_emp" class="control-label">Sucursal</label>
                            <div class="form-group">
                                <input type="text" name="sucursal_emp" value="<?php echo $this->input->post('sucursal_emp'); ?>" class="form-control" id="sucursal_emp" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="ubicacion_emp" class="control-label">Ubicación</label>
                            <div class="form-group">
                                <input type="text" name="ubicacion_emp" value="<?php echo $this->input->post('ubicacion_emp'); ?>" class="form-control" id="ubicacion_emp" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-5">
                            <label for="actividad_emp" class="control-label">Actividad</label>
                            <div class="form-group">
                                <input type="text" name="actividad_emp" value="<?php echo $this->input->post('actividad_emp'); ?>" class="form-control" id="actividad_emp" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="nit_emp" class="control-label">Nit</label>
                            <div class="form-group">
                                <input type="text" name="nit_emp" value="<?php echo $this->input->post('nit_emp'); ?>" class="form-control" id="nit_emp" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="logo_emp" class="control-label">Logo</label>
                            <div class="form-group">
                                <input type="file" name="logo_emp" value="<?php echo $this->input->post('logo_emp'); ?>" class="form-control" id="logo_emp" accept="image/png, image/jpeg, image/jpg, image/gif" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="zona_emp" class="control-label">Zona</label>
                            <div class="form-group">
                                <input type="text" name="zona_emp" value="<?php echo $this->input->post('zona_emp'); ?>" class="form-control" id="zona_emp" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="sis_emp" class="control-label">Sis</label>
                            <div class="form-group">
                                <input type="text" name="sis_emp" value="<?php echo $this->input->post('sis_emp'); ?>" class="form-control" id="sis_emp" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="anuncio_emp" class="control-label">Anuncio</label>
                            <div class="form-group">
                                <input type="text" name="anuncio_emp" value="<?php echo $this->input->post('anuncio_emp'); ?>" class="form-control" id="anuncio_emp" />
                            </div>
                        </div>
                    </div>
                </div>
          	<div class="box-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-check"></i> Guardar
                    </button>
                    <a href="<?php echo site_url('empresa'); ?>" class="btn btn-danger">
                                <i class="fa fa-times"></i> Cancelar</a>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>