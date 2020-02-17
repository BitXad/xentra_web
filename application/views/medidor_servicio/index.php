<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Medidor Servicios Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('medidor_servicio/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Serv</th>
						<th>Id Med</th>
						<th>Servicio</th>
						<th>Monto Serv</th>
						<th>Fecha Serv</th>
						<th>Hora Serv</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($medidor_servicios as $m){ ?>
                    <tr>
						<td><?php echo $m['id_serv']; ?></td>
						<td><?php echo $m['id_med']; ?></td>
						<td><?php echo $m['servicio']; ?></td>
						<td><?php echo $m['monto_serv']; ?></td>
						<td><?php echo $m['fecha_serv']; ?></td>
						<td><?php echo $m['hora_serv']; ?></td>
						<td>
                            <a href="<?php echo site_url('medidor_servicio/edit/'.$m['id_serv']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('medidor_servicio/remove/'.$m['id_serv']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
