function buscarasoc(e,opcion) {

  tecla = (document.all) ? e.keyCode : e.which;

  

    if (tecla==13){ 

    
        if (opcion==1){             

            buscarasociado();            

        }

        if (opcion==2){   //si la tecla proviene del input apellido

            buscar_asociados();
        } 

        if (opcion==3){   //si la tecla proviene del input nombre

            buscar_asociados();
        } 

        if (opcion==4){   //si la tecla proviene del 

            tablaresultados(1);           

       }
       

    }   

}

function buscar_asociados()
{
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+"factura/buscar_asociados";
    var apellido = document.getElementById('apellido').value;
    var nombre = document.getElementById('nombre').value;
    
        $.ajax({url: controlador,
            type:"POST",
            data:{apellido:apellido,nombre:nombre},
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

                    html += "<tr onclick='elegir_asoc("+registros[i]["id_asoc"]+")'>";               
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

function elegir_asoc(asociado)
{

   var base_url = document.getElementById('base_url').value;
   var controlador = base_url+'factura/buscar_idasociado';
 
    $.ajax({url:controlador,

            type:"POST",

            data:{asociado:asociado},

            success:function(respuesta){

                var registros = eval(respuesta);
                if (registros[0]!=null){

                    $("#nombre").val(registros[0]["nombres_asoc"]);
                    $("#apellido").val(registros[0]["apellidos_asoc"]);
                    $("#id_asoc").val(registros[0]["id_asoc"]);
                    $("#nombre_asoc").val(registros[0]["nombres_asoc"] +" "+ registros[0]["apellidos_asoc"]);

                    facturas_pendientes(asociado); 
                   // multas_pendientes(asociado); 
                    }             

            },

            error:function(respuesta){      

               alert('nose');

            }                

    }); 

}