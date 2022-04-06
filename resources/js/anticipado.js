//esta funcion verifica 2 parametros: la tecla presionada y otro parametro que le indica que hacer
function buscarasoc(e,opcion) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==13){
        if (opcion==1){
            //buscarasociado();
            buscar_asociados();
        }
        if (opcion==2){   //si la tecla proviene del input apellido
            buscar_asociados();
        }
        if (opcion==3){   //si la tecla proviene del input nombre
            buscar_asociados();
        }
    }
}

function buscar_asociados(){
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+"anticipado/buscar_asociados";
    var apellido = document.getElementById('apellido').value;
    var nombre = document.getElementById('nombre').value;
    var ci = document.getElementById('ci').value;
    $("#mensaje_cobroanterior").html('');
        $.ajax({url: controlador,
            type:"POST",
            data:{apellido:apellido,nombre:nombre, ci:ci},
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
                html += "<th></th>";
                html += "<tbody id='tabla_resultados'>";
                html += "</tr>";
                
                for(var i = 0; i<fin; i++)
                {
                    html += "<tr onclick='ver_facturas("+JSON.stringify(registros[i])+"); ocultar_tabla(); ultimopago("+registros[i]["id_asoc"]+")'>";               
                    //html += "<tr onclick='ver_facturas("+JSON.stringify(registros[i])+")'>";               
                    html += "<td>"+(i+1)+"</td>";
                    html += "<td>"+registros[i]["apellidos_asoc"]+"</td>";  
                    html += "<td>"+registros[i]["nombres_asoc"]+"</td>";
                    html += "<td align='center'>"+registros[i]["codigo_asoc"]+"</td>";
                    html += "<td align='center'>"+registros[i]["ci_asoc"]+"</td>";
                    html += "<td>"+registros[i]["direccion_asoc"]+"</td>";
                    html += "<td align='center'>"+registros[i]["telefono_asoc"]+"</td>";  
                    html += "<td align='center'>"+registros[i]["nit_asoc"]+"</td>";  
                    html += "<td>"+registros[i]["razon_asoc"]+"</td>";
                    html += "<td><button onclick='ocultar_tabla()' class='btn btn-warning btn-xs'><fa class='fa fa-eraser'></fa></button></td>";
                    html += "</tr>";
                } 
                html += "</tbody>";   
                html += "</table>";   
                html += "</div>";   
                $("#lista_asociados").html(html);
                $("#servicios_asoc").html("");
                $("#elservicio").css("display", "none");
                $("#lagestion").css("display", "none");
                $("#lecturaanterior").html("");
                $("#lecturaanterior").css("display", "none");
                $("#mespara_cobro").html("");
                $("#mespara_cobro").css("display", "none");
                $("#rep_formulario").val("0.00");

            },
            error: function(respuesta){
              alert('No existe');
            }
        });
}

function ver_facturas(respuesta){
    var registros =  respuesta;
    //var registros = eval(respuesta);
    if (registros!=null){
        //var id_asoc = registros["id_asoc"];
        $("#nombre").val(registros["nombres_asoc"]);
        $("#apellido").val(registros["apellidos_asoc"]);
        $("#ci").val(registros["ci_asoc"]);
        $("#id_asoc").val(registros["id_asoc"]);
        $("#nit_asoc").val(registros["nit_asoc"]);
        $("#razon_asoc").val(registros["razon_asoc"]);
        facturas_pendientes(respuesta);
    }
}

function ocultar_tabla(){
    var html = "";
    $("#mitabla_xs").html(html);
}

function facturas_pendientes(larespuesta){
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+"anticipado/buscar_pendientes";
    var asociado = larespuesta["id_asoc"];
    var estado = "PENDIENTE";
    //var estado = document.getElementById('estado').value;
        $.ajax({url: controlador,
            type:"POST",
            data:{asociado:asociado, estado:estado},
            success:function(respuesta){
                var registros = JSON.parse(respuesta);
                if (registros =='') {
                    $("#elservicio").css("display", "block");
                    $("#lagestion").css("display", "block");
                    //$("#lecturaanterior").css("display", "block");
                    $("#servicios_asoc").html(larespuesta["servicios_asoc"]);
                    ultima_lectura(asociado);
                }else{
                    $("#servicios_asoc").html("");
                    $("#elservicio").css("display", "none");
                    $("#lagestion").css("display", "none");
                    $("#lecturaanterior").html("");
                    $("#lecturaanterior").css("display", "none");
                    $("#mespara_cobro").html("");
                    $("#mespara_cobro").css("display", "none");
                    alert('El Asociado Tiene Facturas '+estado+', no puede realizar pagos anticipados!');
                }

            },
            error: function(respuesta){
              alert('No existen Facturas Pendientes');
            }
        });
}

