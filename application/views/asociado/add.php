<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script type="text/javascript">
    function mostrar(a) {
        obj = document.getElementById('oculto'+a);
        obj.style.visibility = (obj.style.visibility == 'hidden') ? 'visible' : 'hidden';
        //objm = document.getElementById('map');
        if(obj.style.visibility == 'hidden'){
            $('#map').css({ 'width':'0px', 'height':'0px' });
            $('#mosmapa').text("Obtener Ubicación del negocio");
        }else{
            $('#map').css({ 'width':'100%', 'height':'400px' });
            $('#mosmapa').text("Cerrar mapa");
        }

    }
    function cambiarcod(){
        var estetime = new Date();
        var anio = estetime.getFullYear();
        anio = anio -2000;
        var mes = parseInt(estetime.getMonth())+1;
        if(mes>0&&mes<10){
            mes = "0"+mes;
        }
        var dia = parseInt(estetime.getDate());
        if(dia>0&&dia<10){
            dia = "0"+dia;
        }
        var hora = estetime.getHours();
        if(hora>0&&hora<10){
            hora = "0"+hora;
        }
        var min = estetime.getMinutes();
        if(min>0&&min<10){
            min = "0"+min;
        }
        var seg = estetime.getSeconds();
        if(seg>0&&seg<10){
            seg = "0"+seg;
        }
        $('#cliente_codigo').val(anio+mes+dia+hora+min+seg);
    }

</script>
<script type="text/javascript">
    $(document).ready(function(){
    $("#apellidos_asoc").change(function(){
        var nombre   = $("#nombres_asoc").val();
        var apellido = $("#apellidos_asoc").val();
        var nombre = $("#cliente_nombre").val();
        var cad1 = nombre.substring(0,2);
        var cad2 = nombre.substring(nombre.length-1,nombre.length);
        var fecha = new Date();
        var pararand = fecha.getFullYear()+fecha.getMonth()+fecha.getDay();
        var cad3 = Math.floor((Math.random(1001,9999) * pararand));
        var cad = cad1+cad2+cad3;
        $('#cliente_codigo').val(cad);
        $('#cliente_razon').val(nombre);
    });
    $("#cliente_ci").change(function(){
        var ci = $("#cliente_ci").val();
        $('#cliente_nit').val(ci);
    });
  });
    
