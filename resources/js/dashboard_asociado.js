$(document).on("ready",inicio);
function inicio(){
    

    graficar();

} 


function graficar(){

var base_url    = document.getElementById('base_url').value;
var controlador = base_url+"asociado/ultimas_lecturas/";
var asociado_id = document.getElementById('asociado_id').value;

$.ajax({url: controlador,
           type:"POST",
           data:{asociado_id:asociado_id},
           success:function(respuesta){
var registros = JSON.parse(respuesta);
var meses = registros.length; 

var options={
    chart: {
        renderTo: 'grafica',
        type: 'areaspline'
    },
    title: {
        text: 'Gráfico de consumo - ' +registros[0]["apellidos_asoc"]+ ' '+registros[0]["nombres_asoc"]
    },
    
        subtitle: {
            text: 'Tipo: ' +registros[0]["tipo_asoc"]+ ' Categoría: '+registros[0]["categoria_asoc"],
            x: -20
        },
    legend: {
        layout: 'horizontal',
        align: 'left',
        verticalAlign: 'top',
        x: 0,
        y: 0,
        floating: true,
        borderWidth: 1,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF'
    },
    xAxis: {
        categories: []
    },
    yAxis: {
        title: {
            text: 'Metros cúbicos (M3)'
        }
    },
    tooltip: {
        shared: true,
        valueSuffix: ' M3'
    },
    credits: {
        enabled: false
    },
    plotOptions: {
        areaspline: {
            fillOpacity: 0.5
        }
    },
    series: [{
        name: 'Consumo',
        //description: 'ff',
        //cursor: 'grab',
        data: []
    }] 
  };
  for(i=meses-1;i>=0;i--){
    
    options.series[0].data.push( Math.round(registros[i]["totalcons_lec"]*100)/100 );
    //options.series[0].name.push( registros[i]["id_asoc"] );
    
    options.xAxis.categories.push(registros[i]["mes_lec"]+'/'+registros[i]["gestion_lec"]);
    }
    $("#grafica").html();
 //options.title.text="aqui e podria cambiar el titulo dinamicamente";
 chart = new Highcharts.Chart(options);

},
        error:function(respuesta){
          alert("No existen registros para esta fecha");
        }

})


}
