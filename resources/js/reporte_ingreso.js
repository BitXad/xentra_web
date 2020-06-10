$(document).on("ready",inicio);
function inicio(){
  buscar_por_fecha();
}

function convertDateFormat(string){
    var info = "";
    if(string != null){
       info = string.split('-').reverse().join('/');
   }
    return info;
}
/*aumenta un cero a un digito; es para las horas*/
function aumentar_cero(num){
    if (num < 10) {
        num = "0" + num;
    }
    return num;
}
function formatofecha_hora(string){
    var mifh = new Date(string);
    var info = "";
    

    if(string != null){
       info = mifh.getDate()+"/"+(mifh.getMonth()+1)+"/"+mifh.getFullYear()+" "+aumentar_cero(mifh.getHours())+":"+aumentar_cero(mifh.getMinutes())+":"+aumentar_cero(mifh.getSeconds());
   }
    return info;
}
    
function buscar_por_fecha(){

    var fecha_desde = document.getElementById('fecha_desde').value;
    var fecha_hasta = document.getElementById('fecha_hasta').value;
    var usuario = document.getElementById('buscarusuario_id').value;
    var estado_id = document.getElementById('estado_id').value;
    var orden_por = document.getElementById('ordenado_por').value;
    
    fechabusquedaingegr(fecha_desde, fecha_hasta, usuario, estado_id,orden_por);

}
function numberFormat(numero){
        // Variable que contendra el resultado final
        var resultado = "";
 
        // Si el numero empieza por el valor "-" (numero negativo)
        if(numero[0]=="-")
        {
            // Cogemos el numero eliminando los posibles puntos que tenga, y sin
            // el signo negativo
            nuevoNumero=numero.replace(/\,/g,'').substring(1);
        }else{
            // Cogemos el numero eliminando los posibles puntos que tenga
            nuevoNumero=numero.replace(/\,/g,'');
        }
 
        // Si tiene decimales, se los quitamos al numero
        if(numero.indexOf(".")>=0)
            nuevoNumero=nuevoNumero.substring(0,nuevoNumero.indexOf("."));
 
        // Ponemos un punto cada 3 caracteres
        for (var j, i = nuevoNumero.length - 1, j = 0; i >= 0; i--, j++)
            resultado = nuevoNumero.charAt(i) + ((j > 0) && (j % 3 == 0)? ",": "") + resultado;
 
        // Si tiene decimales, se lo añadimos al numero una vez forateado con 
        // los separadores de miles
        if(numero.indexOf(".")>=0)
            resultado+=numero.substring(numero.indexOf("."));
 
        if(numero[0]=="-")
        {
            // Devolvemos el valor añadiendo al inicio el signo negativo
            return "-"+resultado;
        }else{
            return resultado;
        }
}