function ultima_lectura(id_asoc)
{
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+"anticipado/buscar_ultimalectura";
        $.ajax({url: controlador,
            type:"POST",
            data:{id_asoc:id_asoc},
            success:function(respuesta){
                var registros = JSON.parse(respuesta);
                html1 = "";
                html2 = "";
                html3 = "";
                //html4 = "";
                if (registros !='') {
                    html1 += "<div class='box-body table-responsive' style='padding: 0px'>";
                    html1 += "<table class='table table-striped table-condensed'>";
                    html1 += "<tr>";
                    html1 += "<td align='center'>Lectura Anterior (mts<sup>3</sup>)</td>";
                    html1 += "<td align='center' style='background-color: #558cf2'><span id='lec_anterior'>"+registros[0]["actual_lec"]+"</span></td>";
                    html1 += "<td align='center' style='background-color: #36396e; color: white'>"+registros[0]["mes_lec"]+"</td>";
                    html1 += "<td align='center' style='background-color: #36396e; color: white'>"+registros[0]["gestion_lec"]+"</td>";
                    html1 += "</tr>";
                    html1 += "<tr>";
                    html1 += "<td align='center' style='background-color: #f0f0f5'>Lectura Promedio Mes (mts<sup>3</sup>)</td>";
                    html1 += "<td align='center' style='background-color: #558cf2'>";
                    html1 += "<input type='number' step='any' min='0' value='0' name='elpromedio' id='elpromedio' onkeypress='calcular_consumo(event,"+JSON.stringify(registros[0])+")' />";
                    html1 += "</td>";
                    html1 += "<td align='center' style='background-color: #36396e; color: white'><span id='consumo_bs'>0</span></td>";
                    html1 += "<td class='text-left' style='background-color: #36396e; color: white' >Bs</td>";
                    html1 += "</tr>";
                    html1 += "<tr>";
                    html1 += "<td align='center' style='background-color: #f0f0f5'>Alcantarillado</td>";
                    html1 += "<td align='center' style='background-color: #36396e'>";
                    html1 += "<span id='consumo_alcantarillado' style='color: white'>0</span>";
                    html1 += "</td>";
                    html1 += "<td class='text-left' style='background-color: #36396e; color: white' >Bs</td>";
                    html1 += "<td></td>";
                    html1 += "</tr>";
                    html1 += "</table>";
                    html1 += "</div>";                    
                    
                    html2 += "<div class='col-md-6 box-body table-responsive' style='padding: 0px'>";
                    html2 += "<table class='table table-striped table-condensed' style='width: 80%'>";
                    html2 += "<tr>";
                    html2 += "<th style='padding: 0px' class='text-center' colspan='2'>Mes</th>";
                    html2 += "<th style='padding: 0px' class='text-center'>Monto Bs.</th>";
                    html2 += "</tr>";
                    html2 += "<tr>";
                    html2 += "<td style='padding-top: 0px; padding-bottom: 0px'><input type='checkbox' id='mes1' name='mes[]' value='1' onchange='cobrar_mes(1)' /></td>";
                    html2 += "<td style='padding-top: 0px; padding-bottom: 0px'>Enero</td>";
                    html2 += "<td style='padding-top: 0px; padding-bottom: 0px'><input style='background-color: #b1b2bd' type='number' step='any' min='0' value='0.00' name='m1' id='m1' readonly /></td>";
                    html2 += "</tr>";
                    html2 += "<tr>";
                    html2 += "<td style='padding-top: 0px; padding-bottom: 0px'><input type='checkbox' id='mes2' name='mes[]' value='2' onchange='cobrar_mes(2)' /></td>";
                    html2 += "<td style='padding-top: 0px; padding-bottom: 0px'>Febrero</td>";
                    html2 += "<td style='padding-top: 0px; padding-bottom: 0px'><input style='background-color: #b1b2bd' type='number' step='any' min='0' value='0.00' name='m2' id='m2' readonly /></td>";
                    html2 += "</tr>";
                    html2 += "<tr>";
                    html2 += "<td style='padding-top: 0px; padding-bottom: 0px'><input type='checkbox' id='mes3' name='mes[]' value='3' onchange='cobrar_mes(3)' /></td>";
                    html2 += "<td style='padding-top: 0px; padding-bottom: 0px'>Marzo</td>";
                    html2 += "<td style='padding-top: 0px; padding-bottom: 0px'><input style='background-color: #b1b2bd' type='number' step='any' min='0' value='0.00' name='m3' id='m3' readonly /></td>";
                    html2 += "</tr>";
                    html2 += "<tr>";
                    html2 += "<td style='padding-top: 0px; padding-bottom: 0px'><input type='checkbox' id='mes4' name='mes[]' value='4' onchange='cobrar_mes(4)' /></td>";
                    html2 += "<td style='padding-top: 0px; padding-bottom: 0px'>Abril</td>";
                    html2 += "<td style='padding-top: 0px; padding-bottom: 0px'><input style='background-color: #b1b2bd' type='number' step='any' min='0' value='0.00' name='m4' id='m4' readonly /></td>";
                    html2 += "</tr>";
                    html2 += "<tr>";
                    html2 += "<td style='padding-top: 0px; padding-bottom: 0px'><input type='checkbox' id='mes5' name='mes[]' value='5' onchange='cobrar_mes(5)' /></td>";
                    html2 += "<td style='padding-top: 0px; padding-bottom: 0px'>Mayo</td>";
                    html2 += "<td style='padding-top: 0px; padding-bottom: 0px'><input style='background-color: #b1b2bd' type='number' step='any' min='0' value='0.00' name='m5' id='m5' readonly /></td>";
                    html2 += "</tr>";
                    html2 += "<tr>";
                    html2 += "<td style='padding-top: 0px; padding-bottom: 0px'><input type='checkbox' id='mes6' name='mes[]' value='6' onchange='cobrar_mes(6)' /></td>";
                    html2 += "<td style='padding-top: 0px; padding-bottom: 0px'>Junio</td>";
                    html2 += "<td style='padding-top: 0px; padding-bottom: 0px'><input style='background-color: #b1b2bd' type='number' step='any' min='0' value='0.00' name='m6' id='m6' readonly /></td>";
                    html2 += "</tr>";
                    html2 += "</table>";
                    html2 += "</div>";
                    
                    html3 += "<div class='col-md-6 box-body table-responsive' style='padding: 0px'>";
                    html3 += "<table class='table table-striped table-condensed'>";
                    html3 += "<tr>";
                    html3 += "<th style='padding: 0px' class='text-center' colspan='2'>Mes</th>";
                    html3 += "<th style='padding: 0px' class='text-center'>Monto Bs.</th>";
                    html3 += "</tr>";
                    html3 += "<tr>";
                    html3 += "<td style='padding-top: 0px; padding-bottom: 0px'><input type='checkbox' id='mes7' name='mes[]' value='7' onchange='cobrar_mes(7)' /></td>";
                    html3 += "<td style='padding-top: 0px; padding-bottom: 0px'>Julio</td>";
                    html3 += "<td style='padding-top: 0px; padding-bottom: 0px'><input style='background-color: #b1b2bd' type='number' step='any' min='0' value='0.00' name='m7' id='m7' readonly /></td>";
                    html3 += "</tr>";
                    html3 += "<tr>";
                    html3 += "<td style='padding-top: 0px; padding-bottom: 0px'><input type='checkbox' id='mes8' name='mes[]' value='8' onchange='cobrar_mes(8)' /></td>";
                    html3 += "<td style='padding-top: 0px; padding-bottom: 0px'>Agosto</td>";
                    html3 += "<td style='padding-top: 0px; padding-bottom: 0px'><input style='background-color: #b1b2bd' type='number' step='any' min='0' value='0.00' name='m8' id='m8' readonly /></td>";
                    html3 += "</tr>";
                    html3 += "<tr>";
                    html3 += "<td style='padding-top: 0px; padding-bottom: 0px'><input type='checkbox' id='mes9' name='mes[]' value='9' onchange='cobrar_mes(9)' /></td>";
                    html3 += "<td style='padding-top: 0px; padding-bottom: 0px'>Septiembre</td>";
                    html3 += "<td style='padding-top: 0px; padding-bottom: 0px'><input style='background-color: #b1b2bd' type='number' step='any' min='0' value='0.00' name='m9' id='m9' readonly /></td>";
                    html3 += "</tr>";
                    html3 += "<tr>";
                    html3 += "<td style='padding-top: 0px; padding-bottom: 0px'><input type='checkbox' id='mes10' name='mes[]' value='10' onchange='cobrar_mes(10)' /></td>";
                    html3 += "<td style='padding-top: 0px; padding-bottom: 0px'>Octubre</td>";
                    html3 += "<td style='padding-top: 0px; padding-bottom: 0px'><input style='background-color: #b1b2bd' type='number' step='any' min='0' value='0.00' name='m10' id='m10' readonly /></td>";
                    html3 += "</tr>";
                    html3 += "<tr>";
                    html3 += "<td style='padding-top: 0px; padding-bottom: 0px'><input type='checkbox' id='mes11' name='mes[]' value='11' onchange='cobrar_mes(11)' /></td>";
                    html3 += "<td style='padding-top: 0px; padding-bottom: 0px'>Noviembre</td>";
                    html3 += "<td style='padding-top: 0px; padding-bottom: 0px'><input style='background-color: #b1b2bd' type='number' step='any' min='0' value='0.00' name='m11' id='m11' readonly /></td>";
                    html3 += "</tr>";
                    html3 += "<tr>";
                    html3 += "<td style='padding-top: 0px; padding-bottom: 0px'><input type='checkbox' id='mes12' name='mes[]' value='12' onchange='cobrar_mes(12)' /></td>";
                    html3 += "<td style='padding-top: 0px; padding-bottom: 0px'>Diciembre</td>";
                    html3 += "<td style='padding-top: 0px; padding-bottom: 0px'><input style='background-color: #b1b2bd' type='number' step='any' min='0' value='0.00' name='m12' id='m12' readonly /></td>";
                    html3 += "</tr>";
                    html3 += "</table>";
                    html3 += "</div>";
                    
                    /*html4 += "<table>";
                    html4 += "<tr>";
                    html4 += "<td style='padding-top: 0px; padding-bottom: 0px'><input type='checkbox' id='multasrec' name='multasrec' value='13' /></td>";
                    html4 += "<td style='padding-top: 0px; padding-bottom: 0px'>Aportes/Multas</td>";
                    html4 += "</tr>";
                    html4 += "</table>";*/
                    $("#fechaant_lec").val(registros[0]["fecha_lec"]);
                    $("#tipo_asoc").val(registros[0]["categoria_asoc"]);
                    $("#servicios_asoc").val(registros[0]["servicios_asoc"]);
                    $("#lecturaanterior").html(html1);
                    $("#lecturaanterior").css("display", "block");
                    $("#mespara_cobro").html(html2+html3);
                    $("#mespara_cobro").css("display", "block");
                    calcular(JSON.stringify(registros[0]),1);
                }else{
                    $("#fechaant_lec").val("");
                    $("#tipo_asoc").val("");
                    $("#servicios_asoc").val("");
                    $("#lecturaanterior").html("");
                    $("#lecturaanterior").css("display", "none");
                    $("#mespara_cobro").html("");
                    $("#mespara_cobro").css("display", "none");
                    alert('El Asociado no tiene lectura anterior!.');
                }

            },
            error: function(respuesta){
              alert('No existen Lecturas');
            }
        });
}

