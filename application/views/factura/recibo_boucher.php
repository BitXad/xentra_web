<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function()
    {
        window.onload = window.print();
    });
    function imprimir(){
        window.onload = window.print();
    }
</script>
<!----------------------------- script buscador --------------------------------------->
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
    p {
        font-family: Arial;
        font-size: 7pt;
        line-height: 120%;   /*esta es la propiedad para el interlineado*/
        color: #000;
        padding: 10px;
    }
    div {
        margin-top: 0px;
        margin-right: 0px;
        margin-bottom: 0px;
        margin-left: 10px;
        margin: 0px;
    }
    table{
        width : 7cm;
        margin : 0 0 0px 0;
        padding : 0 0 0 0;
        border-spacing : 0 0;
        border-collapse : collapse;
        font-family: Arial narrow;
        font-size: 7pt;  
    }
    td {
        border:hidden;
    }
    td#comentario {
        vertical-align : bottom;
        border-spacing : 0;
    }
    div#content {
        background : #ddd;
        font-size : 7px;
        margin : 0 0 0 0;
        padding : 0 5px 0 5px;
        border-left : 1px solid #aaa;
        border-right : 1px solid #aaa;
        border-bottom : 1px solid #aaa;
    }
</style>
<!----------------------------- fin script buscador --------------------------------------->
<!------------------ ESTILO DE LAS TABLAS ----------------->
<!--<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">-->

<!-------------------------------------------------------->
<?php
    $ancho = $configuracion[9-1]["valor"]."cm";
    $margen_izquierdo = "0cm"; //$parametro[0]["parametro_margenfactura"]."cm";
