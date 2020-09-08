<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Modificar Zona</h3>
            </div>
            <?php $esta_zona = str_replace("-", "a123k", $zona['zona_med']);
                  echo form_open('zona/edit/'.$esta_zona); ?>
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-6">
                        <label for="zona_med" class="control-label"><span class="text-danger">*</span>Nombre</label>
                        <div class="form-group">
                            <input type="text" name="zona_med" value="<?php echo $zona["zona_med"] ?>" class="form-control" id="zona_med" autofocus required onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"/>
                        </div>
                    </div>         
                    <div class="col-md-3">
                        <label for="codigozona_med" class="control-label"><span class="text-danger">*</span>Código</label>
                        <div class="form-group">
                            <input type="text" name="codigozona_med" value="<?php echo $zona["codigozona_med"]; ?>" class="form-control" id="codigozona_med" required onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
            <button type="submit" class="btn btn-success">
                <i class="fa fa-check"></i> Guardar
            </button>
            <a href="<?php echo site_url('zona'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar</a>
            </div>				
            <?php echo form_close(); ?>
        </div>
    </div>
</div>