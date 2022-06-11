/* registra nueva categoría de Ingresos */
function registrarnuevacategoria(){
    var controlador = "";
    var base_url  = document.getElementById('base_url').value;
    let parametro = document.getElementById('nueva_categoria').value;
    controlador = base_url+'egreso/aniadircategoria/';
    if(parametro.trim() != ""){
        $('#modalcategoria').modal('hide');
        $.ajax({url: controlador,
               type:"POST",
               data:{parametro:parametro},
               success:function(respuesta){
                   var registros =  JSON.parse(respuesta);
                   if (registros != null){
                        html = "";
                        html += "<option value='"+registros["nom_categr"]+"' selected >";
                        html += registros["nom_categr"];
                        html += "</option>";
                        $("#detalle_egr").append(html);
                }
            },
            error:function(respuesta){
               html = "";
               //$("#categoria_id").html(html);
            }

        });
    }else{
        $("#mensaje_categoria").html("<br>La nueva Categoría no debe ser vacia; por favor revise sus datos, gracias!.");
    }

}