function calcular_consumo(e, asociado) {
    tecla = (document.all) ? e.keyCode : e.which;
    if(tecla == 13){
        calcular(asociado, 0);
    }
}

function calcular(infasociado, dedonde){
    if(dedonde == 1){
        var registros = JSON.parse(infasociado);
    }else{
        var registros = infasociado;
    }
    
    //alert(asociado);
        var lectura_anterior = registros["actual_lec"];
        //alert(lectura_anterior);
        
        var tipo_lectura = document.getElementById("tipo_lectura").value;
        var lectura_promedio = document.getElementById("elpromedio").value;
        var servicios_asoc = registros["servicios_asoc"];
        var base_url = document.getElementById("base_url").value;
        var controlador = base_url + "lectura/calcular_consumo";
        //var asociado = asociado["id_asoc"];
        var tipo_lectura = document.getElementById("tipo_lectura").value;
        if (Number(lectura_promedio) >= 0) {
            var consumo = lectura_promedio;
            var id_asoc = registros["id_asoc"];
            $.ajax({
                url: controlador,
                type: "POST",
                data: {consumo: consumo, asociado: id_asoc, tipo_lectura:tipo_lectura},
                success: function (result) {
                    //alert(tipo_lectura);
                    if (tipo_lectura=='0'){ //tarifas normales
                        var res = JSON.parse(result);
                        var costo_agua = 0;
                        if (Number(res[0].costo_agua)>=0){
                            costo_agua = Number(res[0].costo_agua);
                        }else{
                            costo_agua = 0;
                        }
                        
                        var consumo_bs = costo_agua + ((Number(consumo)-Number(res[0].consumo_basico)) * Number(res[0].costo_mt3));

                        //alert(consumo_bs);
    //                    var consumo_alcantarillado = document.getElementById("consumo_alcantarillado").value;
                        var consumo_alcantarillado = res[0].costo_alcant;

                        //var aportes_multas = document.getElementById("aportes_multas").value;
                        //var descuentos = document.getElementById("descuentos").value;
                        //var total_bs = "0.00";

                        //alert(consumo_bs+" - "+consumo_alcantarillado);

                        if (servicios_asoc == "AGUA"){ 
                            consumo_alcantarillado = 0; 
                        }

                        if (servicios_asoc == "ALCANTARILLADO"){ 
                            consumo_bs = 0;
                        }
                        
                        $("#consumo_bs").html(Number(consumo_bs).toFixed(2));
                        $("#consumo_alcantarillado").html(Number(consumo_alcantarillado));
                        /*
                        total_bs = Number(consumo_bs) + Number(consumo_alcantarillado) + Number(aportes_multas)- Number(descuentos);

                        $("#total_bs").val(total_bs.toFixed(2));
                        */
                        //cargar inputs
                        /*$("#actual_lec").val(lectura_actual);
                        $("#anterior_lec").val(lectura_anterior);
                        $("#consumo_lec").val(consumo);
                        $("#totalcons_lec").val(consumo_bs);
                        $("#monto_lec").val(consumo_bs);
                        $("#estado_lec").val("LECTURADO");
                        $("#canfact_lec").val(1);
                        $("#montofact_lec").val(total_bs);
                        
                        document.getElementById("boton_registrar_lectura").style.display = 'inline';

                        $("#boton_registrar_lectura").focus();
                        */
                    } // fin de if (tipo_lectura=='0'){ //tarifas normales
                    else{ //Si es tarifa por parametros..
                    
                        var res = JSON.parse(result);
                        var consumo_bs = 0;
                        var consumo_bs = 0;
                        var porc_factura = 0;
                        var costofijo = 0;
                        var consumobs = 0;
                        var alcantarillado = 0;
                        var tarifa = 0;
                        //var aportes_multas = document.getElementById("aportes_multas").value;
                        //var descuentos = document.getElementById("descuentos").value;
                        var total_bs = "0.00";
                        
                        if (res.length>0){
                                porc_factura = res[0].porc_factura;
                                costofijo = res[0].costo_fijo;
                                
                                if (servicios_asoc == 'AGUA' || servicios_asoc == 'AGUA POTABLE')
                                {
                                    consumo_bs = (( Number(res[0].costo_m3) * Number(consumo)) + Number(res[0].montofijo_extra) + Number(costofijo)) * Number(res[0].porc_factura);
                                    consumo_alcantarillado = 0;
                                }

                                
                                if  (servicios_asoc == 'ALCANTARILLADO')
                                {
                                    consumo_bs = 0;
                                    //consumo_alcantarillado =  Number(res[0].porc_alcant) * Number(res[0].porc_factura);
                                    consumo_alcantarillado =  (Number(res[0].porc_alcant) * Number(res[0].porc_factura)) + Number(res[0].costo_fijo) + Number(res[0].montofijo_extra);
                                }

                                if (servicios_asoc == 'AGUA Y ALCANTARILLADO')
                                {
                                
                                    consumobs = (Number(res[0].costo_m3) * Number(consumo)) + Number(res[0].montofijo_extra);
                                    //se cambio por orden de la sra nitza, para calcular en funcion al consumo de agua
                                    //alcantarillado = consumobs * res[0].porc_alcant').asfloat * porc_factura;

                                    tarifa = ((Number(consumobs) + Number(costofijo)) * Number(porc_factura));
                                    
                                    alcantarillado = Number(consumobs) * Number(res[0].porc_alcant);
                                    
                                    consumo_bs = Number(tarifa);
                                    
                                    consumo_alcantarillado = Number(alcantarillado);

                                }
                            
                                consumo_alcantarillado = consumo_alcantarillado.toFixed(2);
                                consumo_bs = consumo_bs.toFixed(2);
                            
                         
                                $("#consumo_bs").html(Number(consumo_bs));
                                $("#consumo_alcantarillado").html(Number(consumo_alcantarillado));

                                /*total_bs = Number(consumo_bs) + Number(consumo_alcantarillado) + Number(aportes_multas)- Number(descuentos);

                                $("#total_bs").val(total_bs.toFixed(2));

                                //cargar inputs
                                $("#actual_lec").val(lectura_actual);
                                $("#anterior_lec").val(lectura_anterior);
                                $("#consumo_lec").val(consumo);
                                $("#totalcons_lec").val(consumo_bs);
                                $("#monto_lec").val(consumo_bs);
                                $("#estado_lec").val("LECTURADO");
                                $("#canfact_lec").val(1);
                                $("#montofact_lec").val(total_bs);

                                document.getElementById("boton_registrar_lectura").style.display = 'inline';

                                $("#boton_registrar_lectura").focus();
                                */

                        
                        
                        }//fin if(res.length>0)
                    }//fin else
                    $("#btnfinalizar").prop('disabled',false);

                }, error: function (result) {
                    $("#consumo_bs").val("0.00");
                }
            });

        } else {
            alert("ADVERTENCIA: La lectura promedio debe ser mayor a cero");
            $("#elpromedio").focus();
        }
}

