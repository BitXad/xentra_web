
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>REGISTRAR INGRESO</h4>
            </div>
            <div class="panel-body">
                
                        
            <?php echo form_open('INGRESO/add/'); ?>
<div class="box-body">
              <div class="row clearfix">
          
              
              <div class="col-md-4">
                <label for="nombre_ing" class="control-label">Nombre</label>
                <div class="form-group">
                  <input type="text" name="nombre_ing" value="<?php echo $this->input->post('nombre_ing'); ?>" class="form-control" id="nombre_ing" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" autofocus required/>
                </div>
              </div>
              <div class="col-md-4">
                <label for="monto_ing" class="control-label">Monto</label>
                <div class="form-group">
                  <input type="number" step="any" min="0" name="monto_ing" value="<?php echo $this->input->post('monto_ing'); ?>" class="form-control" id="monto_ing" required/>
                </div>
              </div>
              
              <div class="col-md-4">
                  <label for="detalle_ing" class="control-label">Categoria</label>
                  <div class="form-group">
                    
                    <select name="detalle_ing" class="form-control">
                <option value="">- CATEGORIA INGRESO -</option>
                <?php 
                foreach($all_categoria_ingreso as $categoria_ingreso)
                {
                  $selected = ($categoria_ingreso['nom_cating'] == $this->input->post('detalle_ing')) ? ' selected="selected"' : "";

                  echo '<option value="'.$categoria_ingreso['nom_cating'].'" '.$selected.'>'.$categoria_ingreso['nom_cating'].'</option>';
                } 
                ?>
              </select>
                  </div>
                </div>
              <div class="col-md-6">
                <label for="descripcion_ing" class="control-label">Concepto</label>
                <div class="form-group">
                  <input type="text" name="descripcion_ing" value="<?php echo $this->input->post('descripcion_ing'); ?>" class="form-control" id="descripcion_ing" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" required/>
                </div>
              </div>
            
              </div>
              
              
              <div class="col-md-4">
                
                  <button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> GUARDAR
                  </button>
                  <a href="index"><button type="button" class="btn btn-danger">
                <i class="fa fa-times"></i> Cancelar
              </button></a>
                    
              </div>

            <?php echo form_close(); ?>                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>