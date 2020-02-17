<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Bitacora Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('bitacora/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Bit</th>
						<th>Fecha</th>
						<th>Hora</th>
						<th>Ope</th>
						<th>Usuario</th>
						<th>Sentenc</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($bitacora as $b){ ?>
                    <tr>
						<td><?php echo $b['id_bit']; ?></td>
						<td><?php echo $b['fecha']; ?></td>
						<td><?php echo $b['hora']; ?></td>
						<td><?php echo $b['ope']; ?></td>
						<td><?php echo $b['usuario']; ?></td>
						<td><?php echo $b['sentenc']; ?></td>
						<td>
                            <a href="<?php echo site_url('bitacora/edit/'.$b['id_bit']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('bitacora/remove/'.$b['id_bit']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
