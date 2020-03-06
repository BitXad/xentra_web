function registrarnuevodiametrored(){
    var controlador = "";
    var base_url  = document.getElementById('base_url').value;
    var nombre_asoc = document.getElementById('nuevo_diametronombre').value;
    var codigo_asoc = document.getElementById('nuevo_diametrocodigo').value;
    controlador = base_url+'diametrored/aniadirdiametrored/';
    $('#modaldiametrored').modal('hide');
    $.ajax({url: controlador,
           type:"POST",
           data:{nombre_asoc:nombre_asoc, codigo_asoc:codigo_asoc},
           success:function(respuesta){
               
               var registros =  JSON.parse(respuesta);
                
               if (registros != null){
                    html = "";
                    html += "<option value='"+registros["nombre_diam"]+"' selected >";
                    html += registros["nombre_diam"];
                    html += "</option>";
                    $("#diametrored_asoc").append(html);
            }
        },
        error:function(respuesta){
           html = "";
           $("#diametrored_asoc").html(html);
        }
        
    });   

}


/*
  function registrarnuevaunidad(){
    var controlador = "";
    var base_url  = document.getElementById('base_url').value;
    var parametro = document.getElementById('nueva_unidad').value;
    controlador = base_url+'producto/aniadirunidad/';
    $('#modalunidad').modal('hide');
    $.ajax({url: controlador,
           type:"POST",
           data:{parametro:parametro},
           success:function(respuesta){
               
               var registros =  JSON.parse(respuesta);
                
               if (registros != null){
                    html = "";
                    html += "<option value='"+registros["unidad_nombre"]+"' selected >";
                    html += registros["unidad_nombre"];
                    html += "</option>";
                    $("#producto_nombreenvase").append(html);
            }
        },
        error:function(respuesta){
           html = "";
           $("#producto_nombreenvase").html(html);
        }
        
    });   

}*/

