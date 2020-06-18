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
    var nom_categr = document.getElementById('nom_categr').value;
    var orden_por = document.getElementById('ordenado_por').value;
    
    fechabusquedaingegr(fecha_desde, fecha_hasta, usuario, nom_categr, orden_por);

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

function fechabusquedaingegr(fecha_desde, fecha_hasta, usuario, nom_categr, orden_por){
    var base_url    = document.getElementById('base_url').value;
    var controlador = base_url+"reportes/buscarlosegresos";
    document.getElementById('loader').style.display = 'block'; //muestra el bloque del loader
    $.ajax({url: controlador,
           type:"POST",
           data:{fecha1:fecha_desde, fecha2:fecha_hasta, usuario_id:usuario, nom_categr:nom_categr,
                 orden_por:orden_por},
          
           success:function(resul){
                $("#resingegr").val("- 0 -");
               var registros =  JSON.parse(resul);
           
               if (registros != null){
                    var fecha1 = fecha_desde;
                    var fecha2 = fecha_hasta;
                    var esusuario =  $('#buscarusuario_id option:selected').text();
                    var escategoria =  $('#nom_categr option:selected').text();
                    fecha1 = "<span class='text-bold'>Desde: </span>"+moment(fecha_desde).format("DD/MM/YYYY");
                    fecha2 = "<span class='text-bold'>Hasta: </span>"+moment(fecha_hasta).format("DD/MM/YYYY");
                    
                    var totalegreso    = 0;

                    var n = registros.length; //tamaño del arreglo de la consulta
                    $("#resingegr").val("- "+n+" -");
                   
                    html = "";
                    cabecerahtml= "";
                    
                    for (var i = 0; i < n ; i++){
                        totalegreso += parseFloat(registros[i]['monto_egr']);
                        html += "<tr class='labjf'>";
                        html += "<td class='text-center' style='padding: 0px 5px !important'>"+(i+1)+"</td>";
                        html += "<td class='text-right' style='padding: 0px 5px !important'>"+registros[i]["id_egr"]+"</td>";
                        html += "<td class='text-left' style='padding: 0px 5px !important'>"+registros[i]["nombre_egr"]+"</td>";
                        html += "<td class='text-center' style='padding: 0px 5px !important'>"+registros[i]["detalle_egr"]+"</td>";
                        html += "<td class='text-left lizq' style='padding: 0px 5px !important'>"+registros[i]["descripcion_egr"]+"</td>";
                        html += "<td class='text-right lizq' style='padding: 0px 5px !important'>"+Number(registros[i]["monto_egr"]).toFixed(2)+"</td>";
                        html += "<td class='text-center lizq' style='padding: 0px 5px !important'>"+registros[i]["estado_egr"]+"</td>";
                        html += "</tr>";
                    }
                    cabecerahtmlt = "<table class='table1 table-striped table-condensed' id='mitabladetimpresion' style='width: 100%; font-family: Arial !important;'>";
                    cabecerahtmlt += "<tr class='boxtabla'>";
                    cabecerahtmlt += "<th class='text-center' style='width: 2%; padding: 1px; vertical-align: middle'>N°</th>";
                    cabecerahtmlt += "<th class='text-center' style='width: 5%; padding: 1px; vertical-align: middle'>Nro REC.</th>";
                    cabecerahtmlt += "<th class='text-center' style='width: 33%; padding: 1px; vertical-align: middle'>NOMBRE COMPLETO</th>";
                    cabecerahtmlt += "<th class='text-center' style='width: 10%; padding: 1px; vertical-align: middle'>CATEGORIA</th>";
                    cabecerahtmlt += "<th class='text-center lizq' style='width: 40%; padding: 1px; vertical-align: middle'>CONCEPTO</th>";
                    cabecerahtmlt += "<th class='text-center lizq' style='width: 5%; padding: 1px; vertical-align: middle'>MONTO<br>Bs.</th>";
                    cabecerahtmlt += "<th class='text-center lizq' style='width: 5%; padding: 1px; vertical-align: middle'>ESTADO</th>";
                    cabecerahtmlt += "</tr>";
                    cabecerahtmlt += "<tbody>";
                    
                    htmls = "";
                    htmls += "<tr class='larrf lizq1'>";
                    htmls += "<td colspan='4'></td>";
                    htmls += "<td class='larrf text-right text-bold' colspan='2' style='font-family: Arial; font-size: 15px; !important'>TOTAL Bs.<span style='padding-right: 10px'></span>"+numberFormat(Number(totalegreso).toFixed(2))+"</td>";
                    htmls += "<td></td>";
                    htmls += "</tr>";
                    htmls += "<tr>";
                    htmls += "<td class='lizq1' colspan='2'></td>";
                    htmls += "<td class='lizq1'><br><br></td>";
                    htmls += "<td class='larrf' colspan='4'></td>";
                    htmls += "</tr>";
                    htmls += "<tr>";
                    htmls += "<td class='larrf' colspan='2'></td>";
                    htmls += "<td class='text-center lizq1'>"; //<div style='font-size: 10px; width: 60%'>";
                    htmls += "________________________<br>FIRMA RESPONSABLE";
                    //htmls += "</div>";
                    htmls += "</td>";
                    htmls += "<td colspan='7'></td>";
                    htmls += "</tr>";

                    $('#elusuario').html("<span class='text-bold'>Usuario: </span>"+esusuario);
                    $('#lacategoria').html("<span class='text-bold'>Categoria: </span>"+escategoria);
                    $('#fecha1impresion').html(fecha1);
                    $('#fecha2impresion').html(fecha2);
         
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

