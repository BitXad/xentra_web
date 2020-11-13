/* Funcion que busca asociados segun vaya escribiendo en nuevo descuento */
function buscar_asociado(e, opcion){
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==13 && opcion == 2){
        $("#nom_desc").select();
        seleccionar_asociado();
        alert("Asociado modificado con exito!");
    }else{
        var id_asoc = document.getElementById('id_asoc').value;
        var base_url = document.getElementById('base_url').value;
        var controlador = base_url+"descuento/buscar_asociado/";
        $.ajax({url: controlador,
            type:"POST",
            data:{id_asoc:id_asoc},
            success:function(respuesta){
                resultado = JSON.parse(respuesta);
                n = resultado.length;
                html = "";
                for(var i = 0; i<n; i++)
                {
                    html += "<option value='" +resultado[i]["id_asoc"]+"' label='"+resultado[i]["apellidos_asoc"]+" "+resultado[i]["nombres_asoc"]+"'>";
                    html += resultado[i]["apellidos_asoc"]+" "+resultado[i]["nombres_asoc"]+"</option>";
                }    
                $("#lista_asociado").html(html);
                
            },
            error: function(respuesta){
            }
        });
    }
}
/* selecciona un asociado en nuevo descuento */
function seleccionar_asociado(){
    var id_asoc = document.getElementById('id_asoc').value;
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+"descuento/seleccionar_asociado/";
        $.ajax({url: controlador,
            type:"POST",
            data:{id_asoc:id_asoc},
            success:function(respuesta){
                resultado = JSON.parse(respuesta);
                tam = resultado.length;
                if (tam>=1){
                    $("#id_asoc").val(resultado[0]["apellidos_asoc"]+" "+resultado[0]["nombres_asoc"]);
                    $("#esteid_asoc").val(resultado[0]["id_asoc"]);
                    //$('#detalleserv_descripcion').focus();
                }
                
            },
            error: function(respuesta){
            }
        });
    
}
function iniciar_busqueda(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==13){
        tabla_asociados();
    }
}

//Tabla resultados de la busqueda en asociados
function tabla_asociados(){
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'descuento/buscar_asociado/';
    var parametro = document.getElementById('buscarasociado').value;        

    $.ajax({url: controlador,
           type:"POST",
           data:{id_asoc:parametro},
           success:function(respuesta){
                $("#encontrados").val("- 0 -");
               var registros =  JSON.parse(respuesta);

               if (registros != null){
                    var n = registros.length; //tamaño del arreglo de la consulta
                    $("#encontrados").val("- "+n+" -");
                    html = "";
                    for (var i = 0; i < n ; i++){
                        html += "<tr>";
                        html += "<td>"+(i+1)+"</td>";
                        html += "<td>";
                        html += "<div style='color: #0073b7'>";
                        if(registros[i]["foto_asoc"] != null && registros[i]["foto_asoc"] !=""){
                            html += "<img src='"+base_url+"resources/images/asociados/thumb_"+registros[i]["foto_asoc"]+"' width='50' height='50' />";
                        }else{
                            html += "<i class='fa fa-user fa-3x'></i>";
                        }
                        html += "</div>";
                        html += "</td>";
                        html += "<td>";
                        var esteasociado = registros[i]["apellidos_asoc"]+" "+registros[i]["nombres_asoc"];
                        html += "<b>"+esteasociado+"</b>";
                        html += "</td>";
                        html += "<td>";
                        html += "<button class='btn btn-success' onclick='asignarasociado("+JSON.stringify(registros[i])+", "+registros[i]["id_asoc"]+")' >";
                        html += "<i class='fa fa-check'></i> Seleccionar";
                        html += "</button>";
                        html += "</td>";
                        html += "</tr>";
                   }
                   $("#tablaresultados").html(html);
            }
        },
        error:function(respuesta){
           html = "";
           $("#tablaresultados").html(html);
        }
    });
}
/* asignamos al asociado elegido en el nuevo descuento */
function asignarasociado(nombres_asoc, id_asoc){
    $("#id_asoc").val(nombres_asoc["apellidos_asoc"]+" "+nombres_asoc["nombres_asoc"]);
    $("#esteid_asoc").val(id_asoc);
    $("#encontrados").val("- 0 -");
    $('#modalbuscarasociado').modal('hide');
    $('#modalbuscarasociado').on('hidden.bs.modal', function () {
        $('#tablaresultados').html('');
    });
}