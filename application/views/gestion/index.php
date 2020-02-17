<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Gestion Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('gestion/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Gestion Lec</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($gestion as $g){ ?>
                    <tr>
						<td><?php echo $g['gestion_lec']; ?></td>
						<td>
                            <a href="<?php echo site_url('gestion/edit/'.$g['gestion_lec']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('gestion/remove/'.$g['gestion_lec']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
