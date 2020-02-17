<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Ingreso Egresox Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('ingreso_egresox/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Ing</th>
						<th>Id Usu</th>
						<th>Detalle Ing</th>
						<th>Nombre Ing</th>
						<th>Fechahora Ing</th>
						<th>Monto Ing</th>
						<th>Descripcion Ing</th>
						<th>Estado Ing</th>
						<th>Tipo Ing</th>
						<th>Numrec Ing</th>
						<th>Numrec Egr</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($ingreso_egresox as $i){ ?>
                    <tr>
						<td><?php echo $i['id_ing']; ?></td>
						<td><?php echo $i['id_usu']; ?></td>
						<td><?php echo $i['detalle_ing']; ?></td>
						<td><?php echo $i['nombre_ing']; ?></td>
						<td><?php echo $i['fechahora_ing']; ?></td>
						<td><?php echo $i['monto_ing']; ?></td>
						<td><?php echo $i['descripcion_ing']; ?></td>
						<td><?php echo $i['estado_ing']; ?></td>
						<td><?php echo $i['tipo_ing']; ?></td>
						<td><?php echo $i['numrec_ing']; ?></td>
						<td><?php echo $i['numrec_egr']; ?></td>
						<td>
                            <a href="<?php echo site_url('ingreso_egresox/edit/'.$i['id_ing']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('ingreso_egresox/remove/'.$i['id_ing']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
