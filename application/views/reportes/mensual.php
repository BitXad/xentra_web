<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">RESUMEN DE INGRESOS MENSUALES POR CONSUMO</h3>
            	<div class="box-tools">
                   
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
						<th rowspan="2">Nº</th>
						<th rowspan="2">Direccion</th>
                        <th rowspan="2">Detalle</th>
                        <th colspan="12">Mes</th>
                        <th rowspan="2">Total</th>
                    </tr>
                    <tr>
                        <?php foreach($meses as $mes){ 
                        ?>
                        <th><?php echo $mes['mes_lec']; ?></th>
                        <?php  } ?>
                    </tr>
                    <?php $cont = 1; foreach($direcciones as $d){ 
                        ?>
                    <tr>
						<td><?php echo $cont; ?></td>
                        <td><?php echo $d['direccion']; ?></td>
                        <td>Consumo M3<br>Consumo Bs.</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?php echo $d['consumo']; ?><br><?php echo $d['agua']; ?><br><?php echo $d['alcantarillado']; ?></td>
						
                    </tr>
                    <?php $cont++; } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
