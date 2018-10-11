@extends('layouts.app')
@section('content')
<style>
  .card {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,.125);
    border-radius: .25rem;
}
.card-body {
    -webkit-box-flex: 1;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 0rem;
}
</style>
<div class="row" style="margin-top:-13px">

  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">            
    <div class="card mb-3">
      <div class="card-group" style="margin-bottom:1px">
        <div class="card">
          <img class="card-img-top" src="intranet/public/img/noticias/años.png" style="padding-right:2px;width: 174px; height:100px"">
          <div class="card-body">
            <h4 class="card-title; text-center">13 Años</h4>
            <p class="card-text; text-center" style="margin-left:3px; margin-right:5px">Sumimedical es una empresa que nace en el año 2005 prestando a Saludcoop..</br>
               <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#noti1">Ver mas.. <i class="fa fa-plus"></i></button></p>

  <!-- Modal -->
  <div class="modal fade" id="noti1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Sumimedical es una empresa que nace en el año 2005 prestando a Saludcoop</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p> y la Fundación Medico Preventiva, los servicios de consulta externa especializados como: 

• Ginecobstetricia
• Oftalmología 
• Pediatría 
• Medicina interna 
• Neuropediatría 
• Cirugía general 

 

 

Durante tres años, Sumimedical obtiene gran credibilidad en el medio, debido al impacto generado por la calidad y la calidez de los profesionales que ponía al servicio de los usuarios, además de la comunicación efectiva y fluida que estableció con el cliente que permitía la constante retroalimentación y la oportunidad de crecer cada vez en la prestación del servicio. 

​

En el año 2008, la caja de compensación familiar de Antioquia (Comfama), advierte el potencial adquirido en los años previos y de esta forma se obtiene una licitación para la provisión de especialistas a los Centros Integrales de Salud, abarcando este servicio en las catorce sedes distribuidas en el área metropolitana, oriente cercano y Urabá antioqueño.

 

Esta sería la plataforma para que un año más tarde Comfama confiara el proceso de selección de personal competente en medicina general para prestar el servicio de consulta externa, atención prioritaria y procedimientos menores, cubriendo un alto porcentaje del personal médico de esta institución.

 

A finales de 2010, habiendo consolidado sus procesos de selección y administración de personal, Comfama deposita nuevamente su confianza en Sumimedical y contrata todo el personal médico para la atención en los CIS, personal de apoyo terapéutico a gimnasios y debido a la demanda, atiende usuarios en la sede propia. 

 

Al 2011, Sumimedical provee el personal médico de los 14 CIS, siendo el único tercero que provee recurso humano a esta institución en el sector salud. Esta situación obliga a conformar un equipo interdisciplinar liderado por el Dr. Jorge Luis Rocha, gerente y fundador, para dar respuesta a las necesidades propias del cliente, modificando la estructura organizacional al generar nuevos departamentos y sub departamentos, y haciendo crecer los ya establecidos.

 

En el 2012, la certificación en ISO 9001, nos ratifica como una empresa competente, con un alto nivel de inteligencia que se debe a la capacidad de adaptarse a las necesidades del medio y en este caso del cliente, en consecuencia ha crecido a nivel físico, teniendo en este momento más de 400 empleados vinculados y 2 sedes administrativas, y a nivel procedimental, optimizando cada vez el servicio y cada uno de sus procesos internos y externos, basados en la retroalimentación y una actitud proactiva frente al cambio.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
          </div>
        </div>
        <div class="card">
          <img class="card-img-top" src="intranet/public/img/noticias/turbo.jpg" style="padding-right:2px; width: 174px; height:100px">
          <div class="card-body">
            <h4 class="card-title; text-center">Nueva Sede</h4>
            <p class="card-text; text-center" style="margin-left:3px; margin-right:5px" >Enterate de nuestra nueva sede en Turbo..</br></br></br>
               <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#noti2">Ver mas.. <i class="fa fa-plus"></i></button></p>

  <!-- Modal -->
  <div class="modal fade" id="noti2" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Abrimos en Turbo</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>La primera semana de marzo fue inaugurada la sede de Red Vital. Atenderemos a más de 3000 usuarios. La nueva sede está ubicada en la carrera 14B # 101-72, Barrio Baltazar de Casanova.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
          </div>
        </div>
        <div class="card">
          <img class="card-img-top" src="intranet/public/img/noticias/udea.jpg" style="padding-right:2px; width: 174px; height:100px">
          <div class="card-body">
            <h4 class="card-title; text-center">UDEA</h4>
            <p class="card-text; text-center" style="margin-left:3px; margin-right:5px">Con esta alianza la Facultad de Medicina de la Universidad de Antioquia..</br>
               <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#noti">Ver mas.. <i class="fa fa-plus"></i></button></p>

  <!-- Modal -->
  <div class="modal fade" id="noti" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title; text-center">Sumimedical y Facultad de Medicina UdeA suman esfuerzos para mejorar calidad de vida de maestros de Antioquia y Chocó</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>
