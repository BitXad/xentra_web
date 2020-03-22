<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Tipo Aporte</h3>
            	
            </div>
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
						<th>Tipo</th>
						
                    </tr>
                    <?php foreach($tipo_aporte as $t){ ?>
                    <tr>
						<td><?php echo $t['tipo']; ?></td>
						
                            <!--<a href="<?php echo site_url('tipo_aporte/edit/'.$t['tipo']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a> 
                            <a href="<?php echo site_url('tipo_aporte/remove/'.$t['tipo']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>-->
                       
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
