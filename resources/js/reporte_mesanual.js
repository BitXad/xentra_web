$(document).on("ready",inicio);
function inicio(){
  buscar_direccion_asociadototal();
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

function buscar_direccion_asociadototal(){
    var base_url    = document.getElementById('base_url').value;
    var controlador = base_url+"reportes/buscar_direccionestotalasociado/";
    document.getElementById('loader').style.display = 'block'; //muestra el bloque del loader
    $.ajax({url: controlador,
           type:"POST",
           data:{},
           
            success:function(resul){
                //$("#resencontrados").val("- 0 -");
                var registros =  JSON.parse(resul);
                if (registros != null){
                    var meses       = JSON.parse(document.getElementById('meses').value);
                    //const myString = JSON.stringify(registros);
                   //$("#resreporte").val(myString);
                    //var estemes =  $('#este_mes option:selected').text();
                    
                    /*var total           = 0;
                    var totalconsumomt3 = 0;
                    var totalagua       = 0;
                    var totalalcanta    = 0;
                    var totalrepform    = 0;
                    var totalaportes    = 0;
                    var totalrecargos   = 0;
                    var totaldesc       = 0;
                    var eldescuento     = 0;
                    $("#resencontrados").val("- "+n+" -");
                   */
                    var n = registros.length; //tamaño del arreglo de la consulta
                    var m = meses.length; //tamaño del arreglo de la consulta
                    html = "";
                    cabecerahtml= "";
                    
                    for (var i = 0; i < n ; i++){
                        html += "<tr class='labjf'>";
                        html += "<td>"+(i+1)+"</td>";
                        html += "<td>"+registros[i]['nombre_dir']+"</td>";
                        html += "<td>"+registros[i]['numero_asoc']+"</td>";
                        html += "<td>"+"Consumo m"+"<sup>3</sup></td>";
                        for (var j = 0; j < m ; j++){
                            html += "<td><span id='mts3"+i+j+"'></span>";
                            html += "<br><span id='agua"+i+j+"'></span>";
                            html += "<br><span id='alcantarillado"+i+j+"'></span>";
                            buscarconsumo(i,j,meses[j]['mes_lec'], registros[i]['nombre_dir']);
                            //sleep(0.02);
                            html += "</td>";
                        }
                        html += "<td>"+registros[i]['numero_asoc']+"</td>";
                        //html += "<td>"++"</td>";
                        //html += "<td>"++"</td>";
                        html += "</tr>";
                        /*totalconsumomt3 += parseFloat(registros[i]['consumo_lec']);
                        totalagua     += parseFloat(registros[i]['agua']);
                        totalalcanta  += parseFloat(registros[i]['alcantarillado']);
                        totalrepform  += parseFloat(registros[i]['repformulario']);
                        totalaportes  += parseFloat(Number(registros[i]['totalaportes_fact'])-Number(registros[i]['totalaportes_fact']));
                        totalrecargos += parseFloat(registros[i]['totalrecargos_fact']);
                        if(esta_gestion == "2020" && (este_mes == "ABRIL" || este_mes == "MAYO" || este_mes == "JUNIO")){
                            eldescuento = registros[i]["descuento"];
                            totaldesc     += parseFloat(registros[i]['descuento']);
                            var estetotal = parseFloat(Number(registros[i]["agua"])+Number(registros[i]["alcantarillado"])+Number(registros[i]["totalaportes_fact"])+Number(registros[i]["totalrecargos_fact"])-Number(registros[i]["descuento"]));
                        }else{
                            eldescuento = 0;
                            var estetotal = parseFloat(Number(registros[i]["agua"])+Number(registros[i]["alcantarillado"])+Number(registros[i]["totalaportes_fact"])+Number(registros[i]["totalrecargos_fact"]));
                        }
                        total += estetotal;
                        //totalegreso   += parseFloat(registros[i]['egreso']);
                        //totalutilidad += parseFloat(registros[i]['utilidad']);
                        
                            html += "<tr class='labjf'>";
                            html += "<td class='text-center' style='padding: 0px 5px !important'>"+(i+1)+"</td>";
                            html += "<td class='text-right' style='padding: 0px 5px !important'>"+registros[i]["codigo_asoc"]+"</td>";
                            html += "<td class='text-left' style='padding: 0px 5px !important'>"+registros[i]["apellidos_asoc"]+" "+registros[i]["nombres_asoc"]+"</td>";
                            html += "<td class='text-left' style='padding: 0px 5px !important'>"+registros[i]["ci_asoc"]+" "+registros[i]["ciudad"]+"</td>";
                            html += "<td class='text-left' style='padding: 0px 5px !important'>"+registros[i]["direccion_asoc"]+"</td>";
                            html += "<td class='text-left' style='padding: 0px 5px !important'>"+registros[i]["servicios_asoc"]+"</td>";
                            html += "<td class='text-center' style='padding: 0px 5px !important'>"+registros[i]["categoria_asoc"]+"</td>";
                            html += "<td class='text-center' style='padding: 0px 5px !important'>"+registros[i]["mes_lec"]+"/"+registros[i]["gestion_lec"]+"</td>";
                            html += "<td class='text-center lizq' style='padding: 0px 5px !important'>"+registros[i]["anterior_lec"]+"</td>";
                            html += "<td class='text-center lizq' style='padding: 0px 5px !important'>"+registros[i]["actual_lec"]+"</td>";
                            html += "<td class='text-center lizq' style='padding: 0px 5px !important'>"+registros[i]["consumo_lec"]+"</td>";
                            html += "<td class='text-center lizq' style='padding: 0px 5px !important'>"+Number(registros[i]["agua"]).toFixed(2)+"</td>";
                            html += "<td class='text-center lizq' style='padding: 0px 5px !important'>"+Number(registros[i]["alcantarillado"]).toFixed(2)+"</td>";
                            html += "<td class='text-right lizq' style='padding: 0px 5px !important'>"+Number(registros[i]["repformulario"]).toFixed(2)+"</td>";
                            html += "<td class='text-right lizq' style='padding: 0px 5px !important'>"+Number(registros[i]["totalaportes_fact"]-registros[i]["repformulario"]).toFixed(2)+"</td>";
                            html += "<td class='text-right lizq' style='padding: 0px 5px !important'>"+Number(registros[i]["totalrecargos_fact"]).toFixed(2)+"</td>";
                            html += "<td class='text-right lizq' style='padding: 0px 5px !important'>"+Number(eldescuento).toFixed(2)+"</td>";
                            html += "<td class='text-right lizq' style='padding: 0px 5px !important'>"+Number(estetotal).toFixed(2)+"</td>";
                            //html += "<td id='alinearder'>"+numberFormat(Number(registros[i]["ingreso"]).toFixed(2))+
                            html += "</tr>";*/
                    }
                    /*cabecerahtmlt = "<table class='table1 table-striped table-condensed' id='mitabladetimpresion' style='width: 100%; font-family: Arial !important;'>";
                    cabecerahtmlt += "<tr class='boxtabla'>";
                    cabecerahtmlt += "<th class='text-center' style='width: 2%; padding: 1px; vertical-align: middle'>N°</th>";
                    cabecerahtmlt += "<th class='text-center' style='width: 4%; padding: 1px; vertical-align: middle'>COD.</th>";
                    cabecerahtmlt += "<th class='text-center' style='width: 20%; padding: 1px; vertical-align: middle'>NOMBRE COMPLETO</th>";
                    cabecerahtmlt += "<th class='text-center' style='width: 4%; padding: 1px; vertical-align: middle'>C.I.</th>";
                    cabecerahtmlt += "<th class='text-center' style='width: 10%; padding: 1px; vertical-align: middle'>DIRECCION</th>";
                    cabecerahtmlt += "<th class='text-center' style='width: 5%; padding: 1px; vertical-align: middle'>SERVICIOS</th>";
                    cabecerahtmlt += "<th class='text-center' style='width: 5%; padding: 1px; vertical-align: middle'>CATEGORIA</th>";
                    cabecerahtmlt += "<th class='text-center' style='width: 5%; padding: 1px; vertical-align: middle'>MES LEC./GEST.</th>";
                    cabecerahtmlt += "<th class='text-center lizq' style='width: 4%; padding: 1px; vertical-align: middle'>L.<br>Ant.</th>";
                    cabecerahtmlt += "<th class='text-center lizq' style='width: 4%; padding: 1px; vertical-align: middle'>L.<br>Act.</th>";
                    cabecerahtmlt += "<th class='text-center lizq' style='width: 5%; padding: 1px; vertical-align: middle'>CONS.<br>mt<sup>3</sup></th>";
                    cabecerahtmlt += "<th class='text-center lizq' style='width: 5%; padding: 1px; vertical-align: middle'>CONS.<br>Bs.</th>";
                    cabecerahtmlt += "<th class='text-center lizq' style='width: 3%; padding: 1px; vertical-align: middle'>ALC.<br>Bs.</th>";
                    cabecerahtmlt += "<th class='text-center lizq' style='width: 3%; padding: 1px; vertical-align: middle'>REP<br>COMP.</th>";
                    cabecerahtmlt += "<th class='text-center lizq' style='width: 5%; padding: 1px; vertical-align: middle'>APORTE</th>";
                    cabecerahtmlt += "<th class='text-center lizq' style='width: 5%; padding: 1px; vertical-align: middle'>RECARGO</th>";
                    cabecerahtmlt += "<th class='text-center lizq' style='width: 5%; padding: 1px; vertical-align: middle'>DESC.<br>50%</th>";
                    cabecerahtmlt += "<th class='text-center lizq' style='width: 5%; padding: 1px; vertical-align: middle'>TOTAL<br>Bs.</th>";
                    cabecerahtmlt += "</tr>";
                    cabecerahtmlt += "<tbody>";
                    
                    htmls = "";
                    htmls += "<tr class='larrf lizq1'>";
                    htmls += "<td colspan='10'></td>";
                    htmls += "<td class='text-right'>"+totalconsumomt3+"</td>";
                    htmls += "<td class='text-right'>"+numberFormat(Number(totalagua).toFixed(2))+"</td>";
                    htmls += "<td class='text-right'>"+numberFormat(Number(totalalcanta).toFixed(2))+"</td>";
                    htmls += "<td class='text-right'>"+numberFormat(Number(totalrepform).toFixed(2))+"</td>";
                    htmls += "<td class='text-right'>"+numberFormat(Number(totalaportes).toFixed(2))+"</td>";
                    htmls += "<td class='text-right'>"+numberFormat(Number(totalrecargos).toFixed(2))+"</td>";
                    htmls += "<td class='text-right'>"+numberFormat(Number(totaldesc).toFixed(2))+"</td>";
                    htmls += "<td ></td>";
                    htmls += "</tr>";
                    htmls += "<tr>";
                    htmls += "<td class='lizq1' colspan='2'></td>";
                    htmls += "<td class='lizq1'><br><br></td>";
                    htmls += "<td class='larrf' colspan='9'></td>";
                    htmls += "<td class='larrf text-right text-bold' colspan='3' style='font-family: Arial; font-size: 15px; !important'>TOTAL Bs.</td>";
                    htmls += "<td class='larrf text-right text-bold' colspan='3' style='font-family: Arial; font-size: 15px; !important'>"+numberFormat(Number(total).toFixed(2))+"</td>";
                    htmls += "</tr>";
                    htmls += "<tr>";
                    htmls += "<td class='larrf' colspan='2'></td>";
                    htmls += "<td class='text-center lizq1'>"; //<div style='font-size: 10px; width: 60%'>";
                    htmls += "________________________<br>FIRMA RESPONSABLE";
                    //htmls += "</div>";
                    htmls += "</td>";
                    htmls += "<td colspan='15'></td>";
                    htmls += "</tr>";*/
                    /*
                    $('#elusuario').html("<span class='text-bold'>Usuario: </span>"+esusuario);
                    $('#ladireccion').html("<span class='text-bold'>Dirección: </span>"+esdirecion);
                    $('#fecha1impresion').html(fecha1);
                    $('#fecha2impresion').html(fecha2);
                    */
                    //piehtmlt = "</tbody></table></div></div>";
                   
                    //$("#tablatotalresultados").html(cabecerahtmlt+html+htmls+piehtmlt);
                    $("#resdirecciones").html(html);
                   
                    document.getElementById('loader').style.display = 'none';
            }
        document.getElementById('loader').style.display = 'none'; //ocultar el bloque del loader
        },
        error:function(resul){
          // alert("Algo salio mal...!!!");
           html = "";
           $("#resdirecciones").html(html);
        },
        complete: function (jqXHR, textStatus) {
            document.getElementById('loader').style.display = 'none'; //ocultar el bloque del loader
        }
        
    });   

}
function buscarconsumo(i, j, mes, direccion){
    var base_url    = document.getElementById('base_url').value;
    var gestion     = document.getElementById('gestion').value;
    var controlador = base_url+"reportes/consumototal_mesdireccion/";
    //document.getElementById('loader').style.display = 'block'; //muestra el bloque del loader
    $.ajax({url: controlador,
           type:"POST",
           data:{mes:mes, gestion:gestion, direccion:direccion},
           
            success:function(resul){
                //$("#resencontrados").val("- 0 -");
                var registros =  JSON.parse(resul);
                if (registros != null){
                    
                    $("#mts3"+i+j).html(registros[0]['consumo']);
                    $("#agua"+i+j).html(registros[0]['agua']);
                    $("#alcantarillado"+i+j).html(registros[0]['alcantarillado']);
                   
                    document.getElementById('loader').style.display = 'none';
            }
        //document.getElementById('loader').style.display = 'none'; //ocultar el bloque del loader
        },
        error:function(resul){
          // alert("Algo salio mal...!!!");
           html = "";
           $("#mts3").html(html);
           $("#agua").html(html);
           $("#alcantarillado").html(html);
        },
        complete: function (jqXHR, textStatus) {
            //document.getElementById('loader').style.display = 'none'; //ocultar el bloque del loader
        }
        
    });   

}
/*function sleep(seconds){
    var waitUntil = new Date().getTime() + seconds*1000;
    while(new Date().getTime() < waitUntil) true;
}*/
function generarexcel(){
    var base_url = document.getElementById('base_url').value;
    var este_mes     = document.getElementById('este_mes').value;
    var esta_gestion = document.getElementById('esta_gestion').value;
    var resreporte = document.getElementById('resreporte').value;
    var registros =  JSON.parse(resreporte);
    var n = registros.length; //tamaño del arreglo de la consulta
    var showLabel = true;
    var reportitle = moment(Date.now()).format("DD/MM/YYYY H_m_s");
                var mensaje = "";
                
                html = "";
                  /* **************INICIO Generar Excel JavaScript************** */
                    var CSV = 'sep=,' + '\r\n';
                    //This condition will generate the Label/Header
                    if (showLabel) {
                        var row = "";

                        //This loop will extract the label from 1st index of on array
                        

                            //Now convert each value to string and comma-seprated
                            row += 'N°' + ',';
                            row += 'CODIGO' + ',';
                            row += 'APELLIDOS' + ',';
                            row += 'NOMBRES' + ',';
                            row += 'CARNET' + ',';
                            row += 'EXT.' + ',';
                            row += 'DIRECCION' + ',';
                            row += 'SERVICIOS' + ',';
                            row += 'CATEGORIA' + ',';
                            row += 'MES LECTURA' + ',';
                            row += 'GESTION' + ',';
                            row += 'LEC. ANTERIOR' + ',';
                            row += 'LEC. ACTUAL' + ',';
                            row += 'CONSUMO mt3' + ',';
                            row += 'CONSUMO Bs.' + ',';
                            row += 'ALCANTARILLADO Bs.' + ',';
                            row += 'REP. COMP.' + ',';
                            row += 'APORTE' + ',';
                            row += 'RECARGO' + ',';
                            row += 'DESC. 50%' + ',';
                            row += 'TOTAL Bs.' + ',';
       
                        row = row.slice(0, -1);

                        //append Label row with line break
                        CSV += row + '\r\n';
                    }
                    
                    var eldescuento = 0;
                    var total =  0;
                    //1st loop is to extract each row
                    for (var i = 0; i < n; i++) {
                        var row = "";
                        if(esta_gestion == "2020" && (este_mes == "ABRIL" || este_mes == "MAYO" || este_mes == "JUNIO")){
                            eldescuento = registros[i]["descuento"];
                            var estetotal = parseFloat(Number(registros[i]["agua"])+Number(registros[i]["alcantarillado"])+Number(registros[i]["totalaportes_fact"])+Number(registros[i]["totalrecargos_fact"])-Number(registros[i]["descuento"]));
                        }else{
                            eldescuento = 0;
                            var estetotal = parseFloat(Number(registros[i]["agua"])+Number(registros[i]["alcantarillado"])+Number(registros[i]["totalaportes_fact"])+Number(registros[i]["totalrecargos_fact"]));
                        }
                        total += estetotal;
                        //2nd loop will extract each column and convert it in string comma-seprated
                        
                            row += i+1+',';
                            row += '"'+registros[i]["codigo_asoc"]+'",';
                            row += '"' +registros[i]["apellidos_asoc"]+ '",';
                            row += '"' +registros[i]["nombres_asoc"]+ '",';
                            row += '"' +registros[i]["ci_asoc"]+ '",';
                            row += '"' +registros[i]["ciudad"]+ '",';
                            row += '"' +registros[i]["direccion_asoc"]+ '",';
                            row += '"' +registros[i]["servicios_asoc"]+ '",';
                            row += '"' +registros[i]["categoria_asoc"]+ '",';
                            row += '"' +registros[i]["mes_lec"]+ '",';
                            row += '"' +registros[i]["gestion_lec"]+ '",';
                            row += '"' +registros[i]["anterior_lec"]+ '",';
                            row += '"' +registros[i]["actual_lec"]+ '",';
                            row += '"' +registros[i]["consumo_lec"]+ '",';
                            row += '"' +registros[i]["agua"]+ '",';
                            row += '"' +registros[i]["alcantarillado"]+ '",';
                            row += '"' +registros[i]["repformulario"]+ '",';
                            row += '"' +Number(registros[i]["totalaportes_fact"]-registros[i]["repformulario"])+ '",';
                            row += '"' +registros[i]["totalrecargos_fact"]+ '",';
                            row += '"' +Number(eldescuento).toFixed(2)+ '",';
                            row += '"' +Number(estetotal).toFixed(2)+ '",';
                        
                        row.slice(0, row.length - 1);

                        //add a line break after each row
                        CSV += row + '\r\n';
                    }
                    
                    if (CSV == '') {        
                        alert("Invalid data");
                        return;
                    }
                    
                    //Generate a file name
                    var fileName = "ReporteMensual_";
                    //this will remove the blank-spaces from the title and replace it with an underscore
                    fileName += reportitle.replace(/ /g,"_");   

                    //Initialize file format you want csv or xls
                    var uri = 'data:text/csv;charset=utf-8,' + escape(CSV);

                    // Now the little tricky part.
                    // you can use either>> window.open(uri);
                    // but this will not work in some browsers
                    // or you will not get the correct file extension    

                    //this trick will generate a temp <a /> tag
                    var link = document.createElement("a");    
                    link.href = uri;

                    //set the visibility hidden so it will not effect on your web-layout
                    link.style = "visibility:hidden";
                    link.download = fileName + ".csv";

                    //this part will append the anchor tag and remove it after automatic click
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                    /* **************F I N  Generar Excel JavaScript************** */
}

