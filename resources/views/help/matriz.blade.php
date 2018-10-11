@extends('layouts.app')
@section('content')

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading text-center">
            <h5>Indicadores Gestor de Solicitudes</h5>
        </div>
    </div>
    <br>
    <div>
      <h6>Requerimientos pendientes por área</h6>
    <button type="button" class="btn btn-outline-success btn-sm" id="myBtn" onclick="sistemas(),sistemas1()" data-toggle="modal" data-target=".bd-example-modal-lg">Sistemas</button>
    <button type="button" class="btn btn-outline-success btn-sm" id="myBtn" onclick="compras(),compras1()">Compras</button>
    <button type="button" class="btn btn-outline-success btn-sm" id="myBtn" onclick="comunicaciones(),comunicaciones1()">Comunicaciones</button>
    <button type="button" class="btn btn-outline-success btn-sm" id="myBtn" onclick="ghumana(),ghumana1()">Gestión Humana</button>
  </div>
  <br>
  
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
      function sistemas() 
      {
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        var sis = @json($subareasis);
        arrsis=[['Task', 'Hours per Day']]
        sis.forEach(element => {
          arrsis.push([element.subarea, element.cant])
            });
        function drawChart() {
          var data = google.visualization.arrayToDataTable(arrsis);
          var options = {
            title: 'Tickets Pendientes Subareas de Sistemas'
          };
          if (sis.length>0) {
          document.getElementById('chart_subarea').style.height = "400px";
          document.getElementById('chart_subarea').style.width = "600px";
          var chart = new google.visualization.PieChart(document.getElementById('chart_subarea'));
            chart.draw(data, options);
             }else{
              document.getElementById('chart_subarea').style.height = "100px";
          document.getElementById('chart_subarea').innerHTML = '<br><b><span>Tickets Pendientes Subareas de Sistemas</b></span><br>\
                                                                    <div class="alert alert-info" role="alert">\
                                                                    No hay tickets pendientes del área de Sistemas\
                                                                    </div>'
            }
       
        }
      
      }
      function sistemas1() 
      {
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        var sis1 = @json($subareasis1);
        arrsis1=[['Task', 'Hours per Day']]
        sis1.forEach(element => {
          arrsis1.push([element.nombre_asig, element.cant])
            });
            function drawChart() {

        var data = google.visualization.arrayToDataTable(arrsis1);

        var options = {
          title: 'Tickets Pendientes Asignación de Sistemas',
          pieHole: 0.4,
        };
        if (sis1.length>0) {
        document.getElementById('chart_subarea1').style.height = "400px";
        document.getElementById('chart_subarea1').style.width = "600px";
        var chart = new google.visualization.PieChart(document.getElementById('chart_subarea1'));
        
          chart.draw(data, options);
           }else{
            document.getElementById('chart_subarea1').style.height = "100px";
        document.getElementById('chart_subarea1').innerHTML = '<br><b><span>Tickets Pendientes Asignación de Comunicaciones</b></span><br>\
                                                                      <div class="alert alert-warning" role="alert">\
                                                                    No hay tickets asignados del area de comunicaciones\
                                                                    </div>'
          }
        
        }
      }
      function comunicaciones() 
      {
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        var com = @json($subareacom);
       
        arrcom=[['Task', 'Hours per Day']]
        com.forEach(element => {
          arrcom.push([element.subarea, element.cant])
            });
        function drawChart() {

          var data = google.visualization.arrayToDataTable(arrcom);

          var options = {
            title: 'Tickets Pendientes Subarea de Comunicaciones'
          };
            
          if (com.length>0) {
          document.getElementById('chart_subarea').style.height = "400px";
          document.getElementById('chart_subarea').style.width = "600px";
          var chart = new google.visualization.PieChart(document.getElementById('chart_subarea'));

            chart.draw(data, options);
             }else{
              document.getElementById('chart_subarea').style.height = "100px";
          document.getElementById('chart_subarea').innerHTML = '<br><b><span>Tickets Pendientes Subareas de Comunicaciones</b></span><br>\
                                                                     <div class="alert alert-info" role="alert">\
                                                                    No hay tickets pendientes del área de Comunicaciones\
                                                                    </div>'
            }
          }
      }
      function comunicaciones1() 
      {
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        var com1 = @json($subareacom1);
     
      
       
        arrcom1=[['Task', 'Hours per Day']]
        com1.forEach(element => {
          arrcom1.push([element.nombre_asig, element.cant])
            });
        function drawChart() {

          var data = google.visualization.arrayToDataTable(arrcom1);

          var options = {
            title: 'Tickets Pendientes Asignación de Comunicaciones',
            pieHole: 0.4,
          };
            
          if (com1.length>0) {
          document.getElementById('chart_subarea1').style.height = "400px";
          document.getElementById('chart_subarea1').style.width = "600px";
          var chart = new google.visualization.PieChart(document.getElementById('chart_subarea1'));
            chart.draw(data, options);
             }else{
              document.getElementById('chart_subarea1').style.height = "100px";
            document.getElementById('chart_subarea1').innerHTML = '<br><b><span>Tickets Pendientes Asignación de Comunicaciones</b></span><br>\
                                                                          <div class="alert alert-warning" role="alert">\
                                                                    No hay tickets asignados del area de comunicaciones\
                                                                    </div>'
            }
          }
      }
      function ghumana() 
      {
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        var gh = @json($subareagh);
       
        arrgh=[['Task', 'Hours per Day']]
        gh.forEach(element => {
          arrgh.push([element.subarea, element.cant])
            });
        function drawChart() {

          var data = google.visualization.arrayToDataTable(arrgh);

          var options = {
            title: 'Tickets Pendientes Subareas de Gestión Humana'
          };
           
          if (gh.length>0) {
          document.getElementById('chart_subarea').style.height = "400px";
          document.getElementById('chart_subarea').style.width = "600px";
          var chart = new google.visualization.PieChart(document.getElementById('chart_subarea'));

            chart.draw(data, options);
             }else{
              document.getElementById('chart_subarea').style.height = "100px";
          document.getElementById('chart_subarea').innerHTML = '<br><b><span>Tickets Pendientes Subareas de Gestión Humana</b></span><br>\
                                                                    <div class="alert alert-success" role="alert">\
                                                                    No hay tickets pendientes del área de Gestión Humana\
                                                                    </div>'
            }
          
          }
      }

      function ghumana1() 
      {
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        var gh1 = @json($subareagh1);
       
        arrgh1=[['Task', 'Hours per Day']]
        gh1.forEach(element => {
          arrgh1.push([element.subarea, element.cant])
            });
        function drawChart() {

          var data = google.visualization.arrayToDataTable(arrgh1);

          var options = {
            title: 'Tickets Pendientes Subareas de Gestión Humana'
          };
           
          if (gh1.length>0) {
          document.getElementById('chart_subarea1').style.height = "400px";
          document.getElementById('chart_subarea1').style.width = "600px";
          var chart = new google.visualization.PieChart(document.getElementById('chart_subarea1'));

            chart.draw(data, options);
             }else{
              document.getElementById('chart_subarea1').style.height = "100px";
          document.getElementById('chart_subarea1').innerHTML = '<br><b><span>Tickets Pendientes Asignación de Gestión Humana</b></span><br>\
                                                                          <div class="alert alert-warning" role="alert">\
                                                                    No hay tickets asignados del area de Gestión Humana\
                                                                    </div>'
            }
          
          }
      }
      function compras() 
      {
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        var comp = @json($subareacomp);
       
        arrcomp=[['Task', 'Hours per Day']]
        comp.forEach(element => {
          arrcomp.push([element.subarea, element.cant])
            });
        function drawChart() {

          var data = google.visualization.arrayToDataTable(arrcomp);

          var options = {
            title: 'Tickets Pendientes Subareas de Compras, Mantenimiento y Mensajería'
          };
            
          if (comp.length>0) {
          document.getElementById('chart_subarea').style.height = "400px";
          document.getElementById('chart_subarea').style.width = "600px";
          var chart = new google.visualization.PieChart(document.getElementById('chart_subarea'));

            chart.draw(data, options);
             }else{
              document.getElementById('chart_subarea').style.height = "100px";
          document.getElementById('chart_subarea').innerHTML = '<br><b><span>Tickets Pendientes Subareas de Compras, Mantenimiento y Mensajería</b></span><br>\
            <div class="alert alert-info" role="alert">\
                                                                    No hay tickets pendientes del área de Compras, Mantenimiento y Mensajería\
                                                                    </div>'
            }
          }
      }
      function compras1() 
      {
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        var comp1 = @json($subareacomp1);
      
        arrcomp1=[['Task', 'Hours per Day']]
        comp1.forEach(element => {
          arrcomp1.push([element.nombre_asig, element.cant])
            });
        function drawChart() {

          var data = google.visualization.arrayToDataTable(arrcomp1);

          var options = {
            title: 'Tickets Pendientes Asignación de Compras, Mantenimiento y Mensajería',
            pieHole: 0.4,
          };
            
          if (comp1.length>0) {
          document.getElementById('chart_subarea1').style.height = "400px";
          document.getElementById('chart_subarea1').style.width = "600px";
          var chart = new google.visualization.PieChart(document.getElementById('chart_subarea1'));

            chart.draw(data, options);
             }else{
              document.getElementById('chart_subarea1').style.height = "100px";
          document.getElementById('chart_subarea1').innerHTML = '<br><b><span>Tickets Pendientes Asignación de Compras</b></span><br>\
                                                                          <div class="alert alert-warning" role="alert">\
                                                                    No hay tickets asignados del area de Compras\
                                                                    </div>'
            }
          }
      }

    </script>
    <div class="row">
     <div class="col-sm-6" id="chart_subarea"></div>
     <div class="col-sm-6" id="chart_subarea1"></div>
    </div>
  
    <br>
  <br>
    <script>
      google.charts.load('current', {packages: ['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawBasic);
      var app1 = @json($asignado);
      array1=[['City', 'Pendientes']]
      app1.forEach(element => {
        array1.push([element.area, element.cant])
      });
     
      
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

    <div id="chart_divserie"></div>

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
              title: "Cantidad según área",
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