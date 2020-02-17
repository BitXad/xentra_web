<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Imagen Asociado Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('imagen_asociado/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Imagenasoc Id</th>
						<th>Asociado Id</th>
						<th>Imagenasoc Titulo</th>
						<th>Imagenasoc Archivo</th>
						<th>Imagenasoc Descripcion</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($imagen_asociado as $i){ ?>
                    <tr>
						<td><?php echo $i['imagenasoc_id']; ?></td>
						<td><?php echo $i['asociado_id']; ?></td>
						<td><?php echo $i['imagenasoc_titulo']; ?></td>
						<td><?php echo $i['imagenasoc_archivo']; ?></td>
						<td><?php echo $i['imagenasoc_descripcion']; ?></td>
						<td>
                            <a href="<?php echo site_url('imagen_asociado/edit/'.$i['imagenasoc_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('imagen_asociado/remove/'.$i['imagenasoc_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
