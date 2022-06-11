$(document).on("ready",inicio);
function inicio(){
    filtro = " and date(fechahora_egr) = date(now())";
    fechadeegreso(filtro);
}

function fechadeegreso(filtro)
{
    var base_url    = document.getElementById('base_url').value;
    var controlador = base_url+"egreso/buscarfecha";
    document.getElementById('loader').style.display = 'block'; //muestra el bloque del loader
    $.ajax({url: controlador,
           type:"POST",
           data:{filtro:filtro},
           success:function(resul){
                $("#pillados").val("- 0 -");
                var registros =  JSON.parse(resul);
                if(registros != null){
                    var cont = 0;
                    var total = Number(0);
                    var n = registros.length; //tamaño del arreglo de la consulta
                    $("#pillados").html("Registros Encontrados: "+n+"");
                   
                    html = "";
                    for (var i = 0; i < n ; i++){
                        var suma = Number(registros[i]["monto_egr"]);
                        var total = Number(suma+total);
                        
                        html += "<tr>";
                      
                        html += "<td>"+(i+1)+"</td>";
                        html += "<td><b>"+registros[i]["nombre_egr"]+"</b></td>";
                        html += "<td align='center'>"+registros[i]["id_egr"]+"</td>"; 
                        html += "<td align='center'>"+moment(registros[i]["fechahora_egr"]).format('DD/MM/YYYY HH:mm:ss')+"</td>"; 
                        html += "<td>"+registros[i]["detalle_egr"]+"</br>"; 
                        html += "<b>"+registros[i]["descripcion_egr"]+"</b></td>"; 
                        html += "<td align='right'>"+Number(registros[i]["monto_egr"]).toFixed(2)+"</td>"; 
                        html += "<td>"+registros[i]["estado_egr"]+"</td>"; 
                        html += "<td>"+registros[i]["nombre_usu"]+"</td>"; 
                        html += "<td class='no-print'><a href='"+base_url+"egreso/pdf/"+registros[i]["id_egr"]+"' target='_blank' class='btn btn-success btn-xs'><span class='fa fa-print'></a>";
                        //html += "<a href='"+base_url+"egreso/boucher/"+registros[i]["id_egr"]+"' title='BOUCHER' target='_blank' class='btn btn-facebook btn-xs'><span class='fa fa-print'></a>";
                        html += "<a href='"+base_url+"egreso/edit/"+registros[i]["id_egr"]+"'  class='btn btn-info btn-xs'><span class='fa fa-pencil'></a>";
                        html += "<a class='btn btn-danger btn-xs' data-toggle='modal' data-target='#myModal"+i+"' title='Eliminar'><span class='fa fa-trash'></span></a>";
                        html += "<!------------------------ INICIO modal para confirmar eliminación ------------------->";
                        html += "<div class='modal fade' id='myModal"+i+"' tabindex='-1' role='dialog' aria-labelledby='myModalLabel"+i+"'>";
                        html += "<div class='modal-dialog' role='document'>";
                        html += "<br><br>";
                        html += "<div class='modal-content'>";
                        html += "<div class='modal-header'>";
                        html += "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>x</span></button>";
                        html += "</div>";
                        html += "<div class='modal-body'>";
                        html += "<!------------------------------------------------------------------->";
                        html += "<h3><b> <span class='fa fa-trash'></span></b>";
                        html += "Desea eliminar el Egreso <b># "+registros[i]["id_egr"]+"?</b>";
                        html += "</h3>";
                        html += "<!------------------------------------------------------------------->";
                        html += "</div>";
                        html += "<div class='modal-footer aligncenter'>";
                        html += "<a href='"+base_url+"egreso/remove/"+registros[i]["id_egr"]+"' class='btn btn-success'><span class='fa fa-check'></span> Si </a>";
                        html += " <a href='#' class='btn btn-danger' data-dismiss='modal'><span class='fa fa-times'></span> No </a>";
                        html += "</div>";
                        html += "</div>";
                        html += "</div>";
                        html += "</div>";
                        html += "<!------------------------ FIN modal para confirmar eliminación ------------------->";
                        html += "</td>";
                        
                        html += "</tr>";
                    } 
                        html += "<tr>";
                        html += "<td></td>";
                        html += "<td></td>";
                        html += "<td></td>";
                        html += "<td></td>";
                        html += "<td align='right'><b>TOTAL</b></td>";
                        html += "<td align='right'><font size='4'><b>"+Number(total).toFixed(2)+"</b></font></td>";
                        html += "<td></td>";
                        html += "<td></td>";
                        html += "<td></td>";
                        html += "</tr>";
                   
                   $("#fechadeegreso").html(html);
                   document.getElementById('loader').style.display = 'none';
            }
            document.getElementById('loader').style.display = 'none';
        },
        error:function(resul){
          // alert("Algo salio mal...!!!");
           html = "";
           $("#fechadeegreso").html(html);
           document.getElementById('loader').style.display = 'none';
        }
        
    });   

}

