<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Modificar Lectura de <b><?php echo $asociado['apellidos_asoc']." ".$asociado['nombres_asoc']  ?></b></h3>
            </div>
            <?php echo form_open('lectura/edit/'.$lectura['id_lec']); ?>
                <div class="box-body">
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="id_usu" class="control-label">Usuario</label>
                            <div class="form-group">
                                <select name="id_usu" class="form-control">
                                    <!--<option value="">select usuario</option>-->
                                    <?php 
                                    foreach($all_usuario as $usuario)
                                    {
                                        $selected = ($usuario['id_usu'] == $lectura['id_usu']) ? ' selected="selected"' : "";
                                        echo '<option value="'.$usuario['id_usu'].'" '.$selected.'>'.$usuario['nombre_usu'].'</option>';
                                    } 
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="mes_lec" class="control-label">Mes de Lectura</label>
                            <div class="form-group">
                                <select name="mes_lec" class="form-control">
                                    <!--<option value="">select</option>-->
                                    <?php 
                                    $mes_lec_values = array(
                                        'ENERO'=>'ENERO',
                                        'FEBRERO'=>'FEBRERO',
                                        'MARZO'=>'MARZO',
                                        'ABRIL'=>'ABRIL',
                                        'MAYO'=>'MAYO',
                                        'JUNIO'=>'JUNIO',
                                        'JULIO'=>'JULIO',
                                        'AGOSTO'=>'AGOSTO',
                                        'SEPTIEMBRE'=>'SEPTIEMBRE',
                                        'OCTUBRE'=>'OCTUBRE',
                                        'NOVIEMBRE'=>'NOVIEMBRE',
                                        'DICIEMBRE'=>'DICIEMBRE',
                                    );

                                    foreach($mes_lec_values as $value => $display_text)
                                    {
                                        $selected = ($value == $lectura['mes_lec']) ? ' selected="selected"' : "";
                                        echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
                                    } 
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="gestion_lec" class="control-label">Gestión</label>
                            <div class="form-group">
                                <select name="gestion_lec" class="form-control">
                                    <!--<option value="">select</option>-->
                                    <?php
                                    foreach($all_gestion as $gestion)
                                    {
                                        $selected = ($gestion["gestion_lec"] == $lectura['gestion_lec']) ? ' selected="selected"' : "";
                                        echo '<option value="'.$gestion["gestion_lec"].'" '.$selected.'>'.$gestion["gestion_lec"].'</option>';
                                    } 
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <span class="text-bold">Tipo: </span>
                            <span><?php echo $lectura['tipo_asoc']; ?></span>
                        </div>
                        <div class="col-md-2">
                            <span class="text-bold">Servicios: </span>
                            <span><?php echo $lectura['servicios_asoc']; ?></span>
                        </div>
                        <div class="col-md-2">
                            <label for="anterior_lec" class="control-label">Lectura Anterior</label>
                            <div class="form-group">
                                <input type="text" name="anterior_lec" value="<?php echo ($this->input->post('anterior_lec') ? $this->input->post('anterior_lec') : $lectura['anterior_lec']); ?>" class="form-control" id="anterior_lec" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="actual_lec" class="control-label">Lectura Actual</label>
                            <div class="form-group">
                                <input type="text" name="actual_lec" value="<?php echo ($this->input->post('actual_lec') ? $this->input->post('actual_lec') : $lectura['actual_lec']); ?>" class="form-control" id="actual_lec" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="fechaant_lec" class="control-label">Fecha Lec. Anterior</label>
                            <div class="form-group">
                                <input type="date" name="fechaant_lec" value="<?php echo ($this->input->post('fechaant_lec') ? $this->input->post('fechaant_lec') : $lectura['fechaant_lec']); ?>" class="form-control" id="fechaant_lec" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="consumo_lec" class="control-label">Consumo mts<sup>3</sup></label>
                            <div class="form-group">
                                <input type="text" name="consumo_lec" value="<?php echo ($this->input->post('consumo_lec') ? $this->input->post('consumo_lec') : $lectura['consumo_lec']); ?>" class="form-control" id="consumo_lec" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="fecha_lec" class="control-label">Fecha Lec.</label>
                            <div class="form-group">
                                <input type="date" name="fecha_lec" value="<?php echo ($this->input->post('fecha_lec') ? $this->input->post('fecha_lec') : $lectura['fecha_lec']); ?>" class="form-control" id="fecha_lec" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="hora_lec" class="control-label">Hora Lec.</label>
                            <div class="form-group">
                                <input type="time" name="hora_lec" value="<?php echo ($this->input->post('hora_lec') ? $this->input->post('hora_lec') : $lectura['hora_lec']); ?>" class="form-control" id="hora_lec" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="totalcons_lec" class="control-label">Total</label>
                            <div class="form-group">
                                <input type="text" name="totalcons_lec" value="<?php echo ($this->input->post('totalcons_lec') ? $this->input->post('totalcons_lec') : $lectura['totalcons_lec']); ?>" class="form-control" id="totalcons_lec" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="fechahora_lec" class="control-label">Fecha y Hora</label>
                            <div class="form-group">
                                <input type="datetime" name="fechahora_lec" value="<?php echo ($this->input->post('fechahora_lec') ? $this->input->post('fechahora_lec') : $lectura['fechahora_lec']); ?>" class="form-control" id="fechahora_lec" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="monto_lec" class="control-label">Monto</label>
                            <div class="form-group">
                                <input type="text" name="monto_lec" value="<?php echo ($this->input->post('monto_lec') ? $this->input->post('monto_lec') : $lectura['monto_lec']); ?>" class="form-control" id="monto_lec" />
                            </div>
                        </div>
                        <!--<div class="col-md-6">
                            <label for="estado_lec" class="control-label">Estado Lec</label>
                            <div class="form-group">
                                <input type="text" name="estado_lec" value="<?php //echo ($this->input->post('estado_lec') ? $this->input->post('estado_lec') : $lectura['estado_lec']); ?>" class="form-control" id="estado_lec" />
                            </div>
                        </div>-->
                        <!--<div class="col-md-6">
                            <label for="tipo_asoc" class="control-label">Tipo Asoc</label>
                            <div class="form-group">
                                <input type="text" name="tipo_asoc" value="<?php //echo ($this->input->post('tipo_asoc') ? $this->input->post('tipo_asoc') : $lectura['tipo_asoc']); ?>" class="form-control" id="tipo_asoc" />
                            </div>
                        </div>-->
                        <!--<div class="col-md-6">
                            <label for="servicios_asoc" class="control-label">Servicios Asoc</label>
                            <div class="form-group">
                                <input type="text" name="servicios_asoc" value="<?php //echo ($this->input->post('servicios_asoc') ? $this->input->post('servicios_asoc') : $lectura['servicios_asoc']); ?>" class="form-control" id="servicios_asoc" />
                            </div>
                        </div>-->
                        <div class="col-md-3">
                            <label for="totalmultas_" class="control-label">Total Multas </label>
                            <div class="form-group">
                                <input type="text" name="totalmultas_" value="<?php echo ($this->input->post('totalmultas_') ? $this->input->post('totalmultas_') : $lectura['totalmultas_']); ?>" class="form-control" id="totalmultas_" />
                            </div>
                        </div>
                        <!--<div class="col-md-6">
                            <label for="cantfact_lec" class="control-label">Cantfact Lec</label>
                            <div class="form-group">
                                <input type="text" name="cantfact_lec" value="<?php //echo ($this->input->post('cantfact_lec') ? $this->input->post('cantfact_lec') : $lectura['cantfact_lec']); ?>" class="form-control" id="cantfact_lec" />
                            </div>
                        </div>-->
                        <!--<div class="col-md-6">
                            <label for="montofact_lec" class="control-label">Monto</label>
                            <div class="form-group">
                                <input type="text" name="montofact_lec" value="<?php //echo ($this->input->post('montofact_lec') ? $this->input->post('montofact_lec') : $lectura['montofact_lec']); ?>" class="form-control" id="montofact_lec" />
                            </div>
                        </div>-->
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-check"></i> Guardar
                    </button>
                    <a href="<?php echo site_url('historial/'.$lectura['id_lec']); ?>" class="btn btn-danger">
                <i class="fa fa-times"></i> Cancelar</a>
	        </div>				
            <?php echo form_close(); ?>
        </div>
    </div>
</div>