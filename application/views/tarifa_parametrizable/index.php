<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Tarifa Parametrizable Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('tarifa_parametrizable/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Tarifa</th>
						<th>Tipo</th>
						<th>Desde</th>
						<th>Hasta</th>
						<th>Costo M3</th>
						<th>Costo Fijo</th>
						<th>Porc Alcant</th>
						<th>Porc Factura</th>
						<th>Montofijo Extra</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($tarifa_parametrizable as $t){ ?>
                    <tr>
						<td><?php echo $t['id_tarifa']; ?></td>
						<td><?php echo $t['tipo']; ?></td>
						<td><?php echo $t['desde']; ?></td>
						<td><?php echo $t['hasta']; ?></td>
						<td><?php echo $t['costo_m3']; ?></td>
						<td><?php echo $t['costo_fijo']; ?></td>
						<td><?php echo $t['porc_alcant']; ?></td>
						<td><?php echo $t['porc_factura']; ?></td>
						<td><?php echo $t['montofijo_extra']; ?></td>
						<td>
                            <a href="<?php echo site_url('tarifa_parametrizable/edit/'.$t['id_tarifa']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('tarifa_parametrizable/remove/'.$t['id_tarifa']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