function cobrar_mes(mes) {
    var total_aporte = document.getElementById("total_aporte").value;
    var el_promedio = document.getElementById("elpromedio").value;
    var lagestion = document.getElementById("gestionlec_asoc").value;
    if ($('#mes'+mes).is(':checked') ) {
        $("#m"+mes).css('background-color','#edf3f5');
        var consumo_bs = $("#consumo_bs").html();
        var consumo_alcant = $("#consumo_alcantarillado").html();
        $("#m"+mes).val(Number(consumo_bs)+Number(consumo_alcant));
        var total_consumo = Number($("#consumo").val());
        $("#consumo").val(Number(total_consumo+Number(consumo_bs)+Number(consumo_alcant)).toFixed(2));
        var rep_form = $("#rep_formulario").val();
        $("#rep_formulario").val(Number(Number(rep_form)+Number(total_aporte)).toFixed(2));
        $("#aportes").val($("#rep_formulario").val());
        var consumo_m3 = $("#consumo_m3").val();
        $("#consumo_m3").val(Number(consumo_m3)+Number(el_promedio));
        /* ************inicio esto esta para ASAPAVS************* */
        var fecha = new Date();
        var elmes = fecha.getMonth();
        var elanio = fecha.getFullYear();
        let recargo = Number($("#recargos").val());
        if(lagestion < elanio){
            recargo = recargo+8.33;
        }else if(mes < Number(elmes+1)){
            recargo = recargo+2;
            //alert(recargo);
        }
        $("#recargos").val(recargo.toFixed(2));
        /* ************fin esto esta para ASAPAVS************* */
        //var total_factura = $("#total_factura").val();
        $("#total_factura").val(Number(Number($("#consumo").val())+Number($("#aportes").val())+Number($("#recargos").val())).toFixed(2));
    }else{
        $("#m"+mes).css('background-color','#b1b2bd');
        var consumo_bs = $("#consumo_bs").html();
        var consumo_alcant = $("#consumo_alcantarillado").html();
        $("#m"+mes).val("0.00");
        var total_consumo = Number($("#consumo").val());
        $("#consumo").val(Number(total_consumo-(Number(consumo_bs)+Number(consumo_alcant))).toFixed(2));
        var rep_form = $("#rep_formulario").val();
        $("#rep_formulario").val(Number(Number(rep_form)-Number(total_aporte)).toFixed(2));
        $("#aportes").val($("#rep_formulario").val());
        var consumo_m3 = $("#consumo_m3").val();
        $("#consumo_m3").val(Number(consumo_m3)-Number(el_promedio));
        /* ************inicio esto esta para ASAPAVS************* */
        var fecha = new Date();
        var elmes = fecha.getMonth();
        var elanio = fecha.getYear();
        let recargo = Number($("#recargos").val());
        if(lagestion < elanio){
            recargo = recargo-8.33;
        }else if(mes < Number(elmes+1)){
            recargo = recargo-2;
            //alert(recargo);
        }
        $("#recargos").val(recargo);
        /* ************fin esto esta para ASAPAVS************* */
        //var total_factura = $("#total_factura").val();
        $("#total_factura").val(Number($("#consumo").val())+Number($("#aportes").val())+Number($("#recargos").val()));
    }
}
/* Cobrar(Finalizar) pagos por anticipado */
function finalizar(){
    $("#btnfinalizar").prop('disabled',true);
    var tam = $('[name="mes[]"]:checked').length;
    //alert(tam);
    if (tam >0){
        var band = true;
        var res_sec = true;
        var primero = 0;
        var losmeses = [];
        $('[name="mes[]"]:checked').each(function(){
            if(band == true){
                primero = $(this).val();
                band = false;
            }else{
                if(primero != $(this).val()){
                    res_sec = false;
                }
            }
            losmeses.push(($(this).attr("value")));
            primero = Number(Number(primero)+1);
        });
        
        if(res_sec == true){
            registrar_lecfact(losmeses);
        }else{
            alert("Los meses deben ser consecutivos");
        }
    }else{
        alert("Debe elegir el o los meses a pagar!");
    }
}
/* registra lectura y factura a detalle por mes.. */
function registrar_lecfact(losmeses){
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'anticipado/registrarfactura';
    var id_asoc = document.getElementById('id_asoc').value;
    var factura_id = document.getElementById('factura_id').value;
    var lectura_id = document.getElementById('lectura_id').value;
    //var multar = document.getElementById('multar').checked;
    var generar_factura = document.getElementById('generar_factura').checked;
    var imprimir_factura = document.getElementById('imprimir_factura').checked;
    var imprimir_copia = document.getElementById('imprimir_copia').checked;
    var consumo = document.getElementById('consumo').value;
    var aportes = document.getElementById('aportes').value;
    var recargos = document.getElementById('recargos').value;
    var total = document.getElementById('total_factura').value;
    var nit_asoc = document.getElementById('nit_asoc').value;
    var razon_asoc = document.getElementById('razon_asoc').value;
    var esexento = document.getElementById('esexento').value;
    var elexento = document.getElementById('elexento').checked;
    var tipo_factura = $('input:radio[name=tipofactura]:checked').val();
    var gestionlec_asoc = document.getElementById('gestionlec_asoc').value;
    var fechaant_lec = document.getElementById('fechaant_lec').value;
    var total_aporte = document.getElementById('total_aporte').value;
    var lec_anterior = $("#lec_anterior").html();
    var elpromedio = $("#elpromedio").val();
    var consumo_bs = $("#consumo_bs").html();
    var tipo_asoc = document.getElementById('tipo_asoc').value;
    var servicios_asoc = document.getElementById('servicios_asoc').value;
    var consumo_alcantarillado = $("#consumo_alcantarillado").html();
    var rep_concepto = document.getElementById('rep_concepto').value;
    //var estemes = 0;
    /*var miband = true;
    $('[name="mes[]"]:checked').each(function(){
        estemes = $(this).val();
        if(miband == true){
            miband = false;
        }else{
            lec_anterior = Number(lec_anterior)+Number(elpromedio)
        }*/
        $.ajax({url:controlador,

                type:"POST",

                data:{factura_id:factura_id,generar_factura:generar_factura,lectura_id:lectura_id,
                      consumo:consumo,aportes:aportes,recargos:recargos,total:total,nit_asoc:nit_asoc,
                      razon_asoc:razon_asoc, esexento:esexento, tipo_factura:tipo_factura,
                      id_asoc:id_asoc, gestionlec_asoc:gestionlec_asoc, lec_anterior:lec_anterior,
                      elpromedio:elpromedio, fechaant_lec:fechaant_lec, consumo_bs:consumo_bs, tipo_asoc:tipo_asoc,
                      servicios_asoc:servicios_asoc, consumo_alcantarillado:consumo_alcantarillado,
                      total_aporte:total_aporte, losmeses:losmeses, elexento:elexento, rep_concepto:rep_concepto},

                success:function(respuesta){

                    var registros = JSON.parse(respuesta);
                    if(registros != null){
                    alert('COBRO REALIZADO CON EXITO');
                    if (imprimir_factura==true) {
                        window.open(base_url+"factura/imprimir_recibo/"+registros[0]["id_fact"], '_blank'); //factura original
                    }
                    if (imprimir_copia==true) {
                        window.open(base_url+"factura/imprimir_recibo/"+registros[0]["id_fact"], '_blank'); //factura copia
                    }
                    /*if (imprimir_factura==true) {
                        window.open(base_url+"factura/imprimir_factura/0/"+registros[0]["id_fact"], '_blank'); //factura original
                    }
                    if (imprimir_copia==true) {
                        window.open(base_url+"factura/imprimir_factura/1/"+registros[0]["id_fact"], '_blank'); //factura copia
                    }*/
                    location.reload();
                    /*var nada = "";
                    $("#lista_pendientes").html(nada);
                    $("#detalle_factura").html(nada);
                    $("#detalle_recargo").html(nada);
                    $("#consumo").val("0.00");
                    $("#aportes").val("0.00");
                    $("#recargos").val("0.00");
                    $("#total_factura").val("0.00");
                    $("#btnfinalizar").prop('disabled',true);
                    facturas_pendientes(id_asoc);*/
                }else{
                    alert("Informacion Incorrecta, revise sus datos, consumo y total no pueden ser 0");
                }

                },

                error:function(respuesta){          

                   alert('No tiene una factura seleccionada');

                }
        });
   // });



}

