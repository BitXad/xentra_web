<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Direccion Orden Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('direccion_orden/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Dir</th>
						<th>Nombre Dir</th>
						<th>Orden Dir</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($direccion_orden as $d){ ?>
                    <tr>
						<td><?php echo $d['id_dir']; ?></td>
						<td><?php echo $d['nombre_dir']; ?></td>
						<td><?php echo $d['orden_dir']; ?></td>
						<td>
                            <a href="<?php echo site_url('direccion_orden/edit/'.$d['id_dir']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('direccion_orden/remove/'.$d['id_dir']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
