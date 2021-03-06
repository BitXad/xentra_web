<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo site_url('resources/js/lecturas.js');?>"></script>
<link rel="stylesheet" href="<?php echo site_url('resources/css/mitabla.css');?>">

<input id="base_url" value="<?php echo base_url(); ?>" hidden="">
<input id="tipo_lectura" name="tipo_lectura" value="<?php echo $configuracion[7]["valor"]; ?>" hidden> 

<div class="row">
    <div class="col-md-12">
        <div class="box" >
            <div class="box-header" style="padding: 0;">
             
                <div class="col-md-2" style="padding:2px; ">
                    <label for="afiliados" class="control-label">AFILIADOS</label>
                    <div class="form-group" style="margin-bottom: 0;">          

                        <select name="select_afiliados" class="form-control btn-info" id="select_afiliados" style="padding:0;">
                            <option value="SIN LECTURA">SIN LECTURA</option>
                            <option value="LECTURADO">LECTURADO</option>
                            <option value="TODOS">TODOS</option>
                        </select>    
                    </div>
                </div>

                <div class="col-md-2" style="padding:2px;">
                    <label for="meses" class="control-label">MES</label>
                    <div class="form-group" style="margin-bottom: 0;">

                        <select name="select_mes" class="form-control btn-info" id="select_mes"  style="padding:0;">
                            
                            <?php 
                                $selected="";
                                
                                foreach($meses as $mes){
                                    
                                    if($mes['id_mes'] == date("m") ){
                                        $selected = "selected";
                                    }else{                                        
                                        $selected = " ";
                                    }
                                ?>                                
                                <option value="<?php echo $mes['mes_lec']; ?>" <?php echo $selected; ?>> <?php echo $mes['mes_lec']; ?></option>
                            <?php } ?>
                        </select>    
                    </div>
                </div>
             
                <div class="col-md-1" style="padding:2px;">
                    <label for="gestion" class="control-label">GESTIÓN</label>
                    <div class="form-group" style="margin-bottom: 0;">
                            
                        <select name="select_gestion" class="form-control btn-info" id="select_gestion"  style="padding:0;">
                            
                            <?php
                            
                                for ($i = 2015; $i<=2025; $i++){
                                    
                                    if($i == date("Y") ){
                                        $selected = "selected";
                                    }else{
                                        $selected = " ";
                                    }?>
                                    
                                    <option value="<?php echo $i; ?>" <?php echo $selected; ?>> <?php echo $i; ?></option>
                                                                
                            <?php } ?>
                        </select>    

                    </div>
                </div>

                <div class="col-md-2" style="padding:2px;">
                    <label for="orden" class="control-label">ORDENADO POR</label>
                    <div class="form-group" style="margin-bottom: 0;">

                        <select name="select_orden" class="form-control btn-warning" id="select_orden"  style="padding:0;">
                            <option value="NOMBRE" selected>NOMBRE</option>
                            <option value="CODIGO">CODIGO</option>
                            <option value="MEDIDOR">MEDIDOR</option>
                            <option value="CONSUMO">CONSUMO</option>
                            <option value="DIRECCION">DIRECCIÓN/ZONA</option>                            
                        </select>

                    </div>
                </div>

                <div class="col-md-2" style="padding:2px;">
                    <label for="direccion" class="control-label">DIRECCIÓN</label>
                    <div class="form-group" style="margin-bottom: 0;">

                        <select name="select_direccion" class="form-control btn-warning" id="select_direccion"  style="padding:0;">
                            <option value="TODOS" selected>TODOS</option>
                            <?php foreach($direcciones as $d){ ?>
                                    <option value="<?php echo $d["direccion_asoc"]; ?>" ><?php echo $d["direccion_asoc"]; ?></option>
                             <?php } ?>
                        </select>    

                    </div>
                </div>

                <div class="col-md-2" style="padding:2px;">
                    <label for="zona" class="control-label">ZONA</label>
                    <div class="form-group" style="margin-bottom: 0;">
                        <select name="select_zona" class="form-control btn-warning" id="select_zona"  style="padding:0;">
                            <option value="TODOS" selected>TODOS</option> 
                            <?php foreach($zonas as $z){ ?>
                                    <option value="<?php echo $z["zona_asoc"]; ?>" ><?php echo $z["zona_asoc"]; ?></option>
                             <?php } ?>
                        </select>    

                    </div>
                </div>
                <div class="col-md-10" style="padding:2px; ">
                    <!--este es INICIO de input buscador-->
                     <!--<div class="col-md- 6">-->
                         <label for="buscar_nombreasoc" class="control-label">&nbsp;</label>
                        <div class="input-group">
                            <span class="input-group-addon">ASOCIADO</span>           
                            <input id="buscar_nombreasoc" type="text" class="form-control" placeholder="Ingrese el nombre, codigo, nro. medidor, ci, nit" autocomplete="off" onkeypress="buscarasociado(event)" >
                        </div>
                    <!--</div>-->
                </div>
                <div class="col-md-1" style="padding:2px;">
                    <label for="buscar" class="control-label">&nbsp;</label>
                    <div class="form-group">                        
                        <button onclick="buscar_asociados()" class="btn btn-facebook btn-block" id="boton_buscar"><fa class="fa fa-binoculars"></fa>
                            Buscar
                        </button>                        
                    </div>
                </div>
                <div class="col-md-10" style="padding:2px; ">
                    <div class="row" id='loader'  style='display:none; text-align: center'>
                        <img src="<?php echo base_url("resources/images/loader.gif"); ?>"  >
                    </div>
                </div>
                <div id="boton_imprimir_todo"></div>
            </div>
        </div>
    </div>
