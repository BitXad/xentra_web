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