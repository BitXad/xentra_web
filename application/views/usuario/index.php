<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Usuario Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('usuario/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Usu</th>
						<th>Tipo Usuario</th>
						<th>Terminal Usu</th>
						<th>Estado Usu</th>
						<th>Nombre Usu</th>
						<th>Login Usu</th>
						<th>Clave Usu</th>
						<th>Imagen Usu</th>
						<th>Fechahora Usu</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($usuario as $u){ ?>
                    <tr>
						<td><?php echo $u['id_usu']; ?></td>
						<td><?php echo $u['tipo_usuario']; ?></td>
						<td><?php echo $u['terminal_usu']; ?></td>
						<td><?php echo $u['estado_usu']; ?></td>
						<td><?php echo $u['nombre_usu']; ?></td>
						<td><?php echo $u['login_usu']; ?></td>
						<td><?php echo $u['clave_usu']; ?></td>
						<td><?php echo $u['imagen_usu']; ?></td>
						<td><?php echo $u['fechahora_usu']; ?></td>
						<td>
                            <a href="<?php echo site_url('usuario/edit/'.$u['id_usu']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('usuario/remove/'.$u['id_usu']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
