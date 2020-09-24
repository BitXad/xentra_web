<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<!--<script src="<?php //echo base_url('resources/js/reporte_ingresof.js'); ?>" type="text/javascript"></script>-->
<!--<link href="<?php //echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">-->

<!--<input type="hidden" name="base_url" id="base_url" value="<?php //echo base_url(); ?>" />-->

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
    function imprimirdetalle(){
        var f = new Date();
        var estafecha = moment(f).format("DD/MM/YYYY HH:mm:ss")
        $('#fechaimpresion').html(estafecha);
        window.print();
    }
</script>
<style> 
    /*.lebo {
        border: 2px solid black; border-right: 0px; border-top: 0px; padding-right: 3px;
    }*/
    .lder {
        border-right: 2px solid black;
    }
    .lizq {
        border-left: 2px solid black;
    }
    .lizq1 {
        border-left: 3px solid black;
    }
    .labj {
        border-bottom: 2px solid black; border-right: 0px; border-top: 0px; padding-right: 3px;
    }
    .labjf {
        border-bottom: 2px solid black; border-right: 0px; border-top: 0px; padding-right: 3px;
    }
    .larrf {
        border-top: 3px solid black !important; border-right: 0px; padding-right: 3px;
    }
    .labjder {
        border-bottom: 2px solid black; border-right: 2px solid black; border-top: 0px;
    }
    .labjizqder {
        border-left: 2px solid black; border-right: 2px solid black; padding:3px !important; margin: 3px !important;
    }
    .pintado {
        background-color: #a9afe8; padding: 3px; /* rgb: 169,175,232 */ 
    }
    .boxtabla {
        border: 3px solid black;
        background-color: #a9afe8 !important;
    }
    .vacio {
        border: 0px; 
    }
    
    @media print {
        
        .pintado {
            background-color: rgba(169,175,232) !important;
            -webkit-print-color-adjust: exact;
            color-adjust: exact;
        }
        .boxtabla {
            background-color: rgba(169,175,232) !important;
            -webkit-print-color-adjust: exact;
            color-adjust: exact;
        }
    }

</style>
<style type="text/css">
    /*@media print {
        .cabeceratabla th {
            background-color: rgba(127,127,127,0.5) !important;
            color: black !important;
            -webkit-print-color-adjust: exact;
        }
    }*/
    .table1 th{
        font-size: 12px;
    }
    .table1 td{
        font-size: 10px;
    }
</style>

