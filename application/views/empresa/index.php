<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Empresa Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('empresa/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Emp</th>
						<th>Nombre Emp</th>
						<th>Eslogan Emp</th>
						<th>Direccion Emp</th>
						<th>Telefono Emp</th>
						<th>Sucursal Emp</th>
						<th>Ubicacion Emp</th>
						<th>Actividad Emp</th>
						<th>Nit Emp</th>
						<th>Logo Emp</th>
						<th>Zona Emp</th>
						<th>Sis Emp</th>
						<th>Anuncio Emp</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($empresa as $e){ ?>
                    <tr>
						<td><?php echo $e['id_emp']; ?></td>
						<td><?php echo $e['nombre_emp']; ?></td>
						<td><?php echo $e['eslogan_emp']; ?></td>
						<td><?php echo $e['direccion_emp']; ?></td>
						<td><?php echo $e['telefono_emp']; ?></td>
						<td><?php echo $e['sucursal_emp']; ?></td>
						<td><?php echo $e['ubicacion_emp']; ?></td>
						<td><?php echo $e['actividad_emp']; ?></td>
						<td><?php echo $e['nit_emp']; ?></td>
						<td><?php echo $e['logo_emp']; ?></td>
						<td><?php echo $e['zona_emp']; ?></td>
						<td><?php echo $e['sis_emp']; ?></td>
						<td><?php echo $e['anuncio_emp']; ?></td>
						<td>
                            <a href="<?php echo site_url('empresa/edit/'.$e['id_emp']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('empresa/remove/'.$e['id_emp']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