function actualizarvalores(){
    var elpromedio = $("#rep_formulario").val();
}

function actualizarvalores(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if(tecla == 13){
        var elpromedio = $("#rep_formulario").val();
        $("#aportes").val(elpromedio);
        var eltotal = Number($("#consumo").val())+Number($("#aportes").val())+Number($("#recargos").val())
        $("#total_factura").val(eltotal);
    }
}

function ultimopago(id_asoc)
{
    var base_url    = document.getElementById('base_url').value;
    var controlador = base_url+"anticipado/get_ultimopago";
    $.ajax({url: controlador,
        type:"POST",
        data:{id_asoc:id_asoc},
        success:function(respuesta){
            var registros = JSON.parse(respuesta);
            if(registros != null){
                console.log(registros);
                var el_ultimo = registros.length;
                if(el_ultimo>0){
                    $("#mensaje_cobroanterior").html('Ultimo pago realizado: '+registros[el_ultimo-1]["mes_lec"]+" "+registros[el_ultimo-1]["gestion_lec"]);
                }else{
                    $("#mensaje_cobroanterior").html('No tiene pagos registrados');
                }
            }else{
                $("#mensaje_cobroanterior").html('Ocurrio algo');
            }
        },
        error: function(respuesta){
          alert('Esta Factura no se puede Anular');
        }
    });
}





























   








