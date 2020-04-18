<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Modificar Dirección Orden</h3>
            </div>
            <?php echo form_open('direccion_orden/edit/'.$direccion_orden['id_dir']); ?>
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-6">
                        <label for="nombre_dir" class="control-label"><span class="text-danger">*</span>Nombre</label>
                        <div class="form-group">
                            <input type="text" name="nombre_dir" value="<?php echo ($this->input->post('nombre_dir') ? $this->input->post('nombre_dir') : $direccion_orden['nombre_dir']); ?>" class="form-control" id="nombre_dir" required autofocus autocomplete="off" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            <span class="text-danger"><?php echo form_error('nombre_dir');?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="orden_dir" class="control-label">Orden</label>
                        <div class="form-group">
                            <input type="number" min="0" name="orden_dir" value="<?php echo ($this->input->post('orden_dir') ? $this->input->post('orden_dir') : $direccion_orden['orden_dir']); ?>" class="form-control" id="orden_dir" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
            	<button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> Guardar
                </button>
                <a href="<?php echo site_url('direccion_orden'); ?>" class="btn btn-danger">
                        <i class="fa fa-times"></i> Cancelar</a>
            </div>				
            <?php echo form_close(); ?>
        </div>
    </div>
</div>