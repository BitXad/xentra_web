<style> 
             
.lebo {
    border: 2px solid black; border-right: 0px; border-top: 0px; padding-left: 3px;
}

.todo {
    border: 2px solid black; padding:3px !important; margin: 3px !important; 
}

.vacio {
    border: 0px; padding-top:0.5cm; padding-left: 1cm; 
}
.linea { 
     width: 2cm; 
}
.linea hr{
      padding:0px; margin: 0px;
}
.box4 {
width:16cm;
margin:0% 0% 0% 0%;
margin-left: 5%;
padding-left:0px;
border:2px solid black;
border-top: 0px;
}
@media print {
  .todo {
    background-color: rgba(127,127,127,0.3) !important;
}
}

</style>
<?php $padding = "style='padding:0; '"; 
    $ancho = "16cm";
    $ancho2 = "17cm"; ?>
<div class="box">
<div class="row" style="padding-left: 5%;"> 
<!-------------------------------------------------------->
<table class="table" style="width: <?php echo $ancho; ?>; padding: 0;" >
    <tr>
        <td style="width: 40%; padding: 0; line-height:10px;" >
                
            <center>
                               
                    <img src="<?php echo base_url('resources/images/empresas/logo.jpg') ?>" width="80px" height="60px"><br>
                    <font size="2" face="Arial"><b><?php echo $empresa['nombre_emp']; ?></b></font><br>
                    <!--<font size="2" face="Arial"><b><?php echo $empresa['empresa_eslogan']; ?></b></font><br>-->
                    <!--<font size="1" face="Arial"><b><?php echo "De: ".$empresa['empresa_propietario']; ?></b></font><br>-->
                    <!--<font size="1" face="Arial"><?php echo $factura[0]['factura_sucursal'];?><br>-->
                    <font size="1" face="Arial"><?php echo $empresa['direccion_emp']; ?></font><br>
                    <font size="1" face="Arial"><?php echo $empresa['telefono_emp']; ?></font><br>
                    <!--<font size="1" face="Arial"><?php echo $empresa['empresa_ubicacion']; ?></font>-->
                

            </center>                      
        </td>
                   
        <td style="width: 40%; padding: 20;line-height:15px;" > 
            <center>
            
                <br>
                <font size="3" face="arial"><b>RECIBO DE EGRESO</b></font> <br>
                <font size="2" face="arial"><b>Nº: 00<?php echo $egresos[0]['id_egr']; ?></b></font> <br>
                <font size="1" face="arial"><?php echo date("d/m/Y   H:i:s  ") ; ?></font>
                 <br>
                
            </center>
        </td>
        <td style="width: 20%; padding: 0; text-align: left" >
      
        </td>
    </tr>
     
    
    
</table> 
</div> 
    
    <table style="margin-left: 3%;width: <?php echo $ancho2; ?>; font-family: Arial; font-size:10px;">
        <tr>
            <td class="lebo" style="width: 5cm"><b>Fecha y Hora: </b>
            <?php echo date('d/m/Y  H:i:s',strtotime($egresos[0]['fechahora_egr']));?>
            </td>
            <td class="vacio"></td>
            <td class="lebo" style="width: 12cm"><b>Apellidos y Nombre(s): </b>
            <?php echo$egresos[0]['nombre_egr'];?>
            </td>
        </tr>
    </table>
  
                            
<div class="box4">   
    <table style="margin-left:0; width: 95%; font-family: Arial; font-size:10px;"> 
            <tr>
                <td class="vacio"></td>
            </tr>
            <tr>
                <td class="linea"><hr style="border: 1px solid black"></td>                
                <td class="todo"><b>MONTO: </b>                         
                    <?php echo number_format($egresos[0]['monto_egr'],'2','.',',');?> Bs.</td>                      
            </tr>
            <tr>
                <td class="vacio"></td>
            </tr>
            <tr>
                <td class="linea"><hr style="border: 1px solid black"></td>
                <td class="todo"><b>CONCEPTO: </b>   
                    <?php echo$egresos[0]['detalle_egr'];?> (<?php echo$egresos[0]['descripcion_egr'];?>)</td>
            </tr>
            <tr>
                <td class="vacio"></td>
            </tr>
            <tr>
                <td class="linea"><hr style="border: 1px solid black"></td>
                <td class="todo"><b>SON: </b>   
                    <?php echo num_to_letras($egresos[0]['monto_egr']);?> </td>
            </tr>
            <tr>
                <td class="vacio"></td>
            </tr>
            <tr>
                <td class="linea"><hr style="border: 1px solid black"></td>    
                <td class="todo"><b>CAJERO(A): </b> 
                    <?php echo$egresos[0]['nombre_usu'];?></td>
            </tr>
            <tr>
                <td class="vacio"></td>
            </tr>
    </table>
</div>
<div class="box4">
<table  class="table table-striped table-condensed" style="width: 98%;margin: 1%; font-family: Arial; font-size:10px;">
    <tr style="border: 0"><br>
    </tr>
    
    <tr>
        <td> 
            <center>

                <?php echo "-----------------------------------------------------"; ?><br>
                <?php echo "RECIBI CONFORME"; ?><br>

            </center>
        </td>
        
        <td>
            <center>

                <?php echo "-----------------------------------------------------"; ?><br>
                <?php echo "ENTREGUE CONFORME"; ?><br>   

            </center>
        </td>
    </tr>   
</table>
</div>
<div class="row" style="padding-left: 7%;padding-top: 0.5%">
     <font size="1" face="Arial"><b>Nº Trans.:</b> 00<?php echo $egresos[0]['id_egr']; ?></font>              
</div>
</div>
