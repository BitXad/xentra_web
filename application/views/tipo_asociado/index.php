<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Tipo Asociado</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('tipo_asociado/add'); ?>" class="btn btn-success btn-sm">Registrar</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
						<th>Tipo Asociado</th>
						<th></th>
                    </tr>
                    <?php foreach($tipo_asociado as $t){ ?>
                    <tr>
						<td><?php echo $t['tipo_asoc']; ?></td>
						<td>
                            <a href="<?php echo site_url('tipo_asociado/edit/'.$t['tipo_asoc']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a> 
                        
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
