<!----------------------------- script buscador --------------------------------------->
<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/cobranza.js'); ?>" type="text/javascript"></script>
 
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
 <!--<input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $usuario_id; ?>">
 <input type="hidden" name="tipo_orden" id="tipo_orden" value='<?php echo json_encode($tipo_orden); ?>' />-->
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
                <datalist id="listaasoc">

                </datalist>
            </div>
          </div>
						<div class="col-md-2">
            <label for="estado" class="control-label">Tipo de Factura</label>
            <div class="form-group">
              <select class="form-control" id="estado">
                <option value="PENDIENTE" >PENDIENTES</option>
                <option value="CANCELADA">CANCELADAS</option>
                <option value="ANULADA">ANULADAS</option>
              </select>
            </div>
            </div>
</div>

<div id="lista_asociados"></div>

<!--<div class="col-md-3"></div>
<div class="col-md-3"></div>
        
                  
         
              <div class="col-md-3">
           
            <button type="button" class="btn btn-success btn-xs" onclick="myFunction()">
                <i class="fa fa-check"></i> Finalizar OT
              </button>
              <a href="javascript:history.back()"><button type="button" class="btn btn-danger btn-xs">
                <i class="fa fa-times"></i> Cancelar
              </button></a>
            </div>-->
<!---------------------------------------TABLA DE DETALLE orden_trabajo------------------------------------>
<div class="col-md-12">
  <div class="col-md-6" style="padding-left:0px;">
    <div class="box">
    <h4 class="modal-title" id="tipo_facturas">Facturas <span class="btn btn-xs bg-navy" id="total_pendientes">Pendientes: 0.00 Bs.</span></h4>
                          
                <div class="box-body table-responsive">
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
            </div>
    </div>
  </div>
<div class="col-md-6" style="padding-left:0px;">
    <div class="box">
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
                    <tbody class="buscar2" id="detalle_factura">
                       
                    </tbody>
                </table>
            </div>
    </div>
  </div>
  </div>
<div class="col-md-12">
  <div class="col-md-6" style="padding-left:0px;">
    <div class="box">
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
                    <tbody class="buscar3" id="detalle_recargo">
                       
                    </tbody>
                </table>
            </div>
    </div>
  </div>  
			
		  <div class="col-md-6" style="padding-left:0px;">
    <div class="box">

        <div class="box-body table-responsive table-condensed">
            <!--<form method="post" name="descuento">-->
                
            <table class="table table-striped table-condensed" id="miotratabla" >
                

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
                      <input type="checkbox" id="generar_factura" onclick="facturan()" name="generar_factura" size="8" value=""><label for="generar_factura"> Generar Factura </label> 
                  </div>
                  <div class="col-md-4">
                   <input type="checkbox" checked id="imprimir_factura" name="imprimir_factura" size="8" value=""><label for="imprimir_factura"> Imprimir Factura </label> 
                  </div>
                  <div class="col-md-4">
                   <input type="hidden" id="imprimir_copia" name="imprimir_copia" size="8" value=""><label for="imprimir_copia"> Imprimir Copia </label> 
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
<div class="col-md-11" align="right" id="btn_pendiente" style="display:  block;">
    <button onclick="finalizar()" class="btn btn-sq-lg btn-success" style="width: 120px !important; height: 120px !important;" id="btnfinalizar" disabled>
                <i class="fa fa-money fa-4x"></i><br>
               Cobrar<br>Factura<br>
            </button>
            <a  href="<?php echo site_url('factura/cobranza'); ?>" class="btn btn-sq-lg btn-warning" style="width: 120px !important; height: 120px !important;">
                <i class="fa fa-ban fa-4x"></i><br><br>
               Cancelar<br>
            </a>   
            <!--<a  href="<?php echo site_url('factura/index'); ?>" class="btn btn-sq-lg btn-danger" style="width: 120px !important; height: 120px !important;">
                <i class="fa fa-sign-out fa-4x"></i><br><br>
               Salir<br>
            </a> -->
            <a  href="<?php echo site_url('factura/ultima'); ?>" target="_blank" class="btn btn-sq-lg btn-primary" style="width: 120px !important; height: 120px !important;">
                <i class="fa fa-print fa-4x"></i><br>Imprimir<br>
               Ultimo<br>
            </a>
            <a data-toggle="modal" data-target="#modalbuscarimprimir" class="btn btn-sq-lg bg-navy" style="width: 120px !important; height: 120px !important;">
                <i class="fa fa-search fa-4x"></i><br>Bucar<br>
               Imprimir<br>
            </a>    
</div>

<div class="col-md-11" align="right" id="btn_cancelada" style="display:  none;">
            <a data-toggle="modal" data-target="#modaleliminar" class="btn btn-sq-lg btn-danger" style="width: 120px !important; height: 120px !important;">
                <i class="fa fa-times-circle fa-4x"></i><br>
               Anular<br>Factura<br>
            </a>

<!------------------------ INICIO modal para Registrar nueva Categoria ------------------->
<div class="modal fade" id="modaleliminar" tabindex="-1" role="dialog" aria-labelledby="modaleliminarlabel">
    <div class="modal-dialog" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header btn-danger text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                <H2>ADVERTENCIA</H2>
            </div>
            <div class="modal-body">
               <!------------------------------------------------------------------->
             <h3>ESTA SEGURO(A) DE ANULAR ESTA FACTURA?</h3>
               <!------------------------------------------------------------------->
            </div>
            <div class="modal-footer aligncenter">
                <a onclick="anular()" class="btn btn-success"><span class="fa fa-check"></span> Anular</a>
                <a href="#" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> Cancelar</a>
            </div>
        </div>
    </div>
</div>
<!------------------------ FIN modal para Registrar nueva Categoria ------------------->


            <a  href="<?php echo site_url('factura/cobranza'); ?>" class="btn btn-sq-lg btn-warning" style="width: 120px !important; height: 120px !important;">
                <i class="fa fa-ban fa-4x"></i><br><br>
               Cancelar<br>
            </a>   
            <a onclick="reimprimir()" class="btn btn-sq-lg btn-primary" style="width: 120px !important; height: 120px !important;">
                <i class="fa fa-print fa-4x"></i><br>Reimprimir<br>
               Factura<br>
            </a>
            <a data-toggle="modal" data-target="#modalbuscarimprimir" class="btn btn-sq-lg bg-navy" style="width: 120px !important; height: 120px !important;">
                <i class="fa fa-search fa-4x"></i><br>Bucar<br>
               Imprimir<br>
            </a>    
</div>
<!---------------------------------------FIN TABLA DE DETALLE VENTAAA------------------------------------>
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
</div>

