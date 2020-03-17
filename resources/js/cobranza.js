$(document).on("ready",inicio);

function inicio(){
    
       // detallecobro();
       
      // filtro = " and date(orden_fecha) = date(now())";
    //fechaorden(filtro);
}



function finalizar(){

    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'factura/registrarfactura';
    var id_asoc = document.getElementById('id_asoc').value;
    var factura_id = document.getElementById('factura_id').value;
    var lectura_id = document.getElementById('lectura_id').value;
    var multar = document.getElementById('multar').checked;
    var generar_factura = document.getElementById('generar_factura').checked;
    var imprimir_factura = document.getElementById('imprimir_factura').checked;
    var consumo = document.getElementById('consumo').value;
    var aportes = document.getElementById('aportes').value;
    var recargos = document.getElementById('recargos').value;
    var total = document.getElementById('total_factura').value;

    $.ajax({url:controlador,

            type:"POST",

            data:{factura_id:factura_id,multar:multar,generar_factura:generar_factura,lectura_id:lectura_id,
                consumo:consumo,aportes:aportes,recargos:recargos,total:total},

            success:function(respuesta){

                var registros = JSON.parse(respuesta);
                alert('COBRO REALIZADO CON EXITO');
                if (imprimir_factura==true) {
                    window.open(base_url+"factura/imprimir/"+factura_id, '_blank');
                }
                var nada = "";
                $("#lista_pendientes").html(nada);
                $("#detalle_factura").html(nada);
                $("#detalle_recargo").html(nada);
                facturas_pendientes(id_asoc);
             

            },

            error:function(respuesta){          

               alert('No tiene una factura seleccionada');
        
            }                

    }); 





}   





//esta funcion verifica 2 parametros: la tecla presionada y otro parametro que le indica que hacer

function buscarasoc(e,opcion) {

  tecla = (document.all) ? e.keyCode : e.which;

  

    if (tecla==13){ 

    
        if (opcion==1){             

            buscarasociado();            

        }

        if (opcion==2){   //si la tecla proviene del input apellido

            buscar_asociados();
        } 

        if (opcion==3){   //si la tecla proviene del input nombre

            buscar_asociados();
        } 

        if (opcion==4){   //si la tecla proviene del 

            tablaresultados(1);           

       }
       

    }   

}


function buscarasociado(){

   var base_url = document.getElementById('base_url').value;
   var ci = document.getElementById('ci').value;
   var controlador = base_url+'factura/buscarasociado';
 
    $.ajax({url:controlador,

            type:"POST",

            data:{ci:ci},

            success:function(respuesta){

                

                var registros = eval(respuesta);

                

                if (registros[0]!=null){

                    

                    $("#nombre").val(registros[0]["nombres_asoc"]);
                    $("#apellido").val(registros[0]["apellidos_asoc"]);

                    //document.getElementById('telefono').focus();
                    $("#id_asoc").val(registros[0]["id_asoc"]);

                    facturas_pendientes(registros[0]["id_asoc"]);
                    
                }

                else

                {
                  
                    alert('No existe un Asociado Con este Codigo/C.I.');   

                }

            },

            error:function(respuesta){			

               alert('No existe un Asociado Con este Codigo/C.I.');

            }                

    }); 



}

function buscar_asociados()
{
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+"factura/buscar_asociados";
    var apellido = document.getElementById('apellido').value;
    var nombre = document.getElementById('nombre').value;
    
        $.ajax({url: controlador,
            type:"POST",
            data:{apellido:apellido,nombre:nombre},
            success:function(respuesta){
                
                var registros = JSON.parse(respuesta);
                var fin = registros.length;
                html = "";
                html += "<div class='box-body table-responsive'>";
                html += "<table class='table table-striped table-condensed' id='mitabla_xs'>";
                html += "<tr>";
                html += "<th>Nº</th>";
                html += "<th>Apellido</th>";
                html += "<th>Nombres</th>";
                html += "<th>Codigo</th>";
                html += "<th>C.I.</th>";
                html += "<th>Direccion</th>";
                html += "<th>Telefono</th>";
                html += "<th>Nit</th>";
                html += "<th>Razon</th>";
               // html += "<th></th>";
                html += "</tr>";
                
                for(var i = 0; i<fin; i++)
                {

                    html += "<tr onclick='ver_facturas("+registros[i]["id_asoc"]+")'>";               
                    html += "<td>"+(i+1)+"</td>";
                    html += "<td>"+registros[i]["apellidos_asoc"]+"</td>";  
                    html += "<td>"+registros[i]["nombres_asoc"]+"</td>";
                    html += "<td align='center'>"+registros[i]["codigo_asoc"]+"</td>";
                    html += "<td align='center'>"+registros[i]["ci_asoc"]+"</td>";
                    html += "<td>"+registros[i]["direccion_asoc"]+"</td>";
                    html += "<td align='center'>"+registros[i]["telefono_asoc"]+"</td>";  
                    html += "<td align='center'>"+registros[i]["nit_asoc"]+"</td>";  
                    html += "<td>"+registros[i]["razon_asoc"]+"</td>";  
                    //html += "<td><button onclick='ver_facturas("+registros[i]["id_asoc"]+")' class='btn btn-success btn-xs' title='Ver Facturas Pendientes' ><span class='fa fa-money'></span></button></td>";
 
                    html += "</tr>";
                } 
                html += "</table>";   
                html += "</div>";   
                $("#lista_asociados").html(html);

            },
            error: function(respuesta){
              alert('No existe');
            }
        });
}

