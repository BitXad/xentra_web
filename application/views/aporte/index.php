<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Aporte Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('aporte/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Ap</th>
						<th>Mes Ap</th>
						<th>Gestion Ap</th>
						<th>Tipo Ap</th>
						<th>Estado Ap</th>
						<th>Id Usu</th>
						<th>Exento Ap</th>
						<th>Ice Ap</th>
						<th>Motivo Ap</th>
						<th>Detalle Ap</th>
						<th>Monto Ap</th>
						<th>Fechahora Ap</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($aporte as $a){ ?>
                    <tr>
						<td><?php echo $a['id_ap']; ?></td>
						<td><?php echo $a['mes_ap']; ?></td>
						<td><?php echo $a['gestion_ap']; ?></td>
						<td><?php echo $a['tipo_ap']; ?></td>
						<td><?php echo $a['estado_ap']; ?></td>
						<td><?php echo $a['id_usu']; ?></td>
						<td><?php echo $a['exento_ap']; ?></td>
						<td><?php echo $a['ice_ap']; ?></td>
						<td><?php echo $a['motivo_ap']; ?></td>
						<td><?php echo $a['detalle_ap']; ?></td>
						<td><?php echo $a['monto_ap']; ?></td>
						<td><?php echo $a['fechahora_ap']; ?></td>
						<td>
                            <a href="<?php echo site_url('aporte/edit/'.$a['id_ap']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('aporte/remove/'.$a['id_ap']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
