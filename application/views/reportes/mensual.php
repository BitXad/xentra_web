<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/reporte_mesanual.js'); ?>" type="text/javascript"></script>
<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<input type="hidden" name="meses" id="meses" value='<?php echo json_encode($losmeses); ?>' />
<input type="hidden" name="gestion" id="gestion" value="<?php echo $gestion; ?>" />
<div class="box-header">
    <h3 class="box-title">RESUMEN DE INGRESOS MENSUALES POR CONSUMO</h3>
    <div class="box-tools">
    </div>
</div>
<div class="row" id='loader'  style='display:none; text-align: center; width: 100%'>
    <img src="<?php echo base_url("resources/images/loader.gif"); ?>"  >
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
                        <th rowspan="2">Nº</th>
                        <th rowspan="2">Dirección</th>
                        <th rowspan="2">Num. Usuarios</th>
                        <th rowspan="2">Detalle</th>
                        <th colspan="12">Mes</th>
                        <th rowspan="2">Total</th>
                    </tr>
                    <tr>
                        <?php foreach($losmeses as $mes){
                        ?>
                        <th><?php echo $mes['mes_lec']; ?></th>
                        <?php  } ?>
                    </tr>
                    <tbody id="resdirecciones">
                    <?php /*$cont = 1; foreach($direcciones as $d){
                        ?>
                    <tr>
                        <td><?php echo $cont; ?></td>
                        <td><?php echo $d['nombre_dir']; ?></td>
                        <td><?php echo $d['numero_asoc']; ?></td>
                        <td>Consumo M3</td>
                        <?php foreach($meses as $mes){
                        ?>
                        <td><?php echo $mes['mes_lec']; ?></td>
                        <?php  } ?>
                        <td><?php echo $d['id_dir']; ?></td>
						
                    </tr>
                    <?php $cont++; }]*/ ?>
                    </tbody>
                </table>
                                
            </div>
        </div>
    </div>
</div>
