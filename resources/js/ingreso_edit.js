function buscarasoc(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if(tecla==13){ 
       // if (opcion==1){
            buscar_asociados();
       // }
    }
}

function buscar_asociados()
{
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+"ingreso/buscar_asociados";
    var buscar = document.getElementById('buscar').value;
        $.ajax({url: controlador,
            type:"POST",
            data:{buscar:buscar},
            success:function(respuesta){
                var registros = JSON.parse(respuesta);
                var fin = registros.length;
                html = "";
                html += "<div class='box-body table-responsive'>";
                html += "<table class='table table-striped table-condensed' id='mitabla_xs'>";
                html += "<tr>";
                html += "<th>Nº</th>";
                html += "<th>Apellido</th>";
                html += "<th>Nombres</th>";
                html += "<th>Codigo</th>";
                html += "<th>C.I.</th>";
                html += "<th>Direccion</th>";
                html += "<th>Telefono</th>";
                html += "<th>Nit</th>";
                html += "<th>Razon</th>";
               // html += "<th></th>";
                html += "</tr>";
                for(var i = 0; i<fin; i++)
                {
                    html += "<tr onclick='elegir_asoc("+registros[i]["id_asoc"]+"); ocultar_tabla()'>";               
                    html += "<td>"+(i+1)+"</td>";
                    html += "<td>"+registros[i]["apellidos_asoc"]+"</td>";  
                    html += "<td>"+registros[i]["nombres_asoc"]+"</td>";
                    html += "<td align='center'>"+registros[i]["codigo_asoc"]+"</td>";
                    html += "<td align='center'>"+registros[i]["ci_asoc"]+"</td>";
                    html += "<td>"+registros[i]["direccion_asoc"]+"</td>";
                    html += "<td align='center'>"+registros[i]["telefono_asoc"]+"</td>";  
                    html += "<td align='center'>"+registros[i]["nit_asoc"]+"</td>";  
                    html += "<td>"+registros[i]["razon_asoc"]+"</td>";  
                    //html += "<td><button onclick='ver_facturas("+registros[i]["id_asoc"]+")' class='btn btn-success btn-xs' title='Ver Facturas Pendientes' ><span class='fa fa-money'></span></button></td>";
 
                    html += "</tr>";
                } 
                html += "</table>";   
                html += "</div>";   
                $("#lista_asociados").html(html);

            },
            error: function(respuesta){
              alert('No existe');
            }
        });
}

function ocultar_tabla(){
    var html = "";
    $("#mitabla_xs").html(html);
}

function elegir_asoc(asociado)
{
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'ingreso/buscar_idasociado';
    $.ajax({url:controlador,
            type:"POST",
            data:{asociado:asociado},
            success:function(respuesta){
                var registros = eval(respuesta);
                if (registros[0]!=null){
                    $("#buscar").val(registros[0]["nombres_asoc"] +" "+ registros[0]["apellidos_asoc"] +" ("+registros[0]["codigo_asoc"]+")" );
                    $("#id_asoc").val(registros[0]["id_asoc"]);
                    $("#descripcion_ing").val(registros[0]["direccion_asoc"]);
                    /*$("#nombre_ing").val(registros[0]["nombres_asoc"] +" "+ registros[0]["apellidos_asoc"]);
                    $("#ci_ing").val(registros[0]["ci_asoc"]);
                    */
                    //facturas_pendientes(asociado); 
                   // multas_pendientes(asociado); 
                }
            },
            error:function(respuesta){
                
            }
    });
}


function nombreasoc(){
        var id_asoc = document.getElementById('id_asoc').value;
        elegir_asoc(id_asoc)
}