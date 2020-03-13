<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Modificar Estado</h3>
            </div>
            <?php echo form_open('estado/edit/'.$estado['estado']); ?>
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-6">
                            <label for="estado" class="control-label"><span class="text-danger">*</span>Nombre</label>
                            <div class="form-group">
                                <input type="text" name="estado" value="<?php echo $estado["estado"] ?>" class="form-control" id="estado" autofocus required onclick="this.select();" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"/>
                            </div>
                    </div> 
                </div>
            </div>
            <div class="box-footer">
            	<button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> Guardar
                </button>
                <a href="<?php echo site_url('estado'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar</a>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>