<script type="text/javascript">
    $(document).ready(function()
    {
        window.onload = window.print();
    });
</script>
<!----------------------------- script buscador --------------------------------------->
<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo site_url('resources/js/jquery-2.2.3.min.js');?>"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="<?php echo site_url('resources/js/bootstrap.min.js');?>"></script>
        <!-- FastClick -->
        <script src="<?php echo site_url('resources/js/fastclick.js');?>"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo site_url('resources/js/app.min.js');?>"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo site_url('resources/js/demo.js');?>"></script>
        <!-- DatePicker -->
        <script src="<?php echo site_url('resources/js/moment.js');?>"></script>
        <script src="<?php echo site_url('resources/js/bootstrap-datetimepicker.min.js');?>"></script>
        <script src="<?php echo site_url('resources/js/global.js');?>"></script>
        
        <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap.min.css');?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/font-awesome.min.css');?>">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Datetimepicker -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap-datetimepicker.min.css');?>">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/AdminLTE.min.css');?>">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/_all-skins.min.css');?>">        

        
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
      $ancho = "5.5"."cm";
      //$margen_izquierdo = "col-xs-".$parametro[0]["parametro_margenfactura"];;
?>


<table class="table" style="width: <?php echo $ancho; ?>;" >
    <tr>
        <td style="padding:0;">        
            <center>
                               
                    <!--<img src="<?php //echo base_url('resources/images/').$empresa[0]['empresa_imagen']; ?>" width="100" height="60"><br>-->
                    <font size="3" face="Arial"><b><?php echo $empresa['nombre_emp']; ?></b></font><br>
                    <!--<font size="2" face="Arial"><b><?php /*echo $empresa[0]['empresa_eslogan']; ?></b></font><br>-->
                    <!--<font size="1" face="Arial"><b><?php echo "De: ".$empresa[0]['empresa_propietario']; ?></b></font><br>-->
                    <!--<font size="1" face="Arial"><?php echo $factura[0]['factura_sucursal'];*/ ?><br>-->
                    <font size="1" face="Arial"><?php echo $empresa['direccion_emp']; ?><br>
                    <font size="1" face="Arial"><?php echo $empresa['telefono_emp']; ?></font><br>
                    <font size="1" face="Arial"><?php echo $empresa['ubicacion_emp']; ?></font>
                
                    <br>
                    <?php /*if($venta[0]['venta_tipodoc']==1){ $titulo1 = "FACTURA"; $subtitulo = "ORIGINAL"; }
                         else {  $titulo1 = "NOTA"; $subtitulo = "ORIGINAL"; }*/
                         $titulo1 = "NOTA"; $subtitulo = "ORIGINAL"; 
                         ?>

                <font size="3" face="arial"><b>PREAVISO</b></font> <br>
                <font size="1" face="arial"><b>Nº 00<?php echo $lectura['id_lec']; ?></b></font> <br>
                <br> 
                <?php $fecha = new DateTime($lectura['fecha_lec']); 
                        $fecha_d_m_a = $fecha->format('d/m/Y');
                  ?>    
                    <b>FECHA: </b><?php echo $fecha_d_m_a; ?> <br>
                    <b>CODIGO: </b><?php echo $lectura['codigo_asoc']." ".$lectura['nit_asoc']; ?> <br>
                    <b>SEÑOR(ES): </b><?php echo $lectura['razon_asoc'].""; ?>
                <br>
            </center>                      
        </td>
    </tr>
     
</table>

       <table class="table table-striped table-condensed"  style="width: <?php echo $ancho; ?>;" >
           <tr  style="border-top-style: solid; border-top-width: 2px; border-bottom-style: solid; border-bottom-width: 2px;" >
               <td align="center"><b>#</b></td>
                <td align="center"><b>DETALLE</b></td>
                <td align="center"><b>MONTO</b></td>
           </tr>
           <?php $cont = 0;
                 $cantidad = 0;
                 $total_descuento = 0;
                 $total_final = 0;

                 ?>
            <tr>
                <td align="center" style="padding: 0;">1</td>
                <td align="center" style="padding: 0;">Consumo agua</td>
                <td align="center" style="padding: 0;"><?php $lectura['consumo_lec']; ?></td>
            </tr>
            <tr>
                <td align="center" style="padding: 0;">1</td>
                <td align="center" style="padding: 0;">Aportes</td>
                <td align="center" style="padding: 0;"><?php $lectura['id_usu']; ?></td>
            </tr>
            <tr>
                <td align="center" style="padding: 0;">1</td>
                <td align="center" style="padding: 0;">Multas</td>
                <td align="center" style="padding: 0;"><?php $lectura['totalmultas_']; ?></td>
            </tr>
           <?php // } ?>
<!--       </table>
<table class="table" style="max-width: 7cm;">-->
    <tr style="border-top-style: solid; border-top-width: 2px; border-top-style: solid; border-top-width: 2px;" colspan="4" align="right">
        
        <td colspan="4" style="padding: 0;"  >
            
            <font size="1">
                <b><?php echo "SUB TOTAL Bs ".number_format($lectura['venta_subtotal'],2,'.',','); ?></b><br>
            </font>
            

            <font size="1">
                <?php echo "TOTAL DESCUENTO Bs ".number_format($venta[0]['venta_descuento'],2,'.',','); ?><br>
            </font>
            <font size="2">
            <b>
                <?php echo "TOTAL FINAL Bs: ".number_format($venta[0]['venta_total'] ,2,'.',','); ?><br>
            </b>
            </font>
            <font size="1" face="arial narrow">
                <?php echo "SON: ".num_to_letras($total_final,' Bolivianos'); ?><br>            
            </font>
            <font size="1">
                <?php echo "EFECTIVO Bs ".number_format($venta[0]['venta_efectivo'],2,'.',','); ?><br>
                <?php echo "CAMBIO Bs ".number_format($venta[0]['venta_cambio'],2,'.',','); ?>            
            </font>
            
            <?php if($venta[0]['tipotrans_id']==2){ ?>
            <font size="1">
                <br>CUOTA INIC. Bs: <b><?php echo number_format($venta[0]['credito_cuotainicial'],2,'.',','); ?></b>
                <br>SALDO Bs: <b><?php echo number_format($venta[0]['venta_total']-$venta[0]['credito_cuotainicial'],2,'.',','); ?></b><br>
            </font>
            <?php } ?>
            
        </td>          
    </tr>

    <tr >
        <td colspan="4" style="padding:0;">
               USUARIO: <b><?php echo $venta[0]['usuario_nombre']; ?></b>
               COD.: <b><?php echo $venta[0]['venta_id']; ?></b><br>
               TRANS.: <b><?php echo $venta[0]['tipotrans_nombre']; ?></b>
            <center>
            <font size="2">
                   
            </font>
                    <?php echo "GRACIAS POR SU PREFERENCIA...!!!"; ?>  
            </center>
         </td>
    </tr>    
    
</table>
  