function ver_facturas(asociado)
{

   var base_url = document.getElementById('base_url').value;
   var controlador = base_url+'factura/buscar_idasociado';
 
    $.ajax({url:controlador,

            type:"POST",

            data:{asociado:asociado},

            success:function(respuesta){

                var registros = eval(respuesta);
                if (registros[0]!=null){

                    $("#nombre").val(registros[0]["nombres_asoc"]);
                    $("#apellido").val(registros[0]["apellidos_asoc"]);
                    $("#ci").val(registros[0]["ci_asoc"]);
                    $("#id_asoc").val(registros[0]["id_asoc"]);

                    facturas_pendientes(asociado); 
                   // multas_pendientes(asociado); 
                    }             

            },

            error:function(respuesta){      

               alert('nose');

            }                

    }); 

}

function facturas_pendientes(asociado)
{
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+"factura/buscar_pendientes";
    
        $.ajax({url: controlador,
            type:"POST",
            data:{asociado:asociado},
            success:function(respuesta){
                
                var registros = JSON.parse(respuesta);
                var fin = registros.length;
                html = "";
                html2 = "";
                
                if (registros!='') {
                for(var i = 0; i<fin; i++)
                {

                    html += "<tr onclick='detalle_factura("+registros[i]["id_fact"]+","+registros[i]["id_lec"]+")'>";               
                    html += "<td>"+(i+1)+"</td>";
                    html += "<td>"+registros[i]["id_fact"]+"</td>";
                    html += "<td>"+registros[i]["id_lec"]+"</td>";
                    html += "<td>"+registros[i]["actual_lec"]+"</td>";
                    html += "<td>"+registros[i]["anterior_lec"]+"</td>";
                    html += "<td>"+registros[i]["consumo_lec"]+"</td>";
                    html += "<td>"+registros[i]["mes_lec"]+"</td>";  
                    html += "<td>"+registros[i]["gestion_lec"]+"</td>";  
                    
                    html += "</tr>";
                } 
                   
                $("#lista_pendientes").html(html);
                $("#detalle_factura").html(html2);
                $("#detalle_recargo").html(html2);
                $("#consumo").val(Number(0).toFixed(2));
                $("#aportes").val(Number(0).toFixed(2));
                $("#recargos").val(Number(0).toFixed(2));
                $("#total_factura").val(Number(0).toFixed(2));
                }
                else{
                    alert('El Asociado No Tiene Facturas Pendientes');
                }

            },
            error: function(respuesta){
              alert('No existen Facturas Pendientes');
            }
        });
}

/*
function multas_pendientes(asociado)
{
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+"factura/buscar_multas";
    
        $.ajax({url: controlador,
            type:"POST",
            data:{asociado:asociado},
            success:function(respuesta){
                
                var registros = JSON.parse(respuesta);
                var fin = registros.length;
                html = "";
               
                
                for(var i = 0; i<fin; i++)
                {

                    html += "<tr onclick='ver_facturas("+registros[i]["id_fact"]+")'>";               
                    html += "<td>"+(i+1)+"</td>";
                    html += "<td>"+registros[i]["motivo_multa"]+"</td>";
                    html += "<td>"+registros[i]["cant_detfact"]+"</td>";
                    html += "<td>"+registros[i]["descip_detfact"]+"</td>";
                    html += "<td>"+registros[i]["monto_multa"]+"</td>";
                    html += "<td>"+registros[i]["desc_detfact"]+"</td>";
                    html += "<td>"+registros[i]["total_detfact"]+"</td>";
                   
                    
                    html += "</tr>";
                } 
                   
                $("#detalle_factura").html(html);

            },
            error: function(respuesta){
              alert('No existen Facturas Pendientes');
            }
        });
}*/

