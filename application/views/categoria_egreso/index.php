<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Categoria EGRESO</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('categoria_egreso/add'); ?>" class="btn btn-success btn-sm">Registrar</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>#</th>
						<th>Nombre</th>
						
						<th></th>
                    </tr>
                    <?php foreach($categoria_egreso as $c){ ?>
                    <tr>
						<td><?php echo $c['id_categr']; ?></td>
						<td><?php echo $c['nom_categr']; ?></td>
						<td>
                                                    <a href="<?php echo site_url('categoria_egreso/edit/'.$c['id_categr']); ?>" class="btn btn-info btn-xs" title="Modificar categoria egreso"><span class="fa fa-pencil"></span> </a> 
                            <!--<a href="<?php //echo site_url('categoria_egreso/remove/'.$c['id_categr']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>-->
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
