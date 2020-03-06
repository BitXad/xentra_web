<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function()
    {
        window.onload = window.print();
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

td {
border:hidden;
}
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
<?php //$tipo_factura = $parametro[0]["parametro_altofactura"]; //15 tamaño carta 
      //$ancho = $parametro[0]["parametro_anchofactura"]."cm";
      $ancho = "5.0"."cm";
      //$margen_izquierdo = "col-xs-".$parametro[0]["parametro_margenfactura"];;
?>


<table class="table" style="width: <?php echo $ancho; ?>;" >
    <tr>
        <td style="padding:0;" colspan="2">        
            <center>
                               
                    <!--<img src="<?php //echo base_url('resources/images/').$empresa[0]['empresa_imagen']; ?>" width="100" height="60"><br>-->
                    <font size="2" face="Arial"><b><?php echo $empresa['nombre_emp']; ?></b></font><br>
                    <!--<font size="2" face="Arial"><b><?php /*echo $empresa[0]['empresa_eslogan']; ?></b></font><br>-->
                    <!--<font size="1" face="Arial"><b><?php echo "De: ".$empresa[0]['empresa_propietario']; ?></b></font><br>-->
                    <!--<font size="1" face="Arial"><?php echo $factura[0]['factura_sucursal'];*/ ?><br>-->
                    <font size="1" face="Arial"><?php echo $empresa['direccion_emp']; ?><br>
                    <font size="1" face="Arial"><?php echo $empresa['telefono_emp']; ?></font><br>
                    <!--<font size="1" face="Arial"><?php echo $empresa['ubicacion_emp']; ?></font>-->
                

                <font size="3" face="arial"><b>AVISO DE COBRANZA</b></font> <br>
                <font size="3" face="arial"><b>Nº 00<?php echo $lectura[0]['id_lec']; ?></b></font> <br>
                
                <?php $fecha = new DateTime($lectura[0]['fecha_lec']); 
                        $fecha_d_m_a = $fecha->format('d/m/Y');
                  ?>    
            </center>                      
                    <b>FECHA: </b><?php echo $fecha_d_m_a; ?> <br>
                    <b>CODIGO: </b><?php echo $lectura[0]['codigo_asoc']." ".$lectura[0]['nit_asoc']; ?> <br>
                    <b>SEÑOR(ES): </b><?php echo $lectura[0]['razon_asoc'].""; ?><br>
                    <b>SERVICIO(S): </b><?php echo $lectura[0]['servicios_asoc'].""; ?><br>
                    <b>CATEGORIA: </b><?php echo $lectura[0]['categoria_asoc'].""; ?><br>
                    <b>MES: </b><?php echo $lectura[0]['mes_lec']."/".$lectura[0]['gestion_lec']; ?>
        </td>
    </tr>
    
    <tr style="font-family: Arial; font-size: 10; border-bottom-style: solid; border-top-style: solid; border-color: #000" >
        <td colspan="2">
            <?php 
                $fecha = new DateTime($lectura[0]['fechaant_lec']); 
                $fecha_d_m_a2 = $fecha->format('d/m/Y');
                
                $fecha = new DateTime($lectura[0]['fechavenc_fact']); 
                $fecha_d_m_a3 = $fecha->format('d/m/Y');
              ?> 
            <b>LECT. ACTUAL [<?php echo $fecha_d_m_a; ?> ]: </b><?php echo $lectura[0]['actual_lec']; ?> mt<sup>3</sup> <br>
            <b>LECT. ANTERIOR [<?php echo $fecha_d_m_a2; ?> ]: </b><?php echo $lectura[0]['anterior_lec']; ?> mt<sup>3</sup> <br>
            <b>CONSUMO : </b><?php echo $lectura[0]['consumo_lec']; ?> mt<sup>3</sup> <br>
            
            <b>FECHA VENCIMIENTO : </b><?php echo $fecha_d_m_a3; ?><br>

        </td>
    </tr>
    
           <?php $cont = 0;
                 $cantidad = 0;
                 $total_descuento = 0;
                 $total_final = 0;

    foreach($lectura as$l){?>
    <tr>
        <td align="left" style="padding: 0;"><?php echo $l["descip_detfact"]; ?></td>
        <td align="right" style="padding: 0;"><?php echo number_format($l["total_detfact"],2,".",","); ?></td>
    </tr>
    <?php  } ?>
    
    <tr style="border-top-style: solid; border-color: #000; border-bottom-style: solid; ">
        
        <td align="left" style="padding: 0;"><b style="font-size: 12pt;">TOTAL Bs</b></td>
        <td align="right" style="padding: 0;"><b style="font-size: 12pt;"><?php echo number_format($l["montototal_fact"],2,".",","); ?></b></td>
    
    </tr>
</table>