function detalle_factura(factura,lectura)
{
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+"factura/buscar_detalle";
    buscar_recargos(lectura);
    tabla_totales(factura,lectura);
        $.ajax({url: controlador,
            type:"POST",
            data:{factura:factura},
            success:function(respuesta){
                
                var registros = JSON.parse(respuesta);
                var fin = registros.length;
                html = "";
                var total =  Number(0);
                
                for(var i = 0; i<fin; i++)
                {
                    total +=  Number(registros[i]["total_detfact"]);

                    html += "<tr>";               
                    html += "<td align='center'>"+(i+1)+"</td>";
                    html += "<td align='center'>"+registros[i]["id_fact"]+"</td>";
                    html += "<td align='center'>"+registros[i]["cant_detfact"]+"</td>";
                    html += "<td>"+registros[i]["descip_detfact"]+"</td>";
                    html += "<td align='right'>"+Number(registros[i]["punit_detfact"]).toFixed(2)+"</td>";
                    html += "<td align='right'>"+Number(registros[i]["desc_detfact"]).toFixed(2)+"</td>";
                    html += "<td align='right'>"+Number(registros[i]["total_detfact"]).toFixed(2)+"</td>";
                    html += "</tr>";
                } 
                    html += "<tr>";               
                    html += "<td colspan='2' align='center'><b>TOTAL</b></td>";
                    html += "<td colspan='4'></td>";
                    html += "<td align='right'><b>"+Number(total).toFixed(2)+"</b></td>";
                    html += "</tr>";
                   
                $("#detalle_factura").html(html);
                $("#factura_id").val(factura);
                $("#lectura_id").val(lectura);
                

            },
            error: function(respuesta){
              alert('No existen Facturas Pendientes');
            }
        });
}

function buscar_recargos(lectura)
{
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+"factura/buscar_recargos";
    
        $.ajax({url: controlador,
            type:"POST",
            data:{lectura:lectura},
            success:function(respuesta){
                
                var registros = JSON.parse(respuesta);
                var fin = registros.length;
                html = "";
                var total =  Number(0);
                
                for(var i = 0; i<fin; i++)
                {
                    total +=  Number(registros[i]["monto_param"]);

                    html += "<tr>";               
                    html += "<td align='center'>"+(i+1)+"</td>";
                    html += "<td>"+registros[i]["descip_param"]+" "+registros[i]["detalle_param"]+"</td>";
                    html += "<td align='center'>1</td>";
                    html += "<td align='right'>"+Number(registros[i]["monto_param"]).toFixed(2)+"</td>";
                    html += "<td align='right'>"+Number(0).toFixed(2)+"</td>";
                    html += "<td align='right'>"+Number(registros[i]["monto_param"]).toFixed(2)+"</td>";
                    html += "</tr>";
                } 

                    html += "<tr>";               
                    html += "<td colspan='2' align='center'><b>TOTAL</b></td>";
                    html += "<td colspan='3'></td>";
                    html += "<td align='right'><b>"+Number(total).toFixed(2)+"</b></td>";
                    html += "</tr>";
                   
                $("#detalle_recargo").html(html);

            },
            error: function(respuesta){
              alert('No existen Facturas Pendientes');
            }
        });
}


function tabla_totales(factura,lectura)
{
    var base_url    = document.getElementById('base_url').value;
    var multar    = document.getElementById('multar').checked;
    var controlador = base_url+"factura/datos_factura";
   
    
    $.ajax({url: controlador,
            type:"POST",
            data:{factura:factura,lectura:lectura},
            success:function(respuesta){
              
                var registros = JSON.parse(respuesta);
                var consumos = (Number(registros.consumo).toFixed(2));
                var multas = (Number(registros.multa).toFixed(2));
          
            if(multar==true){
                var recargos = (Number(registros.recargo).toFixed(2));    
            } else {
                var recargos = (Number(0).toFixed(2));  
            }    

                var total_factura = Number(consumos)+Number(multas)+Number(recargos);
                $("#consumo").val(Number(consumos).toFixed(2));
                $("#aportes").val(Number(multas).toFixed(2));
                $("#recargos").val(Number(recargos).toFixed(2));
                $("#total_factura").val(Number(total_factura).toFixed(2));

            },
            error: function(respuesta){
              alert('No existen Facturas Pendientes');
            }
        });
}

