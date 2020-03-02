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
    
    alert(sql);

    $.ajax({
        url:controlador,
        type: "POST",
        data:{sql:sql},
        success:function(result){
            var res = JSON.parse(result);
            var tam =  res.length;
            var html = "";
            for(var i=0;i<tam;i++){
                html += "<tr>";
                html += "<td>"+(i+1)+"</td>";
                html += "<td>"+res[i].codigo_asoc+"</td>";
                html += "<td>"+res[i].apellidos_asoc+", "+res[i].nombres_asoc+"</td>";
                html += "<td>"+res[i].direccion_asoc+"</td>";
                html += "<td nowrap>"+res[i].ci_asoc+" "+res[i].ciudad+"</td>";
                html += "<td>"+res[i].tipo_asoc+"</td>";
                html += "<td>"+res[i].fechanac_asoc+"</td>";
                html += "<td>"+res[i].telefono_asoc+"</td>";
                html += "<td>"+res[i].nit_asoc+"</td>";
                html += "<td>"+res[i].razon_asoc+"</td>";
                html += "<td>"+res[i].medidor_asoc+"</td>";
                html += "<td>"+res[i].servicios_asoc+"</td>";
                html += "</tr>";
            }
            
            $("#tabla_lecturas").html(html);
                
        },
        
    })

 
 
 
/*


    Edit1.Text=SQl;

    Consultar(SQL);

  */  
    
}