?>
<a class="btn btn-success no-print" onclick="imprimir()">Imprimir</a>
<table class="table" style="margin-left: 4px" >
    <tr>
        <td style="padding: 0; width: <?php echo $margen_izquierdo; ?>" ></td>
        <td style="padding: 0;">
            <table class="table" style="width: <?php echo $ancho; ?>;" >
                <tr>
                    <td style="padding:0;">        
                        <center>
                        <font size="2" face="Arial"><b><?php echo $empresa['nombre_emp']; ?></b></font><br>
                        <!--<font size="2" face="Arial"><b><?php /*echo $empresa[0]['empresa_eslogan']; ?></b></font><br>-->
                        <!--<font size="1" face="Arial"><b><?php echo "De: ".$empresa[0]['empresa_propietario']; ?></b></font><br>-->
                        <!--<font size="1" face="Arial"><?php echo $factura[0]['factura_sucursal'];*/ ?><br>-->
                        <font size="1" face="Arial"><?php echo $empresa['direccion_emp']; ?><br>
                        <font size="1" face="Arial"><?php echo $empresa['telefono_emp']; ?></font><br>
                        <!--<font size="1" face="Arial"><?php echo $empresa['ubicacion_emp']; ?></font>-->
                                <br>
                                <?php /*if($venta[0]['venta_tipodoc']==1){ $titulo1 = "FACTURA"; $subtitulo = "ORIGINAL"; }
                                     else {  $titulo1 = "NOTA"; $subtitulo = "ORIGINAL"; }*/ ?>

                            <font size="3" face="arial"><b>RECIBO</b></font> <br>
                            <font size="1" face="arial"><?php echo date("d/m/Y   H:i:s  ") ; ?></font>
                            <br>
                            <font size="3" face="arial"><b>Nº 00<?php echo $factura[0]['num_fact']; ?></b></font><br>
                            <font size="2" face="Arial">SERVICIOS</font><br>
                            <font size="1" face="Arial"><b>MES DE COBRANZA:</b> <?php echo $factura[0]['mes_lec']; ?>/<?php echo $factura[0]['gestion_lec']; ?></font><br>
                            <table style="width: <?php echo $ancho; ?>; font-family: Arial; font-size:10px;margin-top: 0px;">
                                <tr>
                                    <td>
                                        <font  size="1" face="arial"><b>&nbspLECT.ACTUAL[<?php echo date('d/m/Y',strtotime($factura[0]['fecha_lec']));?>]:</b> <?php echo $factura[0]['actual_lec']; ?><br>
                                <b>&nbspLECT.ANTERIOR[<?php echo date('d/m/Y',strtotime($factura[0]['fechaant_lec']));?>]:</b> <?php echo $factura[0]['anterior_lec']; ?><br>
                                <b>&nbspCONSUMO M3:</b> <?php echo $factura[0]['consumo_lec']; ?><br>
                                <b>&nbspVENCIMIENTO:</b> <?php echo date('d/m/Y',strtotime($factura[0]['fechavenc_fact']));?><br>
                                </font>
                                    </td>
                                </tr>
                            </table>
                            <br> 
                            <table style="width: <?php echo $ancho; ?>; font-family: Arial; font-size:10px;margin-top: 0px;">
                                <tr>
                                    <td><b>LUGAR Y FECHA: </b>
                                    <?php echo $empresa['ubicacion_emp']; ?>, <?php echo date('d/m/Y',strtotime($factura[0]['fecha_fact']));?>
                                    </td>
                                </tr>
                                <tr>    
                                    <td><b>CÓDIGO: </b>
                                    <?php echo $factura[0]['codigo_asoc'];?>
                                    &nbsp &nbsp &nbsp<b>CATEGORÍA: </b>
                                    <?php echo $factura[0]['categoria_asoc'];?>
                                    </td>
                                </tr>
                                <tr>    
                                    <td><b>SEÑOR(ES): </b>
                                    <?php echo $factura[0]['razon_fact'];?>
                                    </td>
                                </tr>
                                <tr>    
                                    <td><b>C.I.: </b>
                                    <?php echo $factura[0]['nit_fact'];?>
                                    </td>
                                </tr>
                                <tr>    
                                    <td><b>MEDIDOR: </b>
                                    <?php echo $factura[0]['medidor_asoc'];?>
                                    </td>
                                </tr>
                                <tr>    
                                    <td><b>DIRECCÍON: </b>
                                    <?php echo $factura[0]['direccion_asoc'];?>
                                    </td>
                                </tr>
                            </table>
                            <br>
                        </center>                      
                </td>
            </tr>

        </table>

       <table class="table table-striped table-condensed"  style="width: <?php echo $ancho; ?>;" >
           <tr  style="border-top-style: solid; border-top-width: 2px; border-bottom-style: solid; border-bottom-width: 2px;" >
               <td align="center" style="padding: 0"><b>CN</b></td>
                <td align="center" style="padding: 0"><b>DESCRIPCIÓN</b></td>
                <td align="center" style="padding: 0"><b>P.UNIT.</b></td>
                <td align="center" style="padding: 0"><b>TOTAL</b></td>
           </tr>
           <?php
          $total=0;
          foreach($detalle_factura as $d) {
          $total += $d['total_detfact']; ?>
          <tr>
              <td style="border: 1px solid black" align="center"><?php echo $d['cant_detfact']; ?></td>
              <td style="border: 1px solid black;padding-left: 3px"><?php echo $d['descip_detfact']; ?></td>
              <td style="border: 1px solid black;padding-right: 3px" align="right"><b><?php echo number_format($d['punit_detfact'], 2, ".", ","); ?></b></td>
              <td style="border: 1px solid black;padding-right: 3px" align="right"><b><?php echo number_format($d['total_detfact'], 2, ".", ","); ?></b></td>
          </tr>     
          <?php  } ?>
          <table style="width: <?php echo $ancho; ?>; padding: 0; font-family: Arial; font-size:12px;">
                    <tr>
                        <th style="text-align: left;" align="center">SON: <?php echo num_to_letras($total); ?></th>
                    </tr>
                    <tr>
                        <th>TOTAL A PAGAR:</th>
                    </tr>
                    <tr>
                        <th style="text-align: right;">Bs <?php echo number_format($total, 2, ".", ","); ?></th>
                    </tr>
          </table>
          <table  class="table table-striped table-condensed" style="width: <?php echo $ancho; ?>; font-family: Arial; font-size:10px;">
            <tr>
                <td> TRANS: <?php echo $factura[0]['id_fact']; ?> <BR>CAJERO: <?php echo $factura[0]['nombre_usu'];  ?> </td>
            </tr>
            <tr>
                <td> 
                    <center>

                        <?php echo "-----------------------------------------------"; ?><br>
                        <?php echo "RECIBI CONFORME"; ?><br>

                    </center>
                </td>
            </tr>
            <tr>
                <td style="width: 27%;">
                    <center>

                        <?php echo "-----------------------------------------------"; ?><br>
                        <?php echo "ENTREGUE CONFORME"; ?><br>   

                    </center>
                </td>
            </tr>  
        </table> 
    
</table>
  
</td>
</tr>
</table>
