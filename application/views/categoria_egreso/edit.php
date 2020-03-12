<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Modificar Categoria Egreso</h3>
            </div>
			<?php echo form_open('categoria_egreso/edit/'.$categoria_egreso['id_categr']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="nom_categr" class="control-label"><span class="text-danger">*</span>Nombre</label>
						<div class="form-group">
                                                    <input type="text" name="nom_categr" value="<?php echo ($this->input->post('nom_categr') ? $this->input->post('nom_categr') : $categoria_egreso['nom_categr']); ?>" class="form-control" id="nom_categr" autofocus autocomplete="off" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
							<span class="text-danger"><?php echo form_error('nom_categr');?></span>
						</div>
					</div>
					<div class="col-md-6 hidden">
						<label for="id_gegr" class="control-label">Id Ging</label>
						<div class="form-group">
							<input type="text" name="id_gegr" value="<?php echo ($this->input->post('id_gegr') ? $this->input->post('id_gegr') : $categoria_egreso['id_gegr']); ?>" class="form-control" id="id_gegr" />
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
                        <i class="fa fa-check"></i> Guardar
                </button>
                <a href="<?php echo site_url('categoria_egreso'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar</a>
          	</div>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>