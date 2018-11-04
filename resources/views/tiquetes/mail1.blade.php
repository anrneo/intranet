<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  </head>
    <div class="container">
        <div class="card text-white bg-info  mb-3" style="max-width: 30rem;">
          <div class="card-header">
            <img class="card-img" src="{{ $message->embed("C:/xampp/htdocs/img/sumi/tiquetes.jpg") }}" alt="Card image">
          </div>
          <div class="card-body">
                <ul class="list-group list-group-flush">
                <p class="card-text">Cordial saludo Sr(a) {{$nombre}}, tiene una respuesta a su salicitud de traslado aéreo.</p>
                <p class="card-text">Sede de Radicado: {{$sede}} </p>
                <p class="card-text">Ciudad de Origen: {{$city1}} ({{$dpto1}} )</p>
                <p class="card-text">Ciudad de destino: {{$city2}} ({{$dpto2}} )</p>
                <p class="card-text">Respuesta: Su traslado fue aprobado</p>
                <p class="card-text">Se adjunto copia del Ticket Aéreo con al información del vuelo</p>
                <li class="list-group-item">
                    <h2>Observación: </h2>
                    <h3>Este correo es solo para informar a los usarios, sobre el estado de sus solicitudes, por favor no responda sobre el mismo, dado que, esta respuesta no será analizada.</h3>
                </li>
              </ul>
          </div>
        </div>
      </div>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>