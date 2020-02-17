<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Asociado Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('asociado/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Asoc</th>
						<th>Id Emp</th>
						<th>Estado</th>
						<th>Tipo Asoc</th>
						<th>Zona Asoc</th>
						<th>Servicios Asoc</th>
						<th>Categoria Asoc</th>
						<th>Ciudad</th>
						<th>Nombres Asoc</th>
						<th>Apellidos Asoc</th>
						<th>Ci Asoc</th>
						<th>Direccion Asoc</th>
						<th>Fechanac Asoc</th>
						<th>Telefono Asoc</th>
						<th>Codigo Asoc</th>
						<th>Nit Asoc</th>
						<th>Razon Asoc</th>
						<th>Foto Asoc</th>
						<th>Fechahora Asoc</th>
						<th>Medidor Asoc</th>
						<th>Orden Asoc</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($asociado as $a){ ?>
                    <tr>
						<td><?php echo $a['id_asoc']; ?></td>
						<td><?php echo $a['id_emp']; ?></td>
						<td><?php echo $a['estado']; ?></td>
						<td><?php echo $a['tipo_asoc']; ?></td>
						<td><?php echo $a['zona_asoc']; ?></td>
						<td><?php echo $a['servicios_asoc']; ?></td>
						<td><?php echo $a['categoria_asoc']; ?></td>
						<td><?php echo $a['ciudad']; ?></td>
						<td><?php echo $a['nombres_asoc']; ?></td>
						<td><?php echo $a['apellidos_asoc']; ?></td>
						<td><?php echo $a['ci_asoc']; ?></td>
						<td><?php echo $a['direccion_asoc']; ?></td>
						<td><?php echo $a['fechanac_asoc']; ?></td>
						<td><?php echo $a['telefono_asoc']; ?></td>
						<td><?php echo $a['codigo_asoc']; ?></td>
						<td><?php echo $a['nit_asoc']; ?></td>
						<td><?php echo $a['razon_asoc']; ?></td>
						<td><?php echo $a['foto_asoc']; ?></td>
						<td><?php echo $a['fechahora_asoc']; ?></td>
						<td><?php echo $a['medidor_asoc']; ?></td>
						<td><?php echo $a['orden_asoc']; ?></td>
						<td>
                            <a href="<?php echo site_url('asociado/edit/'.$a['id_asoc']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('asociado/remove/'.$a['id_asoc']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
