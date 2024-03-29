<!----------------------------- script buscador --------------------------------------->
<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/ingresos.js'); ?>" type="text/javascript"></script>
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
         function imprimir()
        {
           $("#cabeceraprint").css("display", "");
             window.print(); 
        }
</script>   
<!----------------------------- fin script buscador --------------------------------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
<div class="row micontenedorep" style="display: none" id="cabeceraprint">
    <table class="table" style="width: 100%; padding: 0;" >
        <tr>
            <td style="width: 25%; padding: 0; line-height:10px;" >
                <center>
                    <img src="<?php echo base_url('resources/images/empresas/logo.jpg') ?>" width="80px" height="60px"><br>
                    <font size="2" face="Arial"><b><?php echo $empresa['nombre_emp']; ?></b></font><br>
                    <font size="2" face="Arial"><b><?php echo $empresa['eslogan_emp']; ?></b></font><br>
                    <!--<font size="1" face="Arial"><b><?php //echo "De: ".$empresa['empresa_propietario']; ?></b></font><br>-->
                    <!--<font size="1" face="Arial"><?php //echo $factura[0]['sucursal_emp'];?><br>-->
                    <font size="1" face="Arial"><?php echo $empresa['direccion_emp']; ?></font><br>
                    <font size="1" face="Arial"><?php echo $empresa['telefono_emp']; ?></font><br>
                    <font size="1" face="Arial"><?php echo $empresa['ubicacion_emp']; ?></font>
                </center>                      
            </td>
            <td style="width: 35%; padding: 0" > 
                <center>
                    <br><br>
                    <font size="3" face="arial"><b>INGRESOS</b></font> <br>
                    <font size="1" face="arial"><b><?php echo date("d/m/Y H:i:s"); ?></b></font><br>
                </center>
            </td>
            <td style="width: 20%; padding: 0" >
                <center></center>
            </td>
        </tr>
    </table>
</div>
<div class="col-md-8 no-print">
    <div class="box-header">
        <font size='4' face='Arial'><b>Ingresos</b></font>
        <br><font size='2' face='Arial' id="pillados"></font>
    </div>
    <div class="row">
        <div class="col-md-6 no-print">
            <!--------------------- parametro de buscador --------------------->
            <div class="input-group"> <span class="input-group-addon">Buscar</span>
                <input id="filtrar" type="text" class="form-control" placeholder="Ingrese la descripción" onkeypress="buscaringreso(event)" autocomplete="off">
            </div>
            <!--------------------- fin parametro de buscador --------------------->
        </div>
        <div class="col-md-3 no-print">
            <div class="box-tools" >
                <select class="btn btn-primary form-control" id="select_lafecha" onchange="buscar_ingresos()">
                    <option value="0">- Elija Fechas -</option>
                    <option value="1">Ingresos de Hoy</option>
                    <option value="2">Ingresos de Ayer</option>
                    <option value="3">Ingresos de la semana</option>
                    <option value="5">Ingresos por Fecha</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="box-tools">
                <select name="nom_cating" id="nom_cating" class="btn btn-primary form-control" onchange="buscaring_categorias()" >
                    <option value="0">- Elegir Categoria -</option>
                    <?php 
                    foreach($all_categoria_ingreso as $categoria_ingreso)
                    {
                      $selected = ($categoria_ingreso['nom_cating'] == $this->input->post('nom_cating')) ? ' selected="selected"' : "";
                      echo '<option value="'.$categoria_ingreso['nom_cating'].'" '.$selected.'>'.$categoria_ingreso['nom_cating'].'</option>';
                    } 
                    ?>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="col-md-4 no-print">
    <div class="box-tools">
        <center>    
            <a href="<?php echo site_url('ingreso/add'); ?>" class="btn btn-success btn-foursquarexs"><font size="5"><span class="fa fa-money"></span></font><br><small>Registrar Ingreso</small></a>
            <button data-toggle="modal" data-target="#modalbuscar" class="btn btn-warning btn-foursquarexs" onclick="fechadeingreso('and 1')" ><font size="5"><span class="fa fa-search"></span></font><br><small>Ver Todos</small></button>
            <a href="#" onclick="imprimir()" class="btn btn-info btn-foursquarexs"><font size="5"><span class="fa fa-print"></span></font><br><small>Imprimir</small></a>
        </center>            
    </div>
</div>
<div class="row col-md-12" id='loader'  style='display:none; text-align: center'>
    <img src="<?php echo base_url("resources/images/loader.gif"); ?>"  >
</div>
<div class="panel panel-primary col-md-12" id='buscador_oculto' style='display:none;'>
    <br>
    <center>            
        <div class="col-md-2">
            Desde: <input type="date" class="btn btn-primary btn-sm form-control" value="<?php echo date("Y-m-d")?>" id="fecha_desde" name="fecha_desde" required="true">
        </div>
        <div class="col-md-2">
            Hasta: <input type="date" class="btn btn-primary btn-sm form-control" value="<?php echo date("Y-m-d")?>" id="fecha_hasta" name="fecha_hasta" required="true">
        </div>
        <div class="col-md-3">
            <button class="btn btn-sm btn-primary btn-sm btn-block"  onclick="buscar_por_fechas()">
                <h4>
                <span class="fa fa-search"></span>   Buscar Ingresos  
                </h4>
            </button>
            <br>
        </div>
    </center>
    <br>
</div>
<div class="col-md-12">         
    <div class="box">
        <div class="box-body table-responsive">
            <table class="table table-striped table-condensed" id="mitabla">     
                <tr>
                    <th>#</th>
                    <th>NOMBRE</th>
                    <th># RECIBO</th>
                    <th>FECHA</th>
                    <th>CONCEPTO</th>
                    <th>MONTO</th>
                    <th>ESTADO</th>
                    <th>USUARIO</th>
                    <th class="no-print"></th>
                </tr>
                <tbody class="buscar" id="fechadeingreso">
            </table>
        </div>
        <div class="pull-right">
            <?php echo $this->pagination->create_links(); ?>                    
        </div>
    </div>
</div>