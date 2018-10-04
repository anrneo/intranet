@extends('layouts.app')
@section('content')

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading text-center">
            <b>Indicadores Gestor de Solicitudes</b>
        </div>
    </div>
    <br>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
      google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);
var app1 = @json($asignado);
array1=[['City', 'Pendientes']]
app1.forEach(element => {
  array1.push([element.area, element.cant])
});
console.log(array1);


      
function drawBasic() {

      var data = google.visualization.arrayToDataTable(array1);

      var options = {
        title: 'Cantidad de Requerimientos Pendientes',
        chartArea: {width: '50%'},
        hAxis: {
          title: 'Cantidad',
          minValue: 0
        },
        vAxis: {
          title: 'Area'
        }
      };

      var chart = new google.visualization.BarChart(document.getElementById('chart_divserie'));

      chart.draw(data, options);
    }
    </script>

    <div id="chart_divserie" style="width: 1200px; height: 500px"></div>

      <script type='text/javascript'>
      var app = @json($reports);
      array=[['Element', 'Días', { role: 'style' }]]
      for (let i = 0; i < app.length; i++) {
        if (app[i].estado==2 & app[i].dias>0) {
          array.push([app[i].id, app[i].dias,  'green'])
        }else if(app[i].dias_sin>0){
          array.push([app[i].id, app[i].dias_sin, 'gold'])
      }
      }
      
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      
      function drawChart() {
        var data = google.visualization.arrayToDataTable(array);

      var options = {
        title: 'Tiempo de Respuesta',
        hAxis: {
          title: 'Id requerimiento',
          
        },
        legend: { position: "none" },
        vAxis: {
          title: 'Días de Solución'
        }
      };

      var chart = new google.visualization.ColumnChart(
        document.getElementById('chart_div'));

      chart.draw(data, options);
    }
    </script>
    
  
    <div id="chart_div" style="width: 1200px; height: 500px"></div>
    
    
    <div class="row">
      <div class="col-sm-6">
        <script type="text/javascript">
          google.charts.load("current", {packages:['corechart']});
          google.charts.setOnLoadCallback(drawChart);
          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ["Element", "Requerimientos", { role: "style" } ],
              ["Sistemas", {{$sistemas}}, "#b87333"],
              ["Comunicaciones", {{$comun}}, "silver"],
              ["Compras", {{$compras}}, "gold"],
            ]);
          
            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                             { calc: "stringify",
                               sourceColumn: 1,
                               type: "string",
                               role: "annotation" },
                             2]);
          
            var options = {
              title: "Requerimientos según área",
              width: 600,
              height: 400,
              bar: {groupWidth: "95%"},
              legend: { position: "none" },
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
            chart.draw(view, options);
          }
        </script>
        <div id="columnchart_values" style="width: 800px; height: 400px;"></div>
      </div>
      <div class="col-sm-6">
          <script type="text/javascript">
              google.charts.load("current", {packages:["corechart"]});
              google.charts.setOnLoadCallback(drawChart);
              function drawChart() {
                var data = google.visualization.arrayToDataTable([
                  ['Task', 'Hours per Day'],
                  ['Solciitudes',     {{$solicitud}}],
                  ['Incidentes',      {{$incidencia}}],

                ]);
              
                var options = {
                  title: 'Participacion según tipo',
                  pieHole: 0.4,
                };
              
                var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                chart.draw(data, options);
              }
          </script>

          <div id="donutchart" style="width: 800px; height: 400px;"></div>
      </div>
  </div>
  
      
   
</div>
  @endsection