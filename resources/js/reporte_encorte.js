$(document).on("ready",inicio);
function inicio(){
    var diasmora = document.getElementById('diasmora').value;
    if(diasmora >0){
        //tablaresultadoencorte();
    }
}

function buscarasociado (e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==13){
        tablaresultadoencorte();
    }
}

function tablaresultadoencorte(){
    var base_url    = document.getElementById('base_url').value;
    var controlador = base_url+"reportes/buscarlosencorte";
    var filtro = document.getElementById('fechafiltro').value;
    var diasmora = document.getElementById('diasmora').value;
    if(diasmora >0){
        document.getElementById('loader').style.display = 'block'; //muestra el bloque del loader
        $.ajax({url: controlador,
                type:"POST",
                data:{filtro:filtro, diasmora:diasmora},
                success:function(resul){
                    $("#resdeudores").val("- 0 -");
                    var registros =  JSON.parse(resul);
                    if (registros != null){
                        var n = registros.length; //tamaño del arreglo de la consulta
                        $("#resdeudores").val("- "+n+" -");

                        html = "";
                        //cabecerahtml= "";

                        for (var i = 0; i < n ; i++){
                            /*totalconsumomt3 += parseFloat(registros[i]['consumo_lec']);
                            totalconsumo  += parseFloat(registros[i]['totalcons_lec']);
                            totalalcanta  += parseFloat(registros[i]['consumoalcant_lec']);
                            totalaportes  += parseFloat(registros[i]['totalaportes_fact']);
                            totalrecargo  += parseFloat(registros[i]['totalrecargos_fact']);
                            *///totalegreso   += parseFloat(registros[i]['egreso']);
                            //totalutilidad += parseFloat(registros[i]['utilidad']);

                                html += "<tr class='labjf'>";
                                html += "<td class='text-center' style='padding: 0px 5px !important'>"+(i+1)+"</td>";
                                html += "<td class='text-right' style='padding: 0px 5px !important'>"+registros[i]["codigo_asoc"]+"</td>";
                                html += "<td class='text-left' style='padding: 0px 5px !important'>"+registros[i]["apellidos_asoc"]+" "+registros[i]["nombres_asoc"]+"</td>";
                                html += "<td class='text-left' style='padding: 0px 5px !important'>"+registros[i]["direccion_asoc"]+"</td>";
                                html += "<td class='text-center' style='padding: 0px 5px !important'>"+registros[i]["medidor_asoc"]+"</td>";
                                html += "<td class='text-center lizq' style='padding: 0px 5px !important'>"+registros[i]["mora"]+"</td>";
                                html += "<td class='text-center lizq' style='padding: 0px 5px !important'>"+registros[i]["cantfact"]+"</td>";
                                html += "<td class='text-center lizq' style='padding: 0px 5px !important'>"+registros[i]["servicios_asoc"]+"</td>";
                                
                                html += "</tr>";
                        }
                        
                        $("#tablatotalresultados").html(html);

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
    }else{
        alert("Los dias de mora deben ser mayores a cero!.");
    }

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
    var orden_por = document.getElementById('ordenado_por').value;
    var nombre_dir = document.getElementById('nombre_dir').value;
    //var estado_id = document.getElementById('estado_id').value;
    var esteasociado = document.getElementById('esteasociado').value;
    
    fechabusquedaingegr(fecha_desde, fecha_hasta, usuario, orden_por, nombre_dir, esteasociado);

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

