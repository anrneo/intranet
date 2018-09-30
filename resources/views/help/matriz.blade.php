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

    
      <script type='text/javascript'>
      var app = @json($reports);
      console.log(app[0]);
      array=[['Element', 'Días', { role: 'style' }]]
      for (let i = 0; i < app.length; i++) {
        if (app[i].estado==2) {
          array.push([app[i].id, app[i].dias,  'green'])
        }else{
          array.push([app[i].id, app[i].dias_sin, 'gold'])
      }
      }
      console.log(array);
      
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