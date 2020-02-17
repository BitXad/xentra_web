<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Estado Factura Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('estado_factura/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Estado Fact</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($estado_factura as $e){ ?>
                    <tr>
						<td><?php echo $e['estado_fact']; ?></td>
						<td>
                            <a href="<?php echo site_url('estado_factura/edit/'.$e['estado_fact']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('estado_factura/remove/'.$e['estado_fact']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
