<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/descuento.js'); ?>" type="text/javascript"></script>
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<script type="text/javascript">
    $(document).ready(function () {
        (function ($) {
            $('#buscarasociado').keyup(function () {
                var rex = new RegExp($(this).val(), 'i');
                $('.buscar tr').hide();
                $('.buscar tr').filter(function () {
                    return rex.test($(this).text());
                }).show();
            })
        }(jQuery));
    });
</script>
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Modificar Descuento</h3>
                <a data-toggle="modal" data-target="#modalbuscarasociado" class="btn btn-info" title="Buscar nuevo asociado">
                    <i class="fa fa-plus-circle"></i>Buscar Asociado
                </a>
            </div>
            <?php echo form_open('descuento/edit/'.$descuento['id_desc']); ?>
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-6">
                        <label for="id_asoc" class="control-label"><span class="text-danger">*</span>Asociado</label>
                        <div class="form-group" id="new_select">
                            <input type="search" name="id_asoc" value="<?php echo ($this->input->post('id_asoc') ? $this->input->post('id_asoc') : $descuento['apellidos_asoc']." ".$descuento['nombres_asoc']); ?>" list="lista_asociado" class="form-control" id="id_asoc" placeholder="nombre"  onkeypress="buscar_asociado(event, 2)"  onchange="seleccionar_asociado()" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" onclick="this.select();" required />
                            <datalist id="lista_asociado">
                            </datalist>
                            <input type="hidden" name="esteid_asoc" id="esteid_asoc" value="<?php echo $descuento['id_asoc']; ?>" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="nom_desc" class="control-label"><span class="text-danger">*</span>Concepto</label>
                        <div class="form-group">
                            <input type="text" name="nom_desc" value="<?php echo ($this->input->post('nom_desc') ? $this->input->post('nom_desc') : $descuento['nom_desc']); ?>" class="form-control" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="nom_desc" required />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="monto_desc" class="control-label"><span class="text-danger">*</span>Monto</label>
                        <div class="form-group">
                            <input type="number" step="any" min="0" name="monto_desc" value="<?php echo ($this->input->post('monto_desc') ? $this->input->post('monto_desc') : $descuento['monto_desc']); ?>" class="form-control"  id="monto_desc" required />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="inicio_desc" class="control-label"><span class="text-danger">*</span>Fecha Inicio</label>
                        <div class="form-group">
                            <input type="date" name="inicio_desc" value="<?php echo date("Y-m-d", strtotime($descuento['inicio_desc'])); ?>" class="form-control"  id="inicio_desc" required />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="vigencia_desc" class="control-label"><span class="text-danger">*</span>Fecha Fin</label>
                        <div class="form-group">
                            <input type="date" name="vigencia_desc" value="<?php echo date("Y-m-d", strtotime($descuento['vigencia_desc'])); ?>" class="form-control"  id="vigencia_desc" required />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="estado_desc" class="control-label">Estado</label>
                        <div class="form-group">
                            <select name="estado_desc" class="form-control">
                                <?php 
                                foreach($all_estado as $estado)
                                {
                                    $selected = ($estado['estado'] == $descuento['estado_desc']) ? ' selected="selected"' : "";
                                    echo '<option value="'.$estado['estado'].'" '.$selected.'>'.$estado['estado'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
            	<button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> Guardar
                </button>
                <a href="<?php echo site_url('descuento'); ?>" class="btn btn-danger">
                <i class="fa fa-times"></i> Cancelar</a>
            </div>				
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!------------------------ INICIO modal para Seleccioanr nuevo asociado ------------------->
<div class="modal fade" id="modalbuscarasociado" tabindex="-1" role="dialog" aria-labelledby="modalbuscarasociadolabel">
    <div class="modal-dialog" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                <span class="text-bold">Buscar Asociado</span>
                <div class="col-md-12" style="padding-left: 0px">
                    <div class="input-group">
                        <span class="input-group-addon"> Buscar </span>           
                        <input type="text" id="buscarasociado" name="buscarasociado" class="form-control" placeholder="Ingrese el nombre, código.." onkeypress="iniciar_busqueda(event)" autofocus autocomplete="off">
                        <div style="border-color: #008d4c; background: #008D4C !important; color: white" class="btn btn-success input-group-addon" onclick="tabla_asociados()"><span class="fa fa-search"></span></div>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <!------------------------------------------------------------------->
                <div class="box-body table-responsive">
                    <table class="table table-striped" id="mitabla">
                        <tr>
                            <th>#</th>
                            <th></th>
                            <th> Nombres
                                <span style="float: right;" class="right badge btn-danger">Encontrados: <span class="badge btn-facebook"><input style="border-width: 0;" id="encontrados" type="text"  size="5" value="0" readonly="true"> </span></span>
                            </th>
                            <th></th>
                        </tr>
                        <tbody class="buscar" id="tablaresultados" >
                        </tbody>
                    </table>
                </div>
                <!------------------------------------------------------------------->
            </div>
            <div class="modal-footer aligncenter">
                <a href="#" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> Cancelar</a>
            </div>
        </div>
    </div>
</div>
<!------------------------ FIN modal para Seleccionar nuevo asociado ------------------->