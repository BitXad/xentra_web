<!----------------------------- script buscador --------------------------------------->
<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/egresos.js'); ?>" type="text/javascript"></script>
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
                        <!--<font size="1" face="Arial"><b><?php echo "De: ".$empresa['empresa_propietario']; ?></b></font><br>-->
                        <!--<font size="1" face="Arial"><?php echo $factura[0]['sucursal_emp'];?><br>-->
                        <font size="1" face="Arial"><?php echo $empresa['direccion_emp']; ?></font><br>
                        <font size="1" face="Arial"><?php echo $empresa['telefono_emp']; ?></font><br>
                        <font size="1" face="Arial"><?php echo $empresa['ubicacion_emp']; ?></font>
                </center>
            </td>
            <td style="width: 35%; padding: 0" > 
                <center>
                    <br><br>
                    <font size="3" face="arial"><b>EGRESOS</b></font> <br>
                    <font size="1" face="arial"><b><?php echo date("d/m/Y H:i:s"); ?></b></font> <br>
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
        <font size='4' face='Arial'><b>Egresos</b></font>
        <br><font size='2' face='Arial' id="pillados"></font>
    </div>
    <div class="row">
        <div class="col-md-6 no-print">
            <div class="input-group"> <span class="input-group-addon">Buscar</span>
                <input id="filtrar" type="text" class="form-control" placeholder="Ingrese la descripción" onkeypress="buscaregreso(event)" autocomplete="off">
            </div>
        </div>
        <div class="col-md-3 no-print">
            <div  class="box-tools" >
                <select  class="btn btn-primary form-control" id="select_lafecha" onchange="buscar_egresos()">
                    <option value="0">Elija Fechas</option>
                    <option value="1">Egresos de Hoy</option>
                    <option value="2">Egresos de Ayer</option>
                    <option value="3">Egresos de la semana</option>
                    <option value="5">Egresos por Fecha</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="box-tools">
                <select name="nom_categr" id="nom_categr" class="btn btn-primary form-control" onchange="buscaregr_categorias()" >
                    <option value="0">- Elegir Categoria -</option>
                    <?php 
                    foreach($all_categoria_egreso as $categoria_egreso)
                    {
                      $selected = ($categoria_egreso['nom_categr'] == $this->input->post('nom_categr')) ? ' selected="selected"' : "";
                      echo '<option value="'.$categoria_egreso['nom_categr'].'" '.$selected.'>'.$categoria_egreso['nom_categr'].'</option>';
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
            <a href="<?php echo site_url('egreso/add'); ?>" class="btn btn-success btn-foursquarexs"><font size="5"><span class="fa fa-money"></span></font><br><small>Registrar Egreso</small></a>
            <button data-toggle="modal" data-target="#modalbuscar" class="btn btn-warning btn-foursquarexs" onclick="fechadeegreso('and 1')" ><font size="5"><span class="fa fa-search"></span></font><br><small>Ver Todos</small></button>
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
            Desde: <input type="date" class="btn btn-primary btn-sm form-control" id="fecha_desde" name="fecha_desde" value="<?php echo date("Y-m-d")?>" required="true">
        </div>
        <div class="col-md-2">
            Hasta: <input type="date" class="btn btn-primary btn-sm form-control" id="fecha_hasta" name="fecha_hasta" value="<?php echo date("Y-m-d")?>" required="true">
        </div>
        
      
          
        <div class="col-md-3">
            <button class="btn btn-sm btn-primary btn-sm btn-block"  onclick="buscar_por_fechas()">
                <h4>
                <span class="fa fa-search"></span>   Buscar egresos  
                </h4>
            </button>
           
            <br>
        </div>
        
    </center>    
    <br>    
</div>

<br>
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
                           <tbody class="buscar" id="fechadeegreso">
                       
                </table>
                
            </div>
            <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                
        </div>
    </div>
