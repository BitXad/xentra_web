<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Parametros</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('parametro/add'); ?>" class="btn btn-success btn-sm">Registrar</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
						<th>Id</th>
						<th>Descripción</th>
						<th>Dias</th>
						<th>Monto</th>
						<th>Detalle</th>
                        <th>Estado</th>
						<th></th>
                    </tr>
                    <?php foreach($parametros as $p){ ?>
                    <tr>
						<td><?php echo $p['id_param']; ?></td>
						<td><?php echo $p['descip_param']; ?></td>
						<td><?php echo $p['dias_param']; ?></td>
						<td><?php echo number_format($p['monto_param'],'2','.',',');?></td>
						<td><?php echo $p['detalle_param']; ?></td>
                        <td><?php echo $p['estado']; ?></td>
						<td>
                            <a href="<?php echo site_url('parametro/edit/'.$p['id_param']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a> 
                            <a href="<?php echo site_url('parametro/remove/'.$p['id_param']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
