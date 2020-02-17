<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lectura Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('lectura/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Lec</th>
						<th>Id Usu</th>
						<th>Id Asoc</th>
						<th>Mes Lec</th>
						<th>Gestion Lec</th>
						<th>Anterior Lec</th>
						<th>Actual Lec</th>
						<th>Fechaant Lec</th>
						<th>Consumo Lec</th>
						<th>Fecha Lec</th>
						<th>Hora Lec</th>
						<th>Totalcons Lec</th>
						<th>Fechahora Lec</th>
						<th>Monto Lec</th>
						<th>Estado Lec</th>
						<th>Tipo Asoc</th>
						<th>Servicios Asoc</th>
						<th>Totalmultas </th>
						<th>Cantfact Lec</th>
						<th>Montofact Lec</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($lectura as $l){ ?>
                    <tr>
						<td><?php echo $l['id_lec']; ?></td>
						<td><?php echo $l['id_usu']; ?></td>
						<td><?php echo $l['id_asoc']; ?></td>
						<td><?php echo $l['mes_lec']; ?></td>
						<td><?php echo $l['gestion_lec']; ?></td>
						<td><?php echo $l['anterior_lec']; ?></td>
						<td><?php echo $l['actual_lec']; ?></td>
						<td><?php echo $l['fechaant_lec']; ?></td>
						<td><?php echo $l['consumo_lec']; ?></td>
						<td><?php echo $l['fecha_lec']; ?></td>
						<td><?php echo $l['hora_lec']; ?></td>
						<td><?php echo $l['totalcons_lec']; ?></td>
						<td><?php echo $l['fechahora_lec']; ?></td>
						<td><?php echo $l['monto_lec']; ?></td>
						<td><?php echo $l['estado_lec']; ?></td>
						<td><?php echo $l['tipo_asoc']; ?></td>
						<td><?php echo $l['servicios_asoc']; ?></td>
						<td><?php echo $l['totalmultas_']; ?></td>
						<td><?php echo $l['cantfact_lec']; ?></td>
						<td><?php echo $l['montofact_lec']; ?></td>
						<td>
                            <a href="<?php echo site_url('lectura/edit/'.$l['id_lec']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('lectura/remove/'.$l['id_lec']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
