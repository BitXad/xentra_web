<!----------------------------- script buscador --------------------------------------->
<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/anticipado.js'); ?>" type="text/javascript"></script>
 
<script type="text/javascript">
        $(document).ready(function () {
            (function ($) {
                $('#cotizar').keyup(function () {
                    var rex = new RegExp($(this).val(), 'i');
                    $('.buscar tr').hide();
                    $('.buscar tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();
                })
            }(jQuery));
        });
        
        $(document).ready(function () {
            (function ($) {
                $('#filtrar2').keyup(function () {
                    var rex = new RegExp($(this).val(), 'i');
                    $('.buscar2 tr').hide();
                    $('.buscar2 tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();
                })
            }(jQuery));
        });


    $(document).ready(function(){
    $("#razon_social").change(function(){
        var nombre = $("#razon_social").val();
        var cad1 = nombre.substring(0,2);
        var cad2 = nombre.substring(nombre.length-1,nombre.length);
        var fecha = new Date();
        var pararand = fecha.getFullYear()+fecha.getMonth()+fecha.getDay();
        var cad3 = Math.floor((Math.random(1001,9999) * pararand));
        var cad = cad1+cad2+cad3;
        $('#cliente_codigo').val(cad);
       
    });
  } );
          

  function myFunction() {
     var nit = document.getElementById('nit').value;
     var razon = document.getElementById('razon_social').value;
     if (nit=='' || nit==0 || razon=='' || razon==0) {
      alert("Debe agregar un cliente");
     } else {
       $("#exampleModal").modal("show");
     } 
   
      
      }

</script> 

<style type="text/css">
    input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}
input[type=number] { -moz-appearance:textfield; }
</style> 
<!----------------------------- fin script buscador --------------------------------------->
<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
 <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
 <input type="hidden" name="esexento" id="esexento" value="0">
 <input type="hidden" id="tipo_lectura" name="tipo_lectura" value="<?php echo $configuracion[7]["valor"]; ?>">
 <input type="hidden" id="total_aporte" name="total_aporte" value="<?php echo $all_aporte["total_aporte"]; ?>">
 <input type="hidden" id="fechaant_lec" name="fechaant_lec" value="0">
 <input type="hidden" id="tipo_asoc" name="tipo_asoc"> <!-- es para lacategoria de asocoados -->
 <!--<input type="hidden" id="servicios_asoc" name="servicios_asoc">-->
 <!--<input type="hidden" name="usuario_id" id="usuario_id" value="<?php //echo $usuario_id; ?>">
 <input type="hidden" name="tipo_orden" id="tipo_orden" value='<?php //echo json_encode($tipo_orden); ?>' />-->
 <div class="row" style="padding-left: 10px;margin-top: -20px;margin-bottom: -7px;">
    <h4 class="box-title">Asociado</h4>
 </div>     
<input type="hidden" name="id_asoc" value=""  class="form-control" id="id_asoc" required />
<div class="panel panel-default" style="padding:0;">
    <div class="col-md-2">
        <label for="ci" class="control-label">Codigo/C.I.</label>
        <div class="form-group">
            <input type="text" name="ci" value="" class="form-control" id="ci" onkeypress="buscarasoc(event,1)" autocomplete="off"/>
        </div>
    </div>      
    <div class="col-md-4">
        <label for="apellido" class="control-label">Apellido(s)</label>
        <div class="form-group">
            <input type="search" name="apellido" class="form-control" id="apellido" onkeypress="buscarasoc(event,2)" onKeyUp="this.value = this.value.toUpperCase();" autocomplete="off" />
        </div>  
    </div>
    <div class="col-md-4">
        <label for="nombre" class="control-label">Nombre(s)</label>
        <div class="form-group">
          <input type="search" name="nombre" class="form-control" id="nombre" onkeypress="buscarasoc(event,3)" onKeyUp="this.value = this.value.toUpperCase();" autocomplete="off" />
            <!--<datalist id="listaasoc">
            </datalist>-->
        </div>
    </div>
</div>
<div class="col-md-12 row" style="padding-left: 30px; margin-top: -12px;margin-bottom: 0px;">
    <span class="text-red" id="mensaje_cobroanterior"></span>
 </div>
<div class="col-md-12" id="lista_asociados" style="padding-left:5px; padding-right: 20px"></div>
<!---------------------------------------TABLA DE DETALLE orden_trabajo------------------------------------>
<div class="col-md-12">
    <div class="col-md-6" style="padding-left:0px; background: #e1e1f0">
        <div class="box">
            <h4 class="modal-title text-center" id="tipo_facturas"><span class="btn btn-xs bg-navy" id="total_pendientes">PAGOS ANTICIPADOS</span></h4>
            <div class="col-md-4" style="display: none; padding-left: 0px" id="lagestion">
                <label for="gestionlec_asoc" class="control-label">Gestión</label>
                <div class="form-group" style="margin-bottom: 2px">
                    <select name="gestionlec_asoc" class="form-control" id="gestionlec_asoc">
                        <?php
                        foreach($all_gestion as $gestion)
                        {
                            $selected = ($gestion["gestion_lec"] == date("Y")) ? ' selected="selected"' : "";
                            echo '<option value="'.$gestion["gestion_lec"].'" '.$selected.'>'.$gestion["gestion_lec"].'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-md-8" style="display: none; padding-right: 0px" id="elservicio">
                <label for="servicios_asoc" class="control-label">&nbsp;</label>
                <div class="form-group" style="margin-bottom: 2px">
                    <span class="form-control" id="servicios_asoc"></span>
                </div>
            </div>
            <div class="col-md-12" style="display: none; padding: 0px" id="lecturaanterior"></div>
            <div class="col-md-12 box" style="display: none; padding: 0px" id="mespara_cobro"></div>
            <div class="col-md-12 box" style="padding-left:0px;">
                <!--<h4 class="modal-title">Multas y Recargos</h4>-->
                <table class="table table-striped table-condensed" id="mitabla_xs" style="width: 100%">
                    <tr>
                        <td style="width: 15%"><input style='background-color: #b1b2bd' type='number' step='any' min='0' value='0.00' name='rep_formulario' id='rep_formulario' onkeypress="actualizarvalores(event)" /></td>
                        <td style="width: 70%"><input style="width: 100%" type='text' value='REPOSICION DE FORMULARIO' name='rep_concepto' id='rep_concepto' onkeypress="actualizarvalores(event)" /></td>
                        <td style="width: 15%"><label><input type="checkbox" name="elexento" id="elexento" /> Exento</label></td>
                    </tr>
                </table>
            </div>
            <!--<h5 class="modal-title">Multas y Recargos 
                <button class="btn btn-info btn-xs" type="button">
                    <input type="checkbox" name="multar" id="multar" checked  onclick="multar()"  />
                    <label for="multar"> Cobrar Multas</label>
                </button>
            </h5>-->
            <!--<div class="col-md-12 box" style="padding-left:0px;">
                <h4 class="modal-title">Multas y Recargos  <button class="btn btn-info btn-xs" type="button">
                <input type="checkbox" name="multar" id="multar" checked  onclick="multar()"  />
                <label for="multar"> Cobrar Multas</label></button> </h4>
                <div class="box-body table-responsive">
                    <table class="table table-striped table-condensed" id="mitabla_xs">
                        <tr>
                            <th>Nº</th>
                            <th>Descripción</th>
                            <th>Cant.</th>
                            <th>P. Unit.</th>
                            <th>Desc.</th>
                            <th>Total</th>
                        </tr>
                        <tbody class="buscar3" id="detalle_recargo"></tbody>
                    </table>
                </div>
            </div>-->
                <!--<div class="box-body table-responsive">
                <table class="table table-striped table-condensed" id="mitabla_xs">
                    <tr>
                            <th>Nº</th>
                            <th>Fact.</th>
                            <th>Lec.</th>
                            <th>Actual</th>
                            <th>Anterior</th>
                            <th>Cons.</th>
                            <th>Mes</th>
                            <th>Gestion</th>
                            <th>Monto</th>
                            <th></th>
                           
                    </tr>
                    <tbody class="buscar1" id="lista_pendientes">
                      
                    </tbody>
                </table>
            </div>-->
        </div>
    </div>
    <div class="col-md-6" style="padding-left:0px; background: white">
        <div class="box">
            <div class="col-md-12">
                <table style="background-color: #94b2f7">
                    <tr>
                        <th class="text-center" colspan="3" style="color: white">Formato de Facturación</th>
                    </tr>
                    <tr>
                        <td style="color: #f74205"><label><input type="radio" name="tipofactura" id="resumido" value="1" />Factura resumida</label></td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td style="color: #f74205"><label><input type="radio" name="tipofactura" id="detallado" value="2" checked />Factura detallada</label></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-12">
                <h4 class="modal-title" >Detalle</h4>
                <div class="box-body table-responsive">
                    <table class="table table-striped table-condensed" id="mitabla_xs">
                        <tr>
                            <th>Nº</th>
                            <th>Factura</th>
                            <th>Cant.</th>
                            <th>Detalle</th>
                            <th>SubTotal BS.</th>
                            <th>Desc. BS.</th>
                            <th>Total BS.</th>
                        </tr>
                        <tbody class="buscar2" id="detalle_factura"></tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-12" style="padding-left:0px;">
                <div class="box-body table-responsive table-condensed">
                    <table class="table table-striped table-condensed" id="miotratabla" >
                        <tr>
                            <td>Consumo Mts<sup>3</sup></td>
                            <td><input class="btn btn-default" type="text" size="8" readonly id="consumo_m3" name="consumo_m3" value="0.00"></td>
                        </tr>
                        <tr>
                            <td>Consumo Bs.</td>
                            <td><input class="btn btn-default" type="text" size="8" readonly id="consumo" name="consumo" value="0.00"></td>
                        </tr>
                        <tr>
                            <td>Multas/Aps Bs.</td>
                            <td><input class="btn btn-default" type="text" size="8" readonly id="aportes" name="aportes" value="0.00"></td>
                        </tr>
                        <tr>
                            <td>Recargos Bs.</td>
                            <td>
                                <input class="btn btn-default" id="recargos" size="8" name="recargos" value="0.00" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Total Bs.</b></td>
                            <td>
                                <input class="btn btn-warning" id="total_factura" name="total_factura" size="8" value="0.00" readonly> 
                                <input class="hidden" id="factura_id" name="factura_id" size="8" value="" readonly> 
                                <input class="hidden" id="lectura_id" name="lectura_id" size="8" value="" readonly> 
                            </td>
                        </tr>
                    </table>
                    <hr style="margin: 0;border: 2px solid #f2f2f2">
                    <div class="col-md-4">
                        <input type="checkbox" id="generar_factura" onclick="facturan()" name="generar_factura" size="8" value="1"><label for="generar_factura"> Generar Factura </label> 
                    </div>
                    <div class="col-md-4">
                        <input type="checkbox" checked id="imprimir_factura" name="imprimir_factura" size="8" value=""><label for="imprimir_factura"> Imprimir Recibo </label> 
                    </div>
                    <div class="col-md-4">
                        <input type="checkbox" id="imprimir_copia" name="imprimir_copia" size="8" value=""><label for="imprimir_copia"> Imprimir Copia </label> 
                    </div>
                    <div id="facturan" style="display: none">
                        <div class="col-md-6">
                            <label for="nit_asoc"> NIT </label> 
                           <input type="tex" class="form-control btn-warning" id="nit_asoc" name="nit_asoc" value="">
                        </div>
                        <div class="col-md-6">
                            <label for="razon_asoc"> Razon Social</label> 
                            <input type="text" class="form-control btn-warning" id="razon_asoc" name="razon_asoc" value="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
<div class="col-md-12" align="right" id="btn_pendiente" style="display:  block;">
    <button onclick="finalizar()" class="btn btn-sq-lg btn-success" style="width: 120px !important; height: 120px !important;" id="btnfinalizar" disabled>
        <i class="fa fa-money fa-4x"></i><br>
       Cobrar<br>Factura<br>
    </button>
    <a  href="<?php echo site_url('anticipado/cobranza'); ?>" class="btn btn-sq-lg btn-warning" style="width: 120px !important; height: 120px !important;">
        <i class="fa fa-ban fa-4x"></i><br><br>
        Cancelar<br>
    </a>
    <a  href="<?php echo site_url('factura/ultima'); ?>" target="_blank" class="btn btn-sq-lg btn-primary" style="width: 120px !important; height: 120px !important;">
        <i class="fa fa-print fa-4x"></i><br>Imprimir<br>
       Ultimo<br>
    </a>
    <a data-toggle="modal" data-target="#modalbuscarimprimir" class="btn btn-sq-lg bg-navy" style="width: 120px !important; height: 120px !important;">
        <i class="fa fa-search fa-4x"></i><br>Bucar<br>
       Imprimir<br>
    </a>
</div>

<!------------------------ INICIO modal para Registrar nueva Categoria ------------------->
<div class="modal fade" id="modalbuscarimprimir" tabindex="-1" role="dialog" aria-labelledby="modalbuscarimprimirlabel">
    <div class="modal-dialog" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header bg-navy text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                <H2>REIMPRIMIR</H2>
            </div>
            <div class="modal-body">
               <!------------------------------------------------------------------->
            <div class="row">
             <div class="col-md-6">
              <div class="form-group">
                  <div class="radio">
                    <label>
                      <input type="radio" class="" name="tipoimpresion" id="tipoimpresion" value="recibo" checked>Factura/Recibo
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="tipoimpresion" id="tipoimpresion" value="preaviso" >Preaviso
                    </label>
                  </div>
                </div>
               
             </div>
             <div class="col-md-6">
              <label for="numero">Nº de Lectura (ID)</label>
              <input type="text" name="numero" id="numero" autocomplete="off" class="form-control">
             </div>
               <!------------------------------------------------------------------->
            </div>
            </div>
            <div class="modal-footer aligncenter">
                <a onclick="reimprimirbusqueda()" class="btn btn-success"><span class="fa fa-print"></span> Imprimir</a>
                <a href="#" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> Cancelar</a>
            </div>
        </div>
    </div>
</div>
<!------------------------ FIN modal para Registrar nueva Categoria ------------------->

<!---------------modal  producto--------------->

