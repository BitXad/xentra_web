 

<script type="text/javascript">
    $(document).ready(function()
    {
        window.onload = window.print();
                                            /*function imprimir()
                                            {
                                                /*$('#paraboucher').css('max-width','7cm !important');*/
                                                /* window.print(); 
                                            }*/
    });
</script>
<!----------------------------- script buscador --------------------------------------->
<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>

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
    line-height: 120%;  /*esta es la propiedad para el interlineado*/
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
td{
border:none!important;
}


td#comentario {
vertical-align : bottom;
border-spacing : 0;
}
div#content {
background : #ddd;
font-size : 7px;
margin : 0 0 0 0;
padding : 0 1px 0 1px;
border-left : 1px solid #aaa;
border-right : 1px solid #aaa;
border-bottom : 1px solid #aaa;
}
</style>
<!----------------------------- fin script buscador --------------------------------------->
<!------------------ ESTILO DE LAS TABLAS ----------------->
<!--<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">-->

<!-------------------------------------------------------->


<table class="table" style="width: 7cm; margin-bottom: 0px;" >
    <tr>
        <td>
                
            <center>
                               
                    <!--<img src="<?php echo base_url('resources/images/').$empresa[0]['empresa_imagen']; ?>" width="100" height="60"><br>-->
                    <font size="3" face="Arial"><b><?php echo $empresa[0]['empresa_nombre']; ?></b></font><br>
                    <!--<font size="2" face="Arial"><b><?php echo $empresa[0]['empresa_eslogan']; ?></b></font><br>-->
                    <font size="1" face="Arial"><b><?php echo "De: ".$empresa[0]['empresa_propietario']; ?></b></font><br>
                    
                    <font size="1" face="Arial"><?php echo $empresa[0]['empresa_direccion']; ?><br>
                    <font size="1" face="Arial"><?php echo $empresa[0]['empresa_telefono']; ?></font><br>
                    <font size="1" face="Arial"><?php echo $empresa[0]['empresa_ubicacion']; ?></font>
                
                    <br>
                   

                <font size="3" face="arial"><b>EGRESO</b></font> <br>
                <font size="1" face="arial"><b>NUMERO:  00<?php echo $egreso[0]['egreso_id']; ?> </b></font> <br>            
                             
                _______________________________________________
                <br> 
                <?php $fecha = new DateTime($egreso[0]['fechahora_egr']); 
                        $fecha_d_m_a = $fecha->format('d/m/Y');
                  ?>    
                    <b>LUGAR Y FECHA: </b><?php echo $empresa[0]['empresa_departamento'].", ".$fecha_d_m_a; ?> <br>
                    
                    <b>SE ENTREGO A: </b><?php echo $egreso[0]['nombre_egr'].""; ?>
                <br>_______________________________________________

            </center>                      
     </td>
 </tr>
     
</table>

       <table class="table"  style="width: 7cm; margin: 0; padding: 0;" >
           <tr>
               <td align="left" ><b>LA SUMA DE: </b></td>
               <td align="right"><?php echo number_format($egreso[0]['monto_egr'],2,'.',','); ?></td>
               
                               
           </tr>
           
           <tr>
               <td align="left"><b>POR CONCEPTO DE: </b></td>
               <td><?php echo $egreso[0]['detalle_egr'];?><br>
                             (<?php echo $egreso[0]['descripcion_egr'];?>)</td>
                
               
           </tr>
               
       </table>
        <center  style="width: 7cm; padding-left: 8px;">
         <font size="1" face="arial"> _______________________________________________ </font>
        </center>  
<table class="table" style="max-width: 7cm;">
    <tr>
        
        <td align="right">
            
            
            <font size="2">
            <b>
                <?php echo "TOTAL FINAL Bs: ".number_format($egreso[0]['monto_egr'] ,2,'.',','); ?><br>
            </b>
            </font>
            <font size="1" face="arial narrow">
                <?php echo "SON: ".num_to_letras($egreso[0]['monto_egr'],' Bolivianos'); ?>           
            </font>
           
            
        </td>          
    </tr>
    <tr>
        <td nowrap>
           
            </font>
        </td>           
    </tr>
     
    <tr >
          <td>
             No. TRANSACCION:  <b> 00<?php echo $egreso[0]['numrec_egr']; ?> </b><br>
                    
               USUARIO: <b><?php echo $egreso[0]['usuario_nombre']; ?></b>
            
         </td>
    </tr>    
    
</table>
<table class="table" style="max-width: 7cm;">
            <tr>
                <td> <center>
                
                        <?php echo "------------------------------------"; ?><br>
                        <?php echo "RECIBI CONFORME"; ?><br>
                    
                    </center>
                </td>
                <td width="20">
                    <?php echo "     "; ?><br>
                    <?php echo "     "; ?><br>
                </td>
                <td>
                    <center>

                        <?php echo "------------------------------------"; ?><br>
                        <?php echo "ENTREGUE CONFORME"; ?><br>   

                    </center>
                </td>
            </tr>
        </table>