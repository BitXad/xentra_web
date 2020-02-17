<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Zonas Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('zona/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Zona Med</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($zonas as $z){ ?>
                    <tr>
						<td><?php echo $z['zona_med']; ?></td>
						<td>
                            <a href="<?php echo site_url('zona/edit/'.$z['zona_med']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('zona/remove/'.$z['zona_med']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