function buscarasociado(){

   var base_url = document.getElementById('base_url').value;
   var ci = document.getElementById('ci').value;
   var controlador = base_url+'factura/buscarasociado';
 
    $.ajax({url:controlador,

            type:"POST",

            data:{ci:ci},

            success:function(respuesta){

                

                var registros = eval(respuesta);

                

                if (registros[0]!=null){

                    

                    $("#nombre").val(registros[0]["nombres_asoc"]);
                    $("#apellido").val(registros[0]["apellidos_asoc"]);

                    //document.getElementById('telefono').focus();
                    $("#id_asoc").val(registros[0]["id_asoc"]);

                    facturas_pendientes(registros[0]["id_asoc"]);
                    
                }

                else

                {
                  
                    alert('No existe un Asociado Con este Codigo/C.I.');   

                }

            },

            error:function(respuesta){			

               alert('No existe un Asociado Con este Codigo/C.I.');

            }                

    }); 



}







/*
function multas_pendientes(asociado)
{
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+"factura/buscar_multas";
    
        $.ajax({url: controlador,
            type:"POST",
            data:{asociado:asociado},
            success:function(respuesta){
                
                var registros = JSON.parse(respuesta);
                var fin = registros.length;
                html = "";
               
                
                for(var i = 0; i<fin; i++)
                {

                    html += "<tr onclick='ver_facturas("+registros[i]["id_fact"]+")'>";               
                    html += "<td>"+(i+1)+"</td>";
                    html += "<td>"+registros[i]["motivo_multa"]+"</td>";
                    html += "<td>"+registros[i]["cant_detfact"]+"</td>";
                    html += "<td>"+registros[i]["descip_detfact"]+"</td>";
                    html += "<td>"+registros[i]["monto_multa"]+"</td>";
                    html += "<td>"+registros[i]["desc_detfact"]+"</td>";
                    html += "<td>"+registros[i]["total_detfact"]+"</td>";
                   
                    
                    html += "</tr>";
                } 
                   
                $("#detalle_factura").html(html);

            },
            error: function(respuesta){
              alert('No existen Facturas Pendientes');
            }
        });
}*/

