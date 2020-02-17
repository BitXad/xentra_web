<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Mes Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('me/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Mes</th>
						<th>Mes Lec</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($mes as $m){ ?>
                    <tr>
						<td><?php echo $m['id_mes']; ?></td>
						<td><?php echo $m['mes_lec']; ?></td>
						<td>
                            <a href="<?php echo site_url('me/edit/'.$m['id_mes']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('me/remove/'.$m['id_mes']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
