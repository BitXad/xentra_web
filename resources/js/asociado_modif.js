$(document).on("ready",inicio);
function inicio(){
    var fecha_desde = document.getElementById('fecha_desde').value;
    var fecha_hasta = document.getElementById('fecha_hasta').value;
    tablaresultadosasociado(fecha_desde, fecha_hasta);
}

function buscar_por_fechamodif(){
    var fecha_desde = document.getElementById('fecha_desde').value;
    var fecha_hasta = document.getElementById('fecha_hasta').value;
    tablaresultadosasociado(fecha_desde, fecha_hasta);
}
//Tabla resultados de la busqueda en el index de producto
function tablaresultadosasociado(fecha_desde, fecha_hasta)
{
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'asociado/buscarmodificados/';
    document.getElementById('loader').style.display = 'block'; //muestra el bloque del loader
    
    $.ajax({url: controlador,
           type:"POST",
           data:{fecha1:fecha_desde, fecha2:fecha_hasta},
           success:function(respuesta){    
                var registros =  JSON.parse(respuesta);
                if (registros != null){
                    var formaimagen = ""; //document.getElementById('formaimagen').value;
                    var n = registros.length; //tamaño del arreglo de la consulta
                    $("#encontrados").html("Registros Encontrados: "+n+" ");
                    html = "";
                    for(var i = 0; i < n ; i++){
                        html += "<tr>";
                        html += "<td>"+(i+1)+"</td>";
                        html += "<td>";
                        html += "<div id='horizontal'>";
                        html += "<div id='contieneimg' class='no-print'>";
                        var mimagen = "";
                        if(registros[i]["foto_asoc"] != null && registros[i]["foto_asoc"] !=""){
                            mimagen += "<a class='btn  btn-xs' data-toggle='modal' data-target='#mostrarimagen"+i+"' style='padding: 0px;'>";
                            mimagen += "<img src='"+base_url+"resources/images/asociados/thumb_"+registros[i]["foto_asoc"]+"' class='img img-"+formaimagen+"' width='50' height='50' />";
                            mimagen += "</a>";
                        }else{
                            mimagen = "<img src='"+base_url+"resources/images/asociados/thumb_default.jpg' class='img img-"+formaimagen+"' width='50' height='50' />";
                        }
                        html += mimagen;
                        html += "</div>";
                        html += "<div style='padding-left: 4px'>";
                        var tamaniofont = 3;
                        var tamres = Number(registros[i]["nombres_asoc"].length)+Number(registros[i]["apellidos_asoc"].length);
                        if(tamres >27){
                            tamaniofont = 1;
                        }
                        html += "<font size='"+tamaniofont+"' face='Arial'><b>"+registros[i]["apellidos_asoc"]+" "+registros[i]["nombres_asoc"]+"</b></font><br>";
                        html += "</div>";
                        html += "</div>";
                        html += "</td>";
                        html += "<td>";
                        html += registros[i]["direccion_asoc"]+" ";
                        html += "</td>";
                        html += "<td>";
                        html += "<span class='text-bold' style='font-size: 15px;'>"+registros[i]["codigo_asoc"]+"</span><br>";
                        /*html += registros[i]["categoria_asoc"]+"<br>";
                        html += "MED.: "+registros[i]["medidor_asoc"];*/
                        html += "</td>";
                        html += "<td>";
                        html += registros[i]["ci_asoc"]+" "+registros[i]["ciudad"];
                        html += "</td>";
                        html += "<td>";
                        if(registros[i]["fechanac_asoc"] != null && registros[i]["fechanac_asoc"] != "0000-00-00"){
                            html += "F. NAC.: "+moment(registros[i]["fechanac_asoc"]).format("DD/MM/YYYY")+"<br>";
                        }else{
                            html += "F. NAC.:<br>"
                        }
                        if(registros[i]["fechahora_asoc"] != null && registros[i]["fechahora_asoc"] != "0000-00-00"){
                            html += "F. REG.: "+moment(registros[i]["fechahora_asoc"]).format("DD/MM/YYYY HH:mm:ss")+"<br>";
                        }else{
                            html += "F. REG.:<br>"
                        }
                        html += "</td>";
                        html += "<td class='no-print' style='text-align: center'>";
                        if ((registros[i]["latitud_asoc"]==0 && registros[i]["longitud_asoc"]==0) || (registros[i]["latitud_asoc"]==null && registros[i]["longitud_asoc"]==null) || (registros[i]["latitud_asoc"]== "" && registros[i]["longitud_asoc"]=="")){
                            html += "<img src='"+base_url+"resources/images/noubicacion.png' width='30' height='30'>";
                        }else{
                            html += "<a href='https://www.google.com/maps/dir/"+registros[i]["latitud_asoc"]+","+registros[i]["longitud_asoc"]+"' target='_blank' title='lat:"+registros[i]["latitud_asoc"]+", long:"+registros[i]["longitud_asoc"]+"'>";                                                                
                            html += "<img src='"+base_url+"resources/images/blue.png' width='30' height='30'>";
                            html += "</a>";
                        }
                        html += "<!------------------------ INICIO modal para MOSTRAR imagen REAL ------------------->";
                        html += "<div class='modal fade' id='mostrarimagen"+i+"' tabindex='-1' role='dialog' aria-labelledby='mostrarimagenlabel"+i+"'>";
                        html += "<div class='modal-dialog' role='document'>";
                        html += "<br><br>";
                        html += "<div class='modal-content'>";
                        html += "<div class='modal-header'>";
                        html += "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>x</span></button>";
                        html += "<font size='3'><b>"+registros[i]["nombres_asoc"]+" "+registros[i]["apellidos_asoc"]+"</b></font>";
                        html += "</div>";
                        html += "<div class='modal-body'>";
                        html += "<!------------------------------------------------------------------->";
                        var imagenreal = ""
                        if(registros[i]["foto_asoc"] != null && registros[i]["foto_asoc"] != ""){
                            imagenreal = registros[i]["foto_asoc"];
                        }
                        html += "<img style='max-height: 100%; max-width: 100%' src='"+base_url+"resources/images/asociados/"+imagenreal+"' />";
                        html += "<!------------------------------------------------------------------->";
                        html += "</div>";

                        html += "</div>";
                        html += "</div>";
                        html += "</div>";
                        html += "<!------------------------ FIN modal para MOSTRAR imagen REAL ------------------->";
                        
                        html += "</td>";
                        html += "</tr>";
                   }
                   $("#tablaresultados").html(html);
                   document.getElementById('loader').style.display = 'none';
            }
            document.getElementById('loader').style.display = 'none'; //ocultar el bloque del loader
        },
        error:function(respuesta){
           // alert("Algo salio mal...!!!");
           html = "";
           $("#tablaresultados").html(html);
        },
        complete: function (jqXHR, textStatus) {
            document.getElementById('loader').style.display = 'none'; //ocultar el bloque del loader 
            //tabla_inventario();
        }
        
    });   

}





























function imprimir_producto(){
    var estafh = new Date();
    $('#fhimpresion').html(formatofecha_hora_ampm(estafh));
    $("#cabeceraprint").css("display", "");
    window.print();
    $("#cabeceraprint").css("display", "none");
}

/*aumenta un cero a un digito; es para las horas*/
function aumentar_cero(num){
    if (num < 10) {
        num = "0" + num;
    }
    return num;
}
/* recibe Date y devuelve en formato dd/mm/YYYY hh:mm:ss ampm */
function formatofecha_hora_ampm(string){
    var mifh = new Date(string);
    var info = "";
    var am_pm = mifh.getHours() >= 12 ? "p.m." : "a.m.";
    var hours = mifh.getHours() > 12 ? mifh.getHours() - 12 : mifh.getHours();
    if(string != null){
       info = aumentar_cero(mifh.getDate())+"/"+aumentar_cero((mifh.getMonth()+1))+"/"+mifh.getFullYear()+" "+aumentar_cero(hours)+":"+aumentar_cero(mifh.getMinutes())+":"+aumentar_cero(mifh.getSeconds())+" "+am_pm;
   }
    return info;
}



