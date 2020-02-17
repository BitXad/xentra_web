<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Medidor Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('medidor/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Med</th>
						<th>Id Asoc</th>
						<th>Estado</th>
						<th>Id Multa</th>
						<th>Id Tarifa</th>
						<th>Id Ap</th>
						<th>Zona Med</th>
						<th>Codigo Med</th>
						<th>Marca Med</th>
						<th>Modelo Med</th>
						<th>Direccion Med</th>
						<th>Categoria Med</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($medidor as $m){ ?>
                    <tr>
						<td><?php echo $m['id_med']; ?></td>
						<td><?php echo $m['id_asoc']; ?></td>
						<td><?php echo $m['estado']; ?></td>
						<td><?php echo $m['id_multa']; ?></td>
						<td><?php echo $m['id_tarifa']; ?></td>
						<td><?php echo $m['id_ap']; ?></td>
						<td><?php echo $m['zona_med']; ?></td>
						<td><?php echo $m['codigo_med']; ?></td>
						<td><?php echo $m['marca_med']; ?></td>
						<td><?php echo $m['modelo_med']; ?></td>
						<td><?php echo $m['direccion_med']; ?></td>
						<td><?php echo $m['categoria_med']; ?></td>
						<td>
                            <a href="<?php echo site_url('medidor/edit/'.$m['id_med']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('medidor/remove/'.$m['id_med']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
