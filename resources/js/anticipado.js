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
    }
}

function buscar_asociados(){
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+"anticipado/buscar_asociados";
    var apellido = document.getElementById('apellido').value;
    var nombre = document.getElementById('nombre').value;
    var ci = document.getElementById('ci').value;
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
                html += "<tbody id='tabla_resultados'>";
                html += "</tr>";
                
                for(var i = 0; i<fin; i++)
                {
                    html += "<tr onclick='ver_facturas("+JSON.stringify(registros[i])+"); ocultar_tabla()'>";               
                    //html += "<tr onclick='ver_facturas("+JSON.stringify(registros[i])+")'>";               
                    html += "<td>"+(i+1)+"</td>";
                    html += "<td>"+registros[i]["apellidos_asoc"]+"</td>";  
                    html += "<td>"+registros[i]["nombres_asoc"]+"</td>";
                    html += "<td align='center'>"+registros[i]["codigo_asoc"]+"</td>";
                    html += "<td align='center'>"+registros[i]["ci_asoc"]+"</td>";
                    html += "<td>"+registros[i]["direccion_asoc"]+"</td>";
                    html += "<td align='center'>"+registros[i]["telefono_asoc"]+"</td>";  
                    html += "<td align='center'>"+registros[i]["nit_asoc"]+"</td>";  
                    html += "<td>"+registros[i]["razon_asoc"]+"</td>";
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

function ver_facturas(respuesta){
    var registros =  respuesta;
    //var registros = eval(respuesta);
    if (registros!=null){
        //var id_asoc = registros["id_asoc"];
        $("#nombre").val(registros["nombres_asoc"]);
        $("#apellido").val(registros["apellidos_asoc"]);
        $("#ci").val(registros["ci_asoc"]);
        $("#id_asoc").val(registros["id_asoc"]);
        $("#nit_asoc").val(registros["nit_asoc"]);
        $("#razon_asoc").val(registros["razon_asoc"]);
        facturas_pendientes(respuesta);
    }
}

function ocultar_tabla(){
    var html = "";
    $("#mitabla_xs").html(html);
}

function facturas_pendientes(larespuesta){
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+"anticipado/buscar_pendientes";
    var asociado = larespuesta["id_asoc"];
    var estado = "PENDIENTE";
    //var estado = document.getElementById('estado').value;
        $.ajax({url: controlador,
            type:"POST",
            data:{asociado:asociado, estado:estado},
            success:function(respuesta){
                var registros = JSON.parse(respuesta);
                if (registros =='') {
                    $("#elservicio").css("display", "block");
                    $("#lagestion").css("display", "block");
                    //$("#lecturaanterior").css("display", "block");
                    $("#servicios_asoc").html(larespuesta["servicios_asoc"]);
                    ultima_lectura(asociado);
                }else{
                    $("#servicios_asoc").html("");
                    $("#elservicio").css("display", "none");
                    $("#lagestion").css("display", "none");
                    $("#lecturaanterior").html("");
                    $("#lecturaanterior").css("display", "none");
                    alert('El Asociado Tiene Facturas '+estado+', no puede realizar pagos anticipados!');
                }

            },
            error: function(respuesta){
              alert('No existen Facturas Pendientes');
            }
        });
}

function ultima_lectura(id_asoc)
{
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+"anticipado/buscar_ultimalectura";
        $.ajax({url: controlador,
            type:"POST",
            data:{id_asoc:id_asoc},
            success:function(respuesta){
                var registros = JSON.parse(respuesta);
                html1 = "";
                html2 = "";
                html3 = "";
                //html4 = "";
                if (registros !='') {
                    html1 += "<div class='box-body table-responsive' style='padding: 0px'>";
                    html1 += "<table class='table table-striped table-condensed'>";
                    html1 += "<tr>";
                    html1 += "<td align='center'>Lectura Anterior (mts<sup>3</sup>)</td>";
                    html1 += "<td align='center' style='background-color: #558cf2'>"+registros[0]["actual_lec"]+"</td>";
                    html1 += "<td align='center' style='background-color: #36396e; color: white'>"+registros[0]["mes_lec"]+"</td>";
                    html1 += "<td align='center' style='background-color: #36396e; color: white'>"+registros[0]["gestion_lec"]+"</td>";
                    html1 += "</tr>";
                    html1 += "<tr>";
                    html1 += "<td align='center' style='background-color: #f0f0f5'>Lectura Promedio Mes (mts<sup>3</sup>)</td>";
                    html1 += "<td align='center' style='background-color: #558cf2'>";
                    html1 += "<input type='number' step='any' min='0' val='0' name='elpromedio' id='elpromedio' />";
                    html1 += "</td>";
                    html1 += "<td align='center' style='background-color: #36396e; color: white'><span id='promediobs'>0</span></td>";
                    html1 += "<td></td>";
                    html1 += "</tr>";
                    html1 += "</table>";
                    html1 += "</div>";                    
                    
                    html2 += "<div class='col-md-6 box-body table-responsive' style='padding: 0px'>";
                    html2 += "<table class='table table-striped table-condensed' style='width: 80%'>";
                    html2 += "<tr>";
                    html2 += "<th style='padding: 0px' class='text-center' colspan='2'>Mes</th>";
                    html2 += "<th style='padding: 0px' class='text-center'>Monto Bs.</th>";
                    html2 += "</tr>";
                    html2 += "<tr>";
                    html2 += "<td style='padding-top: 0px; padding-bottom: 0px'><input type='checkbox' id='mes1' name='mes[]' value='1' /></td>";
                    html2 += "<td style='padding-top: 0px; padding-bottom: 0px'>Enero</td>";
                    html2 += "<td style='padding-top: 0px; padding-bottom: 0px'><input type='number' step='any' min='0' val='0.00' name='m1' id='m1' /></td>";
                    html2 += "</tr>";
                    html2 += "<tr>";
                    html2 += "<td style='padding-top: 0px; padding-bottom: 0px'><input type='checkbox' id='mes2' name='mes[]' value='2' /></td>";
                    html2 += "<td style='padding-top: 0px; padding-bottom: 0px'>Febrero</td>";
                    html2 += "<td style='padding-top: 0px; padding-bottom: 0px'><input type='number' step='any' min='0' val='0.00' name='m2' id='m2' /></td>";
                    html2 += "</tr>";
                    html2 += "<tr>";
                    html2 += "<td style='padding-top: 0px; padding-bottom: 0px'><input type='checkbox' id='mes3' name='mes[]' value='3' /></td>";
                    html2 += "<td style='padding-top: 0px; padding-bottom: 0px'>Marzo</td>";
                    html2 += "<td style='padding-top: 0px; padding-bottom: 0px'><input type='number' step='any' min='0' val='0.00' name='m3' id='m3' /></td>";
                    html2 += "</tr>";
                    html2 += "<tr>";
                    html2 += "<td style='padding-top: 0px; padding-bottom: 0px'><input type='checkbox' id='mes4' name='mes[]' value='4' /></td>";
                    html2 += "<td style='padding-top: 0px; padding-bottom: 0px'>Abril</td>";
                    html2 += "<td style='padding-top: 0px; padding-bottom: 0px'><input type='number' step='any' min='0' val='0.00' name='m4' id='m4' /></td>";
                    html2 += "</tr>";
                    html2 += "<tr>";
                    html2 += "<td style='padding-top: 0px; padding-bottom: 0px'><input type='checkbox' id='mes5' name='mes[]' value='5' /></td>";
                    html2 += "<td style='padding-top: 0px; padding-bottom: 0px'>Mayo</td>";
                    html2 += "<td style='padding-top: 0px; padding-bottom: 0px'><input type='number' step='any' min='0' val='0.00' name='m5' id='m5' /></td>";
                    html2 += "</tr>";
                    html2 += "<tr>";
                    html2 += "<td style='padding-top: 0px; padding-bottom: 0px'><input type='checkbox' id='mes6' name='mes[]' value='6' /></td>";
                    html2 += "<td style='padding-top: 0px; padding-bottom: 0px'>Junio</td>";
                    html2 += "<td style='padding-top: 0px; padding-bottom: 0px'><input type='number' step='any' min='0' val='0.00' name='m6' id='m6' /></td>";
                    html2 += "</tr>";
                    html2 += "</table>";
                    html2 += "</div>";
                    
                    html3 += "<div class='col-md-6 box-body table-responsive' style='padding: 0px'>";
                    html3 += "<table class='table table-striped table-condensed'>";
                    html3 += "<tr>";
                    html3 += "<th style='padding: 0px' class='text-center' colspan='2'>Mes</th>";
                    html3 += "<th style='padding: 0px' class='text-center'>Monto Bs.</th>";
                    html3 += "</tr>";
                    html3 += "<tr>";
                    html3 += "<td style='padding-top: 0px; padding-bottom: 0px'><input type='checkbox' id='mes7' name='mes[]' value='7' /></td>";
                    html3 += "<td style='padding-top: 0px; padding-bottom: 0px'>Julio</td>";
                    html3 += "<td style='padding-top: 0px; padding-bottom: 0px'><input type='number' step='any' min='0' val='0.00' name='m7' id='m7' /></td>";
                    html3 += "</tr>";
                    html3 += "<tr>";
                    html3 += "<td style='padding-top: 0px; padding-bottom: 0px'><input type='checkbox' id='mes8' name='mes[]' value='8' /></td>";
                    html3 += "<td style='padding-top: 0px; padding-bottom: 0px'>Agosto</td>";
                    html3 += "<td style='padding-top: 0px; padding-bottom: 0px'><input type='number' step='any' min='0' val='0.00' name='m8' id='m8' /></td>";
                    html3 += "</tr>";
                    html3 += "<tr>";
                    html3 += "<td style='padding-top: 0px; padding-bottom: 0px'><input type='checkbox' id='mes9' name='mes[]' value='9' /></td>";
                    html3 += "<td style='padding-top: 0px; padding-bottom: 0px'>Septiembre</td>";
                    html3 += "<td style='padding-top: 0px; padding-bottom: 0px'><input type='number' step='any' min='0' val='0.00' name='m9' id='m9' /></td>";
                    html3 += "</tr>";
                    html3 += "<tr>";
                    html3 += "<td style='padding-top: 0px; padding-bottom: 0px'><input type='checkbox' id='mes10' name='mes[]' value='10' /></td>";
                    html3 += "<td style='padding-top: 0px; padding-bottom: 0px'>Octubre</td>";
                    html3 += "<td style='padding-top: 0px; padding-bottom: 0px'><input type='number' step='any' min='0' val='0.00' name='m10' id='m10' /></td>";
                    html3 += "</tr>";
                    html3 += "<tr>";
                    html3 += "<td style='padding-top: 0px; padding-bottom: 0px'><input type='checkbox' id='mes11' name='mes[]' value='11' /></td>";
                    html3 += "<td style='padding-top: 0px; padding-bottom: 0px'>Noviembre</td>";
                    html3 += "<td style='padding-top: 0px; padding-bottom: 0px'><input type='number' step='any' min='0' val='0.00' name='m11' id='m11' /></td>";
                    html3 += "</tr>";
                    html3 += "<tr>";
                    html3 += "<td style='padding-top: 0px; padding-bottom: 0px'><input type='checkbox' id='mes12' name='mes[]' value='12' /></td>";
                    html3 += "<td style='padding-top: 0px; padding-bottom: 0px'>Diciembre</td>";
                    html3 += "<td style='padding-top: 0px; padding-bottom: 0px'><input type='number' step='any' min='0' val='0.00' name='m12' id='m12' /></td>";
                    html3 += "</tr>";
                    html3 += "</table>";
                    html3 += "</div>";
                    
                    /*html4 += "<table>";
                    html4 += "<tr>";
                    html4 += "<td style='padding-top: 0px; padding-bottom: 0px'><input type='checkbox' id='multasrec' name='multasrec' value='13' /></td>";
                    html4 += "<td style='padding-top: 0px; padding-bottom: 0px'>Aportes/Multas</td>";
                    html4 += "</tr>";
                    html4 += "</table>";*/
                    $("#lecturaanterior").html(html1);
                    $("#lecturaanterior").css("display", "block");
                    $("#mespara_cobro").html(html2+html3);
                    $("#mespara_cobro").css("display", "block");
                }else{
                    $("#lecturaanterior").html("");
                    $("#lecturaanterior").css("display", "none");
                    alert('El Asociado no tiene lectura anterior!.');
                }

            },
            error: function(respuesta){
              alert('No existen Lecturas');
            }
        });
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
                alert('COBRO REALIZADO CON EXITO');
                if (imprimir_factura==true) {
                    window.open(base_url+"factura/imprimir_factura/0/"+factura_id, '_blank'); //factura original
                    window.open(base_url+"factura/imprimir_factura/1/"+factura_id, '_blank'); //factura copia
//                    window.open(base_url+"factura/copia/"+factura_id, '_blank');
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
            }else{
                alert("Informacion Incorrecta, revise sus datos, consumo y total no pueden ser 0");
            }
            
            },

            error:function(respuesta){          

               alert('No tiene una factura seleccionada');
        
            }                

    }); 





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
