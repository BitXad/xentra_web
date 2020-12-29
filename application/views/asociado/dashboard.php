<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/dashboard_asociado.js'); ?>" type="text/javascript"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<input type="hidden" name="asociado_id" id="asociado_id" value="<?php echo $asociado['id_asoc']; ?>" />
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<div class="row">
<div class="container-wrapper">
    <div class="col-md-12">
        <div class="col-md-2">
            <label for="gestion" class="control-label">Gestión</label>
            <div class="form-group">
                <select name="gestion_lec" id="gestion_lec" class="form-control" onchange="graficar()">
                    <?php 
                    foreach($all_gestion as $gestion)
                    {
                        $selected = ($gestion['gestion_lec'] == $estagestion) ? ' selected="selected"' : "";
                        echo '<option value="'.$gestion['gestion_lec'].'" '.$selected.'>'.$gestion['gestion_lec'].'</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12" id="grafica" ></div>
<div class="col-md-6 table-responsive">
    <table class="table table-striped" id="mitabla">
	<tr>
            <th colspan="5">FACTURAS PENDIENTES</th>
	</tr>
	<tr>
            <th>N°</th>
            <th>Vencimiento</th>
            <th>Mes Consumo</th>
            <th>Consumo</th>
            <th>Total</th>
        </tr>
        <?php $cont=0; $tp=0; foreach($pendientes as $f){ 
            $cont=$cont+1; 
            $tp+=$f['montototal_fact']; ?>
        <tr>
            <td align="center"><?php echo $cont; ?></td>
            <td align="center"><?php echo date('d/m/Y', strtotime($f['fechavenc_fact'])) ?></td>
            <td align="center"><?php echo $f['mes_lec']; ?></td>
            <td align="right"><?php echo $f['totalconsumo_fact']; ?></td>
            <td align="right"><?php echo $f['montototal_fact']; ?></td>
        </tr>
        <?php } ?>
        <tr>
            <th>TOTAL BS.</th>
            <th></th>
            <th></th>
            <th></th>
            <th><?php echo $tp; ?></th>
        </tr>
    </table>
</div>
<div class="col-md-6 table-responsive">
    <table class="table table-striped" id="mitabla">
	<tr>
            <th colspan="5">FACTURAS CANCELADAS</th>
	</tr>
	<tr>
            <th>N°</th>
            <th>Fecha</th>
            <th>Mes Consumo</th>
            <th>Consumo</th>
            <th>Total</th>
        </tr>
        <?php $contc=0; $tc=0; foreach($canceladas as $f){ 
            $contc=$contc+1; 
            $tc+=$f['montototal_fact']; ?>
        <tr>
            <td align="center"><?php echo $contc; ?></td>
            <td align="center"><?php echo date('d/m/Y', strtotime($f['fecha_fact'])) ?></td>
            <td align="center"><?php echo $f['mes_lec']; ?></td>
            <td align="right"><?php echo $f['totalconsumo_fact']; ?></td>
            <td align="right"><?php echo $f['montototal_fact']; ?></td>
        </tr>
        <?php } ?>
        <tr>
            <th>TOTAL BS.</th>
            <th></th>
            <th></th>
            <th></th>
            <th><?php echo $tc; ?></th>
        </tr>
    </table>
</div>
</div>