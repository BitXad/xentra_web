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
<input type="hidden" name="resasociado" id="resasociado" />
<div class="row micontenedorep" style="display: none" id="cabeceraprint" >
    <table style="width: 100%; font-family: Arial !important;" >
        <tr>
            <td class="labj text-center" style="width: 15%; padding-bottom: 0px; padding-right: 0px">
                <!--<img src="<?php //echo base_url('resources/images/empresas/').$all_empresa[0]['logo_emp']; ?>" width="100" height="60"><br>-->
                <img src="<?php echo base_url('resources/images/empresas/logo.jpg'); ?>" width="100" height="60"><br>
            </td>
            <td class="labjder text-center" style="width: 85%; padding-bottom: 0px; padding-right: 0px; line-height: 0.9">
                <span class="text-bold" style="font-size: 15px;"><?php echo $all_empresa[0]['nombre_emp']; ?></span><br>
                <span class="text-bold" style="font-size: 15px;"><?php echo $all_empresa[0]['eslogan_emp']; ?></span><br>
                <span style="font-size: 10px;"><?php echo $all_empresa[0]['direccion_emp']; ?></span><br>
                <span style="font-size: 10px;"><?php echo $all_empresa[0]['telefono_emp']; ?></span>
            </td>
        </tr>
        <tr>
            <td></td>
            <td style="width: 35%; padding: 0"> 
                <center>
                    <br>
                    <font size="3" face="arial"><b><span id="titasociado"></span>LISTA DE ASOCIADOS</b></font> <br>
                    <font size="1" face="arial"><b><span id="fhimpresion"></span></b></font> <br>
                </center>
            </td>
        </tr>
    </table>      
        
</div>
<div class="row no-print">
    <div class="col-md-7">
        <div class="box-header">
            <font class="text-bold" size='4' face='Arial'>Asociados</font>
            <br><font size='2' face='Arial' id="encontrados"></font>
            <span style="font-size: 8pt;" id="busquedacategoria"></span>
        </div>
    </div>
    <div class="col-md-5">
        <div class="box-tools text-center">
            <a style="width: 80px !important" href="<?php echo site_url('asociado/add'); ?>" class="btn btn-success btn-foursquarexs" target="_blank" title="Registrar a nuevo Asociado"><font size="5"><span class="fa fa-user-plus"></span></font><br><small>Registrar</small></a>
            <a style="width: 80px !important" onclick="tablaresultadosasociado(3)" class="btn btn-warning btn-foursquarexs" title="Registrar todos los Asociados"><font size="5"><span class="fa fa-search"></span></font><br><small>Ver Todos</small></a>
            <a style="width: 80px !important" href="<?php echo site_url('asociado/modif'); ?>" class="btn btn-facebook btn-foursquarexs" target="_blank" title="Lista de Asociados modificados"><font size="5"><span class="fa fa-list-ol"></span></font><br><small>Lista Asoc.</small></a>
            <a style="width: 80px !important" onclick="imprimir_socios()" class="btn btn-primary btn-foursquarexs" title="Imprimir Asociados"><font size="5"><span class="fa fa-print"></span></font><br><small>Imprimir</small></a>
            <table style="display: inline">
                <tr><td>
                <input class="btn" type="checkbox" name="listasocios" id="listasocios" title="Lista de Asociados" onclick="lista_socios()" >
                </td>
                </tr>
                <!--<tr><td>
                <input class="btn" type="checkbox" name="listaprecios" id="listaprecios" title="Lista de Precios" onclick="listaprecios()" >
                </td>
                </tr>-->
            </table>
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
                    <thead role="rowgroup" id="cabcatalogo">
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
                    </thead>
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

<!------------------------ INICIO modal para cambiar PASSWORD ------------------->
<div class="modal fade" id="modalcambiar" tabindex="-1" role="dialog" aria-labelledby="modalcambiarlabel">
    <div class="modal-dialog" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header text-center">
                <span>CAMBIAR CONTRASEÑA DE:</span><br>
                <label class="text-bold" style="font-size: 12pt" id="estenombre"></label>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body" style="font-size: 10pt">
                <!------------------------------------------------------------------->
                <div class="col-md-6">
                    <label for="nuevo_pass" class="control-label">Nueva Contraseña</label>
                    <div class="form-group">
                        <input type="password" name="nuevo_pass" class="form-control" id="nuevo_pass" placeholder="Mínimo tres caracteres" />
                        <span class="text-danger"><?php echo form_error('nuevo_pass');?></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="repita_pass" class="control-label">Repita Contraseña</label>
                    <div class="form-group">
                        <input type="password" name="repita_pass" class="form-control" id="repita_pass" placeholder="Mínimo tres caracteres" />
                        <span class="text-danger"><?php echo form_error('repita_pass');?></span>
                    </div>
                </div>
                <input type="hidden" name="esteid_asoc" class="form-control" id="esteid_asoc" />
                <!------------------------------------------------------------------->
            </div>
            <div class="modal-footer" style="text-align: center">
                <a class="btn btn-success" onclick="cambiarestacon()"><i class="fa fa-check"></i> Cambiar</a>
                <a href="#" class="btn btn-danger" data-dismiss="modal" onclick="borrar_campos"><span class="fa fa-times"></span> Cancelar </a>
            </div>
        </div>
    </div>
</div>
<!------------------------ FIN modal para cambiar PASSWORD ------------------->
