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
    var imprimir_copia = document.getElementById('imprimir_copia').checked;
    var consumo = document.getElementById('consumo').value;
    var aportes = document.getElementById('aportes').value;
    var recargos = document.getElementById('recargos').value;
    var total = document.getElementById('total_factura').value;
    var nit_asoc = document.getElementById('nit_asoc').value;
    var razon_asoc = document.getElementById('razon_asoc').value;
    var esexento = document.getElementById('esexento').value;
    $.ajax({url:controlador,
            type:"POST",
            data:{factura_id:factura_id,multar:multar,generar_factura:generar_factura,lectura_id:lectura_id,
                consumo:consumo,aportes:aportes,recargos:recargos,total:total,nit_asoc:nit_asoc,razon_asoc:razon_asoc,
                esexento:esexento},
            success:function(respuesta){
                var registros = JSON.parse(respuesta);
                if(registros != null){
                    if(registros == "yafacturado"){
                        alert('Ya se realizo el cobro!..');
                    }else{
                        alert('COBRO REALIZADO CON EXITO');
                        if(generar_factura == true){
                            if (imprimir_factura==true) {
                                window.open(base_url+"factura/imprimir_factura/0/"+factura_id, '_blank'); //factura original
            //                    window.open(base_url+"factura/copia/"+factura_id, '_blank');
                            }
                            if (imprimir_copia==true) {
                                window.open(base_url+"factura/imprimir_factura/1/"+factura_id, '_blank'); //factura copia
                            }
                        }else{
                            window.open(base_url+"factura/imprimir_recibo/"+factura_id, '_blank'); //factura original
                        }

                        var nada = "";
                        $("#lista_pendientes").html(nada);
                        $("#detalle_factura").html(nada);
                        $("#detalle_recargo").html(nada);
                        $("#consumo").val("0.00");
                        $("#aportes").val("0.00");
                        $("#recargos").val("0.00");
                        $("#total_factura").val("0.00");
                        $("#btnfinalizar").prop('disabled',true);
                        facturas_pendientes(id_asoc);
                        
                        window.open("http://localhost/ximpleman_web/venta/ventas", '_blank');
                        
                    }
                }else{
                    alert("Informacion Incorrecta, revise sus datos, consumo y total no pueden ser 0");
                }
            
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

            //buscarasociado();
            buscar_asociados();

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

function ocultar_tabla(){
    
    var html = "";
    $("#mitabla_xs").html(html);
}
function buscar_asociados()
{
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+"factura/buscar_asociados";
    var apellido = document.getElementById('apellido').value;
    var nombre = document.getElementById('nombre').value;
    var ci = document.getElementById('ci').value;
    
        //alert(ci);
        $.ajax({url: controlador,
            type:"POST",
            data:{apellido:apellido,nombre:nombre, ci:ci},
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
                html += "<th></th>";
               // html += "<th></th>";
               
                html += "<tbody id='tabla_resultados'>";
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
 
                    html += "<td><button onclick='ocultar_tabla()' class='btn btn-warning btn-xs'><fa class='fa fa-eraser'></fa></button></td>";
                    html += "</tr>";
                } 
                html += "</tbody>";   
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
                    $("#nit_asoc").val(registros[0]["nit_asoc"]);
                    $("#razon_asoc").val(registros[0]["razon_asoc"]);

                    facturas_pendientes(asociado); 
                    //total_pendientes(asociado); 
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
    var estado = document.getElementById('estado').value;
        $.ajax({url: controlador,
            type:"POST",
            data:{asociado:asociado,estado:estado},
            success:function(respuesta){
                
                var registros = JSON.parse(respuesta);
                var fin = registros.length;
                var total_deudas = 0;
                html = "";
                html2 = "";
                
                if (registros!='') {
                for(var i = 0; i<fin; i++)
                {

                    html += "<tr>";               
                    html += "<td align='center'>"+(i+1)+"</td>";
                    html += "<td align='center'>"+registros[i]["id_fact"]+"</td>";
                    html += "<td align='center'>"+registros[i]["id_lec"]+"</td>";
                    html += "<td align='center'>"+registros[i]["actual_lec"]+"</td>";
                    html += "<td align='center'>"+registros[i]["anterior_lec"]+"</td>";
                    html += "<td align='center'>"+registros[i]["consumo_lec"]+"</td>";
                    html += "<td align='center'>"+registros[i]["mes_lec"]+"</td>";  
                    html += "<td align='center'>"+registros[i]["gestion_lec"]+"</td>";  
                    html += "<td align='right'><b>"+Number(registros[i]["montototal_fact"]).toFixed(2)+"</b></td>";
                    html += "<td align='center' style='padding: 0'>";
                    
                    if (i==0 && estado == 'PENDIENTE') {
                        html += "<button class='btn-success btn-xs' onclick='detalle_factura("+registros[i]["id_fact"]+","+registros[i]["id_lec"]+")'> COBRAR</button>";
                    }
                    if (i==(fin-1) && estado == 'CANCELADA') {
                        html += " <button class='btn-warning btn-xs' onclick='detalle_factura("+registros[i]["id_fact"]+","+registros[i]["id_lec"]+")'> ANULAR</button>";
                    }
                    html += "</td>";
                    html += "</tr>";
                    
                    total_deudas += Number(registros[i]["montototal_fact"]);
                }
                html += "<th style='padding:0;' colspan='8'> TOTAL FACTURAS PENDIENTES Bs.</th>";
                html += "<th style='padding:0;'><b><font size='3'>"+total_deudas.toFixed(2)+"</font></b></th>";
                html += "<th style='padding:0;'></th>";
                   
                $("#lista_pendientes").html(html);
                $("#detalle_factura").html(html2);
                $("#detalle_recargo").html(html2);
                $("#consumo").val(Number(0).toFixed(2));
                $("#aportes").val(Number(0).toFixed(2));
                $("#recargos").val(Number(0).toFixed(2));
                $("#total_factura").val(Number(0).toFixed(2));
                if (estado == 'PENDIENTE') {
                    document.getElementById('btn_pendiente').style.display = 'block';
                    document.getElementById('btn_cancelada').style.display = 'none';
                }
                if (estado == 'CANCELADA') {
                    document.getElementById('btn_cancelada').style.display = 'block';
                    document.getElementById('btn_pendiente').style.display = 'none';
                    
                }
                total_pendientes(asociado);
                }
                else{
                    alert('El Asociado No Tiene Facturas '+estado);
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
                var totalexento =  Number(0);
                
                for(var i = 0; i<fin; i++)
                {
                    total +=  Number(registros[i]["total_detfact"]);
                    if(registros[i]["exento_detfact"] =="SI"){
                        totalexento +=  Number(registros[i]["total_detfact"]);
                    }
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
                $("#esexento").val(totalexento);
                $("#btnfinalizar").prop('disabled',false);
                

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
                //alert(registros.multa);
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



function reimprimirbusqueda()
{
    var base_url    = document.getElementById('base_url').value;
    var numero    = document.getElementById('numero').value;
    var tipoimpresion    = document.getElementById('tipoimpresion').checked;
    if (numero=='') {
         alert('Debe ingresar un numero');   
         alert(tipoimpresion);   
    }else{
        if (tipoimpresion==false) {
            var controlador = base_url+"factura/buscar_lectura";

            $.ajax({url: controlador,
            type:"POST",
            data:{numero:numero},
            success:function(respuesta){
              
            window.open(base_url+'lectura/preaviso_boucher/'+numero, '_blank'); 


            },
            error: function(respuesta){
              alert('Esta lectura no existe');
            }
        });
           
        }
        else{
            var controlador = base_url+"factura/buscar_recibo";
            $.ajax({url: controlador,
            type:"POST",
            data:{numero:numero},
            success:function(respuesta){
            
            var registros = JSON.parse(respuesta);
            window.open(base_url+'factura/imprimir/'+registros['id_fact'], '_blank'); 

            },
            error: function(respuesta){
              alert('Esta lectura no tiene una factura cancelada');
            }
        }); 
        }  
        }
}

function reimprimir()
{
    var base_url    = document.getElementById('base_url').value;
    var factura_id    = document.getElementById('factura_id').value;
    if (factura_id=='') {
         alert('No selecciono ninguna factura.');   
    }else{
         window.open(base_url+'factura/imprimir/'+factura_id, '_blank'); 
    }  
}


function anular()
{
    var base_url    = document.getElementById('base_url').value;
    var factura_id    = document.getElementById('factura_id').value;
    var controlador = base_url+"factura/anular";
    var id_asoc = document.getElementById('id_asoc').value;
    $.ajax({url: controlador,
            type:"POST",
            data:{factura_id:factura_id},
            success:function(respuesta){
              
            alert('Factura Anulada con Exito'); 
            $("#modaleliminar").modal('hide');
            var nada = "";
                $("#lista_pendientes").html(nada);
                $("#detalle_factura").html(nada);
                $("#detalle_recargo").html(nada);
                facturas_pendientes(id_asoc);
             

            },
            error: function(respuesta){
              alert('Esta Factura no se puede Anular');
            }
        });
   
}


function total_pendientes(asociado)
{
        var base_url    = document.getElementById('base_url').value;
        var controlador = base_url+"factura/total_pendiente";
        $.ajax({url: controlador,
            type:"POST",
            data:{asociado:asociado},
            success:function(respuesta){
                
           var registros = JSON.parse(respuesta);
           
                $("#total_pendientes").html('Pendientes: '+Number(registros).toFixed(2));
             

            },
            error: function(respuesta){
              alert('Esta Factura no se puede Anular');
            }
        });
}

function facturan()
{
    
    var facturan = document.getElementById('generar_factura').checked;
    //alert(facturan);
    if (facturan==true) {
            document.getElementById('facturan').style.display = 'block';
                                         
    }else{
            document.getElementById('facturan').style.display = 'none';         
    }
}
