<script src="<?php echo site_url('resources/js/lecturas.js');?>"></script>
<link rel="stylesheet" href="<?php echo site_url('resources/css/mitabla.css');?>">

<?php 
    if(isset($asociado[0]["foto_asoc"])){
        $imagen = base_url("resources/images/asociado/".$asociado[0]["foto_asoc"]);
    }
    else{
        $imagen = base_url("resources/images/asociados/thumb_default.jpg");
    }

?>


<div class="row" style="padding: 0; background-color: white; font-family: Arial; font-size: 10px;">
    
    <div class="col-md-2">
    </div>
    
    <div class="col-md-8" style="padding: 0;">
        <div class="box" style="padding: 0;">
            
            <table>
                <tr>
                    <td style="text-align: center;">
                    <img src="<?php echo $imagen; ?>" width="60px;" height="80px;">
                    </td>                
                
                    <td>
                
                    <b>ASOCIADO: </b><?php echo $asociado["0"]["nombres_asoc"].", ".$asociado["0"]["apellidos_asoc"]; ?>
                    <br><b>C.I.: </b><?php echo $asociado["0"]["ci_asoc"]; ?>
                    <br><b>CÓDIGO: </b><?php echo $asociado["0"]["codigo_asoc"]; ?>
                    <br><b>DIRECCIÓN: </b><?php echo $asociado["0"]["direccion_asoc"]; ?>
                    <br><b>SERVICIOS: </b><?php echo $asociado["0"]["servicios_asoc"]; ?>
                    <br><b>CATEGORIA: </b><?php echo $asociado["0"]["categoria_asoc"]; ?>

                    </td>                
                </tr>
            </table>
        </div>
    </div>
    
    <div class="col-md-2">
    </div>
</div>
                
                
<div class="row" style="padding: 0;">
    <div class="col-md-12" style="padding: 0;">
        <div class="box" style="padding: 0;">
                <h3 class="box-title" style="font-family: Arial; padding: 0; margin: 0;"><b>Facturas Pendientes</b></h3>
            <div class="box-body table-responsive">
                <table class="table table-striped" style="font-family: Arial; font-size: 8pt;" id="mitabla">
                    <tr>
						<th>#</th>
						<th>Gestión</th>
						<th>Lec. Ant.</th>
						<th>Lec. Act</th>
                                                <th>Cons. mt<sup>3</sup></th>
						<th>Total Cons. Bs</th>
						<th>Servicio</th>
						<th>Fecha Lect.</th>
						<th>Id Fact.</th>
						<th>Num. Fact.</th>
						<!--<th>Fecha Reg.</th>-->
						<th>Estado</th>
                    </tr>
                    <?php $cont = 0; $estilo = "style='padding:0; text-align: center;'";
                        foreach($facturas_pendientes as $f){ ?>
                    <tr>
                            <td <?php echo $estilo; ?>><?php echo ++$cont; ?></td>
                            <td style="text-align: left; padding: 0;"><?php echo $f['mes_lec']."/".$f['gestion_lec']; ?></td>
                            <td <?php echo $estilo; ?>><?php echo $f['anterior_lec']; ?></td>
                            <td <?php echo $estilo; ?>><?php echo $f['actual_lec']; ?></td>
                            <td <?php echo $estilo; ?>><?php echo $f['consumo_lec']; ?></td>
                            <td <?php echo $estilo; ?>><?php echo $f['totalcons_lec']; ?></td <?php echo $estilo; ?>>
                            <td <?php echo $estilo; ?>><?php echo $f['servicios_asoc']; ?></td>
                            <td <?php echo $estilo; ?>><?php echo $f['fecha_lec']; ?></td>
                            <td <?php echo $estilo; ?>><?php echo $f['id_fact']; ?></td>
                            <td <?php echo $estilo; ?>><?php echo $f['num_fact']; ?></td>
                            <td <?php echo $estilo; ?>><?php echo $f['estado_lec']; ?></td>
<!--                            <td <?php echo $estilo; ?>>
                                <a href="<?php echo site_url('lectura/edit/'.$f['id_lec']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                                <a href="<?php echo site_url('lectura/remove/'.$f['id_lec']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                            </td>-->
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>

<div class="row" style="padding: 0;">
    <div class="col-md-12" style="padding: 0;">
        <div class="box" style="padding: 0;">
                <h3 class="box-title" style="font-family: Arial; padding: 0; margin: 0; "><b>Lecturas Anteriores</b></h3>
            <div class="box-body  table-responsive" >
                <table class="table table-striped" style="font-family: Arial; font-size: 8pt;" id="mitabla">
                    <tr>
						<th>#</th>
						<th>Gestión</th>
						<th>Lec. Ant.</th>
						<th>Lec. Act</th>
                                                <th>Cons. mt<sup>3</sup></th>
						<th>Total Cons. Bs</th>
						<th>Servicio</th>
						<th>Fecha Lect.</th>
						<th>Id Lect.</th>
						<th>Num. Fact.</th>
						<!--<th>Fecha Reg.</th>-->
						<th>Estado</th>
                    </tr>
                    <?php $cont = 0; $estilo = "style='padding:0; text-align: center;'";
                        foreach($lecturas_anteriores as $f){ ?>
                    <tr>
                            <td <?php echo $estilo; ?>><?php echo ++$cont; ?></td>
                            <td style="text-align: left; padding: 0;"><?php echo $f['mes_lec']."/".$f['gestion_lec']; ?></td>
                            <td <?php echo $estilo; ?>><?php echo $f['anterior_lec']; ?></td>
                            <td <?php echo $estilo; ?>><?php echo $f['actual_lec']; ?></td>
                            <td <?php echo $estilo; ?>><?php echo $f['consumo_lec']; ?></td>
                            <td <?php echo $estilo; ?>><?php echo $f['totalcons_lec']; ?></td <?php echo $estilo; ?>>
                            <td <?php echo $estilo; ?>><?php echo $f['servicios_asoc']; ?></td>
                            <td <?php echo $estilo; ?>><?php echo $f['fecha_lec']; ?></td>
                            <td <?php echo $estilo; ?>><?php echo $f['id_lec']; ?></td>
                            <td <?php echo $estilo; ?>><?php echo $f['monto_lec']; ?></td>
                            <td <?php echo $estilo; ?>><?php echo $f['estado_lec']; ?></td>
                            <td <?php echo $estilo; ?>>
                                <a href="<?php echo site_url('lectura/edit/'.$f['id_lec']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                                <a href="<?php echo site_url('lectura/remove/'.$f['id_lec']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                            </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
