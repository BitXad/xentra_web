<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Asociado Aux Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('asociado_aux/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Num</th>
						<th>Id Asoc</th>
						<th>Nombre Asoc</th>
						<th>Codigo</th>
						<th>Direccion</th>
						<th>Servicio</th>
						<th>Lectura Ant</th>
						<th>Lectura Act</th>
						<th>Consumo</th>
						<th>Fecha</th>
						<th>Hora</th>
						<th>Estado</th>
						<th>Gestion</th>
						<th>Mes</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($asociado_aux as $a){ ?>
                    <tr>
						<td><?php echo $a['num']; ?></td>
						<td><?php echo $a['id_asoc']; ?></td>
						<td><?php echo $a['nombre_asoc']; ?></td>
						<td><?php echo $a['codigo']; ?></td>
						<td><?php echo $a['direccion']; ?></td>
						<td><?php echo $a['servicio']; ?></td>
						<td><?php echo $a['lectura_ant']; ?></td>
						<td><?php echo $a['lectura_act']; ?></td>
						<td><?php echo $a['consumo']; ?></td>
						<td><?php echo $a['fecha']; ?></td>
						<td><?php echo $a['hora']; ?></td>
						<td><?php echo $a['estado']; ?></td>
						<td><?php echo $a['gestion']; ?></td>
						<td><?php echo $a['mes']; ?></td>
						<td>
                            <a href="<?php echo site_url('asociado_aux/edit/'.$a['num']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('asociado_aux/remove/'.$a['num']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
