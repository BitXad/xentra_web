<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editar Diametro red</h3>
            </div>
            <?php echo form_open('diametrored/edit/'.$diametrored['id_diam']); ?>
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-2">
                            <label for="nombre_diam" class="control-label">Nombre</label>
                            <div class="form-group">
                                <input type="text" name="nombre_diam" value="<?php echo $diametrored["nombre_diam"] ?>" class="form-control" id="nombre_diam" onclick="this.select();" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"/>
                            </div>
                    </div>         
                    <div class="col-md-2">
                            <label for="codigo_diam" class="control-label">Código</label>
                            <div class="form-group">
                                    <input type="text" name="codigo_diam" value="<?php echo $diametrored["codigo_diam"]; ?>" class="form-control" id="codigo_diam"  onclick="this.select();" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"/>
                            </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
            	<button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> Guardar
                </button>
                <a href="<?php echo site_url('diametrored'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar</a>
	        </div>				
                    <?php echo form_close(); ?>
		</div>
    </div>
</div>