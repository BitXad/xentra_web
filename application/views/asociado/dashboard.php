<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/dashboard_asociado.js'); ?>" type="text/javascript"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<input type="hidden" name="asociado_id" id="asociado_id" value="<?php echo $asociado['id_asoc']; ?>" />
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">

 <div class="container-wrapper"> <div class="col-md-12" id="grafica" ></div>

<div class="col-md-6 table-responsive">
<table class="table table-striped" id="mitabla">
	<tr>
		<th colspan="5">FACTURAS PENDIENTES</th>
	</tr>
	 <tr>
						<th >N°</th>
						<th >Vencimiento</th>
						<th>Consumo</th>
						<th>Total</th>
						<!--<th>Orden Fact</th>
						<th>Nitemisor Fact</th>
						<th>Llave Fact</th>
						<th>Fecha Fact</th>
						<th>Hora Fact</th>
						<th>Fechaemision Fact</th>
						<th>Montoparc Fact</th>
						<th>Desc Fact</th>
						<th>Cadenaqr Fact</th>
						<th>Codcontrol Fact</th>
						<th>Literal Fact</th>
						<th>Fechahora Fact</th>
						<th>Tipo Fact</th>
						<th>Fechavenc Fact</th>
						<th>Totalconsumo Fact</th>
						<th>Totalaportes Fact</th>
						<th>Totalrecargos Fact</th>
						<th>Montototal Fact</th>
						<th>Estado Fact</th>
						<th>Id Usu</th>
						<th>Exento Fact</th>
						<th>Ice Fact</th>
						<th>Id Ing</th>
						<th>Actions</th>-->
                    </tr>
                    <?php $cont=0; $tp=0; foreach($pendientes as $f){ 
                    	$cont=$cont+1; 
                    	$tp+=$f['montototal_fact']; ?>
                    <tr>
						<td align="center"><?php echo $cont; ?></td>
						<td align="center"><?php echo date('d/m/Y', strtotime($f['fechavenc_fact'])) ?></td>
						<td align="right"><?php echo $f['totalconsumo_fact']; ?></td>
						<td align="right"><?php echo $f['montototal_fact']; ?></td>
						<!--<td><?php echo $f['razon_fact']; ?></td>
						<td><?php echo $f['orden_fact']; ?></td>
						<td><?php echo $f['nitemisor_fact']; ?></td>
						<td><?php echo $f['llave_fact']; ?></td>
						<td><?php echo $f['fecha_fact']; ?></td>
						<td><?php echo $f['hora_fact']; ?></td>
						<td><?php echo $f['fechaemision_fact']; ?></td>
						<td><?php echo $f['montoparc_fact']; ?></td>
						<td><?php echo $f['desc_fact']; ?></td>
						<td><?php echo $f['cadenaqr_fact']; ?></td>
						<td><?php echo $f['codcontrol_fact']; ?></td>
						<td><?php echo $f['literal_fact']; ?></td>
						<td><?php echo $f['fechahora_fact']; ?></td>
						<td><?php echo $f['tipo_fact']; ?></td>
						<td><?php echo $f['fechavenc_fact']; ?></td>
						<td><?php echo $f['totalconsumo_fact']; ?></td>
						<td><?php echo $f['totalaportes_fact']; ?></td>
						<td><?php echo $f['totalrecargos_fact']; ?></td>
						<td><?php echo $f['montototal_fact']; ?></td>
						<td><?php echo $f['estado_fact']; ?></td>
						<td><?php echo $f['id_usu']; ?></td>
						<td><?php echo $f['exento_fact']; ?></td>
						<td><?php echo $f['ice_fact']; ?></td>
						<td><?php echo $f['id_ing']; ?></td>-->
					</tr>
				<?php } ?>
				<tr>
					<th>TOTAL BS.</th>
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
						<th>Consumo</th>
						<th>Total</th>
						<!--<th>Orden Fact</th>
						<th>Nitemisor Fact</th>
						<th>Llave Fact</th>
						<th>Fecha Fact</th>
						<th>Hora Fact</th>
						<th>Fechaemision Fact</th>
						<th>Montoparc Fact</th>
						<th>Desc Fact</th>
						<th>Cadenaqr Fact</th>
						<th>Codcontrol Fact</th>
						<th>Literal Fact</th>
						<th>Fechahora Fact</th>
						<th>Tipo Fact</th>
						<th>Fechavenc Fact</th>
						<th>Totalconsumo Fact</th>
						<th>Totalaportes Fact</th>
						<th>Totalrecargos Fact</th>
						<th>Montototal Fact</th>
						<th>Estado Fact</th>
						<th>Id Usu</th>
						<th>Exento Fact</th>
						<th>Ice Fact</th>
						<th>Id Ing</th>
						<th>Actions</th>-->
                    </tr>
                    <?php $contc=0; $tc=0; foreach($canceladas as $f){ 
                    	$contc=$contc+1; 
                    	$tc+=$f['montototal_fact']; ?>
                    <tr>
						<td align="center"><?php echo $contc; ?></td>
						<td align="center"><?php echo date('d/m/Y', strtotime($f['fecha_fact'])) ?></td>
						<td align="right"><?php echo $f['totalconsumo_fact']; ?></td>
						<td align="right"><?php echo $f['montototal_fact']; ?></td>
						<!--<td><?php echo $f['razon_fact']; ?></td>
						<td><?php echo $f['orden_fact']; ?></td>
						<td><?php echo $f['nitemisor_fact']; ?></td>
						<td><?php echo $f['llave_fact']; ?></td>
						<td><?php echo $f['fecha_fact']; ?></td>
						<td><?php echo $f['hora_fact']; ?></td>
						<td><?php echo $f['fechaemision_fact']; ?></td>
						<td><?php echo $f['montoparc_fact']; ?></td>
						<td><?php echo $f['desc_fact']; ?></td>
						<td><?php echo $f['cadenaqr_fact']; ?></td>
						<td><?php echo $f['codcontrol_fact']; ?></td>
						<td><?php echo $f['literal_fact']; ?></td>
						<td><?php echo $f['fechahora_fact']; ?></td>
						<td><?php echo $f['tipo_fact']; ?></td>
						<td><?php echo $f['fechavenc_fact']; ?></td>
						<td><?php echo $f['totalconsumo_fact']; ?></td>
						<td><?php echo $f['totalaportes_fact']; ?></td>
						<td><?php echo $f['totalrecargos_fact']; ?></td>
						<td><?php echo $f['montototal_fact']; ?></td>
						<td><?php echo $f['estado_fact']; ?></td>
						<td><?php echo $f['id_usu']; ?></td>
						<td><?php echo $f['exento_fact']; ?></td>
						<td><?php echo $f['ice_fact']; ?></td>
						<td><?php echo $f['id_ing']; ?></td>-->
					</tr>
				<?php } ?>
				<tr>
					<th>TOTAL BS.</th>
					<th></th>
					<th></th>
					<th><?php echo $tc; ?></th>
				</tr>
</table>
</div>
</div>