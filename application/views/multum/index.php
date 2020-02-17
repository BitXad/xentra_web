<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Multa Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('multum/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Multa</th>
						<th>Mes Multa</th>
						<th>Gestion Multa</th>
						<th>Tipo Multa</th>
						<th>Id Asoc</th>
						<th>Estado Multa</th>
						<th>Id Usu</th>
						<th>Motivo Multa</th>
						<th>Detalle Multa</th>
						<th>Monto Multa</th>
						<th>Fechahora Multa</th>
						<th>Nombre Asoc</th>
						<th>Exento Multa</th>
						<th>Ice Multa</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($multa as $m){ ?>
                    <tr>
						<td><?php echo $m['id_multa']; ?></td>
						<td><?php echo $m['mes_multa']; ?></td>
						<td><?php echo $m['gestion_multa']; ?></td>
						<td><?php echo $m['tipo_multa']; ?></td>
						<td><?php echo $m['id_asoc']; ?></td>
						<td><?php echo $m['estado_multa']; ?></td>
						<td><?php echo $m['id_usu']; ?></td>
						<td><?php echo $m['motivo_multa']; ?></td>
						<td><?php echo $m['detalle_multa']; ?></td>
						<td><?php echo $m['monto_multa']; ?></td>
						<td><?php echo $m['fechahora_multa']; ?></td>
						<td><?php echo $m['nombre_asoc']; ?></td>
						<td><?php echo $m['exento_multa']; ?></td>
						<td><?php echo $m['ice_multa']; ?></td>
						<td>
                            <a href="<?php echo site_url('multum/edit/'.$m['id_multa']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('multum/remove/'.$m['id_multa']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