function detalle_factura(factura,lectura)
{
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+"factura/buscar_detalle";
    buscar_recargos(lectura);
    tabla_totales(factura,lectura);
        $.ajax({url: controlador,
            type:"POST",
            data:{factura:factura},
            success:function(respuesta){
                
                var registros = JSON.parse(respuesta);
                var fin = registros.length;
                html = "";
                var total =  Number(0);
                var totalexento =  Number(0);
                
                for(var i = 0; i<fin; i++)
                {
                    total +=  Number(registros[i]["total_detfact"]);
                    if(registros[i]["exento_detfact"] =="SI"){
                        totalexento +=  Number(registros[i]["total_detfact"]);
                    }
                    html += "<tr>";               
                    html += "<td align='center'>"+(i+1)+"</td>";
                    html += "<td align='center'>"+registros[i]["id_fact"]+"</td>";
                    html += "<td align='center'>"+registros[i]["cant_detfact"]+"</td>";
                    html += "<td>"+registros[i]["descip_detfact"]+"</td>";
                    html += "<td align='right'>"+Number(registros[i]["punit_detfact"]).toFixed(2)+"</td>";
                    html += "<td align='right'>"+Number(registros[i]["desc_detfact"]).toFixed(2)+"</td>";
                    html += "<td align='right'>"+Number(registros[i]["total_detfact"]).toFixed(2)+"</td>";
                    html += "</tr>";
                } 
                    html += "<tr>";               
                    html += "<td colspan='2' align='center'><b>TOTAL</b></td>";
                    html += "<td colspan='4'></td>";
                    html += "<td align='right'><b>"+Number(total).toFixed(2)+"</b></td>";
                    html += "</tr>";
                   
                $("#detalle_factura").html(html);
                $("#factura_id").val(factura);
                $("#lectura_id").val(lectura);
                $("#esexento").val(totalexento);
                $("#btnfinalizar").prop('disabled',false);
                

            },
            error: function(respuesta){
              alert('No existen Facturas Pendientes');
            }
        });
}

