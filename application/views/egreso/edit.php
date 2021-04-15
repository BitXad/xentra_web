<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">EDITAR EGRESO</div>
            <div class="panel-body">
                <?php echo form_open('egreso/edit/'.$egreso['id_egr']); ?>
                <div class="box-body">
                    <div class="row clearfix">
                        <div class="col-md-4">
                            <label for="nombre_egr" class="control-label">Nombre</label>
                            <div class="form-group">
                                <input type="text" name="nombre_egr" value="<?php echo ($this->input->post('nombre_egr') ? $this->input->post('nombre_egr') : $egreso['nombre_egr']); ?>" class="form-control" id="nombre_egr" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"  required/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="monto_egr" class="control-label">Monto</label>
                            <div class="form-group">
                                <input type="number" step="any" min="0" name="monto_egr" value="<?php echo ($this->input->post('monto_egr') ? $this->input->post('monto_egr') : $egreso['monto_egr']); ?>" class="form-control" id="monto_egr" required/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="detalle_egr" class="control-label">Categoria</label>
                            <div class="form-group">
                                <select name="detalle_egr" class="form-control" >
                                    <option value="">Selecciona categoria egreso</option>
                                    <?php 
                                    foreach($all_categoria_egreso as $categoria_egreso)
                                    {
                                      $selected = ($categoria_egreso['nom_categr'] == $egreso['detalle_egr']) ? ' selected="selected"' : "";
                                      echo '<option value="'.$categoria_egreso['nom_categr'].'" '.$selected.'>'.$categoria_egreso['nom_categr'].'</option>';
                                    } 
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="descripcion_egr" class="control-label">Concepto</label>
                            <div class="form-group">
                                <input type="text" name="descripcion_egr" value="<?php echo ($this->input->post('descripcion_egr') ? $this->input->post('descripcion_egr') : $egreso['descripcion_egr']); ?>" class="form-control" id="descripcion_egr" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"  />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="estado_egr" class="control-label">Estado</label>
                            <div class="form-group">
                                <select name="estado_egr" class="form-control" required>
                                    <option value="ACTIVO" <?php if ($egreso['estado_egr']=='ACTIVO'){ echo "selected"; } ?> >- ACTIVO -</option>
                                    <option value="INACTIVO" <?php if ($egreso['estado_egr']=='INACTIVO'){ echo "selected"; } ?> >- INACTIVO -</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 hidden">
                            <label for="numrec_egr" class="control-label">Numero de egreso</label>
                            <div class="form-group">
                                <input type="text" readonly="readonly" name="numrec_egr" value="<?php echo ($this->input->post('numrec_egr') ? $this->input->post('numrec_egr') : $egreso['numrec_egr']); ?>" class="form-control" id="numrec_egr" required />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="fechahora_egr" class="control-label">Fecha</label>
                            <div class="form-group">
                                <input type="datetime" name="fechahora_egr" value="<?php echo ($this->input->post('fechahora_egr') ? $this->input->post('fechahora_egr') : $egreso['fechahora_egr']); ?>" class="form-control" id="fechahora_egr" required />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="fechahora_egr" class="control-label">&nbsp;</label>
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-check"></i> Guardar
                            </button>
                            <a href="javascript:history.back()">
                                <button type="button" class="btn btn-danger">
                                    <i class="fa fa-times"></i> Cancelar
                                </button>
                            </a>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>