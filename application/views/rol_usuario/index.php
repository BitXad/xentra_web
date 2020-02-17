<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Rol Usuario Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('rol_usuario/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Estado Rol</th>
						<th>Id Usu</th>
						<th>Id Rol</th>
						<th>Fecha</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($rol_usuario as $r){ ?>
                    <tr>
						<td><?php echo $r['estado_rol']; ?></td>
						<td><?php echo $r['id_usu']; ?></td>
						<td><?php echo $r['id_rol']; ?></td>
						<td><?php echo $r['fecha']; ?></td>
						<td>
                            <a href="<?php echo site_url('rol_usuario/edit/'.$r['']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('rol_usuario/remove/'.$r['']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
