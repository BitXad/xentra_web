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
            <span style="font-size: 8pt;" id="busquedacategoria"></span>
        </div>
    </div>
    <div class="col-md-4">
            <div class="box-tools text-center">
                <a href="<?php echo site_url('asociado/add'); ?>" class="btn btn-success btn-foursquarexs" target="_blank" title="Registrar a nuevo Asociado"><font size="5"><span class="fa fa-user-plus"></span></font><br><small>Registrar</small></a>
            <a onclick="tablaresultadosasociado(3)" class="btn btn-warning btn-foursquarexs" title="Registrar todos los Asociados"><font size="5"><span class="fa fa-search"></span></font><br><small>Ver Todos</small></a>
           <!-- <button data-toggle="modal" data-target="#modalbuscar" class="btn btn-warning btn-foursquarexs" onclick="tablaresultadosproducto(3)" title="Mostrar todos los Productos" ><font size="5"><span class="fa fa-search"></span></font><br><small>Ver Todos</small></button>
            <a href="<?php //echo site_url('producto/existenciaminima'); ?>" class="btn btn-info btn-foursquarexs" target="_blank" ><font size="5" title="Productos con Existencia minima"><span class="fa fa-eye"></span></font><br><small>Exist. Min.</small></a>
           --> <?php
           /* if($rol[106-1]['rolusuario_asignado'] == 1){ ?>
            <a onclick="imprimir_producto()" class="btn btn-primary btn-foursquarexs"><font size="5" title="Imprimir Producto"><span class="fa fa-print"></span></font><br><small>Imprimir</small></a>
            <?php }*/ ?>
            <!--<a href="" class="btn btn-info btn-foursquarexs"><font size="5"><span class="fa fa-cubes"></span></font><br><small>Productos</small></a>-->            
    </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-5" style="padding-left: 0px">
            <div class="input-group">
                <span class="input-group-addon"> Buscar </span>           
                <input id="filtrar" type="text" class="form-control" placeholder="Ingrese el nombre, dirección, código, teléfono,.." onkeypress="buscarasociado(event)" autofocus autocomplete="off">
            </div>
        </div>
        <div class="col-md-3" style="padding-left: 0px">
            <div class="box-tools">
                <select name="id_dir" class="btn-primary btn-sm btn-block" id="id_dir" onchange="tablaresultadosasociado(2)">
                    <option value="" disabled selected >-- BUSCAR POR DIRECCION --</option>
                    <option value="0"> Todos las Direcciones </option>
                    <?php 
                    foreach($all_direccion as $direccion)
                    {
                        echo '<option value="'.$direccion['nombre_dir'].'">'.$direccion['nombre_dir'].'</option>';
                    } 
                    ?>
                </select>
            </div>
        </div>
        <div class="col-md-2" style="padding-left: 0px">
            <div class="box-tools">
                <select name="servicio_id" class="btn-primary btn-sm btn-block" id="servicio_id" onchange="tablaresultadosasociado(2)">
                    <option value="" disabled selected >-- BUSCAR POR SERVICIOS --</option>
                    <option value="0"> Todos los Servicios </option>
                    <?php 
                    foreach($all_servicio as $servicio)
                    {
                        echo '<option value="'.$servicio['servicio'].'">'.$servicio['servicio'].'</option>';
                    } 
                    ?>
                </select>
            </div>
        </div>
        <div class="col-md-2" style="padding-left: 0px">
            <div class="box-tools">
                <select name="categoria_id" class="btn-primary btn-sm btn-block" id="categoria_id" onchange="tablaresultadosasociado(2)">
                    <option value="" disabled selected >-- BUSCAR POR CATEGORIAS --</option>
                    <option value="0">Todas las Categoriás</option>
                    <?php 
                    foreach($all_categoria as $categoria)
                    {
                        echo '<option value="'.$categoria['categoria'].'">'.$categoria['categoria'].'</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
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
        <!-- **** INICIO de BUSCADOR select y productos encontrados *** -->
         <div class="row" id='loader'  style='display:none; text-align: center'>
            <img src="<?php echo base_url("resources/images/loader.gif"); ?>"  >
        </div>
        <!-- **** FIN de BUSCADOR select y productos encontrados *** -->
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
                        <th>MAP</th>
                        <th>COD. CAT.</th>
                        <th>LEC. BASE</th>
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