function buscaregreso(e){
    tecla = (document.all) ? e.keyCode : e.which;
    var filtrar = document.getElementById('filtrar').value;
    if(filtrar.trim() != ""){
        if(tecla==13){
            let filtro = " and(e.id_egr = '"+filtrar+"' or e.nombre_egr like '%"+filtrar+"%'";
            filtro += " or e.monto_egr like '%"+filtrar+"%' or e.detalle_egr like '%"+filtrar+"%'";
            filtro += " or e.descripcion_egr like '%"+filtrar+"%')";
            fechadeegreso(filtro);
        }
    }
}

function buscar_egresos()
{
    $("#filtrar").val("");
    var opcion = document.getElementById('select_lafecha').value;
    let fecha_hoy = new Date();
    if(opcion == 0){
        $("#fecha_desde").val(moment(fecha_hoy).format("YYYY-MM-DD"));
        $("#fecha_hasta").val(moment(fecha_hoy).format("YYYY-MM-DD"));
        mostrar_ocultar_buscador("ocultar");
    }else if (opcion == 1) //compras de hoy
    {
        filtro = " and date(fechahora_egr) = date(now())";
        mostrar_ocultar_buscador("ocultar");
        fechadeegreso(filtro);
    }else if (opcion == 2) //compras de ayer
    {
        filtro = " and date(fechahora_egr) = date_add(date(now()), INTERVAL -1 DAY)";
        mostrar_ocultar_buscador("ocultar");
        fechadeegreso(filtro);
    }else if (opcion == 3) 
    {
        filtro = " and date(fechahora_egr) >= date_add(date(now()), INTERVAL -1 WEEK)";//compras de la semana
        mostrar_ocultar_buscador("ocultar");
        fechadeegreso(filtro);
    }else if (opcion == 4) 
    {
        filtro = " ";//todos los compras
        mostrar_ocultar_buscador("ocultar");
        fechadeegreso(filtro);

    }else if (opcion == 5)
    {
        mostrar_ocultar_buscador("mostrar");
        filtro = null;
    }
}

function mostrar_ocultar_buscador(parametro){
       
    if (parametro == "mostrar"){
        document.getElementById('buscador_oculto').style.display = 'block';}
    else{
        document.getElementById('buscador_oculto').style.display = 'none';}
    
}

function buscar_por_fechas()
{
    var nom_categr = document.getElementById('nom_categr').value;
    var fecha_desde = document.getElementById('fecha_desde').value;
    var fecha_hasta = document.getElementById('fecha_hasta').value;
    filtro = "";
    if(nom_categr != 0){
        filtro += " and e.detalle_egr = '"+nom_categr+"' ";
    }
    filtro += " and date(fechahora_egr) >= '"+fecha_desde+"'  and  date(fechahora_egr) <='"+fecha_hasta+"' ";
    fechadeegreso(filtro);
}

/* buusqueda de Egresos por Categorias */
function buscaregr_categorias()
{
    filtro = "";
    var nom_categr = document.getElementById('nom_categr').value;
    $("#filtrar").val("");
    
    if(nom_categr != 0){
        let opcion = document.getElementById('select_lafecha').value;
        filtro += " and e.detalle_egr = '"+nom_categr+"' ";
        //let fecha_hoy = new Date();
        /*if(opcion == 0){

        }else*/
        if(opcion == 1){ //compras de hoy
            filtro += " and date(e.fechahora_egr) = date(now())";
        }else if (opcion == 2){ //compras de ayer
            filtro += " and date(e.fechahora_egr) = date_add(date(now()), INTERVAL -1 DAY)";
        }else if (opcion == 3){ //compras de la semana
            filtro += " and date(e.fechahora_egr) >= date_add(date(now()), INTERVAL -1 WEEK)";
        }else if (opcion == 4){ //compras de la semana
            filtro += "";
        }else if (opcion == 5){ //compras de la semana
            var fecha_desde = document.getElementById('fecha_desde').value;
            var fecha_hasta = document.getElementById('fecha_hasta').value;
            filtro += " and date(e.fechahora_egr) >= '"+fecha_desde+"'  and  date(e.fechahora_egr) <='"+fecha_hasta+"' ";
        }
        fechadeegreso(filtro);
    }
    //filtro += " and date(fechahora_ing) >= '"+fecha_desde+"'  and  date(fechahora_ing) <='"+fecha_hasta+"' ";
}

