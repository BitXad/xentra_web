<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/factura.js'); ?>" type="text/javascript"></script>
<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<input type="hidden" id="base_url" value="<?php echo base_url();?>">
<input type="hidden" id="rolusuario_asignado" name="rolusuario_asignado" value="<?php echo $rolusuario_asignado;?>">
<div class="row">
    <div class="col-md-12">
        <h3 class="box-title">LIBRO DE VENTAS</h3>
        <div class="box">
            <div class="box-header">
                <div class="col-md-12">
                    <div class="col-md-3">
                        <label for="desde" class="control-label">Desde:</label>
                        <div class="form-group">
                             <input type="date"class="btn btn-warning btn-xs form-control"  id="fecha_desde" name="fecha_desde" value="<?php echo date("Y-m-d");?>">

                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="hasta" class="control-label">Hasta:</label>
                        <div class="form-group">
                            <input type="date" class="btn btn-warning btn-xs form-control"  id="fecha_hasta" name="fecha_hasta" value="<?php echo date("Y-m-d");?>">

                        </div>
                    </div>

                    <div class="col-md-2" hidden>
                        <label for="tipo" class="control-label">Tipo:</label>
                        <div class="form-group">
                            <select name="opcion" id="opcion" class="btn btn-warning btn-xs form-control">
                                    <option value="1">VENTAS</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-2" hidden="">
                       <label for="desde" class="control-label"> Exportar: </label>
                       <div class="form-group">
                            <button onclick="generarexcel()" type="button" class="btn btn-facebook btn-xs form-control" ><span class="fa fa-file-excel-o"> </span> Exportar a Excel</button>
                        </div>
                    </div>


                <!--</form>-->
                    <div class="col-md-2">
                       <label for="desde" class="control-label"> Buscar: </label>
                       <div class="form-group">

                           <button  type="submit" class="btn btn-danger btn-xs form-control" onclick="mostrar_facturas()"><span class="fa fa-binoculars"> </span> Ver</button>

                        </div>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <div class="box-body table-responsive" id="tabla_factura" >
            <!--    <table class="table table-striped" id="mitabla">
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
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                  -->              
                </div>
            </div>
        </div>
    </div>
</div>
