$(document).on("ready",inicio);
function inicio(){
    //tablaresultadosasociado(3);
}

/*
 * Funcion que buscara asociados en la tabla asociado
 */
function buscarasociado(e) {
  tecla = (document.all) ? e.keyCode : e.which;
  
    if (tecla==13){
        tablaresultadosasociado(2);
    }
}

//Tabla resultados de la busqueda en el index de producto
function tablaresultadosasociado(limite)
{
    var controlador = "";
    var parametro = "";
    var direcciontext = "";
    var serviciotext = "";
    var categoriatext = "";
    var servicioestado = "";
    var base_url = document.getElementById('base_url').value;
    //var tipousuario_id = document.getElementById('tipousuario_id').value;
    //var lapresentacion = JSON.parse(document.getElementById('lapresentacion').value);
    //al inicar carga con los ultimos 50 productos
    if(limite == 1){
        controlador = base_url+'producto/buscarproductoslimit/';
     // carga todos los productos de la BD   
    }else if(limite == 3){
        controlador = base_url+'asociado/buscarasociadosall/';
     // busca por categoria
    }else{
        controlador = base_url+'asociado/buscarasociados/';
        var direccion = document.getElementById('id_dir').value;
        var servicio  = document.getElementById('servicio_id').value;
        var categoria = document.getElementById('categoria_id').value;
        if(servicio == 0){
           servicioestado = "";
        }else{
           servicioestado = " and a.servicios_asoc = '"+servicio+"' ";
           serviciotext = $('select[name="servicio_id"] option:selected').text();
           serviciotext = "Servicio: "+serviciotext;
        }
        if(direccion == 0){
           servicioestado += "";
        }else{
           servicioestado += " and a.direccion_asoc = '"+direccion+"' ";
           direcciontext = $('select[name="id_dir"] option:selected').text();
           direcciontext = "Dirección: "+direcciontext;
        }
        if(categoria == 0){
           servicioestado += "";
        }else{
           servicioestado += " and a.categoria_asoc = '"+categoria+"' ";
           categoriatext = $('select[name="categoria_id"] option:selected').text();
           categoriatext = "Categoria: "+categoriatext;
        }
        $("#busquedacategoria").html("<br>"+serviciotext+" "+categoriatext);
        parametro = document.getElementById('filtrar').value;
    }
    
    document.getElementById('loader').style.display = 'block'; //muestra el bloque del loader
    

    $.ajax({url: controlador,
           type:"POST",
           data:{parametro:parametro, servicioestado:servicioestado},
           success:function(respuesta){    
                //$("#encontrados").val("- 0 -");
               var registros =  JSON.parse(respuesta);
               if (registros != null){
                   var formaimagen = ""; //document.getElementById('formaimagen').value;
                    /*var cont = 0;
                    var cant_total = 0;
                    var total_detalle = 0; */
                    var n = registros.length; //tamaño del arreglo de la consulta
                    $("#encontrados").html("Registros Encontrados: "+n+" ");
                    html = "";
                    for(var i = 0; i < n ; i++){
//                        html += "<td>";
                        /*var caracteristica = "";
                        if(registros[i]["producto_caracteristicas"] != null){
                            caracteristica = "<div style='word-wrap: break-word !important; max-width: 400px !important; white-space: normal'>"+registros[i]["producto_caracteristicas"]+"</div>";
                        }*/
//                        html+= caracteristica+"</td>";
                        html += "<tr>";
                        html += "<td>"+(i+1)+"</td>";
                        html += "<td>";
                        html += "<div id='horizontal'>";
                        html += "<div id='contieneimg'>";
                        var mimagen = "";
                        if(registros[i]["foto_asoc"] != null && registros[i]["foto_asoc"] !=""){
                            mimagen += "<a class='btn  btn-xs' data-toggle='modal' data-target='#mostrarimagen"+i+"' style='padding: 0px;'>";
                            mimagen += "<img src='"+base_url+"resources/images/asociados/thumb_"+registros[i]["foto_asoc"]+"' class='img img-"+formaimagen+"' width='50' height='50' />";
                            mimagen += "</a>";
                        }else{
                            mimagen = "<img src='"+base_url+"resources/images/asociados/thumb_default.jpg' class='img img-"+formaimagen+"' width='50' height='50' />";
                        }
                        html += mimagen;
                        html += "</div>";
                        html += "<div style='padding-left: 4px'>";
                        var tamaniofont = 3;
                        var tamres = Number(registros[i]["nombres_asoc"].length)+Number(registros[i]["apellidos_asoc"].length);
                        if(tamres >27){
                            tamaniofont = 1;
                        }
                        html += "<font size='"+tamaniofont+"' face='Arial'><b>"+registros[i]["apellidos_asoc"]+" "+registros[i]["nombres_asoc"]+"</b></font><br>";
                        html += "C.I.: "+registros[i]["ci_asoc"]+" "+registros[i]["ciudad"]+"<br>";
                        html += "DIR.: "+registros[i]["direccion_asoc"]+" ";
                        if(registros[i]["nro_asoc"] != null && registros[i]["nro_asoc"] != ""){
                            html += registros[i]["nro_asoc"]+" ";
                        }
                        if(registros[i]["referencia_asoc"] != null && registros[i]["referencia_asoc"] != ""){
                            html += "<br>"+registros[i]["referencia_asoc"]+" ";
                        }
                        html += "<br>";
                        html += "MANZANO: ";
                        if(registros[i]["manzano_asoc"] != null && registros[i]["manzano_asoc"] != ""){
                            html += registros[i]["manzano_asoc"]+" ";
                        }
                        html += "<br>";
                        html += "TELF.: "+registros[i]["telefono_asoc"]+"<br>";
                        html += "TIPO: ";
                        if(registros[i]["tipo_asoc"] != null && registros[i]["tipo_asoc"] != ""){
                            html += registros[i]["tipo_asoc"];
                        }
                        html += "</div>";
                        html += "</div>";
                        html += "</td>";
                        html += "<td>";
                        html += registros[i]["codigo_asoc"]+"<br>";
                        html += registros[i]["categoria_asoc"]+"<br>";
                        html += "MED.: "+registros[i]["medidor_asoc"]+"<br>";
                        html += "NIT: "+registros[i]["nit_asoc"]+"<br>";
                        html += "RAZON: "+registros[i]["razon_asoc"];
                        html += "</td>";
                        html += "<td>";
                        html += "SERV.: "+registros[i]["servicios_asoc"]+"<br>";
                        html += "ZONA: "+registros[i]["zona_asoc"];
                        html += "<br>";
                        /*html += "SISTEMA RED: ";
                        if(registros[i]["sistemared_asoc"] != null && registros[i]["sistemared_asoc"] != ""){
                            html += registros[i]["sistemared_asoc"];
                        }
                        html += "<br>";*/
                        html += "TIPO INMUEBLE: ";
                        if(registros[i]["tipoinmueble_asoc"] != null && registros[i]["tipoinmueble_asoc"] != ""){
                            html += registros[i]["tipoinmueble_asoc"];
                        }
                        html += "</td>";
                        html += "<td>";
                        if(registros[i]["fechanac_asoc"] != null && registros[i]["fechanac_asoc"] != "0000-00-00"){
                            html += "F. NAC.: "+moment(registros[i]["fechanac_asoc"]).format("DD/MM/YYYY")+"<br>";
                        }else{
                            html += "F. NAC.:<br>"
                        }
                        if(registros[i]["fechahora_asoc"] != null && registros[i]["fechahora_asoc"] != "0000-00-00"){
                            html += "F. REG.: "+moment(registros[i]["fechahora_asoc"]).format("DD/MM/YYYY HH:mm:ss")+"<br>";
                        }else{
                            html += "F. REG.:<br>"
                        }
                        html += "</td>";
                        html += "<td class='text-center'>";
                        html += registros[i]["orden_asoc"]+"<br>";
                        html += registros[i]["estado"];
                        html += "</td>";
                        html += "<td class='no-print' style='text-align: center'>";
                        if ((registros[i]["latitud_asoc"]==0 && registros[i]["longitud_asoc"]==0) || (registros[i]["latitud_asoc"]==null && registros[i]["longitud_asoc"]==null) || (registros[i]["latitud_asoc"]== "" && registros[i]["longitud_asoc"]=="")){
                            html += "<img src='"+base_url+"resources/images/noubicacion.png' width='30' height='30'>";
                        }else{
                            html += "<a href='https://www.google.com/maps/dir/"+registros[i]["latitud_asoc"]+","+registros[i]["longitud_asoc"]+"' target='_blank' title='lat:"+registros[i]["latitud_asoc"]+", long:"+registros[i]["longitud_asoc"]+"'>";                                                                
                            html += "<img src='"+base_url+"resources/images/blue.png' width='30' height='30'>";
                            html += "</a>";
                        }
                        html += "</td>";
                        html += "<td>";
                        if(registros[i]["codigocatastral_asoc"] != null && registros[i]["codigocatastral_asoc"] != ""){
                            html += registros[i]["codigocatastral_asoc"]+" ";
                        }
                        html += "<br>";
                        html += "SIST. RED: ";
                        if(registros[i]["sistemared_asoc"] != null && registros[i]["sistemared_asoc"] != ""){
                            html += registros[i]["sistemared_asoc"]+" ";
                        }
                        html += "<br>";
                        html += "DIST. N.O.(Mts.): ";
                        if(registros[i]["distancia_asoc"] != null && registros[i]["distancia_asoc"] != ""){
                            html += registros[i]["distancia_asoc"]+" ";
                        }
                        html += "<br>";
                        html += "DIST. RED(Mts.): ";
                        if(registros[i]["distanciar_asoc"] != null && registros[i]["distanciar_asoc"] != ""){
                            html += registros[i]["distanciar_asoc"]+" ";
                        }
                        html += "<br>";
                        html += "DIAM. RED: ";
                        if(registros[i]["diametrored_asoc"] != null && registros[i]["diametrored_asoc"] != ""){
                            html += registros[i]["diametrored_asoc"]+" ";
                        }
                        html += "</td>";
                        html += "<td>";
                        html += "LEC.: ";
                        if(registros[i]["actual_lec"] != null && registros[i]["actual_lec"] != ""){
                            html += registros[i]["actual_lec"]+" ";
                        }
                        html += "<br>";
                        html += "MES: ";
                        if(registros[i]["mes_lec"] != null && registros[i]["mes_lec"] != ""){
                            html += registros[i]["mes_lec"]+" ";
                        }
                        html += "<br>";
                        html += "GEST.: ";
                        if(registros[i]["gestion_lec"] != null && registros[i]["gestion_lec"] != ""){
                            html += registros[i]["gestion_lec"]+" ";
                        }
                        html += "<br>";
                        html += "FECHA: ";
                        if(registros[i]["fecha_lec"] != null && registros[i]["fecha_lec"] != ""){
                            html += moment(registros[i]["fecha_lec"]).format("DD/MM/YYYY");
                        }
                        html += "</td>";
                        html += "<td>";
                        html += "<a href='"+base_url+"asociado/edit/"+registros[i]["id_asoc"]+"' class='btn btn-info btn-xs' target='_blank' title='Modificar información de Asociado' ><span class='fa fa-pencil'></span></a>";
                        html += "<a href='"+base_url+"imagen_asociado/catalogo/"+registros[i]["id_asoc"]+"' class='btn btn-success btn-xs' target='_blank' title='Documentos' ><span class='fa fa-folder-open'></span></a>";
                        
                        
                        
                        
                        /*
                        html += "<td>";
                        var sinconenvase = "";
                        var nombreenvase = "";
                        var costoenvase  = "";
                        var precioenvase = "";
                        if(registros[i]["producto_envase"] == 1){
                            sinconenvase = "Con Envase Retornable"+"<br>";
                            if(registros[i]["producto_nombreenvase"] != "" || registros[i]["producto_nombreenvase"] != null){
                                nombreenvase = registros[i]["producto_nombreenvase"]+"<br>";
                                costoenvase  = "Costo:  "+Number(registros[i]["producto_costoenvase"]).toFixed(2)+"<br>";
                                precioenvase = "Precio: "+Number(registros[i]["producto_precioenvase"]).toFixed(2);
                            }
                        }else{
                            sinconenvase = "Sin Envase Retornable";
                        }
                        html += sinconenvase;
                        html += nombreenvase;
                        html += costoenvase;
                        html += precioenvase;
                        html += "</td>";
                        var codbarras = "";
                        if(!(registros[i]["producto_codigobarra"] == null)){
                            codbarras = registros[i]["producto_codigobarra"];
                        }
                        html += "<td>"+registros[i]["producto_codigo"]+"<br>"+ codbarras +"</td>";
                        html += "<td>";
                        if(tipousuario_id == 1){
                            html += "<b>COMPRA: </b>"+registros[i]["producto_costo"]+"<br>";
                        }
                            html += "<b>VENTA: </b>"+registros[i]["producto_precio"]+"<br>";
                            html += "<b>COMISION (%): </b>"+registros[i]["producto_comision"];
                            html += "</td>";
                        html += "<td><b>MONEDA: </b>"+esmoneda+"<br>";
                        html += "<b>T.C.: </b>";
                        var tipocambio= 0;
                        if(registros[i]["producto_tipocambio"] != null){ tipocambio = registros[i]["producto_tipocambio"]; }
                        html += tipocambio+"</td>";
                        html += "<td class='no-print' style='background-color: #"+registros[i]["estado_color"]+"'>"+registros[i]["estado_descripcion"]+"</td>";
		        html += "<td class='no-print'>";
                        html += "<a href='"+base_url+"producto/edit/"+registros[i]["miprod_id"]+"' target='_blank' class='btn btn-info btn-xs' title='Modificar Información'><span class='fa fa-pencil'></span></a>";
                        html += "<a href='"+base_url+"imagen_producto/catalogoprod/"+registros[i]["miprod_id"]+"' class='btn btn-success btn-xs' title='Catálogo de Imagenes' ><span class='fa fa-image'></span></a>";
                        html += "<a class='btn btn-danger btn-xs' data-toggle='modal' data-target='#myModal"+i+"' title='Eliminar'><span class='fa fa-trash'></span></a>";
                        html += "<a href='"+base_url+"producto/productoasignado/"+registros[i]["miprod_id"]+"' class='btn btn-soundcloud btn-xs' title='Ver si esta asignado a subcategorias' target='_blank' ><span class='fa fa-list'></span></a>";
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
                        html += "¿Desea eliminar el Producto <b> "+registros[i]["producto_nombre"]+"</b> ?";
                        html += "</h3>";
                        html += "<!------------------------------------------------------------------->";
                        html += "</div>";
                        html += "<div class='modal-footer aligncenter'>";
                        html += "<a href='"+base_url+"producto/remove/"+registros[i]["miprod_id"]+"' class='btn btn-success'><span class='fa fa-check'></span> Si </a>";
                        html += "<a href='#' class='btn btn-danger' data-dismiss='modal'><span class='fa fa-times'></span> No </a>";
                        html += "</div>";
                        html += "</div>";
                        html += "</div>";
                        html += "</div>";
                        html += "<!------------------------ FIN modal para confirmar eliminación ------------------->";
                        */
                        html += "<!------------------------ INICIO modal para MOSTRAR imagen REAL ------------------->";
                        html += "<div class='modal fade' id='mostrarimagen"+i+"' tabindex='-1' role='dialog' aria-labelledby='mostrarimagenlabel"+i+"'>";
                        html += "<div class='modal-dialog' role='document'>";
                        html += "<br><br>";
                        html += "<div class='modal-content'>";
                        html += "<div class='modal-header'>";
                        html += "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>x</span></button>";
                        html += "<font size='3'><b>"+registros[i]["nombres_asoc"]+" "+registros[i]["apellidos_asoc"]+"</b></font>";
                        html += "</div>";
                        html += "<div class='modal-body'>";
                        html += "<!------------------------------------------------------------------->";
                        var imagenreal = ""
                        if(registros[i]["foto_asoc"] != null && registros[i]["foto_asoc"] != ""){
                            imagenreal = registros[i]["foto_asoc"];
                        }
                        html += "<img style='max-height: 100%; max-width: 100%' src='"+base_url+"resources/images/asociados/"+imagenreal+"' />";
                        html += "<!------------------------------------------------------------------->";
                        html += "</div>";

                        html += "</div>";
                        html += "</div>";
                        html += "</div>";
                        html += "<!------------------------ FIN modal para MOSTRAR imagen REAL ------------------->";
                        html += "</td>";
                        
                        html += "</tr>";

                   }
                   
                   
                   $("#tablaresultados").html(html);
                   document.getElementById('loader').style.display = 'none';
            }
            document.getElementById('loader').style.display = 'none'; //ocultar el bloque del loader
        },
        error:function(respuesta){
           // alert("Algo salio mal...!!!");
           html = "";
           $("#tablaresultados").html(html);
        },
        complete: function (jqXHR, textStatus) {
            document.getElementById('loader').style.display = 'none'; //ocultar el bloque del loader 
            //tabla_inventario();
        }
        
    });   

}





























function imprimir_producto(){
    var estafh = new Date();
    $('#fhimpresion').html(formatofecha_hora_ampm(estafh));
    $("#cabeceraprint").css("display", "");
    window.print();
    $("#cabeceraprint").css("display", "none");
}

/*aumenta un cero a un digito; es para las horas*/
function aumentar_cero(num){
    if (num < 10) {
        num = "0" + num;
    }
    return num;
}
/* recibe Date y devuelve en formato dd/mm/YYYY hh:mm:ss ampm */
function formatofecha_hora_ampm(string){
    var mifh = new Date(string);
    var info = "";
    var am_pm = mifh.getHours() >= 12 ? "p.m." : "a.m.";
    var hours = mifh.getHours() > 12 ? mifh.getHours() - 12 : mifh.getHours();
    if(string != null){
       info = aumentar_cero(mifh.getDate())+"/"+aumentar_cero((mifh.getMonth()+1))+"/"+mifh.getFullYear()+" "+aumentar_cero(hours)+":"+aumentar_cero(mifh.getMinutes())+":"+aumentar_cero(mifh.getSeconds())+" "+am_pm;
   }
    return info;
}



