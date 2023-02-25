$(document).on("ready",inicio);
function inicio(){
  //buscar_consumosocios();
}

function buscar_consumosocios(){
    var base_url    = document.getElementById('base_url').value;
    var controlador = base_url+"reportes/buscarlosconsumos";
    
    var mes = document.getElementById('este_mes').value;
    var gestion = document.getElementById('esta_gestion').value;
    var tipo_asoc = document.getElementById('tipo_asoc').value;
    var servicios_asoc = document.getElementById('servicios_asoc').value;
    var desde = document.getElementById('consumo_desde').value;
    var hasta = document.getElementById('consumo_hasta').value;
    
    document.getElementById('loader').style.display = 'block'; //muestra el bloque del loader
    $.ajax({url: controlador,
           type:"POST",
           data:{mes:mes, gestion:gestion, tipo_asoc:tipo_asoc, servicios_asoc:servicios_asoc,
                 desde:desde, hasta:hasta},
           success:function(resul){
                $("#resingegr").val("- 0 -");
               var registros =  JSON.parse(resul);
               
               if (registros != null){
                    /*var fecha1 = fecha_desde;
                    var fecha2 = fecha_hasta;
                    var esusuario =  $('#buscarusuario_id option:selected').text();
                    var esdirecion =  $('#nombre_dir option:selected').text();
                    fecha1 = "<span class='text-bold'>Desde: </span>"+moment(fecha_desde).format("DD/MM/YYYY");
                    fecha2 = "<span class='text-bold'>Hasta: </span>"+moment(fecha_hasta).format("DD/MM/YYYY");
                    */
                    var totalconsumo    = 0;
                    
                    var n = registros.length; //tamaño del arreglo de la consulta
                    $("#resingegr").val("- "+n+" -");
                   
                    html = "";
                    cabecerahtml= "";
                    
                    for (var i = 0; i < n ; i++){
                        totalconsumo  += parseFloat(registros[i]['elconsumo']);
                        
                            html += "<tr class='labjf'>";
                            html += "<td class='text-center' style='padding: 0px 5px !important'>"+(i+1)+"</td>";
                            html += "<td class='text-right' style='padding: 0px 5px !important'>"+registros[i]["codigo_asoc"]+"</td>";
                            html += "<td class='text-left' style='padding: 0px 5px !important'>"+registros[i]["apellidos_asoc"]+" "+registros[i]["nombres_asoc"]+"</td>";
                            html += "<td class='text-right' style='padding: 0px 5px !important'>"+registros[i]["mes_lec"]+"/"+registros[i]["gestion_lec"]+"</td>";
                            html += "<td class='text-center lizq' style='padding: 0px 5px !important'>"+registros[i]["ci_asoc"]+"</td>";
                            html += "<td class='text-center lizq' style='padding: 0px 5px !important'>"+registros[i]["servicio"]+"</td>";
                            html += "<td class='text-center lizq' style='padding: 0px 5px !important'>"+numberFormat(Number(registros[i]["elconsumo"]).toFixed(2))+"</td>";
                            html += "</tr>";
                    }
                    cabecerahtmlt = "<table class='table1 table-striped table-condensed' id='mitabladetimpresion' style='width: 100%; font-family: Arial !important;'>";
                    cabecerahtmlt += "<tr class='boxtabla'>";
                    cabecerahtmlt += "<th class='text-center' style='width: 2%; padding: 1px; vertical-align: middle'>N°</th>";
                    cabecerahtmlt += "<th class='text-center' style='width: 5%; padding: 1px; vertical-align: middle'>CODIGO</th>";
                    cabecerahtmlt += "<th class='text-center' style='width: 33%; padding: 1px; vertical-align: middle'>NOMBRE COMPLETO</th>";
                    cabecerahtmlt += "<th class='text-center' style='width: 15%; padding: 1px; vertical-align: middle'>GESTIÓN</th>";
                    cabecerahtmlt += "<th class='text-center' style='width: 10%; padding: 1px; vertical-align: middle'>DOC.<br>IDENTIDAD</th>";
                    cabecerahtmlt += "<th class='text-center lizq' style='width: 20%; padding: 1px; vertical-align: middle'>SERVICIO</th>";
                    cabecerahtmlt += "<th class='text-center lizq' style='width: 10%; padding: 1px; vertical-align: middle'>CONSUMO<br>Bs.</th>";
                    cabecerahtmlt += "</tr>";
                    cabecerahtmlt += "<tbody>";
                    
                    htmls = "";
                    htmls += "<tr class='larrf lizq1'>";
                    htmls += "<td colspan='6'></td>";
                    htmls += "<td class='text-right'><span id='elrecargototal'>"+numberFormat(Number(totalconsumo).toFixed(2))+"</span></td>";
                    htmls += "</tr>";
                    htmls += "<tr>";
                    htmls += "<td class='lizq1' colspan='2'></td>";
                    htmls += "<td class='lizq1'><br><br></td>";
                    //htmls += "<td class='larrf' colspan='2'></td>";
                    htmls += "<td class='larrf text-right text-bold' colspan='3' style='font-family: Arial; font-size: 15px; !important'>TOTAL Bs.</td>";
                    htmls += "<td class='larrf text-right text-bold' style='font-family: Arial; font-size: 15px; !important'><span id='eltotal'>"+numberFormat(Number(totalconsumo).toFixed(2))+"</span></td>";
                    htmls += "</tr>";
                    htmls += "<tr>";
                    htmls += "<td class='larrf' colspan='2'></td>";
                    htmls += "<td class='text-center lizq1'>"; //<div style='font-size: 10px; width: 60%'>";
                    htmls += "________________________<br>FIRMA RESPONSABLE";
                    //htmls += "</div>";
                    htmls += "</td>";
                    htmls += "<td colspan='4'></td>";
                    htmls += "</tr>";
                    
                    $('#lagestion').html("<span class='text-bold'>Gesti&oacute;n: </span>"+mes+"/"+gestion);
                    //$('#ladireccion').html("<span class='text-bold'>Dirección: </span>"+esdirecion);
                    $('#elrango').html("<span class='text-bold'>De: "+desde+" Bs. a: "+hasta+" Bs.</span>");
                    
                    piehtmlt = "</tbody></table></div></div>";
                   
                    $("#tablatotalresultados").html(cabecerahtmlt+html+htmls+piehtmlt);
                    /*for (var i = 0; i < n ; i++){
                        if(registros[i]["estado_fact"] == "PENDIENTE"){
                            buscartotaporte(registros[i]["id_fact"], registros[i]["id_lec"]);
                        }
                    }*/
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


/* busca el total adeudado (RECARGOS) de una determinada factura/lectura */
function buscartotaporte(factura,lectura)
{
    var base_url    = document.getElementById('base_url').value;
    var controlador = base_url+"factura/datos_factura";
    $.ajax({url: controlador,
            type:"POST",
            data:{factura:factura,lectura:lectura},
            success:function(respuesta){
                
                var registros = JSON.parse(respuesta);
                var consumos = (Number(registros.consumo).toFixed(2));
                var multas = (Number(registros.multa).toFixed(2));
                var recargos = (Number(registros.recargo).toFixed(2));
                if(recargos >0){
                    var totalparcial = Number(consumos)+Number(multas)+Number(recargos);
                    var totalrecargoc = $("#elrecargototal").html();
                    var totalrecargo  = totalrecargoc.replace(/,/gi, "");
                    var totalc = $("#eltotal").html();
                    var total  = totalc.replace(/,/gi, "");
                    $("#totaporte"+lectura).html(recargos);
                    $("#estetotal"+lectura).html(Number(totalparcial).toFixed(2));
                    //alert(Number(totalparcial).toFixed(2));
                    $("#elrecargototal").html(numberFormat(Number(Number(totalrecargo)+Number(recargos)).toFixed(2)));
                    $("#eltotal").html(numberFormat(Number(Number(total)+Number(recargos)).toFixed(2)));
                }
                
            },
            error: function(respuesta){
              //alert('Error inesperado, consulte a su tecnico!.');
            }
        });
}