</div>

<div class="box-body table-responsive" id="tabla_lecturas" style="padding: 0;">
<!--    <table class="table table-striped" id="mitabla">
        <tr>
            <th>#</th>
            <th>Código</th>
            <th>Nombre Asociado</th>
            <th>Tipo</th>
            <th>Servicio(s)</th>   
            <th>Dirección</th>
            <th>Medidor</th>
            <th> </th>
                                    
        </tr>
        <tbody id="tabla_lecturas">
        </tbody>
        
    </table>-->

</div>
<div hidden="true">
    
<input type="text" id="id_asoc" value="" />
<input type="text" id="mes_lec" value="" />
<input type="text" id="gestion_lec" value="" />
<input type="text" id="anterior_lec" value="" />
<input type="text" id="actual_lec" value="" />
<input type="text" id="fechaant_lec" value="" />
<input type="text" id="consumo_lec" value="" />
<input type="date" id="fecha_lec" value="<?php echo date("Y-m-d"); ?>" />
<input type="text" id="hora_lec" value="<?php echo date("H:n:s"); ?>" />
<input type="text" id="totalcons_lec" value="" />
<input type="text" id="monto_lec" value="" />
<input type="text" id="estado_lec" value="" />
<input type="text" id="tipo_asoc" value="" />
<input type="text" id="servicios_asoc" value="" />
<input type="text" id="cantfact_lec" value="" />
<input type="text" id="montofact_lec" value="" />
<input type="text" id="nit_fact" value="" />
<input type="text" id="razon_fact" value="" />
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_lectura" id="boton_lectura" style='display:none;'>
  Registrar Lectura
</button>

<!-- Modal -->
<div class="modal fade" id="modal_lectura" tabindex="-1" role="dialog" aria-labelledby="modal_lectura" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="font-family: Arial; font-size: 11px;">
        <div class="modal-header">
            <center style="padding:0;">
                
                
          <h5 class="modal-title" id="exampleModalLabel"><b><fa class="fa fa-book"></fa>   REGISTRAR LECTURA</b></h5>
<!--        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>-->

            <table>
                <tr>
                    <td>Fecha Lectura<br><input type="date" id="fecha_lectura" value="<?php echo date("Y-m-d"); ?>"></td>
                    <td>Fecha Venc.<br><input type="date" id="fecha_vencimiento" value="<?php echo date("Y-m-d"); ?>"></td>

                </tr>
            </table>
        
            </center>
          
      </div>
      <div class="modal-body" id="datos_lectura">
       
          
      </div>
      <div class="modal-footer">
          
            <button type="button" class="btn btn-danger" data-dismiss="modal" id="boton_cerrar_lectura"><fa class="fa fa-times"></fa> Cerrar</button>                        
            
            <button type="button" class="btn btn-success" onclick="registrar_lectura()" id="boton_registrar_lectura" style="display: none;"><fa class="fa fa-floppy-o"></fa> Registrar Lectura</button>
          
      </div>
    </div>
  </div>
</div>