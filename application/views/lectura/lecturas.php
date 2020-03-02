<script src="<?php echo site_url('resources/js/lecturas.js');?>"></script>
<link rel="stylesheet" href="<?php echo site_url('resources/css/mitabla.css');?>">


<input id="base_url" value="<?php echo base_url(); ?>" hidden="">

<div class="row">
    <div class="col-md-12">
        <div class="box" >
            <div class="box-header" style="padding: 0;">
             
                <div class="col-md-2" style="padding:2px;">
                    <label for="afiliados" class="control-label">AFILIADOS</label>
                    <div class="form-group">                        

                        <select name="select_afiliados" class="form-control" id="select_afiliados" style="padding:0;">
                            <option value="SIN LECTURA">SIN LECTURA</option>
                            <option value="LECTURADO">LECTURADO</option>
                            <option value="TODOS">TODOS</option>
                        </select>    
                    </div>
                </div>

                <div class="col-md-2" style="padding:2px;">
                    <label for="meses" class="control-label">MES</label>
                    <div class="form-group">                        

                        <select name="select_mes" class="form-control" id="select_mes"  style="padding:0;">
                            
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
                    <div class="form-group">                        
                            
                        <select name="select_gestion" class="form-control" id="select_gestion"  style="padding:0;">
                            
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
                    <div class="form-group">                        

                        <select name="select_orden" class="form-control" id="select_orden"  style="padding:0;">
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
                    <div class="form-group">                        

                        <select name="select_direccion" class="form-control" id="select_direccion"  style="padding:0;">
                            <option value="TODOS" selected>TODOS</option>
                            <?php foreach($direcciones as $d){ ?>
                                    <option value="<?php echo $d["direccion_asoc"]; ?>" ><?php echo $d["direccion_asoc"]; ?></option>
                             <?php } ?>
                        </select>    

                    </div>
                </div>

                <div class="col-md-2" style="padding:2px;">
                    <label for="zona" class="control-label">ZONA</label>
                    <div class="form-group">                        
                        <select name="select_zona" class="form-control" id="select_zona"  style="padding:0;">
                            <option value="TODOS" selected>TODOS</option> 
                            <?php foreach($zonas as $z){ ?>
                                    <option value="<?php echo $z["zona_asoc"]; ?>" ><?php echo $z["zona_asoc"]; ?></option>
                             <?php } ?>
                        </select>    

                    </div>
                </div>

                <div class="col-md-1" style="padding:2px;">
                    <label for="buscar" class="control-label">BUSCAR</label>
                    <div class="form-group">                        
                        <button onclick="buscar_asociados()" class="btn btn-facebook"><fa class="fa fa-binoculars"></fa>
                            Buscar
                        </button>                        
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

<div class="box-body">
    <table class="table table-striped" id="mitabla">
        <tr>
            <th>#</th>
            <th>Código</th>
            <th>Nombre Asociado</th>
            <th>Dirección</th>
            <th>C.I.</th>
            <th>Tipo</th>
            <th>Fecha Nac.</th>
            <th>Teléfono</th>
            <th>N.I.T.</th>
            <th>Razón Soc.</th>
            <th>Medidor</th>
            <th>Servicio</th>
                                    
        </tr>
        <tbody id="tabla_lecturas">
        </tbody>
        
    </table>

</div>