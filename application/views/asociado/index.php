<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/asociado.js'); ?>" type="text/javascript"></script>
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<script type="text/javascript">
    $(document).ready(function () {
        (function ($) {
            $('#filtrar').keyup(function () {
                var rex = new RegExp($(this).val(), 'i');
                $('.buscar tr').hide();
                $('.buscar tr').filter(function () {
                    return rex.test($(this).text());
                }).show();
            })
        }(jQuery));
    });
</script>
<style type="text/css">
    #contieneimg{
        width: 50px;
        height: 50px;
        text-align: center;
    }
    #horizontal{
        display: flex;
        white-space: nowrap;
        border-style: none !important;
    }
    #masgrande{
        font-size: 12px;
    }
</style>
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<div class="row no-print">
    <div class="col-md-8">
        <div class="box-header">
            <font class="text-bold" size='4' face='Arial'>Asociados</font>
            <br><font size='2' face='Arial' id="encontrados"></font> 
        </div>
        <div class="col-md-12" style="padding-left: 0px">
            <div class="col-md-7" style="padding-left: 0px">
                <div class="input-group">
                    <span class="input-group-addon"> Buscar </span>           
                    <input id="filtrar" type="text" class="form-control" placeholder="Ingrese el nombre, código" onkeypress="buscarasociado(event)" autocomplete="off">
                </div>
            </div>
            <!--<div class="col-md-3">
                
                <div class="box-tools">
                    <select name="categoria_id" class="btn-primary btn-sm" id="categoria_id" onchange="tablaresultadosproducto(2)">
                        <option value="" disabled selected >-- BUSCAR POR CATEGORIAS --</option>
                        <option value="0"> Todas Las Categorias </option>
                        <?php 
                       /* foreach($all_categoria as $categoria)
                        {
                            echo '<option value="'.$categoria['categoria_id'].'">'.$categoria['categoria_nombre'].'</option>';
                        } 
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                
                <div class="box-tools">
                    <select name="estado_id" class="btn-primary btn-sm" id="estado_id" onchange="tablaresultadosproducto(2)">
                        <option value="" disabled selected >-- BUSCAR POR ESTADOS --</option>
                        <option value="0">Todos Los Estados</option>
                        <?php 
                        foreach($all_estado as $estado)
                        {
                            echo '<option value="'.$estado['estado_id'].'">'.$estado['estado_descripcion'].'</option>';
                        } */
                        ?>
                    </select>
                </div>
            </div>-->
           <!-- <div class="col-md-3">
                
                <div class="box-tools">
                    <select name="estado_id" class="btn-primary btn-sm" id="estado_id">
                        <option value="">-- ESTADO --</option>
                        <?php 
                     /*   foreach($all_estado as $estado)
                        {
                                $selected = ($estado['estado_id'] == $producto['estado_id']) ? ' selected="selected"' : "";

                                echo '<option value="'.$estado['estado_id'].'" '.$selected.'>'.$estado['estado_descripcion'].'</option>';
                        } */
                        ?>
                    </select>
                </div>
            </div>-->
        </div>
           
            
        <!--este es FIN de input buscador-->

        <!-- **** INICIO de BUSCADOR select y productos encontrados *** -->
         <div class="row" id='loader'  style='display:none; text-align: center'>
            <img src="<?php echo base_url("resources/images/loader.gif"); ?>"  >
        </div>
        <!-- **** FIN de BUSCADOR select y productos encontrados *** -->
        
        
    </div>
    <!---------------- BOTONES --------->
    <div class="col-md-4">
        
            <div class="box-tools text-center">
            <a href="<?php echo site_url('asociado/add'); ?>" class="btn btn-success btn-foursquarexs" title="Registrar a nuevo Asociado"><font size="5"><span class="fa fa-user-plus"></span></font><br><small>Registrar</small></a>
           <!-- <button data-toggle="modal" data-target="#modalbuscar" class="btn btn-warning btn-foursquarexs" onclick="tablaresultadosproducto(3)" title="Mostrar todos los Productos" ><font size="5"><span class="fa fa-search"></span></font><br><small>Ver Todos</small></button>
            <a href="<?php //echo site_url('producto/existenciaminima'); ?>" class="btn btn-info btn-foursquarexs" target="_blank" ><font size="5" title="Productos con Existencia minima"><span class="fa fa-eye"></span></font><br><small>Exist. Min.</small></a>
           --> <?php
           /* if($rol[106-1]['rolusuario_asignado'] == 1){ ?>
            <a onclick="imprimir_producto()" class="btn btn-primary btn-foursquarexs"><font size="5" title="Imprimir Producto"><span class="fa fa-print"></span></font><br><small>Imprimir</small></a>
            <?php }*/ ?>
            <!--<a href="" class="btn btn-info btn-foursquarexs"><font size="5"><span class="fa fa-cubes"></span></font><br><small>Productos</small></a>-->            
    </div>
    </div>
    <!---------------- FIN BOTONES --------->
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body table-responsive">
                <table class="table table-condensed" id="mitabla">
                    <tr>
                        <th>#</th>
                        <th>ASOCIADO</th>
                        <th>CODIGO</th>
                        <th>SERVICIO</th>
                        <th>FECHAS</th>
                        <th>ORDEN</th>
                        <th>CIUDAD</th>
                        <th></th>
                    </tr>
                    <tbody class="buscar" id="tablaresultados">
                    <?php /*foreach($asociado as $a){ ?>
                    <tr>
						<td><?php echo $a['id_asoc']; ?></td>
						<td><?php echo $a['id_emp']; ?></td>
						<td><?php echo $a['estado']; ?></td>
						<td><?php echo $a['tipo_asoc']; ?></td>
						<td><?php echo $a['zona_asoc']; ?></td>
						<td><?php echo $a['servicios_asoc']; ?></td>
						<td><?php echo $a['categoria_asoc']; ?></td>
						<td><?php echo $a['ciudad']; ?></td>
						<td><?php echo $a['nombres_asoc']; ?></td>
						<td><?php echo $a['apellidos_asoc']; ?></td>
						<td><?php echo $a['ci_asoc']; ?></td>
						<td><?php echo $a['direccion_asoc']; ?></td>
						<td><?php echo $a['fechanac_asoc']; ?></td>
						<td><?php echo $a['telefono_asoc']; ?></td>
						<td><?php echo $a['codigo_asoc']; ?></td>
						<td><?php echo $a['nit_asoc']; ?></td>
						<td><?php echo $a['razon_asoc']; ?></td>
						<td><?php echo $a['foto_asoc']; ?></td>
						<td><?php echo $a['fechahora_asoc']; ?></td>
						<td><?php echo $a['medidor_asoc']; ?></td>
						<td><?php echo $a['orden_asoc']; ?></td>
						<td>
                            <a href="<?php echo site_url('asociado/edit/'.$a['id_asoc']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('asociado/remove/'.$a['id_asoc']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php }*/ ?>
                    </tbody>
                </table>
                                
            </div>
        </div>
    </div>
</div>