function buscar_recargos(lectura)
{
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+"factura/buscar_recargos";
    
        $.ajax({url: controlador,
            type:"POST",
            data:{lectura:lectura},
            success:function(respuesta){
                
                var registros = JSON.parse(respuesta);
                var fin = registros.length;
                html = "";
                var total =  Number(0);
                
                for(var i = 0; i<fin; i++)
                {
                    total +=  Number(registros[i]["monto_param"]);

                    html += "<tr>";               
                    html += "<td align='center'>"+(i+1)+"</td>";
                    html += "<td>"+registros[i]["descip_param"]+" "+registros[i]["detalle_param"]+"</td>";
                    html += "<td align='center'>1</td>";
                    html += "<td align='right'>"+Number(registros[i]["monto_param"]).toFixed(2)+"</td>";
                    html += "<td align='right'>"+Number(0).toFixed(2)+"</td>";
                    html += "<td align='right'>"+Number(registros[i]["monto_param"]).toFixed(2)+"</td>";
                    html += "</tr>";
                } 

                    html += "<tr>";               
                    html += "<td colspan='2' align='center'><b>TOTAL</b></td>";
                    html += "<td colspan='3'></td>";
                    html += "<td align='right'><b>"+Number(total).toFixed(2)+"</b></td>";
                    html += "</tr>";
                   
                $("#detalle_recargo").html(html);

            },
            error: function(respuesta){
              alert('No existen Facturas Pendientes');
            }
        });
}


function tabla_totales(factura,lectura)
{
    var base_url    = document.getElementById('base_url').value;
    var multar    = document.getElementById('multar').checked;
    var controlador = base_url+"factura/datos_factura";
   
    
    $.ajax({url: controlador,
            type:"POST",
            data:{factura:factura,lectura:lectura},
            success:function(respuesta){
              
                var registros = JSON.parse(respuesta);
                //alert(registros.multa);
                var consumos = (Number(registros.consumo).toFixed(2));
                var multas = (Number(registros.multa).toFixed(2));
          
            if(multar==true){
                var recargos = (Number(registros.recargo).toFixed(2));    
            } else {
                var recargos = (Number(0).toFixed(2));  
            }    

                var total_factura = Number(consumos)+Number(multas)+Number(recargos);
                $("#consumo").val(Number(consumos).toFixed(2));
                $("#aportes").val(Number(multas).toFixed(2));
                $("#recargos").val(Number(recargos).toFixed(2));
                $("#total_factura").val(Number(total_factura).toFixed(2));

            },
            error: function(respuesta){
              alert('No existen Facturas Pendientes');
            }
        });
}

function multar(){
    
    var factura = document.getElementById('factura_id').value;
    var lectura = document.getElementById('lectura_id').value;
    tabla_totales(factura,lectura);
    
}



function reimprimirbusqueda()
{
    var base_url    = document.getElementById('base_url').value;
    var numero    = document.getElementById('numero').value;
    var tipoimpresion    = document.getElementById('tipoimpresion').checked;
    if (numero=='') {
         alert('Debe ingresar un numero');   
         alert(tipoimpresion);   
    }else{
        if (tipoimpresion==false) {
            var controlador = base_url+"factura/buscar_lectura";

            $.ajax({url: controlador,
            type:"POST",
            data:{numero:numero},
            success:function(respuesta){
              
            window.open(base_url+'lectura/preaviso_boucher/'+numero, '_blank'); 


            },
            error: function(respuesta){
              alert('Esta lectura no existe');
            }
        });
           
        }
        else{
            var controlador = base_url+"factura/buscar_recibo";
            $.ajax({url: controlador,
            type:"POST",
            data:{numero:numero},
            success:function(respuesta){
            
            var registros = JSON.parse(respuesta);
            window.open(base_url+'factura/imprimir/'+registros['id_fact'], '_blank'); 

            },
            error: function(respuesta){
              alert('Esta lectura no tiene una factura cancelada');
            }
        }); 
        }  
        }
}

function reimprimir()
{
    var base_url    = document.getElementById('base_url').value;
    var factura_id    = document.getElementById('factura_id').value;
    if (factura_id=='') {
         alert('No selecciono ninguna factura.');   
    }else{
         window.open(base_url+'factura/imprimir/'+factura_id, '_blank'); 
    }  
}


function anular()
{
    var base_url    = document.getElementById('base_url').value;
    var factura_id    = document.getElementById('factura_id').value;
    var controlador = base_url+"factura/anular";
    var id_asoc = document.getElementById('id_asoc').value;
    $.ajax({url: controlador,
            type:"POST",
            data:{factura_id:factura_id},
            success:function(respuesta){
              
            alert('Factura Anulada con Exito'); 
            $("#modaleliminar").modal('hide');
            var nada = "";
                $("#lista_pendientes").html(nada);
                $("#detalle_factura").html(nada);
                $("#detalle_recargo").html(nada);
                facturas_pendientes(id_asoc);
             

            },
            error: function(respuesta){
              alert('Esta Factura no se puede Anular');
            }
        });
   
}


function total_pendientes(asociado)
{
        var base_url    = document.getElementById('base_url').value;
        var controlador = base_url+"factura/total_pendiente";
        $.ajax({url: controlador,
            type:"POST",
            data:{asociado:asociado},
            success:function(respuesta){
                
           var registros = JSON.parse(respuesta);
           
                $("#total_pendientes").html('Pendientes: '+Number(registros).toFixed(2));
             

            },
            error: function(respuesta){
              alert('Esta Factura no se puede Anular');
            }
        });
}

function facturan()
{
    
    var facturan = document.getElementById('generar_factura').checked;
    //alert(facturan);
    if (facturan==true) {
            document.getElementById('facturan').style.display = 'block';
                                         
    }else{
            document.getElementById('facturan').style.display = 'none';         
    }
}
