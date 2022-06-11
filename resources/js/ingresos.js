$(document).on("ready",inicio);
function inicio(){
    filtro = " and date(fechahora_ing) = date(now())";
    fechadeingreso(filtro); 
    //nombreasoc(); 
}

function fechadeingreso(filtro)
{
    var base_url    = document.getElementById('base_url').value;
    var controlador = base_url+"ingreso/buscarfecha";
    document.getElementById('loader').style.display = 'block'; //muestra el bloque del loader
    $.ajax({url: controlador,
            type:"POST",
            data:{filtro:filtro},
            success:function(resul){
                $("#pillados").val("- 0 -");
                var registros =  JSON.parse(resul);
                if (registros != null){
                    var cont = 0;
                    var total = Number(0);
                    var n = registros.length; //tamaño del arreglo de la consulta
                    $("#pillados").html("Registros Encontrados: "+n+"");
                    html = "";
                    for (var i = 0; i < n ; i++){
                        var suma = Number(registros[i]["monto_ing"]);
                        var total = Number(suma+total);
                        html += "<tr>";
                        html += "<td>"+(i+1)+"</td>";
                        html += "<td><b>"+registros[i]["nombre_ing"]+"</b></td>";
                        html += "<td align='center'>"+registros[i]["id_ing"]+"</td>"; 
                        html += "<td align='center'>"+moment(registros[i]["fechahora_ing"]).format('DD/MM/YYYY HH:mm:ss')+"</td>"; 
                        html += "<td>"+registros[i]["detalle_ing"]+"</br>"; 
                        html += "<b>"+registros[i]["descripcion_ing"]+"</b>"; 
                        if (registros[i]["id_asoc"]>0) {
                            html += "<b> /Asociado: "+registros[i]["nombres_asoc"]+" "+registros[i]["apellidos_asoc"]+" ("+registros[i]["codigo_asoc"]+")"+"</b>";     
                        }
                        html += "</td><td align='right'>"+Number(registros[i]["monto_ing"]).toFixed(2)+"</td>"; 
                        html += "<td>"+registros[i]["estado_ing"]+"</td>"; 
                        html += "<td>"+registros[i]["nombre_usu"]+"</td>"; 
                        html += "<td class='no-print'><a href='"+base_url+"ingreso/pdf/"+registros[i]["id_ing"]+"' target='_blank' class='btn btn-success btn-xs'><span class='fa fa-print'></a>";
                        //html += "<a href='"+base_url+"ingreso/boucher/"+registros[i]["id_ing"]+"' title='BOUCHER' target='_blank' class='btn btn-facebook btn-xs'><span class='fa fa-print'></a>";
                        html += " <a href='"+base_url+"ingreso/edit/"+registros[i]["id_ing"]+"'  class='btn btn-info btn-xs'><span class='fa fa-pencil'></a>";
                        html += " <a class='btn btn-danger btn-xs' data-toggle='modal' data-target='#myModal"+i+"' title='Eliminar'><span class='fa fa-trash'></span></a>";
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
                        html += "Desea eliminar el ingreso <b># "+registros[i]["id_ing"]+"?</b>";
                        html += "</h3>";
                        html += "<!------------------------------------------------------------------->";
                        html += "</div>";
                        html += "<div class='modal-footer aligncenter'>";
                        html += "<a href='"+base_url+"ingreso/remove/"+registros[i]["id_ing"]+"' class='btn btn-success'><span class='fa fa-check'></span> Si </a>";
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
                   
                   $("#fechadeingreso").html(html);
                   document.getElementById('loader').style.display = 'none';
                }
                document.getElementById('loader').style.display = 'none';
            },
            error:function(resul){
            // alert("Algo salio mal...!!!");
            html = "";
            $("#fechadeingreso").html(html);
            document.getElementById('loader').style.display = 'none';
            }
    });
}

function buscaringreso(e){
    tecla = (document.all) ? e.keyCode : e.which;
    var filtrar = document.getElementById('filtrar').value;
    if(filtrar.trim() != ""){
        if(tecla==13){
            
            let filtro = " and(i.id_ing = '"+filtrar+"' or i.nombre_ing like '%"+filtrar+"%'";
            filtro += " or i.monto_ing like '%"+filtrar+"%' or i.detalle_ing like '%"+filtrar+"%'";
            filtro += " or i.descripcion_ing like '%"+filtrar+"%' or i.ci_ing like '%"+filtrar+"%')";
            fechadeingreso(filtro);
        }
    }
}

function buscar_ingresos()
{
    //var base_url    = document.getElementById('base_url').value;
    //var controlador = base_url+"ingreso";
    $("#filtrar").val("");
    var opcion = document.getElementById('select_lafecha').value;
    let fecha_hoy = new Date();
    if(opcion == 0){
        $("#fecha_desde").val(moment(fecha_hoy).format("YYYY-MM-DD"));
        $("#fecha_hasta").val(moment(fecha_hoy).format("YYYY-MM-DD"));
        mostrar_ocultar_buscador("ocultar");
    }else if(opcion == 1){ //compras de hoy
        filtro = " and date(fechahora_ing) = date(now())";
        mostrar_ocultar_buscador("ocultar");
        fechadeingreso(filtro);
    }else if (opcion == 2){ //compras de ayer
        filtro = " and date(fechahora_ing) = date_add(date(now()), INTERVAL -1 DAY)";
        mostrar_ocultar_buscador("ocultar");
        fechadeingreso(filtro);
    }else if (opcion == 3){ //compras de la semana
        filtro = " and date(fechahora_ing) >= date_add(date(now()), INTERVAL -1 WEEK)";
        mostrar_ocultar_buscador("ocultar");
        fechadeingreso(filtro);
    }else if (opcion == 4){ //todos los compras
        filtro = "";
        mostrar_ocultar_buscador("ocultar");
        fechadeingreso(filtro);
    }else if (opcion == 5) { // busqueda por fechas
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
    var nom_cating = document.getElementById('nom_cating').value;
    var fecha_desde = document.getElementById('fecha_desde').value;
    var fecha_hasta = document.getElementById('fecha_hasta').value;
    filtro = "";
    if(nom_cating != 0){
        filtro += " and i.detalle_ing = '"+nom_cating+"' ";
    }
    filtro += " and date(fechahora_ing) >= '"+fecha_desde+"'  and  date(fechahora_ing) <='"+fecha_hasta+"' ";
    fechadeingreso(filtro);
}
/* buusqueda de Ingresos por Categorias */
function buscaring_categorias()
{
    filtro = "";
    var nom_cating = document.getElementById('nom_cating').value;
    $("#filtrar").val("");
    
    if(nom_cating != 0){
        let opcion = document.getElementById('select_lafecha').value;
        filtro += " and i.detalle_ing = '"+nom_cating+"' ";
        //let fecha_hoy = new Date();
        /*if(opcion == 0){

        }else*/
        if(opcion == 1){ //compras de hoy
            filtro += " and date(i.fechahora_ing) = date(now())";
        }else if (opcion == 2){ //compras de ayer
            filtro += " and date(i.fechahora_ing) = date_add(date(now()), INTERVAL -1 DAY)";
        }else if (opcion == 3){ //compras de la semana
            filtro += " and date(i.fechahora_ing) >= date_add(date(now()), INTERVAL -1 WEEK)";
        }else if (opcion == 4){ //compras de la semana
            filtro += "";
        }else if (opcion == 5){ //compras de la semana
            var fecha_desde = document.getElementById('fecha_desde').value;
            var fecha_hasta = document.getElementById('fecha_hasta').value;
            filtro += " and date(i.fechahora_ing) >= '"+fecha_desde+"'  and  date(i.fechahora_ing) <='"+fecha_hasta+"' ";
        }
        fechadeingreso(filtro);
    }
    //filtro += " and date(fechahora_ing) >= '"+fecha_desde+"'  and  date(fechahora_ing) <='"+fecha_hasta+"' ";
}

