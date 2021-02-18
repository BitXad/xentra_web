<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Facturas</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('factura/cobranza'); ?>" class="btn btn-success btn-sm"> Facturacion</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
						<th>Id</th>
						
						<th>Estado</th>
						
						<th>Num</th>
						<th>Nit</th>
						<th>Razon</th>
						
						<th>Fecha</th>
						<th>Hora</th>
						
						<th>Total consumo</th>
						<th>Total aportes</th>
						<th>Total recargos</th>
						<th>Monto total</th>
						
						<th></th>
                    </tr>
                    <?php foreach($factura as $f){ ?>
                    <tr>
						<td><?php echo $f['id_fact']; ?></td>
						
						<td><?php echo $f['estado_fact']; ?></td>
					
						<td><?php echo $f['num_fact']; ?></td>
						<td><?php echo $f['nit_fact']; ?></td>
						<td><?php echo $f['razon_fact']; ?></td>
						<td><?php echo $f['fecha_fact']; ?></td>
						<td><?php echo $f['hora_fact']; ?></td>
						<td><?php echo $f['totalconsumo_fact']; ?></td>
						<td><?php echo $f['totalaportes_fact']; ?></td>
						<td><?php echo $f['totalrecargos_fact']; ?></td>
						<td><?php echo $f['montototal_fact']; ?></td>
						
						<td>
							<a href="<?php echo site_url('factura/imprimir_recibo/'.$f['id_fact']); ?>" target="_blank" class="btn btn-info btn-xs"><span class="fa fa-print"></span></a>
                            <!--<a href="<?php echo site_url('factura/edit/'.$f['id_fact']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('factura/remove/'.$f['id_fact']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>-->
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