function fechabusquedaingegr(fecha_desde, fecha_hasta, usuario, estado_id, orden_por){
    var base_url    = document.getElementById('base_url').value;
    var controlador = base_url+"reportes/buscarlosingresos";
     /*var limite = 1000; */
    document.getElementById('loader').style.display = 'block'; //muestra el bloque del loader
    $.ajax({url: controlador,
           type:"POST",
           data:{fecha1:fecha_desde, fecha2:fecha_hasta, usuario_id:usuario, esteestado:estado_id, orden_por:orden_por},
          
           success:function(resul){
              
                            
                $("#resingegr").val("- 0 -");
               var registros =  JSON.parse(resul);
           
               if (registros != null){
                    var fecha1 = fecha_desde;
                    var fecha2 = fecha_hasta;
                    var esusuario =  $('#buscarusuario_id option:selected').text();
                    if(!(fecha_desde == null || fecha_desde =="") && !(fecha_hasta == null  || fecha_hasta =="")){
                        fecha1 = "Desde: "+moment(fecha_desde).format("DD/MM/YYYY");
                        fecha2 = " - Hasta: "+moment(fecha_hasta).format("DD/MM/YYYY");
                    }else if(!(fecha_desde == null || fecha_desde =="") && (fecha_desde == null || fecha_hasta =="")){
                        fecha1 = "De: "+moment(fecha_desde).format("DD/MM/YYYY");
                        fecha2 = "";
                    }else if((fecha_desde == null || fecha_desde =="") && !(fecha_hasta == null || fecha_hasta =="")){
                        fecha1 = "";
                        fecha2 = "De: "+moment(fecha_hasta).format("DD/MM/YYYY");
                    }else{
                        fecha1 = "";
                        fecha2 = "";
                    }
                    
                    var totalingreso    = 0;
                    var totalconsumomt3 = 0;
                    var totalconsumo    = 0;
                    var totalaportes    = 0;
                    var totalrecargo    = 0;

                    var n = registros.length; //tamaño del arreglo de la consulta
                    $("#resingegr").val("- "+n+" -");
                   
                    html = "";
                    cabecerahtml= "";
                    
                    var cont = 1;
                    for (var i = 0; i < n ; i++){
                        totalingreso  += parseFloat(registros[i]['montototal_fact']);
                        totalconsumomt3 += parseFloat(registros[i]['consumo_lec']);
                        totalconsumo  += parseFloat(registros[i]['totalcons_lec']);
                        totalaportes  += parseFloat(registros[i]['totalaportes_fact']);
                        totalrecargo  += parseFloat(registros[i]['totalrecargos_fact']);
                        //totalegreso   += parseFloat(registros[i]['egreso']);
                        //totalutilidad += parseFloat(registros[i]['utilidad']);
                        
                            html += "<tr>";
                            html += "<td>"+(i+1)+"</td>";
                            html += "<td class='text-right'>"+registros[i]["codigo_asoc"]+"</td>";
                            html += "<td class='text-left'>"+registros[i]["nombres_asoc"]+" "+registros[i]["apellidos_asoc"]+"</td>";
                            html += "<td class='text-right'>"+registros[i]["mes_lec"]+"/"+registros[i]["gestion_lec"]+"</td>";
                            html += "<td class='text-center'>";
                            if(registros[i]["estado_fact"] != "PENDIENTE"){
                                html += registros[i]["num_fact"]+"/"+registros[i]["id_lec"];
                            }else{
                                html += registros[i]["estado_fact"];
                            }
                            html += "</td>";
                            html += "<td class='text-center'>"+registros[i]["actual_lec"]+" - "+registros[i]["anterior_lec"]+" = "+registros[i]["consumo_lec"]+"</td>";
                            html += "<td class='text-right'>"+Number(registros[i]["totalcons_lec"]).toFixed(2)+"</td>";
                            html += "<td class='text-right'>"+Number(registros[i]["totalaportes_fact"]).toFixed(2)+"</td>";
                            html += "<td class='text-right'>"+Number(registros[i]["totalrecargos_fact"]).toFixed(2)+"</td>";
                            html += "<td class='text-right'>"+Number(registros[i]["montototal_fact"]).toFixed(2)+"</td>";
                            //html += "<td id='alinearder'>"+numberFormat(Number(registros[i]["ingreso"]).toFixed(2))+"</td>";
                            html += "</tr>";
                    }

                   htmls = "";
                   htmls += "<tr>";
                   htmls += "<td colspan='5'></td>";
                   htmls += "<td class='text-right'>"+numberFormat(Number(totalconsumomt3).toFixed(2))+"</td>";
                   htmls += "<td class='text-right'>"+numberFormat(Number(totalconsumo).toFixed(2))+"</td>";
                   htmls += "<td class='text-right'>"+numberFormat(Number(totalaportes).toFixed(2))+"</td>";
                   htmls += "<td class='text-right'>"+numberFormat(Number(totalrecargo).toFixed(2))+"</td>";
                   htmls += "</tr>";
                   htmls += "<tr>";
                   htmls += "<td colspan='6'></td>";
                   htmls += "<td class='text-right' colspan='3' class='esbold' style='font-family: Arial; font-size: 12px'>TOTAL Bs.</td>";
                   htmls += "<td class='text-right' class='esbold' style='font-family: Arial; font-size: 12px'>"+numberFormat(Number(totalingreso).toFixed(2))+"</td>";
                   htmls += "<tr>";

                   $('#elusuario').html("Usuario: "+esusuario);
                   $('#fecha1impresion').html(fecha1);
                   $('#fecha2impresion').html(fecha2);
                   
                    cabecerahtmlt = "<table class='table table-striped table-condensed' id='mitabladetimpresion' style='width: 100%'>";
                    cabecerahtmlt += "<tr>";
                    cabecerahtmlt += "<th class='text-center' style='width: 2%'>N°</th>";
                    cabecerahtmlt += "<th class='text-center' style='width: 5%'>CODIGO</th>";
                    cabecerahtmlt += "<th class='text-center' style='width: 43%'>NOMBRE COMPLETO</th>";
                    cabecerahtmlt += "<th class='text-center' style='width: 15%'>GESTIÓN</th>";
                    cabecerahtmlt += "<th class='text-center' style='width: 15%'>N°<br>FACT/LECT.</th>";
                    cabecerahtmlt += "<th class='text-center' style='width: 17%'>CONSUMO<br> mt<sup>3</sup></th>";
                    cabecerahtmlt += "<th class='text-center' style='width: 17%'>CONSUMO<br>Bs.</th>";
                    cabecerahtmlt += "<th class='text-center' style='width: 17%'>APORTES<br>Bs.</th>";
                    cabecerahtmlt += "<th class='text-center' style='width: 17%'>RECARG.<br>Bs.</th>";
                    cabecerahtmlt += "<th class='text-center' style='width: 17%'>TOTAL<br>Bs.</th>";
                    cabecerahtmlt += "</tr>";
                    cabecerahtmlt += "<tbody>";
                    
                    piehtmlt = "</tbody></table></div></div>";
                   
                   $("#tablatotalresultados").html(cabecerahtmlt+html+htmls+piehtmlt);
                   
                   document.getElementById('loader').style.display = 'none';
            }
        document.getElementById('loader').style.display = 'none'; //ocultar el bloque del loader
        },
        error:function(resul){
          // alert("Algo salio mal...!!!");
           html = "";
           $("#tablatotalresultados").html(html);
        },
        complete: function (jqXHR, textStatus) {
            document.getElementById('loader').style.display = 'none'; //ocultar el bloque del loader
        }
        
    });   

}

