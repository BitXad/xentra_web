function seleccionar_lectura() {
    $("#lectura_actual").select();
    
}

function esMobil() {

    var isMobile = {
        Android: function () {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function () {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function () {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function () {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function () {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function () {
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
        }
    };
    return isMobile.any()
}

function formato_fecha(string) {
    var info = "";
    if (string != null) {
        info = string.split('-').reverse().join('/');
    }
    return info;
}

function formato_numerico(numer) {
    var partdecimal = "";
    var numero = "";
    var num = numer.toString();
    var signonegativo = "";
    var resultado = "";

    /*quitamos el signo al numero, si es que lo tubiera*/
    if (num[0] == "-") {
        signonegativo = "-";
        numero = num.substring(1, num.length);
    } else {
        numero = num;
    }
    /*guardamos la parte decimal*/
    if (num.indexOf(".") >= 0) {
        partdecimal = num.substring(num.indexOf("."), num.length);
        numero = numero.substring(0, num.indexOf(".") - 1);
    } else {
        numero = num;
    }
    for (var j, i = numero.length - 1, j = 0; i >= 0; i--, j++) {
        resultado = numero.charAt(i) + ((j > 0) && (j % 3 == 0) ? "," : "") + resultado;
    }

    resultado = signonegativo + resultado + partdecimal;
    return resultado;
}


function calcular(id_asoc){
        var lectura_anterior = document.getElementById("lectura_anterior").value;
        var lectura_actual = document.getElementById("lectura_actual").value;
        var base_url = document.getElementById("base_url").value;
        var controlador = base_url + "lectura/calcular_consumo";
        var asociado = id_asoc;
    
    
        if (Number(lectura_actual) >= Number(lectura_anterior)) {
            var consumo = lectura_actual - lectura_anterior;
            $("#consumo_mt3").val(Number(consumo).toFixed(2));

            $.ajax({
                url: controlador,
                type: "POST",
                data: {consumo: consumo, asociado: asociado},
                success: function (result) {

                    var res = JSON.parse(result);

                    $("#consumo_bs").val(res[0].costo_agua);
                    $("#consumo_alcantarillado").val(res[0].costo_alcant);

                    var consumo_bs = document.getElementById("consumo_bs").value;
                    var consumo_alcantarillado = document.getElementById("consumo_alcantarillado").value;
                    var aportes_multas = document.getElementById("aportes_multas").value;
                    var total_bs = "0.00";

                    total_bs = Number(consumo_bs) + Number(consumo_alcantarillado) + Number(aportes_multas);

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

                }, error: function (result) {
                    $("#consumo_bs").val("0.00");
                }
            });

        } else {
            alert("ADVERTENCIA: La lectura actual no puede ser menor a la anterior..!!");
            $("#lectura_actual").focus();
        }
}

function calcular_consumo(e, id_asoc) {

    var lectura_anterior = document.getElementById("lectura_anterior").value;
    var lectura_actual = document.getElementById("lectura_actual").value;
    var base_url = document.getElementById("base_url").value;
    var controlador = base_url + "lectura/calcular_consumo";
    var asociado = id_asoc;

    tecla = (document.all) ? e.keyCode : e.which;

    if (tecla == 13) {
        calcular(id_asoc);
    }
}

function cargar_lectura(lectura) {

    var html = "";
    var select_asociado = document.getElementById("select_afiliados").value;
    var mes = document.getElementById("select_mes").value;
    var gestion = document.getElementById("select_gestion").value;
    var asociado = lectura.id_asoc;
    var base_url = document.getElementById("base_url").value;
    var controlador = base_url + "lectura/mostrar_multas";


    $("#id_asoc").val(lectura.id_asoc);
    $("#mes_lec").val(mes);
    $("#gestion_lec").val(gestion);

    //var lectura = document.getElementById("select_mes").value;

    if (select_asociado == "SIN LECTURA") {

        html += "<table>";
        html += "<tr>";
        html += "<td>";
        html += "<b>CÓDIGO:</b> " + lectura.codigo_asoc;
        html += "<br><b>ASOCIADO:</b> " + lectura.apellidos_asoc + ", " + lectura.nombres_asoc;
        html += "<br><b>SERVICIO:</b> " + lectura.servicios_asoc;
        html += "<br><b>TIPO:</b> " + lectura.categoria_asoc;
        html += "<br><b>DIRECCIÓN:</b> " + lectura.direccion_asoc;
        html += "<br><b>ZONA:</b> " + lectura.zona_asoc;
        html += "</td>";
        html += "</tr>";
        html += "</table>";

        html += "<table id='mitabla' class='table-condensed' style='font-size:10px;'>";

        //Cargar inputs
        $("#servicios_asoc").val(lectura.servicios_asoc);
        $("#tipo_asoc").val(lectura.categoria_asoc);

        $("#nit_fact").val(lectura.nit_asoc);
        $("#razon_fact").val(lectura.razon_asoc);




        if (esMobil()) {
            html += "<th style='padding:0;'>TIPO</th>";
            //html += "<th style='padding:0;'>MOTIVO</th>";
            html += "<th style='padding:0;'>MONTO</th>";
            html += "<th style='padding:0;'>GESTIÓN</th>";
//            html += "<th style='padding:0;'>APLICACIÓN</th>";
        } else {
            html += "<th style='padding:0;'>TIPO</th>";
            html += "<th style='padding:0;'>MOTIVO</th>";
            html += "<th style='padding:0;'>MONTO</th>";
            html += "<th style='padding:0;'>GESTIÓN</th>";
            html += "<th style='padding:0;'>APLICACIÓN</th>";
        }

//        html += "<th style='padding:0;'>DESCRIPCION</th>";        

        html += "<tbody id='tabla_datos_lectura'>";

        $("#datos_lectura").html(html);


        $.ajax({
            url: controlador,
            type: "POST",
            data: {mes: mes, gestion: gestion, asociado: asociado},
            success: function (result) {

                var res = JSON.parse(result);
                var tam = res.length;
                var html = "";
                var total_multa = 0;
                var ancho = "size=5;";

//            alert(tam);
                for (var i = 0; i < tam; i++) {
                    total_multa += Number(res[i].monto);

                    if (esMobil()) {

                        html += "<tr style='padding:0;'>";
                        html += "<td style='padding:0;'><b>" + res[i].multa + "</b>";
                        html += "<br>" + res[i].motivo + "</td>";
                        html += "<td style='padding:0;'>" + Number(res[i].monto).toFixed(2) + "</td>";
                        html += "<td style='padding:0;'>" + res[i].mes + "/" + res[i].gestion;
                        html += "<br>" + res[i].tipo + "</td>";
                        html += "</tr>";

                    } else {

                        html += "<tr style='padding:0;'>";
                        html += "<td style='padding:0;'>" + res[i].multa + "</td>";
                        html += "<td style='padding:0;'>" + res[i].motivo + "</td>";
                        html += "<td style='padding:0;'>" + Number(res[i].monto).toFixed(2) + "</td>";
                        html += "<td style='padding:0;'>" + res[i].mes + "/" + res[i].gestion + "</td>";
                        html += "<td style='padding:0;'>" + res[i].tipo + "</td>";
                        html += "</tr>";
                    }

                }

                html += "<tr style='padding:0;'>";
                html += "<th colspan='5' style='padding:0;'><h3 style='font-family:Arial; padding:0; margin:0;'><b>DETALLE DE LECTURA</b></h3></th>";
                html += "</tr>";

                color_fondo = "silver;";

                if (esMobil()) {
                    columnas = "colspan='2'";
                } else {
                    columnas = "colspan='4'";
                }

                html += "<tr style='padding:0; background-color: " + color_fondo + ";'>";
                html += "<td style='padding:0;' " + columnas + "><b>LECTURA ANTERIOR (mt3): </b></td>";
                html += "<td style='padding:0;'><input type='text' value='0.00' id='lectura_anterior' style='background: silver;' readonly='true' " + ancho + "/></td>";
                html += "</tr>";

                html += "<tr style='padding:0; background-color: " + color_fondo + "; font-size:13px; font-style: bold'>";
                html += "<td style='padding:0;' " + columnas + "><b>LECT. ACTUAL (mt3): </b></td>";
                html += "<td style='padding:0;'><input type='number'  value='0.00' min='0' id='lectura_actual' style='background: yellow; width: 50pt;' onclick='seleccionar_lectura()' onkeyup='calcular_consumo(event," + asociado + ")' />";
                html += "<button class='btn btn-xs btn-facebook' onclick ='calcular(" + asociado + ")'> Calcular</button>";
                html += "</td>";
                html += "</tr>";

                html += "<tr style='padding:0; background-color: " + color_fondo + ";'>";
                html += "<td style='padding:0;' " + columnas + "><b>CONSUMO (mt3): </b></td>";
                html += "<td style='padding:0;'><input type='text' value='0.00' id='consumo_mt3' style='background: silver;' readonly='true' " + ancho + "/></td>";
                html += "</tr>";

                html += "<tr style='padding:0; background-color: " + color_fondo + ";'>";
                html += "<td style='padding:0;' " + columnas + "><b>CONSUMO (Bs): </b></td>";
                html += "<td style='padding:0;'><input type='text' value='0.00' id='consumo_bs' style='background: silver;' readonly='true' " + ancho + "/></td>";
                html += "</tr>";

                html += "<tr style='padding:0; background-color: " + color_fondo + ";'>";
                html += "<td style='padding:0;' " + columnas + "><b>ALCANTARILLADO (Bs): </b></td>";
                html += "<td style='padding:0;'><input type='text' value='0.00' id='consumo_alcantarillado' style='background: silver;' readonly='true' " + ancho + "/></td>";
                html += "</tr>";

                html += "<tr style='padding:0; background-color: " + color_fondo + ";'>";
                html += "<td style='padding:0;' " + columnas + "><b>MULTAS Y APORTES (Bs): </b></td>";
                html += "<td style='padding:0;'><input type='text' value='" + total_multa.toFixed(2) + "' id='aportes_multas' style='background: silver;' readonly='true' " + ancho + "/></td>";
                html += "</tr>";

                html += "<tr style='padding:0; background-color: " + color_fondo + ";'>";
                html += "<td style='padding:0;' " + columnas + "><b>FACTURAS ADEUDADAS (Bs): </b></td>";
                html += "<td style='padding:0;'><input type='text' value='0' id='cantidad_adeudadas' style='background: silver;' readonly='true' " + ancho + "/><input type='text' value='0.00' id='facturas_adeudadas' style='background: silver;' readonly='true' " + ancho + "/></td>";
                html += "</tr>";

                html += "<tr style='padding:0; background-color: " + color_fondo + "; font-size:14px; font-style: bold'>";
                html += "<td style='padding:0;' " + columnas + "><b>TOTAL (Bs): </b></td>";
                html += "<td style='padding:0;'><input type='text' value='0' id='total_bs' style='background: orange;' readonly='true' " + ancho + "/></td>";
                html += "</tr>";


                html += "</tbody>";
                html += "</table>";

                $("#tabla_datos_lectura").html(html);

            },
        });

        //obtener facturas adeudadas
        var controlador2 = base_url + "lectura/facturas_adeudadas";
        $.ajax({
            url: controlador2,
            type: "POST",
            data: {mes: mes, gestion: gestion, asociado: asociado},
            success: function (result) {

                var res = JSON.parse(result);
                $("#cantidad_adeudadas").val(res[0].cantfact);
                $("#facturas_adeudadas").val(Number(res[0].sumafact).toFixed(2));

                //cargar inputs
                $("#cantfact_lec").val(res[0].cantfact);
                $("#montofact_lec").val(res[0].sumafact);


            },
            error: function (result) {
                $("#cantidad_adeudadas").val('0');
                $("#facturas_adeudadas").val('0.00');

                //cargar inputs
                $("#cantfact_lec").val(0);
                $("#montofact_lec").val(0);
            }
        });

        //
        var controlador3 = base_url + "lectura/lecturas_anteriores";
        $.ajax({
            url: controlador3,
            type: "POST",
            data: {mes: mes, gestion: gestion, asociado: asociado},
            success: function (result) {

                var res = JSON.parse(result);
                $("#lectura_anterior").val(res[0].actual_lec);
                //$("#facturas_adeudadas").val(Number(res[0].sumafact).toFixed(2));

                //cargar inputs
                $("#fechaant_lec").val(res[0].fecha_lec);
                
                
            },
            error: function (result) {
                $("#lectura_anterior").val('0');
//            $("#facturas_adeudadas").val('0.00');

            }
        });

        $("#boton_lectura").click();


    } else {
        alert("ERROR: Debe seleccionar un MES SIN LECTURA..!!!");
    }
       
                    //focus lectura
                $('#modal_lectura').on('shown.bs.modal', function() {
                    $('#lectura_actual').focus();
                    $('#lectura_actual').select();
                }); 
    

}

function imprimir_todo(a){
    
    var base_url = document.getElementById("base_url").value;
    var select_mes = document.getElementById("select_mes").value;
    var select_gestion = document.getElementById("select_gestion").value;
    var tam = 0;
    tam = a.length;

    for(var i=0; i<tam; i++){  

    var pop=window.open(base_url+"lectura/mes_preaviso/"+a[i]+"/"+select_mes+"/"+select_gestion);
    pop.print();
    }
    
}

function buscar_asociados() {

    var base_url = document.getElementById("base_url").value;
    var controlador = base_url + "lectura/buscar_asociados";

    var select_afiliados = document.getElementById("select_afiliados").value;
    var select_mes = document.getElementById("select_mes").value;
    var select_gestion = document.getElementById("select_gestion").value;
    var select_orden = document.getElementById("select_orden").value;
    var select_direccion = document.getElementById("select_direccion").value;
    var select_zona = document.getElementById("select_zona").value;
    var sql = "";


   // alert(select_afiliados);
    orden = " order by ";

    if (select_orden == 'CODIGO')
        orden = orden + 'codigo_asoc ';
    if (select_orden == 'MEDIDOR')
        orden = orden + 'medidor_asoc ';
    if (select_orden == 'APELLIDOS')
        orden = orden + 'apellidos_asoc ';
    if (select_orden == 'NOMBRE')
        orden = orden + 'nombres_asoc ';
    if (select_orden == 'DIRECCION')
        orden = orden + 'nombres_asoc ';
    if (select_orden == 'NUMERO DE ORDEN')
        orden = orden + ' orden_asoc ';



    if (select_afiliados == "SIN LECTURA")
    {
        sql = "select a.* from asociado a where a.estado= 'ACTIVO'" +
                " and a.id_asoc not in" +
                "(select l.id_asoc from lectura l where " +
                "l.mes_lec='" + select_mes + "' and " +
                "l.gestion_lec='" + select_gestion + "')" + orden;
    }

    if (select_afiliados == "LECTURADO")
    {
        sql = "select a.* from asociado a where  a.estado='ACTIVO'" +
                " and a.id_asoc in" +
                "(select l.id_asoc from lectura l where " +
                "l.mes_lec='" + select_mes + "' and " +
                "l.gestion_lec = '" + select_gestion + "' and " +
                "l.estado_lec = 'LECTURADO')" + orden;//+" and "+
    }


//   revisar
    if (select_afiliados == "TODOS")
    {
        sql = "select a.* from asociado a where a.estado='ACTIVO' order by a.apellidos_asoc";
    }


     //   alert(sql);
    // Si la clasificacion es por direccion, se anulan las consultas para ejecutar esta
    if (select_orden == "DIRECCION")
    {

        if (select_afiliados == "LECTURADO")
            condicion = " AND a.id_asoc IN (SELECT l.id_asoc FROM lectura l WHERE l.mes_lec = '" + select_mes + "' AND l.gestion_lec = '" + select_gestion + "' and l.estado_lec = '" + select_afiliados + "')"
        else
            condicion = " AND a.id_asoc NOT IN (SELECT l.id_asoc FROM lectura l WHERE l.mes_lec = '" + select_mes + "' AND l.gestion_lec = '" + select_gestion + "')";

        if (select_zona != "TODOS")
            zona = " and a.zona_asoc= '" + select_zona + "'";
        else
            zona = " ";

        if (select_direccion != "TODOS")
            direccion = " and a.direccion_asoc='" + select_direccion + "'";
        else
            direccion = " ";

        sql = "SELECT a.* FROM asociado a, direccion_orden d " +
                " WHERE  a.direccion_asoc = d.nombre_dir and a.estado = 'ACTIVO'" + zona + direccion + condicion +
                " GROUP BY a.direccion_asoc, a.orden_asoc, a.id_asoc " +
                " ORDER BY d.orden_dir, a.direccion_asoc, a.orden_asoc ";

    }

    var foto = "";

    $.ajax({
        url: controlador,
        type: "POST",
        data: {sql:sql},
        success: function (result) {
            
            var res = JSON.parse(result);
            var tam = res.length;
            var html = "";
            var imagen = "";


            if (esMobil()) {

                html += "<table class='table table-striped' id='mitabla'>";
                html += "<tr>";
//                html += "<th>ORD</th>";
                html += "<th>Nombre Asociado</th>";
                html += "<th> </th>";
                html += "</tr>";
            } else {
                html += "<table class='table table-striped' id='mitabla'>";
                html += "<tr>";
                html += "<th>#</th>";
                html += "<th>Código</th>";
                html += "<th>Nombre Asociado</th>";
                html += "<th>Tipo</th>";
                html += "<th>Servicio(s)</th>";
                html += "<th>Dirección</th>";
                html += "<th>Medidor</th>";
                html += "<th> </th>";
                html += "</tr>";
            }

            var arreglo = [];
            for (var i = 0; i < tam; i++) {
                
                arreglo.push(res[i].id_asoc);
                
                nombrecompleto = res[i].apellidos_asoc + ", " + res[i].nombres_asoc;
                foto = res[i].foto_asoc;

                if (foto == null) {
                    imagen = base_url + "resources/images/asociados/thumb_default.jpg";
                } else {
                    imagen = base_url + "resources/images/asociados/" + res[i].foto_asoc;
                }

                if (esMobil()) {

                    html += "<tr style='line-height:5px;'>";
//                    html += "<td style='padding:0;'><font face='Arial' size='3'>"+res[i].orden_asoc+"</font></td>";
                    if (nombrecompleto.length > 30) {
                        nombrecompleto = nombrecompleto.substr(0, 29) + "..";
                    }

                    html += "<td style='padding:0; width:8cm;'> <font face='Arial' size='2'><b><span class='btn btn-danger btn-xs'>"+res[i].orden_asoc+"</span>"+ nombrecompleto + "</b></font>";
                    html += "<br><b>C.I.: </b>" + res[i].ci_asoc + " <b>| Telef.: </b>" + res[i].telefono_asoc;
                    html += "<br><b>CÓDIGO: </b>" + res[i].codigo_asoc;
                    html += "<br><b>TIPO: </b>" + res[i].tipo_asoc;
                    html += "<br><b>SERVICIOS: </b>" + res[i].servicios_asoc;
                    html += "<br><b>DIRECCIÓN: </b>" + res[i].direccion_asoc;
                    html += "<br><b>MEDIDOR: </b>" + res[i].medidor_asoc + "</td>";
                    html += "<td>";
                    html += "<center>";
                    html += "<img src='" + imagen + "' width='30' height='40' >";
                    html += "<br><button onclick = 'cargar_lectura(" + JSON.stringify(res[i]) + ")' class='btn btn-warning btn-xs' title='Registrar lecturas'><fa class='fa fa-pencil'></fa>Lecturar</button></a>";
                    html += "<br><a href='" + base_url + "lectura/historial/" + res[i].id_asoc + "' class='btn btn-facebook btn-xs' title='Historial de lecturas' target='_BLANK'><fa class='fa fa-list'></fa></a>";
                    html += "<a href='" + base_url + "lectura/ultimo_preaviso/" + res[i].id_asoc + "' class='btn btn-info btn-xs' title='Ultimo preaviso' target='_BLANK'><fa class='fa fa-book'></fa></a>";
                    html += "</center>";
                    html += "</td>";
                    html += "</tr>";

                } else {

                    html += "<tr>";
                    html += "<td style='padding:0;'>" + (i + 1) + "</td>";
                    html += "<td style='padding:0;'>";
                    html += "<center>";
                    html += "<img src='" + imagen + "' width='40' height='30' ><br>" + res[i].codigo_asoc;
                    html += "</center>";
                    html += "</td>";

                    if (nombrecompleto.length > 30) {
                        nombrecompleto = nombrecompleto.substr(0, 29) + "..";
                    }

                    html += "<td style='padding:0; width:8cm;'><font face='Arial' size='3'><b>" + nombrecompleto+ "</b></font>";
                    html += "<br>C.I.: " + res[i].ci_asoc + " | Telef.: " + res[i].telefono_asoc + "</td>";

                    html += "<td style='padding:0;'>" + res[i].tipo_asoc + "</td>";
                    html += "<td style='padding:0;'><center>" + res[i].servicios_asoc + "</center></td>";
                    html += "<td style='padding:0;'>" + res[i].direccion_asoc + "</td>";
                    html += "<td style='padding:0;'>" + res[i].medidor_asoc + "</td>";
                    html += "<td>";
                    html += "<button onclick = 'cargar_lectura(" + JSON.stringify(res[i]) + ")' class='btn btn-warning btn-xs' title='Registrar lecturas'><fa class='fa fa-pencil'> </fa> Lecturar </button></a>";
                    html += "<a href='" + base_url + "lectura/historial/" + res[i].id_asoc + "' class='btn btn-facebook btn-xs' title='Historial de lecturas' target='_BLANK'><fa class='fa fa-list'></fa></a>";
                    html += "<a href='" + base_url + "lectura/ultimo_preaviso/" + res[i].id_asoc + "' class='btn btn-info btn-xs' title='Ultimo preaviso' target='_BLANK'><fa class='fa fa-book'></fa></a>";
                    html += "<a href='" + base_url + "lectura/mes_preaviso/" + res[i].id_asoc +"/"+select_mes+"/"+select_gestion+"' class='btn btn-success btn-xs' title='Reimprimir preaviso' target='_BLANK'><fa class='fa fa-book'></fa></a>";
                    html += "</td>";
                    html += "</tr>";
     
                }
            }
            html += "</table>";
            $("#tabla_lecturas").html(html);
            
            html2 ="";
            html2 +="<button class='btn btn-xs btn-facebook' onclick='imprimir_todo("+JSON.stringify(arreglo)+")'>";
            html2 +="<fa class='fa fa-book'> </fa> Imprimir Todo";
            html2 +="</button>";
            $("#boton_imprimir_todo").html(html2);
            
            
        }
    });

}

function registrar_lectura() {

    var base_url = document.getElementById("base_url").value;
    var controlador = base_url + "lectura/registrar_lectura";

    var id_asoc = document.getElementById("id_asoc").value;
    var mes_lec = document.getElementById("mes_lec").value;
    var gestion_lec = document.getElementById("gestion_lec").value;
    var anterior_lec = document.getElementById("anterior_lec").value;
    var actual_lec = document.getElementById("actual_lec").value;
    var fechaant_lec = document.getElementById("fechaant_lec").value;
    var consumo_lec = document.getElementById("consumo_lec").value;
    var fecha_lec = document.getElementById("fecha_lec").value;
    var hora_lec = document.getElementById("hora_lec").value;
    var totalcons_lec = document.getElementById("totalcons_lec").value;
    var monto_lec = document.getElementById("monto_lec").value;
    var estado_lec = document.getElementById("estado_lec").value;
    var tipo_asoc = document.getElementById("tipo_asoc").value;
    var servicios_asoc = document.getElementById("servicios_asoc").value;
    var cantfact_lec = document.getElementById("cantfact_lec").value;
    var montofact_lec = document.getElementById("montofact_lec").value;
    var nit_fact = document.getElementById("nit_fact").value;
    var razon_fact = document.getElementById("razon_fact").value;
    var fecha_lectura = document.getElementById("fecha_lectura").value;
    var fecha_vencimiento = document.getElementById("fecha_vencimiento").value;
    
    var consumo_agua_bs = document.getElementById("consumo_bs").value;
    var consumo_alcantarillado_bs = document.getElementById("consumo_alcantarillado").value;


    //Registrar factura
    $.ajax({
        url: controlador,
        type: "POST",
        data: {id_asoc: id_asoc, mes_lec: mes_lec, gestion_lec: gestion_lec, anterior_lec: anterior_lec,
            actual_lec: actual_lec, fechaant_lec: fechaant_lec, consumo_lec: consumo_lec, fecha_lec: fecha_lec,
            hora_lec: hora_lec, totalcons_lec: totalcons_lec, monto_lec: monto_lec, estado_lec: estado_lec,
            tipo_asoc: tipo_asoc, servicios_asoc: servicios_asoc, cantfact_lec: cantfact_lec, montofact_lec: montofact_lec,
            nit_fact: nit_fact, razon_fact: razon_fact, fecha_lectura:fecha_lectura, fecha_vencimiento:fecha_vencimiento,
            consumo_agua_bs:consumo_agua_bs, consumo_alcantarillado_bs:consumo_alcantarillado_bs},
        success: function (result) {
             
             var r = JSON.parse(result);
            $("#boton_cerrar_lectura").click();
            $("#boton_buscar").click();
            document.getElementById("boton_registrar_lectura").style.display = 'none';
//            alert(r.length);
//            window.location.href = base_url+"lectura/preaviso_boucher/"+r[0].id_lec;
            //window.open(base_url+"lectura/preaviso_boucher/"+r[0].id_lec, '_blank');
                   
        }, error: function (result) {
            //$("#consumo_bs").val("0.00");

        }
    });

}