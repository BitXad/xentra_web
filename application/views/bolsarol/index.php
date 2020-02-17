<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Bolsarol Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('bolsarol/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Estado Rol</th>
						<th>Id Rol</th>
						<th>Rol</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($bolsarol as $b){ ?>
                    <tr>
						<td><?php echo $b['estado_rol']; ?></td>
						<td><?php echo $b['id_rol']; ?></td>
						<td><?php echo $b['rol']; ?></td>
						<td>
                            <a href="<?php echo site_url('bolsarol/edit/'.$b['']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('bolsarol/remove/'.$b['']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