function multar(){
    
    var factura = document.getElementById('factura_id').value;
    var lectura = document.getElementById('lectura_id').value;
    tabla_totales(factura,lectura);
    
}

/*function busqueda_ot()
{
    var base_url    = document.getElementById('base_url').value;
    var opcion      = document.getElementById('select_fecha').value;
 
    if (opcion == 1)
    {
        filtro = " and date(orden_fecha) = date(now())";
        mostrar_ocultar_buscador("ocultar");
        $("#busquedaavanzada").html('Del Dia');
               
    }//compras de hoy
    
    if (opcion == 2)
    {
       
        filtro = " and date(orden_fecha) = date_add(date(now()), INTERVAL -1 DAY)";
        mostrar_ocultar_buscador("ocultar");
        $("#busquedaavanzada").html('De Ayer');
    }//compras de ayer
    
    if (opcion == 3) 
    {
    
        filtro = " and date(orden_fecha) >= date_add(date(now()), INTERVAL -1 WEEK)";//compras de la semana
        mostrar_ocultar_buscador("ocultar");
        $("#busquedaavanzada").html('De la Semana');
            }

    
    if (opcion == 4) 
    {   filtro = " ";//todos los compras
        mostrar_ocultar_buscador("ocultar");

    }
    
    if (opcion == 5) {

        mostrar_ocultar_buscador("mostrar");
        //filtro = null;
    }

    fechaorden(filtro);
}


function mostrar_ocultar_buscador(parametro){
       
    if (parametro == "mostrar"){
        document.getElementById('buscador_oculto').style.display = 'block';}
    else{
        document.getElementById('buscador_oculto').style.display = 'none';}
    
}*/




