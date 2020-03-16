<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Tarifa</h3>
            	<div class="box-tools">
                    <!--<a href="<?php echo site_url('tarifa/add'); ?>" class="btn btn-success btn-sm"> Registrar</a>--> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
						<th>Id</th>
						<th>Tipo</th>
						<th>Desde</th>
						<th>Hasta</th>
						<th>Costo Agua</th>
						<th>Costo Alcantarillado</th>
						<th></th>
                    </tr>
                    <?php foreach($tarifa as $t){ ?>
                    <tr>
						<td><?php echo $t['id_tarifa']; ?></td>
						<td><?php echo $t['tipo']; ?></td>
						<td><?php echo $t['desde']; ?></td>
						<td><?php echo $t['hasta']; ?></td>
						<td><?php echo $t['costo_agua']; ?></td>
						<td><?php echo $t['costo_alcant']; ?></td>
						<td>
                            <!--<a href="<?php echo site_url('tarifa/edit/'.$t['id_tarifa']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a> -->
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
