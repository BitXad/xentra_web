<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/reporte_movimiento.js'); ?>" type="text/javascript"></script>
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">

<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />

<script type="text/javascript">

    function imprimirdetalle(){

        var f = new Date();

        

        var estafecha = f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear()+" "+

                        f.getHours()+":"+f.getMinutes()+":"+f.getSeconds();

        $('#fechaimpresion').html(estafecha);

        window.print();

    }

</script>
<style type="text/css">
    @media print {
        .cabeceratabla th {
            background-color: rgba(127,127,127,0.5) !important;
            color: black !important;
            -webkit-print-color-adjust: exact;
        }
    }
    table th{
        font-size: 10px !important;
    }
    table td{
        font-size: 9px !important;
    }
</style>

<div style="width: 100% !important; padding: 0; overflow-y:hidden;" class="table table-responsive">
<div class="box-header no-print col-md-6" style="width: 100% !important;">
    <h3 class="box-title"><b>REPORTE DE MOVIMIENTO DIARIO</b></h3><br><br>
    <div class="col-md-3">
        Desde: <input type="date" value="<?php echo date('Y-m-d')?>" class="btn btn-primary btn-sm form-control" id="fecha_desde" name="fecha_desde" required="true">
    </div>
    <div class="col-md-3">
        Hasta: <input type="date" value="<?php echo date('Y-m-d')?>" class="btn btn-primary btn-sm form-control" id="fecha_hasta" name="fecha_hasta" required="true">
    </div>
    <div class="col-md-3">
        Usuario:
        <select  class="btn btn-primary btn-sm form-control" id="buscarusuario_id" name="buscarusuario_id" required>
            <option value="0"> TODOS </option>
            <?php foreach($all_usuario as $usuario){?>
            <option value="<?php echo $usuario['id_usu']; ?>"><?php echo $usuario['nombre_usu']; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="col-md-3">
        Estado:
        <select  class="btn btn-primary btn-sm form-control" id="estado_id" name="estado_id" required>
            <option value="no" selected> TODOS </option>
            <option value="ACTIVO"> ACTIVO </option>
            <option value="INACTIVO"> INACTIVO </option>
        </select>
    </div>
    <div class="col-md-3">
        <br>
        <button class="btn btn-sm btn-warning btn-sm btn-block"  type="submit" onclick="buscar_por_fecha()" style="height: 34px;">
            <span class="fa fa-search"></span> Buscar
      </button>
        <br>
    </div>
    <div class="col-md-4">
        <br>
        <span class="badge btn-primary" style="height: 34px; padding-top: 5px;">Ing. Egr. encontrados: <span class="badge btn-primary"><input style="border-width: 0; width: 55px" id="resingegr" type="text" value="0" readonly="true"> </span></span>
    </div>
    <div class="col-md-3">
        <br>
        <a id="imprimirestedetalle" class="btn btn-sq-lg btn-success" onclick="imprimirdetalle()" ><span class="fa fa-print"></span>&nbsp;Imprimir</a>
    </div>
</div>
<!-- *********** INICIO de BUSCADOR select y productos encontrados ****** -->
<div class="row" id='loader'  style='display:none; text-align: center; width: 100%'>
    <img src="<?php echo base_url("resources/images/loader.gif"); ?>"  >
</div>
<!-- *********** FIN de BUSCADOR select y productos encontrados ****** -->
<div class="row" style="width: 100%">
    <div class="col-md-12">
        <div class="box" style="width: 100%">
        <!-- ********************************INICIO Cabecera******************************* -->
            <div class="row micontenedorep" id="cabeceraprint" style="width: 100%">
                <table class="table" style="width: 100%; padding: 0;" >
                    <tr>
                        <td style="width: 15%; padding: 0; padding-left: 10px; line-height:10px;" >
                            <!--<img src="<?php //echo base_url('resources/images/empresas/').$all_empresa[0]['logo_emp']; ?>" width="100" height="60"><br>-->
                            <img src="<?php echo base_url('resources/images/empresas/logo.jpg'); ?>" width="100" height="60"><br>
                        </td>
                        <td class="text-center" style="width: 85%; padding: 0" >
                                <font size="3" face="Arial"><b><?php echo $all_empresa[0]['nombre_emp']; ?></b></font><br>
                                <font size="1" face="Arial"><?php echo $all_empresa[0]['direccion_emp']; ?><br>
                                <font size="1" face="Arial"><?php echo $all_empresa[0]['telefono_emp']; ?></font>
                        </td>
                    </tr>
                </table>       
                <table class="table" style="width: 100%; padding: 0; margin-bottom: 5px" >
                    <tr>
                        <td class="text-center" style="width: 90%; padding: 0" > 
                                <font size="4" face="arial"><b>REPORTE DE INGRESOS Y EGRESOS</b></font> <br>
                                    <label id="fechaimpresion"></label>
                        </td>
                    </tr>
                </table>
            </div>
            <div class=" table-responsive" id="cabizquierdafechas" style="width: 100%">
                <span id="elusuario" style="font-size: 10px"></span><br>
                <span id="fecha1impresion" style="font-size: 10px"></span>
                <span id="fecha2impresion" style="font-size: 10px"></span>
            </div>
        
            <div id="tablatotalresultados" style="width: 100%"></div>
            
            <div style="text-align: center">
                <div id="parafirmas" style="font-size: 10px; width: 60%">
                    <div id="firmaizquierda">
                      <br>
                      <br>
                      ________________________<br>FIRMA RESPONSABLE
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>