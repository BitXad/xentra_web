$(document).on("ready",inicio);
function inicio(){
    filtro = " and date(fechahora_ing) = date(now())";
        fechadeingreso(filtro); 
        //nombreasoc(); 
}

function buscar_ingresos()
{
    var base_url    = document.getElementById('base_url').value;
    var controlador = base_url+"ingreso";
    var opcion      = document.getElementById('select_compra').value;
 
    

    if (opcion == 1)
    {
        filtro = " and date(fechahora_ing) = date(now())";
        mostrar_ocultar_buscador("ocultar");

               
    }//compras de hoy
    
    if (opcion == 2)
    {
       
        filtro = " and date(fechahora_ing) = date_add(date(now()), INTERVAL -1 DAY)";
        mostrar_ocultar_buscador("ocultar");
    }//compras de ayer
    
    if (opcion == 3) 
    {
    
        filtro = " and date(fechahora_ing) >= date_add(date(now()), INTERVAL -1 WEEK)";//compras de la semana
        mostrar_ocultar_buscador("ocultar");

            }

    
    if (opcion == 4) 
    {   filtro = " ";//todos los compras
        mostrar_ocultar_buscador("ocultar");

    }
    
    if (opcion == 5) {

        mostrar_ocultar_buscador("mostrar");
        filtro = null;
    }

    fechadeingreso(filtro);
}

function buscar_por_fechas()
{
    var base_url    = document.getElementById('base_url').value;
    var controlador = base_url+"ingreso";
    var fecha_desde = document.getElementById('fecha_desde').value;
    var fecha_hasta = document.getElementById('fecha_hasta').value;
   
    filtro = " and date(fechahora_ing) >= '"+fecha_desde+"'  and  date(fechahora_ing) <='"+fecha_hasta+"' ";
    
    fechadeingreso(filtro);
    
}

function mostrar_ocultar_buscador(parametro){
       
    if (parametro == "mostrar"){
        document.getElementById('buscador_oculto').style.display = 'block';}
    else{
        document.getElementById('buscador_oculto').style.display = 'none';}
    
}

function fechadeingreso(filtro)
{   
      
   var base_url    = document.getElementById('base_url').value;
    var controlador = base_url+"ingreso/buscarfecha";
    
    $.ajax({url: controlador,
           type:"POST",
           data:{filtro:filtro},
          
           success:function(resul){     
              
                            
                $("#pillados").val("- 0 -");
               var registros =  JSON.parse(resul);
           
               if (registros != null){
                   
                   
                    var cont = 0;
                    var total = Number(0);
                    
                    var n = registros.length; //tamaÃ±o del arreglo de la consulta
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
                   
            }
                
        },
        error:function(resul){
          // alert("Algo salio mal...!!!");
           html = "";
           $("#fechadeingreso").html(html);
        }
        
    });   

} 


function buscarasoc(e) {

  tecla = (document.all) ? e.keyCode : e.which;

  

    if (tecla==13){ 

    
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
   var controlador = base_url+'ingreso/buscar_idasociado';
 
    $.ajax({url:controlador,

            type:"POST",

            data:{asociado:asociado},

            success:function(respuesta){

                var registros = eval(respuesta);
                if (registros[0]!=null){

                    $("#asociado").val(registros[0]["nombres_asoc"] +" "+ registros[0]["apellidos_asoc"] +" ("+registros[0]["codigo_asoc"]+")" );
                    $("#id_asoc").val(registros[0]["id_asoc"]);
                    $("#descripcion_ing").val(registros[0]["direccion_asoc"]);

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