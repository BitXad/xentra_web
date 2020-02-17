<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Detalle Factura Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('detalle_factura/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Detfact</th>
						<th>Id Fact</th>
						<th>Tipo Detfact</th>
						<th>Cant Detfact</th>
						<th>Descip Detfact</th>
						<th>Punit Detfact</th>
						<th>Desc Detfact</th>
						<th>Total Detfact</th>
						<th>Exento Detfact</th>
						<th>Ice Detfact</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($detalle_factura as $d){ ?>
                    <tr>
						<td><?php echo $d['id_detfact']; ?></td>
						<td><?php echo $d['id_fact']; ?></td>
						<td><?php echo $d['tipo_detfact']; ?></td>
						<td><?php echo $d['cant_detfact']; ?></td>
						<td><?php echo $d['descip_detfact']; ?></td>
						<td><?php echo $d['punit_detfact']; ?></td>
						<td><?php echo $d['desc_detfact']; ?></td>
						<td><?php echo $d['total_detfact']; ?></td>
						<td><?php echo $d['exento_detfact']; ?></td>
						<td><?php echo $d['ice_detfact']; ?></td>
						<td>
                            <a href="<?php echo site_url('detalle_factura/edit/'.$d['id_detfact']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('detalle_factura/remove/'.$d['id_detfact']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