Con esta alianza la Facultad de Medicina de la Universidad de Antioquia y Sumimedical ponen al servicio de la salud de los maestros de los departamentos de Antioquia y Chocó los últimos desarrollos en Tecnologías de Información y Comunicación –TIC- y salud para el fortalecimiento del personal de atención y la optimización y uso racional de medicamentos.

Con estrategias novedosas de Teleeducación en salud ambas instituciones inician un proceso de capacitación del equipo de atención en salud de Sumimedical en temas como seguridad del paciente, atención integral de víctimas en violencia sexual, telemedicina, humanización del servicio y AIEPI clínico.

De otro lado a través de la implementación del programa Optimmas, desarrollado en el Centro de Información y Estudio de Medicamentos y Tóxicos (CIEMTO) de la Facultad de Medicina, se pretende reducir la morbilidad inducida por la medicación, el número de interacciones y el consumo innecesario de medicamentos, especialmente en individuos en alto riesgo de padecer eventos adversos serios inducidos por el alto consumo de estos.

Este programa también incluye un “sistema analizador de medicamentos” que contiene una base de datos con los 50 medicamentos más prescritos por personal de Sumimedical, donde expertos en farmacología y toxicología les realizarán seguimiento a través de un rastreo de las dosis, las formas de ajuste de las mismas y sus presentaciones y contraindicaciones. Con lo anterior se buscará prevenir que se realicen prescripciones potencialmente peligrosas para los pacientes.

El desarrollo profesional permanente del personal de Sumimedical, a través de estrategias que implementen tecnologías de la información y la comunicación, se traducirá en mejor calidad de vida de los maestros del departamento de Antioquia y Chocó, en un proceso que se extenderá durante dos años a partir del segundo semestre del 2018. De acuerdo con Luis Miguel Acevedo, vicedecano de la Facultad de Medicina de la Universidad de Antioquia “con este proceso se busca finalmente poner al servicio de la comunidad los últimos avances y desarrollos en salud y por consiguiente mejorar calidad de vida de los pacientes”.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
            </p>

          </div>
        </div>
      </div>
        
      <section class="row-section">
        <div class="col-md-12  row-block">
            <div class="card-header" style="background-color: rgb(255, 255, 255);">
              <h3 class="text-center"><img src="/img/sites/confetti.png" style="width: 44px;"> CUMPLEAÑOS DE HOY</h3>
              <span style="font-size:11px; color:#769d35">( Las felicitaciones las ve el usuario cuando se logue en la <i class="fa fa-bell"></i> )</span>
            </div>
            
          @foreach ($reports as $repo)
            @php
                $a1=explode('-',$repo->nacimi);
                $a2=explode('-',date('Y-m-d'));
            @endphp
            @if ($a1[2]>=$a2[2])
            <ul id="sortable">
                <li>
                  <div class="media">
                    <div class="media-left align-self-center">
                      <img class="rounded-circle" src="/img/sites/cake.png">
                    </div>
                    <div class="media-body">
                      <h4>{{$repo->name}}</h4>
                      <p style="margin-bottom: 0rem;"><b style="color:#212529a1">{{$repo->cumple}}</b></p>
                      <p><b style="color:#212529a1">{{$repo->sede}}</b></p>
                      <div class="media-right">
                      
                      <a href="/felicita/{{$repo->id}}"><button type="button" class="btn btn-success btn-block btn-sm">Enviar Felicitación</button></a>												
                     
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            @endif
           
          @endforeach
        </div>
    </div>
    </section>	                      
  </div>
  <!-- end card-->

</div>

<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">            
  <div class="card mb-3">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="intranet/public/img/sliderHome/seguros.jpg" style="height:507px">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="intranet/public/img/sliderHome/autos.jpg" style="height:507px">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="intranet/public/img/sliderHome/ideal.jpg" style="height:507px">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>             
  </div><!-- end card-->          
</div>

</div>        

@endsection
