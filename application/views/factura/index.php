<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Factura Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('factura/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Fact</th>
						<th>Tipo Fact</th>
						<th>Estado Fact</th>
						<th>Id Usu</th>
						<th>Id Lec</th>
						<th>Num Fact</th>
						<th>Nit Fact</th>
						<th>Razon Fact</th>
						<th>Orden Fact</th>
						<th>Nitemisor Fact</th>
						<th>Llave Fact</th>
						<th>Fecha Fact</th>
						<th>Hora Fact</th>
						<th>Fechaemision Fact</th>
						<th>Montoparc Fact</th>
						<th>Desc Fact</th>
						<th>Cadenaqr Fact</th>
						<th>Codcontrol Fact</th>
						<th>Literal Fact</th>
						<th>Fechahora Fact</th>
						<th>Fechavenc Fact</th>
						<th>Totalconsumo Fact</th>
						<th>Totalaportes Fact</th>
						<th>Totalrecargos Fact</th>
						<th>Montototal Fact</th>
						<th>Exento Fact</th>
						<th>Ice Fact</th>
						<th>Id Ing</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($factura as $f){ ?>
                    <tr>
						<td><?php echo $f['id_fact']; ?></td>
						<td><?php echo $f['tipo_fact']; ?></td>
						<td><?php echo $f['estado_fact']; ?></td>
						<td><?php echo $f['id_usu']; ?></td>
						<td><?php echo $f['id_lec']; ?></td>
						<td><?php echo $f['num_fact']; ?></td>
						<td><?php echo $f['nit_fact']; ?></td>
						<td><?php echo $f['razon_fact']; ?></td>
						<td><?php echo $f['orden_fact']; ?></td>
						<td><?php echo $f['nitemisor_fact']; ?></td>
						<td><?php echo $f['llave_fact']; ?></td>
						<td><?php echo $f['fecha_fact']; ?></td>
						<td><?php echo $f['hora_fact']; ?></td>
						<td><?php echo $f['fechaemision_fact']; ?></td>
						<td><?php echo $f['montoparc_fact']; ?></td>
						<td><?php echo $f['desc_fact']; ?></td>
						<td><?php echo $f['cadenaqr_fact']; ?></td>
						<td><?php echo $f['codcontrol_fact']; ?></td>
						<td><?php echo $f['literal_fact']; ?></td>
						<td><?php echo $f['fechahora_fact']; ?></td>
						<td><?php echo $f['fechavenc_fact']; ?></td>
						<td><?php echo $f['totalconsumo_fact']; ?></td>
						<td><?php echo $f['totalaportes_fact']; ?></td>
						<td><?php echo $f['totalrecargos_fact']; ?></td>
						<td><?php echo $f['montototal_fact']; ?></td>
						<td><?php echo $f['exento_fact']; ?></td>
						<td><?php echo $f['ice_fact']; ?></td>
						<td><?php echo $f['id_ing']; ?></td>
						<td>
                            <a href="<?php echo site_url('factura/edit/'.$f['id_fact']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('factura/remove/'.$f['id_fact']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
