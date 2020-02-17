<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Parametros Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('parametro/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Param</th>
						<th>Estado</th>
						<th>Descip Param</th>
						<th>Dias Param</th>
						<th>Monto Param</th>
						<th>Detalle Param</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($parametros as $p){ ?>
                    <tr>
						<td><?php echo $p['id_param']; ?></td>
						<td><?php echo $p['estado']; ?></td>
						<td><?php echo $p['descip_param']; ?></td>
						<td><?php echo $p['dias_param']; ?></td>
						<td><?php echo $p['monto_param']; ?></td>
						<td><?php echo $p['detalle_param']; ?></td>
						<td>
                            <a href="<?php echo site_url('parametro/edit/'.$p['id_param']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('parametro/remove/'.$p['id_param']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