</script>
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Añadir Asociado</h3>
            </div>
            <?php echo form_open('asociado/add'); ?>
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-3">
                        <label for="nombres_asoc" class="control-label"><span class="text-danger">*</span>Nombres</label>
                        <div class="form-group">
                            <input type="text" name="nombres_asoc" value="<?php echo $this->input->post('nombres_asoc'); ?>" class="form-control" id="nombres_asoc" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            <span class="text-danger"><?php echo form_error('nombres_asoc');?></span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="apellidos_asoc" class="control-label"><span class="text-danger">*</span>Apellidos</label>
                        <div class="form-group">
                            <input type="text" name="apellidos_asoc" value="<?php echo $this->input->post('apellidos_asoc'); ?>" class="form-control" id="apellidos_asoc" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            <span class="text-danger"><?php echo form_error('apellidos_asoc');?></span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="codigo_asoc" class="control-label">Código</label>
                        <div class="form-group">
                            <input type="text" name="codigo_asoc" value="<?php echo $this->input->post('codigo_asoc'); ?>" class="form-control" id="codigo_asoc" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="ci_asoc" class="control-label">C.I.</label>
                        <div class="form-group">
                            <input type="text" name="ci_asoc" value="<?php echo $this->input->post('ci_asoc'); ?>" class="form-control" id="ci_asoc" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="expedido" class="control-label">Expedido</label>
                        <div class="form-group">
                            <select name="expedido" class="form-control">
                                <option value="">- EXPEDIDO -</option>
                                <?php 
                                foreach($all_expedido as $expedido)
                                {
                                    $selected = ($expedido['ciudad'] == $this->input->post('ciudad')) ? ' selected="selected"' : "";
                                    echo '<option value="'.$expedido['ciudad'].'" '.$selected.'>'.$expedido['ciudad'].'</option>';
                                } 
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="tipo_asoc" class="control-label">Tipo</label>
                        <div class="form-group">
                            <select name="tipo_asoc" class="form-control">
                                <!--<option value="">select</option>-->
                                <?php 
                                $tipo_asoc_values = array(
                                    'ASOCIADO'=>'ASOCIADO',
                                    'USUARIO'=>'USUARIO',
                                    'DIRECTIVO'=>'DIRECTIVO',
                                );
                                foreach($tipo_asoc_values as $value => $display_text)
                                {
                                    $selected = ($value == $this->input->post('tipo_asoc')) ? ' selected="selected"' : "";
                                    echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
                                } 
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="fechanac_asoc" class="control-label">Fecha Nac.</label>
                        <div class="form-group">
                            <input type="date" name="fechanac_asoc" value="<?php echo $this->input->post('fechanac_asoc'); ?>" class="form-control" id="fechanac_asoc" />
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="id_emp" class="control-label">Empresa</label>
                        <div class="form-group">
                            <select name="id_emp" class="form-control">
                                <!--<option value="">select empresa</option>-->
                                <?php 
                                foreach($all_empresa as $empresa)
                                {
                                    $selected = ($empresa['id_emp'] == $this->input->post('id_emp')) ? ' selected="selected"' : "";
                                    echo '<option value="'.$empresa['id_emp'].'" '.$selected.'>'.$empresa['nombre_emp'].'</option>';
                                } 
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="direccion_asoc" class="control-label">Dirección</label>
                        <div class="form-group">
                            <input type="text" name="direccion_asoc" value="<?php echo $this->input->post('direccion_asoc'); ?>" class="form-control" id="direccion_asoc" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="telefono_asoc" class="control-label">Telefono Asoc</label>
                        <div class="form-group">
                            <input type="text" name="telefono_asoc" value="<?php echo $this->input->post('telefono_asoc'); ?>" class="form-control" id="telefono_asoc" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="nit_asoc" class="control-label">Nit Asoc</label>
                        <div class="form-group">
                            <input type="text" name="nit_asoc" value="<?php echo $this->input->post('nit_asoc'); ?>" class="form-control" id="nit_asoc" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="razon_asoc" class="control-label">Razon Asoc</label>
                        <div class="form-group">
                            <input type="text" name="razon_asoc" value="<?php echo $this->input->post('razon_asoc'); ?>" class="form-control" id="razon_asoc" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="zona_asoc" class="control-label">Zona</label>
                        <div class="form-group">
                            <select name="zona_asoc" class="form-control">
                                <option value="">select</option>
                                <?php 
                                $zona_asoc_values = array(
                                    'NORTE'=>'NORTE',
                                    'SUD'=>'SUD',
                                    'ESTE'=>'ESTE',
                                    'OESTE'=>'OESTE',
                                    );
                                foreach($zona_asoc_values as $value => $display_text)
                                {
                                    $selected = ($value == $this->input->post('zona_asoc')) ? ' selected="selected"' : "";
                                    echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
                                } 
                                ?>
                            </select>
                        </div>
                    </div>
					<div class="col-md-6">
						<label for="servicios_asoc" class="control-label">Servicios Asoc</label>
						<div class="form-group">
							<select name="servicios_asoc" class="form-control">
								<option value="">select</option>
								<?php 
								$servicios_asoc_values = array(
									'AGUA'=>'AGUA',
									'ALCANTARILLADO'=>'ALCANTARILLADO',
								);

								foreach($servicios_asoc_values as $value => $display_text)
								{
									$selected = ($value == $this->input->post('servicios_asoc')) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="categoria_asoc" class="control-label">Categoria Asoc</label>
						<div class="form-group">
							<select name="categoria_asoc" class="form-control">
								<option value="">select</option>
								<?php 
								$categoria_asoc_values = array(
									'DOMESTICA'=>'DOMESTICA',
									'COMERCIAL'=>'COMERCIAL',
									'INDUSTRIAL'=>'INDUSTRIAL',
								);

								foreach($categoria_asoc_values as $value => $display_text)
								{
									$selected = ($value == $this->input->post('categoria_asoc')) ? ' selected="selected"' : "";

									echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<!--<div class="col-md-6">
						<label for="ciudad" class="control-label">Ciudad</label>
						<div class="form-group">
							<input type="text" name="ciudad" value="<?php //echo $this->input->post('ciudad'); ?>" class="form-control" id="ciudad" />
						</div>
					</div>-->
					
					
					
					<div class="col-md-6">
						<label for="foto_asoc" class="control-label">Foto Asoc</label>
						<div class="form-group">
							<input type="text" name="foto_asoc" value="<?php echo $this->input->post('foto_asoc'); ?>" class="form-control" id="foto_asoc" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="fechahora_asoc" class="control-label">Fechahora Asoc</label>
						<div class="form-group">
							<input type="text" name="fechahora_asoc" value="<?php echo $this->input->post('fechahora_asoc'); ?>" class="form-control" id="fechahora_asoc" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="medidor_asoc" class="control-label">Medidor Asoc</label>
						<div class="form-group">
							<input type="text" name="medidor_asoc" value="<?php echo $this->input->post('medidor_asoc'); ?>" class="form-control" id="medidor_asoc" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="orden_asoc" class="control-label">Orden Asoc</label>
						<div class="form-group">
							<input type="text" name="orden_asoc" value="<?php echo $this->input->post('orden_asoc'); ?>" class="form-control" id="orden_asoc" />
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Save
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>