function porformapago(fecha_desde, fecha_hasta, usuario, formapago, nombre1, nombre2){
    var base_url    = document.getElementById('base_url').value;
    var controlador = base_url+"reportes/reportesformapago";
    var tipoformapago = "";
    if(formapago == 1){
        tipoformapago = 1;
    }else if(formapago == 2){
        tipoformapago = 2;
    }else if(formapago == 3){
        tipoformapago = 3;
    }else if(formapago == 4){
        tipoformapago = 4;
    }else if(formapago == 5){
        tipoformapago = 5;
    }else if(formapago == 61){
        tipoformapago = 61;
    }
    
     /*var limite = 1000; */
     
    $.ajax({url: controlador,
           type:"POST",
           data:{fecha1:fecha_desde, fecha2:fecha_hasta, usuario_id:usuario, formapago: tipoformapago},
          
           success:function(resul){
              
                            
                //$("#resingegr").val("- 0 -");
               var registros =  JSON.parse(resul);
           
               if (registros != null){
                   
                    var totalingreso = 0;
                    //var totalegreso = 0;
                    var totalutilidad = 0;

                    var n = registros.length; //tamaño del arreglo de la consulta
                    //$("#resingegr").val("- "+n+" -");
                   
                    html = "";
                    html1 = "";
                    cabecerahtml1= "";
                    
                    var cont = 1;
                    for (var i = 0; i < n ; i++){
                      totalingreso  += parseFloat(registros[i]['ingreso']);
                      //totalegreso   += parseFloat(registros[i]['egreso']);
                      totalutilidad += parseFloat(registros[i]['utilidad']);
                        html += "<tr>";
                      
                        html += "<td>"+cont+"</td>";
                        
                       html += "<td>"+formatofecha_hora(registros[i]["fecha"])+"</td>";
                       html += "<td>"+registros[i]["detalle"]+"</td>";
                       html += "<td id='alinearder'>"+numberFormat(Number(registros[i]["ingreso"]).toFixed(2))+"</td>";
                    //   html += "<td id='alinearder'>"+numberFormat(Number(registros[i]["egreso"]).toFixed(2))+"</td>";
                       //html += "<td id='alinearder'>"+numberFormat(Number(registros[i]["utilidad"]).toFixed(2))+"</td>";

                       
                       
                        html += "</tr>";
                       cont += 1;
                   }

                    /* *****************INICIO para reporte TOTAL****************** */
                    var colorletra = "";
                    if(formapago !=1){
                        colorletra = "text-red";
                    }
                    cabecerahtml= "<table style='width:100%;' class='table table-striped table-condensed' id='tablasinespacio'><tr><td style='width:5%;'><a href='#' id='mosv"+formapago+"' onclick='mostrar"+formapago+"(); return false'>+</a></td><td style='width:61%;'>"+nombre1+": </td><td style='width:17%;'  id='alinearder'><span id='parasum"+formapago+"' class='"+colorletra+"'>"+numberFormat(Number(totalingreso).toFixed(2))+"</span></td><td style='width:17%;' id='alinearder'></td></tr>"+"</table>";
            //                "<tr><td style='width:5%;'></td><td style='width:60%;'>"+nombre2+": </td><td style='width:35%;' id='alinearder'>"+numberFormat(Number(totalutilidad).toFixed(2))+"</td></tr></table>";
                    //cabecerahtml2= "<label  class='control-label col-md-12'><div class='col-md-1'><a href='#' id='mosventa'onclick='mostrarventa(); return false'>+</a></div><div class='col-md-6'>Ingreso de Ventas: </div><div class='col-md-4'>"+numberFormat(Number(totalingreso2).toFixed(2))+"; &nbsp; &nbsp;Utilidad: "+numberFormat(Number(totalutilidad2).toFixed(2))+"</div><div class='col-md-3'></div></label>";
                    cabecerahtml += "<div id='ocultov"+formapago+"' style='visibility:hidden; width: 0; height: 0;'>";
                    cabecerahtml += "<div id='mapv"+formapago+"'>";
                    
                    cabecerahtml += "<table class='table table-striped table-condensed' id='mitabladetimpresion'>";
                    cabecerahtml += "<tr>";
                    cabecerahtml += "<th>N°</th>";
                    cabecerahtml += "<th>Fecha</th>";
                    cabecerahtml += "<th>Detalle</th>";
                    cabecerahtml += "<th>Ingreso</th>";
                //    cabecerahtml += "<th>Utilidad</th>";
                    cabecerahtml += "</tr>";
                    
                    piehtml = "</table></div></div>";
                    /* *****************F I N para reporte TOTAL****************** */
                   $("#tablaformapagoresultados"+formapago).html(cabecerahtml+html+piehtml);
                   return totalingreso;
            }
                
        },
        error:function(resul){
          // alert("Algo salio mal...!!!");
           html = "";
           $("#tablaformapagoresultados"+formapago).html(html);
        }
        
    });   

}
