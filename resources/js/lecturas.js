function seleccionar_lectura(){
    $("#lectura_actual").select();
    
}

function formato_fecha(string){
    var info = "";
    if(string != null){
       info = string.split('-').reverse().join('/');
   }
    return info;
}

function formato_numerico(numer){
    var partdecimal = "";
    var numero = "";
    var num = numer.toString();
    var signonegativo = "";
    var resultado = "";
    
    /*quitamos el signo al numero, si es que lo tubiera*/
    if(num[0]=="-"){
        signonegativo="-";
        numero = num.substring(1, num.length);
    }else{
        numero = num;
    }
    /*guardamos la parte decimal*/
    if(num.indexOf(".")>=0){
        partdecimal = num.substring(num.indexOf("."), num.length);
        numero = numero.substring(0,num.indexOf(".")-1);
    }else{
        numero = num;
    }
    for (var j, i = numero.length - 1, j = 0; i >= 0; i--, j++){
        resultado = numero.charAt(i) + ((j > 0) && (j % 3 == 0)? ",": "") + resultado;
    }
 
    resultado = signonegativo+resultado+partdecimal;
    return resultado;
}

function calcular_consumo(e,id_asoc){
    var lectura_anterior = document.getElementById("lectura_anterior").value;
    var lectura_actual = document.getElementById("lectura_actual").value;
    var base_url = document.getElementById("base_url").value;
    var controlador = base_url+"lectura/calcular_consumo";
    var asociado = id_asoc;
  
    tecla = (document.all) ? e.keyCode : e.which;  
  
    if (tecla == 13){ 
  
        
        if(lectura_actual >= lectura_anterior){
            var consumo = lectura_actual - lectura_anterior; 
            $("#consumo_mt3").val(Number(consumo).toFixed(2));
            
            $.ajax({
               url:controlador,
               type: "POST",
               data:{consumo:consumo,asociado:asociado},
               success:function(result){    
                   
                   var res = JSON.parse(result);
                   
                   $("#consumo_bs").val(res[0].costo_agua);
                   $("#consumo_alcantarillado").val(res[0].costo_alcant);

                var consumo_bs = document.getElementById("consumo_bs").value;
                var consumo_alcantarillado = document.getElementById("consumo_alcantarillado").value;
                var aportes_multas = document.getElementById("aportes_multas").value;
                var total_bs = "0.00";

                total_bs = Number(consumo_bs) + Number(consumo_alcantarillado) + Number(aportes_multas);

                $("#total_bs").val(total_bs.toFixed(2));


               },error: function (result) {
                   $("#consumo_bs").val("0.00");
                    
                }
           });       
            
        }
        else{
            alert("ADVERTENCIA: La lectura actual no puede ser menor a la anterior..!!");
            $("#lectura_actual").focus();
        
        }
        

    }
    
    
    
}