function fechaorden(parametro){
  var base_url    = document.getElementById('base_url').value;
  var controlador = base_url+"orden_trabajo/buscar_ot";
   

    $.ajax({url: controlador,
           type:"POST",
           data:{parametro:parametro},
          
           success:function(resul){     
              
                            
                
               var registros =  JSON.parse(resul);
           
               if (registros != null){
                   
                    
                    var cont = 0;
                    var total = Number(0);
                    var total_acuenta = Number(0);
                    var total_saldo = Number(0);
                    
                    var n = registros.length; //tamaÃ±o del arreglo de la consulta
                    $("#pillados").html("Registros Encontrados: "+n+" ");
                   
                    html = "";
                 
                    
                    for (var i = 0; i < n ; i++){

                        total += Number(registros[i]["orden_total"]);
                        total_acuenta += Number(registros[i]["orden_acuenta"]);
                        total_saldo += Number(registros[i]["orden_saldo"]);
                        
                        html += "<tr>";
                      
                        html += "<td>"+(i+1)+"</td>";
                        html += "<td>"+registros[i]["cliente_nombre"]+"</td>";  
                        html += "<td align='center'><b>"+registros[i]["orden_numero"]+"</b></td>";  
                        html += "<td align='center'>"+moment(registros[i]["orden_fecha"]).format('DD/MM/YYYY')+"<br>"+registros[i]["orden_hora"]+"</td>";
                        html += "<td align='center'>"+moment(registros[i]["orden_fechaentrega"]).format('DD/MM/YYYY')+"</td>";
                        html += "<td align='right'>"+Number(registros[i]["orden_total"]).toFixed(2)+"</td>";
                        html += "<td align='right'>"+Number(registros[i]["orden_acuenta"]).toFixed(2)+"</td>";
                        html += "<td align='right'>"+Number(registros[i]["orden_saldo"]).toFixed(2)+"</td>";
                        html += "<td>"+registros[i]["usuario_nombre"]+"</td>";
                        if (registros[i]["venta_id"]>0) {
                        html += "<td><a href='"+base_url+"seguimiento/seguimiento/"+registros[i]["orden_id"]+"/"+registros[i]["venta_id"]+"' target='_blank' title='Proceso OT' class='btn btn-warning btn-xs'><span class='fa fa-spinner'></span> ";  
                        html += "OT: "+registros[i]['orden_id']+" Cod.: "+registros[i]['venta_id']+"</a></td>";
                        }
                        html += "<td class='no-print'>";
                        
                        html += " <a href='"+base_url+"orden_trabajo/editar/"+registros[i]["orden_id"]+"' target='_blank' title='Editar OT' class='btn btn-info btn-xs'><span class='fa fa-pencil'></span></a>";
                        html += " <a href='"+base_url+"orden_trabajo/ordendoc/"+registros[i]["orden_id"]+"' target='_blank' title='Imp. OT' class='btn btn-facebook btn-xs'><span class='fa fa-print'></span></a>";
                        html += " <a href='"+base_url+"orden_trabajo/ordenrecibo/"+registros[i]["orden_id"]+"' target='_blank' title='Nota OT' class='btn btn-success btn-xs'><span class='fa fa-print'></span></a>";
                        
                        html += " <a href='#' data-toggle='modal'  data-target='#modalanular"+registros[i]["orden_id"]+"' title='Anular OT' class='btn btn-xs btn-danger' style=''><i class='fa fa-ban'></i></a>";
                        html += "                       <!------------------------ modal para eliminar el producto ------------------->";
                        html += " <div class='modal fade' id='modalanular"+registros[i]['orden_id']+"' tabindex='-1' role='dialog' aria-labelledby='myModalLabel"+registros[i]['orden_id']+"'>";
                        html += " <div class='modal-dialog' role='document'>";
                        html += "  <br><br>";
                        html += " <div class='modal-content'>";
                        html += " <div class='modal-header'>";
                        html += " <h1 class='modal-title' id='myModalLabel'>ADVERTENCIA</h1>";
                        html += " </div>";
                        html += " <div class='modal-body'>";
                        html += " <div class='panel panel-primary'>";
                        html += " ";
                        html += " <center>";
                        html += " <!------------------------------------------------------------------->";
                        html += " <h1 style='font-size: 80px'> <b> <em class='fa fa-trash'></em></b></h1> ";
                        html += " <h4>";
                        html += " ";
                        html += " ¿Desea anular la OT? <b> <br>";
                        html += " Orden de  Trabajo: "+registros[i]['orden_id']+"<br>";
    //                    
                        html += " </h4>";
                        html += "     <!------------------------------------------------------------------->";
                        html += " ";
                        html += "   </center>";
                        html += "   </div>";
                        html += "   </div>";
                        html += "    <div class='modal-footer aligncenter'>";
                        html += "   <center>";                                        
                        html += "  <a href='"+base_url+"orden_trabajo/anular/"+registros[i]['orden_id']+"' class='btn btn-danger  btn-sm'><em class='fa fa-pencil'></em> Si </a>";

                        html += "  <a href='#' class='btn btn-success btn-sm' data-dismiss='modal'><em class='fa fa-times'></em> No </a>";
                        html += "  </center>";

                        html += "   </div>";
                        html += "   </div>";
                        html += "   </div>";
                        html += "   </div>";

                        html += " <!------------------------ fin modal --------------------------------->   ";      
                        html += "</td>";
                        html += "</tr>";
                           
                       }
                       html += "<tr>";
                       html += "<th colspan='2'>TOTAL</th>";
                       html += "<th></th>";
                       html += "<th></th>";
                       html += "<th></th>";
                       html += "<th align='right'>"+Number(total).toFixed(2)+"</th>";
                       html += "<th align='right'>"+Number(total_acuenta).toFixed(2)+"</th>";
                       html += "<th align='right'>"+Number(total_saldo).toFixed(2)+"</th>";
                       html += "<th></th>";
                       html += "<th></th>";
                       html += "<th></th>";
                       html += "</tr>";
                            
                   
                   $("#fechadeorden").html(html);
                   
            }
                
        },
        error:function(resul){
          // alert("Algo salio mal...!!!");
           html = "";
           $("#fechadeorden").html(html);
        }
        
    });   

} 


function buscar_por_fecha()
{
    var base_url    = document.getElementById('base_url').value;
    
    var fecha_desde = document.getElementById('fecha_desde').value;
    var fecha_hasta = document.getElementById('fecha_hasta').value;
  

   var fecha1 = "Desde: "+moment(fecha_desde).format('DD/MM/YYYY');
   var fecha2 = "Hasta: "+moment(fecha_hasta).format('DD/MM/YYYY');
   
   
         filtro = " and date(orden_fecha) >= '"+fecha_desde+"'  and  date(orden_fecha) <='"+fecha_hasta+"' ";
         $("#busquedaavanzada").html(fecha1+" "+fecha2);
    
    fechaorden(filtro);
}
