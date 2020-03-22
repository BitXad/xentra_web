<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Aportes</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('aporte/add'); ?>" class="btn btn-success btn-sm">Registrar</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
						<th>Id</th>
						<th>Mes</th>
						<th>Gestion</th>
						<th>Tipo</th>
						<!--<th>Exento Ap</th>
						<th>Ice Ap</th>-->
						<th>Motivo</th>
						<th>Detalle</th>
						<th>Monto</th>
						<th>Fecha Hora</th>
						<th>Estado</th>
						<th>Usuario</th>
						<th></th>
                    </tr>
                    <?php foreach($aporte as $a){ ?>
                    <tr>
						<td><?php echo $a['id_ap']; ?></td>
						<td><?php echo $a['mes_ap']; ?></td>
						<td><?php echo $a['gestion_ap']; ?></td>
						<td><?php echo $a['tipo_ap']; ?></td>
						<!--<td><?php echo $a['exento_ap']; ?></td>
						<td><?php echo $a['ice_ap']; ?></td>-->
						<td><?php echo $a['motivo_ap']; ?></td>
						<td><?php echo $a['detalle_ap']; ?></td>
						<td><?php echo number_format($a['monto_ap'], 2, ".", ","); ?></td>
						<td><?php echo date('d/m/Y H:i:s',strtotime($a['fechahora_ap']));?></td>
						<td><?php echo $a['estado_ap']; ?></td>
						<td><?php echo $a['nombre_usu']; ?></td>
						<td>
                            <a href="<?php echo site_url('aporte/edit/'.$a['id_ap']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a> 
                            <a href="<?php echo site_url('aporte/remove/'.$a['id_ap']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