function cargar_lectura(lectura){
    
    
    var html = "";
    var select_asociado = document.getElementById("select_afiliados").value;
    var mes = document.getElementById("select_mes").value;
    var gestion = document.getElementById("select_gestion").value;
    var asociado = lectura.id_asoc;
    var base_url = document.getElementById("base_url").value;
    var controlador = base_url+"lectura/mostrar_multas";
    
    //var lectura = document.getElementById("select_mes").value;
    
    if (select_asociado == "SIN LECTURA"){

        html += "<table>";
        html += "<tr>";
        html += "<td>";
        html += "<b>CÓDIGO:</b> "+lectura.codigo_asoc;
        html += "<br><b>ASOCIADO:</b> "+lectura.apellidos_asoc+", "+lectura.nombres_asoc;
        html += "<br><b>SERVICIO:</b> "+lectura.servicios_asoc;
        html += "<br><b>TIPO:</b> "+lectura.categoria_asoc;
        html += "<br><b>DIRECCIÓN:</b> "+lectura.direccion_asoc;
        html += "<br><b>ZONA:</b> "+lectura.zona_asoc;
        html += "</td>";
        html += "</tr>";
        html += "</table>";

        html += "<table id='mitabla' class='table-condensed'>";
        html += "<th style='padding:0;'>TIPO</th>";
        html += "<th style='padding:0;'>MOTIVO</th>";
        html += "<th style='padding:0;'>MONTO</th>";
        html += "<th style='padding:0;'>GESTIÓN</th>";
        html += "<th style='padding:0;'>APLICACIÓN</th>";
//        html += "<th style='padding:0;'>DESCRIPCION</th>";        
        
        html += "<tbody id='tabla_datos_lectura'>";

        $("#datos_lectura").html(html);
        
        
$.ajax({
        url:controlador,
        type: "POST",
        data:{mes:mes, gestion:gestion, asociado:asociado},
        success:function(result){
    
            var res = JSON.parse(result);
            var tam =  res.length;
            var html = "";
            var total_multa = 0;

//            alert(tam);
            for(var i=0;i<tam;i++){
                total_multa += Number(res[i].monto);
                html += "<tr style='padding:0;'>";
                html += "<td style='padding:0;'>"+res[i].multa+"</td>";
                html += "<td style='padding:0;'>"+res[i].motivo+"</td>";
                html += "<td style='padding:0;'>"+Number(res[i].monto).toFixed(2)+"</td>";
                html += "<td style='padding:0;'>"+res[i].mes+"/"+res[i].gestion+"</td>";
                html += "<td style='padding:0;'>"+res[i].tipo+"</td>";
//                html += "<td style='padding:0;'>"+res[i].detalle+"</td>";
                html += "</tr>";
            }
            
            html += "<tr style='padding:0;'>";
            html += "<th colspan='5' style='padding:0;'><h3 style='font-family:Arial; padding:0; margin:0;'><b>DETALLE DE LECTURA</b></h3></th>";
            html += "</tr>";
            
            color_fondo = "silver;";
            
            html += "<tr style='padding:0; background-color: "+color_fondo+";'>";
            html += "<td style='padding:0;' colspan='3'><b>LECTURA ANTERIOR (mt3): </b></td>";
            html += "<td style='padding:0;'  colspan='2'><input type='text' value='0.00' id='lectura_anterior' readonly='true'/></td>";            
            html += "</tr>";
            
            html += "<tr style='padding:0; background-color: "+color_fondo+"; font-size:13px; font-style: bold'>";
            html += "<td style='padding:0;' colspan='3'><b>LECT. ACTUAL (mt3): </b></td>";
            html += "<td style='padding:0;' colspan='2'><input type='text' value='0.00' id='lectura_actual' onclick='seleccionar_lectura()' onkeyup='calcular_consumo(event,"+asociado+")'/></td>";            
            html += "</tr>";
            
            html += "<tr style='padding:0; background-color: "+color_fondo+";'>";
            html += "<td style='padding:0;' colspan='3'><b>CONSUMO (mt3): </b></td>";
            html += "<td style='padding:0;' colspan='2'><input type='text' value='0.00' id='consumo_mt3' readonly='true'/></td>";  
            html += "</tr>";
            
            html += "<tr style='padding:0; background-color: "+color_fondo+";'>";
            html += "<td style='padding:0;' colspan='3'><b>CONSUMO (Bs): </b></td>";
            html += "<td style='padding:0;' colspan='2'><input type='text' value='0.00' id='consumo_bs' readonly='true'/></td>";
            html += "</tr>";
             
            html += "<tr style='padding:0; background-color: "+color_fondo+";'>";
            html += "<td style='padding:0;' colspan='3'><b>ALCANTARILLADO (Bs): </b></td>";
            html += "<td style='padding:0;' colspan='2'><input type='text' value='0.00' id='consumo_alcantarillado' readonly='true'/></td>";      
            html += "</tr>";
            
            html += "<tr style='padding:0; background-color: "+color_fondo+";'>";
            html += "<td style='padding:0;' colspan='3'><b>MULTAS Y APORTES (Bs): </b></td>";
            html += "<td style='padding:0;' colspan='2'><input type='text' value='"+total_multa.toFixed(2)+"' id='aportes_multas' readonly='true'/></td>";
            html += "</tr>";
            
            html += "<tr style='padding:0; background-color: "+color_fondo+";'>";
            html += "<td style='padding:0;' colspan='3'><b>FACTURAS ADEUDADAS (Bs): </b></td>";
            html += "<td style='padding:0;' colspan='2'><input type='text' value='0' id='cantidad_adeudadas' readonly='true'/><input type='text' value='0.00' id='facturas_adeudadas' readonly='true'/></td>";  
            html += "</tr>";
            
            html += "<tr style='padding:0; background-color: "+color_fondo+"; font-size:14px; font-style: bold'>";
            html += "<td style='padding:0;' colspan='3'><b>TOTAL (Bs): </b></td>";
            html += "<td style='padding:0;' colspan='2'><input type='text' value='0' id='total_bs' readonly='true'/></td>";  
            html += "</tr>";
            
            html += "</tbody>";
            html += "</table>";
            
            $("#tabla_datos_lectura").html(html);
            
        },
    });
 
    //obtener facturas adeudadas
    var controlador2 = base_url+"lectura/facturas_adeudadas";
    $.ajax({
        url:controlador2,
        type: "POST",
        data:{mes:mes, gestion:gestion, asociado:asociado},
        success:function(result){
    
            var res = JSON.parse(result);
            $("#cantidad_adeudadas").val(res[0].cantfact);
            $("#facturas_adeudadas").val(Number(res[0].sumafact).toFixed(2));
            
        },
        error: function (result) {
            $("#cantidad_adeudadas").val('0');
            $("#facturas_adeudadas").val('0.00');
                
        }
    });
 
    //
    var controlador3 = base_url+"lectura/lecturas_anteriores";
    $.ajax({
        url:controlador3,
        type: "POST",
        data:{mes:mes, gestion:gestion, asociado:asociado},
        success:function(result){
    
            var res = JSON.parse(result);
            $("#lectura_anterior").val(res[0].actual_lec);
            //$("#facturas_adeudadas").val(Number(res[0].sumafact).toFixed(2));
            
        },
        error: function (result) {
            $("#lectura_anterior").val('0');
//            $("#facturas_adeudadas").val('0.00');
                
        }
    });
 
 
        
        $("#boton_lectura").click();
    
    
    }
    else{
        alert("ERROR: Debe seleccionar un MES SIN LECTURA..!!!");
    }
    
}

