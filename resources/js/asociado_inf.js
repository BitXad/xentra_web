$(document).on("ready",inicio);
function inicio(){
    //tablaresultadosasociado(3);
}

//Tabla resultados de la busqueda en el index de producto
function cambiarcon()
{
    var base_url = document.getElementById('base_url').value;
    var nuevo_pass = document.getElementById('nuevo_pass').value;
    var repita_pass = document.getElementById('repita_pass').value;
    var controlador = base_url+'asociado/cambiarcontrasenia';
    //document.getElementById('loader').style.display = 'block'; //muestra el bloque del loader
    if(nuevo_pass === repita_pass){
        if(nuevo_pass.length >2){
            $.ajax({url: controlador,
                type:"POST",
                data:{password:nuevo_pass},
                success:function(respuesta){
                    var registros =  JSON.parse(respuesta);
                    if (registros != null){
                        if(registros == "ok"){
                            alert("Contraseña modificada con exito!");
                        }else if(registros == "no"){
                            alert("Por favor vuelva a iniciar sesion!.");
                        }
                        $('#modalcambiar').modal('hide');
                        $('#modalcambiar').on('hidden.bs.modal', function () {
                        $('#nuevo_pass').val('');
                        $('#repita_pass').val('');
                        });
                       //document.getElementById('loader').style.display = 'none';
                }
                //document.getElementById('loader').style.display = 'none'; //ocultar el bloque del loader
            },
            error:function(respuesta){
               // alert("Algo salio mal...!!!");
               html = "";
               $("#tablaresultados").html(html);
            },
            complete: function (jqXHR, textStatus) {
                //document.getElementById('loader').style.display = 'none'; //ocultar el bloque del loader 
                //tabla_inventario();
            }

        });
    }else{
        alert("Tres caracteres como minimo por favor!.");
    }
    }else{
        alert("las contraseñas no coinciden");
    }
}

function borrar_campos(){
    $('#nuevo_pass').val('');
    $('#repita_pass').val('');
}