<div class="box-header no-print">
    <h3 class="box-title"><b>REPORTE DE USUARIOS ENCORTE</b></h3><br>
    <div class="col-md-5" style="padding-left: 0px">
        &nbsp;
        <div class="input-group">
            <span class="input-group-addon"> Buscar </span>           
            <input id="filtrar" type="text" class="form-control" placeholder="Ingrese el nombre, dirección, código..." autofocus autocomplete="off">
        </div>
    </div>
    <div class="col-md-4" hidden>
        <br>
        <span class="badge btn-primary" style="height: 34px; padding-top: 5px;">Encontrados: <span class="badge btn-primary"><input style="border-width: 0; width: 55px" id="resdeudores" type="text" value="0" readonly="true"> </span></span>
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
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
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
                </table>
                <table style="width: 100%; font-family: Arial !important;" >
                    <tr>
                        <td class="lizq" colspan="2" style="width: 100%; padding: 1px"></td>
                    </tr>
                    <tr>
                        <td class="labjizqder labjf text-center" style="width: 80%; line-height: 0.9">
                            <font size="4" face="arial"><b>USUARIOS EN CORTE</b></font> <br>
                            <!--<font size="1" face="arial"><b>COBRO POR SERVICIOS DE AGUA</b></font> <br>-->
                            <!--<span id="ladireccion" style="font-size: 10px"></span><br>-->
                        </td>
                        <td class="pintado" rowspan="3" style="width: 20%; vertical-align: middle; line-height: 0.9">
                            <!--<span id="fecha1impresion" style="font-size: 10px"></span><br>
                            <span id="fecha2impresion" style="font-size: 10px"></span><br>
                            <span id="elusuario" style="font-size: 10px"></span><br>-->
                            <span class="text-bold" style="font-size: 10px">Impreso por: </span>
                            <span><?php echo $nombre_usu; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="lder text-center" style="width: 80%; padding: 1px; font-size: 10px">
                            <span id="fechaimpresion"></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="lder" style="width: 80%; padding: 1px">
                            <span style="font-size: 10px">Expresado en moneda nacional (Bs)</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="vacio" colspan="2" style="width: 100%; padding: 1px"></td>
                    </tr>
                </table>
                <div class=" table-responsive" style="width: 100%">
                    
                </div>
                <div class="table-responsive" style="width: 100%">
                    <table class='table1 table-striped table-condensed' id='mitabladetimpresion' style='width: 100%; font-family: Arial !important;'>
                        <tr class='boxtabla'>
                            <th class='text-center' style='width: 2%; padding: 1px; vertical-align: middle'>N°</th>
                            <th class='text-center' style='width: 5%; padding: 1px; vertical-align: middle'>CODIGO</th>
                            <th class='text-center' style='width: 33%; padding: 1px; vertical-align: middle'>NOMBRE COMPLETO</th>
                            <th class='text-center' style='width: 25%; padding: 1px; vertical-align: middle'>DIRECCIÓN</th>
                            <th class='text-center' style='width: 10%; padding: 1px; vertical-align: middle'>MEDIDOR</th>
                            <th class='text-center lizq' style='width: 5%; padding: 1px; vertical-align: middle'>DIAS<br>MORA</th>
                            <th class='text-center lizq' style='width: 5%; padding: 1px; vertical-align: middle'>MESES<br><span style="font-size: 10px">ADEUDAD</span></th>
                            <th class='text-center lizq' style='width: 15%; padding: 1px; vertical-align: middle'>SERVICIOS</th>
                        </tr>
                        <tbody class="buscar">
                        <?php
                        $i = 0;
                        foreach($all_encorte as $d){ ?>
                        <tr class='labjf'>
                            <td class='text-center' style='padding: 0px 5px !important'><?php echo $i+1; ?></td>
                            <td class='text-right' style='padding: 0px 5px !important'><?php echo $d["codigo_asoc"];?></td>
                            <td class='text-left' style='padding: 0px 5px !important'><?php echo $d["nombres_asoc"]." ".$d["apellidos_asoc"];?></td>
                            <td class='text-left' style='padding: 0px 5px !important'><?php echo $d["direccion_asoc"];?></td>
                            <td class='text-center' style='padding: 0px 5px !important'><?php echo $d["medidor_asoc"];?></td>
                            <td class='text-center lizq' style='padding: 0px 5px !important'><?php echo $d["mora"];?></td>
                            <td class='text-center lizq' style='padding: 0px 5px !important'><?php echo $d["cantfact"];?></td>
                            <td class='text-center lizq' style='padding: 0px 5px !important'><?php echo $d["servicios_asoc"];?></td>
                        </tr>
                        <?php $i++; } ?>
                        </tbody>
                        <tr class='larrf lizq1'>
                            <td colspan='8'></td>
                            <!--<td class='text-right'>"+totalconsumomt3+"</td>
                            <td class='text-right'>"+numberFormat(Number(totalconsumo).toFixed(2))+"</td>
                            <td class='text-right'>"+numberFormat(Number(totalalcanta).toFixed(2))+"</td>
                            <td class='text-right'>"+numberFormat(Number(totalaportes).toFixed(2))+"</td>
                            <td class='text-right'>"+numberFormat(Number(totalrecargo).toFixed(2))+"</td>-->
                        </tr>
                        <tr>
                            <td class='lizq1' colspan='2'></td>
                            <td class='lizq1'><br><br></td>
                            <td colspan='5'></td>
                            <!--<td class='larrf text-right text-bold' colspan='3' style='font-family: Arial; font-size: 15px; !important'>TOTAL Bs.</td>
                            <td class='larrf text-right text-bold' style='font-family: Arial; font-size: 15px; !important'>"+numberFormat(Number(totalingreso).toFixed(2))+"</td>-->
                        </tr>
                        <tr>
                            <td class='larrf' colspan='2'></td>
                            <td class='text-center lizq1'>
                                ________________________<br>FIRMA RESPONSABLE
                            </td>
                            <td colspan='5'></td>
                        </tr>
                    </table>
                </div>
                <!--<div id="tablatotalresultados" class="table-responsive" style="width: 100%"></div>-->
            </div>
        </div>
    </div>
</div>