function buscar_asociados(){
 
    var base_url = document.getElementById("base_url").value;
    var select_afiliados = document.getElementById("select_afiliados").value;
    var select_mes = document.getElementById("select_mes").value;
    var select_gestion = document.getElementById("select_gestion").value;
    var select_orden = document.getElementById("select_orden").value;
    var select_direccion = document.getElementById("select_direccion").value;
    var select_zona = document.getElementById("select_zona").value;
    var controlador = base_url+"lectura/buscar_asociados"
    var sql = "";
    
    
    orden = " order by ";
 
    if (select_orden == 'CODIGO') orden = orden + 'codigo_asoc ';
    if (select_orden == 'MEDIDOR') orden = orden + 'medidor_asoc ';
    if (select_orden == 'APELLIDOS') orden = orden + 'apellidos_asoc ';
    if (select_orden == 'NOMBRE') orden = orden + 'nombres_asoc ';
    if (select_orden == 'DIRECCION/ZONA') orden = orden + 'nombres_asoc ';
    if (select_orden == 'NUMERO DE ORDEN') orden = orden + ' orden_asoc ';
 
 
 
    if (select_afiliados == "SIN LECTURA")
    {
        sql = "select a.* from asociado a where a.estado= 'ACTIVO'"+
               " and a.id_asoc not in"+
               "(select l.id_asoc from lectura l where "+
               "l.mes_lec='"+select_mes+"' and "+
               "l.gestion_lec='"+select_gestion+"')"+orden;
    }

    if (select_afiliados == "LECTURADO")
    {
        sql = "select a.* from asociado a where  a.estado='ACTIVO'"+
               " and a.id_asoc in"+
               "(select l.id_asoc from lectura l where "+
               "l.mes_lec='"+select_mes+"' and "+
               "l.gestion_lec = '"+select_gestion+"' and "+
               "l.estado_lec = 'LECTURADO')"+orden;//+" and "+
    }

//   revisar
    if (select_afiliados = "TODOS")
    {
        sql = "select * from asociado a where a.estado='ACTIVO' order by a.apellidos_asoc";
    }
    
    // Si la clasificacion es por direccion, se anulan las consultas para ejecutar esta
    if  (select_orden=="DIRECCION")
    {

        if (select_afiliados == "LECTURADO")
            condicion = " AND a.id_asoc IN (SELECT l.id_asoc FROM lectura l WHERE l.mes_lec = '"+select_mes+"' AND l.gestion_lec = '"+select_gestion+"' and l.estado_lec = '"+select_afiliados+"')"
        else condicion = " AND a.id_asoc NOT IN (SELECT l.id_asoc FROM lectura l WHERE l.mes_lec = '"+select_mes+"' AND l.gestion_lec = '"+select_gestion+"')";

        if (select_zona != "TODOS") zona = " and a.zona_asoc= '"+select_zona+"'";
        else zona=" ";

        if (select_direccion != "TODOS") direccion = " and a.direccion_asoc='"+select_direccion+"'";
        else direccion=" ";

        sql="SELECT a.* FROM asociado a, direccion_orden d "+
             " WHERE  a.direccion_asoc = d.nombre_dir and a.estado = 'ACTIVO'"+zona+direccion+condicion+
             " GROUP BY a.direccion_asoc, a.orden_asoc, a.id_asoc "+
             " ORDER BY d.orden_dir, a.direccion_asoc, a.orden_asoc ";

    }
    
    //alert(sql);

    $.ajax({
        url:controlador,
        type: "POST",
        data:{sql:sql},
        success:function(result){
            var res = JSON.parse(result);
            var tam =  res.length;
            var html = "";
            for(var i=0;i<tam;i++){
                nombrecompleto = res[i].apellidos_asoc+", "+res[i].nombres_asoc;
                
                html += "<tr>";
                html += "<td style='padding:0;'>"+(i+1)+"</td>";
                html += "<td style='padding:0;'>"+res[i].codigo_asoc+"</td>";
                
                
                if (nombrecompleto.length>30){
                    nombrecompleto = nombrecompleto.substr(0,29)+"..";
                }
                html += "<td style='padding:0; width:8cm;'><font face='Arial' size='3'><b>"+nombrecompleto+"</b></font>";                
                html += "<br>C.I.: "+res[i].ci_asoc+" | Telef.: "+res[i].telefono_asoc+"</td>";
                
                html += "<td style='padding:0;'>"+res[i].tipo_asoc+"</td>";
                html += "<td style='padding:0;'><center>"+res[i].servicios_asoc+"</center></td>";
                html += "<td style='padding:0;'>"+res[i].direccion_asoc+"</td>";
                html += "<td style='padding:0;'>"+res[i].medidor_asoc+"</td>";
                html += "<td>";
                html += "<a href='"+base_url+"lectura/historial/"+res[i].id_asoc+"' class='btn btn-facebook btn-xs' title='Historial de lecturas' target='_BLANK'><fa class='fa fa-list'></fa></a>";
                html += "<button onclick = 'cargar_lectura("+JSON.stringify(res[i])+")' class='btn btn-warning btn-xs' title='Registrar lecturas'><fa class='fa fa-pencil'></button></a>";
                html += "</td>";
                
                
                html += "</tr>";
            }
            
            $("#tabla_lecturas").html(html);
                
        },
        
    });

 
 
 
/*


    Edit1.Text=SQl;

    Consultar(SQL);

  */  
    
}