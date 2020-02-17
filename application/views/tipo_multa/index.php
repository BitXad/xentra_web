<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Tipo Multa Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('tipo_multa/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Tipo</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($tipo_multa as $t){ ?>
                    <tr>
						<td><?php echo $t['tipo']; ?></td>
						<td>
                            <a href="<?php echo site_url('tipo_multa/edit/'.$t['tipo']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('tipo_multa/remove/'.$t['tipo']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
