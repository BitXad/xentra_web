<script src="<?php echo base_url('resources/js/egreso_add.js'); ?>" type="text/javascript"></script>
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
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
                            <div class="col-md-5">
                                <label for="nombre_egr" class="control-label"><span class="text-danger">*</span>Entregue a</label>
                                <div class="form-group">
                                    <input type="text" name="nombre_egr" value="<?php echo $this->input->post('nombre_egr'); ?>" class="form-control" id="nombre_egr" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" autofocus required/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="monto_egr" class="control-label"><span class="text-danger">*</span>La suma de</label>
                                <div class="form-group">
                                    <input type="number" step="any" min="0" name="monto_egr" value="<?php echo $this->input->post('monto_egr'); ?>" class="form-control" id="monto_egr" required/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="detalle_egr" class="control-label">Por concepto de</label>
                                <div class="form-group" style="display: flex">
                                    <select name="detalle_egr" id="detalle_egr" class="form-control">
                                        <option value="">- CATEGORIA EGRESO -</option>
                                        <?php 
                                        foreach($all_categoria_egreso as $categoria_egreso)
                                        {
                                          $selected = ($categoria_egreso['nom_categr'] == $this->input->post('detalle_egr')) ? ' selected="selected"' : "";
                                          echo '<option value="'.$categoria_egreso['nom_categr'].'" '.$selected.'>'.$categoria_egreso['nom_categr'].'</option>';
                                        } 
                                        ?>
                                    </select>
                                    <a data-toggle="modal" data-target="#modalcategoria" class="btn btn-warning" title="Registrar Nueva Categoria">
                                <i class="fa fa-plus-circle"></i></a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="descripcion_egr" class="control-label"><span class="text-danger">*</span>Detalle</label>
                                <div class="form-group">
                                    <input type="text" name="descripcion_egr" value="<?php echo $this->input->post('descripcion_egr'); ?>" class="form-control" id="descripcion_egr" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" required/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-check"></i> Guardar
                            </button>
                            <a href="index">
                                <button type="button" class="btn btn-danger">
                                    <i class="fa fa-times"></i> Cancelar
                                </button>
                            </a>
                        </div>
                    </div>
                <?php echo form_close(); ?>                            
            </div>
        </div>
    </div>
</div>

<!------------------------ INICIO modal para Registrar nueva Categoria ------------------->
<div class="modal fade" id="modalcategoria" tabindex="-1" role="dialog" aria-labelledby="modalcategoria">
    <div class="modal-dialog" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header" style="text-align: center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                <h3>Registrar Nueva Categoría</h3>
            </div>
            <div class="modal-body">
               <!------------------------------------------------------------------->
               <div class="col-md-12">
                    <label for="nueva_categoria" class="control-label">Nueva Categoria</label>
                    <span> (Nota.- ¡Registrar solo si no hay en la lista!)</span>
                    <span class="text-danger text-bold" id="mensaje_categoria"></span>
                    <div class="form-group">
                        <input type="text" name="nueva_categoria"  class="form-control" id="nueva_categoria" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                    </div>
                </div>
               <!------------------------------------------------------------------->
            </div>
            <div class="modal-footer" style="text-align: center">
                <a onclick="registrarnuevacategoria()" class="btn btn-success"><span class="fa fa-check"></span> Registrar </a>
                <a href="#" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> No </a>
            </div>
        </div>
    </div>
</div>
<!------------------------ FIN modal para Registrar nueva Categoria ------------------->