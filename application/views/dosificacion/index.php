<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Dosificacion Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('dosificacion/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Dosif</th>
						<th>Estado Dosif</th>
						<th>Numorden Dosif</th>
						<th>Llave Dosif</th>
						<th>Fechalim Dosif</th>
						<th>Fechahora Dosif</th>
						<th>Numfact Dosif</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($dosificacion as $d){ ?>
                    <tr>
						<td><?php echo $d['id_dosif']; ?></td>
						<td><?php echo $d['estado_dosif']; ?></td>
						<td><?php echo $d['numorden_dosif']; ?></td>
						<td><?php echo $d['llave_dosif']; ?></td>
						<td><?php echo $d['fechalim_dosif']; ?></td>
						<td><?php echo $d['fechahora_dosif']; ?></td>
						<td><?php echo $d['numfact_dosif']; ?></td>
						<td>
                            <a href="<?php echo site_url('dosificacion/edit/'.$d['id_dosif']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('dosificacion/remove/'.$d['id_dosif']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
