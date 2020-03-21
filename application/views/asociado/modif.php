<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/asociado_modif.js'); ?>" type="text/javascript"></script>
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<script type="text/javascript">
    $(document).ready(function () {
        (function ($) {
            $('#filtrar').keyup(function () {
                var rex = new RegExp($(this).val(), 'i');
                $('.buscar tr').hide();
                $('.buscar tr').filter(function () {
                    return rex.test($(this).text());
                }).show();
            })
        }(jQuery));
    });
</script>
<script type="text/javascript">

    function imprimirdetalle()
    {
        var f = new Date();
        $('#fechaimpresion').html(moment(f).format("DD/MM/YYYY HH:mm:ss"));
        window.print();
    }

</script>
<style type="text/css">
    #contieneimg{
        width: 50px;
        height: 50px;
        text-align: center;
    }
    #horizontal{
        display: flex;
        white-space: nowrap;
        border-style: none !important;
    }
    #masgrande{
        font-size: 12px;
    }
</style>
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<div class="row no-print">
    <div class="col-md-12">
        <div class="box-header text-center">
            <font class="text-bold" size='4' face='Arial'>Lista de Asociados modificados</font>
            <br><font size='2' face='Arial' id="encontrados"></font>
            <br><span style="font-size: 8pt;" id="fechaimpresion"></span>
        </div>
    </div>
    <div class="col-md-3">
        Desde: <input type="date" value="<?php echo date('Y-m-d')?>" class="btn btn-primary btn-sm form-control" id="fecha_desde" name="fecha_desde" required="true">
    </div>
    <div class="col-md-3">
        Hasta: <input type="date" value="<?php echo date('Y-m-d')?>" class="btn btn-primary btn-sm form-control" id="fecha_hasta" name="fecha_hasta" required="true">
    </div>
    <div class="col-md-3">
        <br>
        <button class="btn btn-sm btn-warning btn-sm btn-block"  type="submit" onclick="buscar_por_fechamodif()" style="height: 34px;">
            <span class="fa fa-search"></span> Buscar
      </button>
        <br>
    </div>
    <div class="col-md-3">
        <br>
        <a id="imprimirestedetalle" class="btn btn-sq-lg btn-success" onclick="imprimirdetalle()" ><span class="fa fa-print"></span>&nbsp;Imprimir</a>
    </div>
    <div class="col-md-12">
        <div class="col-md-5" style="padding-left: 0px">
            <div class="input-group">
                <span class="input-group-addon"> Buscar </span>           
                <input id="filtrar" type="text" class="form-control" placeholder="Ingrese el nombre, código, dirección" autofocus autocomplete="off">
            </div>
        </div>
    </div>
        <!-- **** INICIO de BUSCADOR select y productos encontrados *** -->
         <div class="row" id='loader'  style='display:none; text-align: center'>
            <img src="<?php echo base_url("resources/images/loader.gif"); ?>"  >
        </div>
        <!-- **** FIN de BUSCADOR select y productos encontrados *** -->
    <!---------------- FIN BOTONES --------->
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body table-responsive">
                <table class="table table-condensed" id="mitabla">
                    <tr>
                        <th>#</th>
                        <th>ASOCIADO</th>
                        <th>DIRECCION</th>
                        <th>CODIGO</th>
                        <th>C.I.</th>
                        <th>FECHAS</th>
                        <th class="no-print">MAP</th>
                    </tr>
                    <tbody class="buscar" id="tablaresultados">
                    <?php /*foreach($asociado as $a){ ?>
                    <tr>
						<td><?php echo $a['id_asoc']; ?></td>
						<td><?php echo $a['id_emp']; ?></td>
						<td><?php echo $a['estado']; ?></td>
						<td><?php echo $a['tipo_asoc']; ?></td>
						<td><?php echo $a['zona_asoc']; ?></td>
						<td><?php echo $a['servicios_asoc']; ?></td>
						<td><?php echo $a['categoria_asoc']; ?></td>
						<td><?php echo $a['ciudad']; ?></td>
						<td><?php echo $a['nombres_asoc']; ?></td>
						<td><?php echo $a['apellidos_asoc']; ?></td>
						<td><?php echo $a['ci_asoc']; ?></td>
						<td><?php echo $a['direccion_asoc']; ?></td>
						<td><?php echo $a['fechanac_asoc']; ?></td>
						<td><?php echo $a['telefono_asoc']; ?></td>
						<td><?php echo $a['codigo_asoc']; ?></td>
						<td><?php echo $a['nit_asoc']; ?></td>
						<td><?php echo $a['razon_asoc']; ?></td>
						<td><?php echo $a['foto_asoc']; ?></td>
						<td><?php echo $a['fechahora_asoc']; ?></td>
						<td><?php echo $a['medidor_asoc']; ?></td>
						<td><?php echo $a['orden_asoc']; ?></td>
						<td>
                            <a href="<?php echo site_url('asociado/edit/'.$a['id_asoc']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('asociado/remove/'.$a['id_asoc']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php }*/ ?>
                    </tbody>
                </table>
                                
            </div>
        </div>
    </div>
</div>
