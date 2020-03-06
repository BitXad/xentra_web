<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Diametros de Red</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('diametroerd/add'); ?>" class="btn btn-success btn-sm">Añadir</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Código</th>
                    </tr>
                    <?php foreach($all_diametrored as $e){ ?>
                    <tr>
                        <td><?php echo $e['id_diam']; ?></td>
                        <td><?php echo $e['nombre_diam']; ?></td>
                        <td><?php echo $e['codigo_diam']; ?></td>
                        <td>
                            <a href="<?php echo site_url('diametrored/edit/'.$e['id_diam']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a> 
                            <!--<a href="<?php //echo site_url('diametroerd/remove/'.$e['id_diam']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>-->
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
