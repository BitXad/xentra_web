<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/ingresos.js'); ?>" type="text/javascript"></script>
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>REGISTRAR INGRESO</h4>
            </div>
            <div class="panel-body">
            <div class="col-md-6">
                <label for="buscar" class="control-label">Buscar Asociado</label>
                <div class="form-group">
                  <input type="text" name="buscar" class="form-control btn-default" id="buscar" onkeypress="buscarasoc(event)" autofocus placeholder="Nombre, apellido, codigo, ci, nit" />
                </div>
              </div>
              <div class="col-md-6">
                <label for="asociado" class="control-label">Asociado </label>
                <div class="form-group">
                  <input type="text" name="asociado" id="asociado" class="form-control btn-default"   readonly  />
                </div>
              </div>
              <div id="lista_asociados"></div>    
                        
            <?php echo form_open('ingreso/add/'); ?>

             <input type="hidden"  name="id_asoc" value="<?php echo $this->input->post('id_asoc'); ?>" class="form-control" id="id_asoc" required/>
            <div class="box-body">
              <div class="row clearfix">
              <div class="col-md-4">
                <label for="nombre_ing" class="control-label">Nombre</label>
                <div class="form-group">
                  <input type="text" name="nombre_ing" value="<?php echo $this->input->post('nombre_ing'); ?>" class="form-control" id="nombre_ing" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"  required/>
                </div>
              </div>
              <div class="col-md-4">
                <label for="ci_ing" class="control-label">C.I.</label>
                <div class="form-group">
                  <input type="text" name="ci_ing" value="<?php echo $this->input->post('ci_ing'); ?>" class="form-control" id="ci_ing" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"  required/>
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
              <div class="col-md-8">
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