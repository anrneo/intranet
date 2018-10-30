@extends('layouts.app')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
.row-section h2{float:left; width:100%; color:#fff; margin-bottom:30px; font-size: 14px;}
.row-section h2 span{font-family: 'Libre Baskerville', serif; display:block; font-size:45px; text-transform:none; margin-bottom:20px; margin-top:30px;font-weight:700;}
.row-section h2 a{color:#d2abce;}
.row-section .row-block{background:#fff; padding:0px; margin-bottom:50px;}
.row-section .row-block ul{margin:0; padding:0;}
.row-section .row-block ul li{list-style:none; margin-bottom:5px;}
.row-section .row-block ul li:last-child{margin-bottom:0;}
.row-section .row-block ul li:hover{cursor:grabbing;}
.row-section .row-block .media{border:1px solid #d5dbdd; padding:5px 20px; border-radius: 5px; box-shadow:0px 2px 1px rgba(0,0,0,0.04); background:#fff;}
.row-section .media .media-left img{width:75px;}
.row-section .media .media-body p{padding: 0 15px; font-size:14px;}
.row-section .media .media-body h4 {color: #769d35; font-size: 16px; font-weight: 600; margin-bottom: 0; padding-left: 14px; margin-top:12px;}
.btn-default{background:#6B456A; color:#fff; border-radius:30px; border:none; font-size:16px;}
</style>
<div class="row">	
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
					<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
						<div class="carousel-item active">
							<a href="#"><img class="d-block w-100" src="/img/SliderHome/huellero.jpg" style="width:696px; height:250px"></a>
						</div>
						<div class="carousel-item">
							<a href="{{ url('mesahome') }}"><img class="d-block w-100" src="/img/SliderHome/gestor.jpg" style="width:696px; height:250px"></a>
						</div>
						<div class="carousel-item">
							<a href="https://docs.google.com/forms/d/e/1FAIpQLSfU2iJAktONcGVxrGvvxRJQ-avDLI4k8u2WC-LKqITW4DQ6OQ/viewform" target="_blank"><img class="d-block w-100" src="/img/noticias/11.jpg" style="width:696px; height:250px"></a>
						</div>
						<div class="carousel-item">
							<img class="d-block w-100" src="/img/noticias/003.jpg" style="width:700px; height:250px">
						</div>
						<div class="carousel-item">
							<a href="{{ url('aereo') }}"><img class="d-block w-100" src="/img/noticias/tiquete.jpg" style="width:696px; height:250px"></a>
						</div>
						<div class="carousel-item">
							<a href="{{ url('jadelle') }}"><img class="d-block w-100" src="/img/noticias/008.jpg" style="width:696px; height:250px"></a>
						</div>
						</div>
						<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
						</a>
					</div>
			<!-- end card-->
      <style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style><div class='embed-container'><iframe src='http://blogint.redvitalut.com/' style='border:0'></iframe></div>
							
		</div>
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
					<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" src="https://www.youtube-nocookie.com/embed/videoseries?list=PLTn35r0MPQLfK8OhaTAIsBA9z7iaCBKJ8&amp;showinfo=0;autoplay=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
					</div>
					<span style="font-size:13px; color:#769d35">Evalúa nuestros videos: </span>
					<a href="#"><i class="fa fa-thumbs-o-up" style="font-size:20px;"></i></a><span id="like" style="font-size:11px; color:#769d35"></span>
					<a href="#"><i class="fa fa-thumbs-o-down" style="font-size:20px;"></i></a><span id="dislike" style="font-size:11px; color:#769d35"></span>
			<!-- end card-->
			<section class="row-section">
					<div class="col-md-12  row-block">
							<div class="card-header" style="background-color: rgb(255, 255, 255);">
								<h3 class="text-center"><img src="/img/sites/confetti.png" style="width: 44px;"> CUMPLEAÑOS</h3>
                <span style="font-size:11px; color:#769d35">( Las felicitaciones las ve el usuario, cuando inicie sesión <i class="fa fa-bell"></i> )</span>
							</div>
              
						@foreach ($reports as $repo)
              @php
                  $a1=explode('-',$repo->nacimi);
                  $a2=explode('-',date('Y-m-d'));
                  $num=0;
                  foreach ($feli as $key => $val) {
                    if ($repo->id==$val->notifiable_id) {
                      $num++;
                    }
                  }
              @endphp
              @if ($a1[2]>=$a2[2])
              <ul id="sortable">
                <li>
                  <div class="media">
                      <div class="media-left align-self-center">
                          <img class="rounded-circle" src="/img/tenor.gif">
                          @if ($num>0)
                            <p><b style="color:#212529a1;padding:50px 0 0 20px;" data-toggle="tooltip" data-placement="top" title="Felicitaciones">{{$num}} </b><i class="fa fa-birthday-cake" style="color:rgb(41, 148, 167)"></i></p>
                          @endif
                      </div>
                      <div class="media-body">
                          <h4>{{$repo->name}}</h4>
                          <p style="margin-bottom: 0rem;"><b style="color:#212529a1">{{$repo->cumple}}</b></p>
                          <p><b style="color:#212529a1">{{$repo->sede}}</b></p>
                          <a href="/felicita/{{$repo->id}}"><button type="button" class="btn btn-success btn-block btn-sm">Enviar Felicitación</button></a>												
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
</div>
{!! Html::script('/js/jquery.min.js') !!}
<script>
	$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip();   
	});
	</script>
<script>
   $(function(){
		$.ajax({
        method: "POST",
        url: "api/likevideo",
        data: { id: 'dathome' }
      	})
        .done(function( dat ) {
					if(dat[0].likes==1){
						$('#like').html(dat[0].cant)
					}else{
						$('#dislike').html(dat[0].cant)
					$('#like').html(dat[1].cant)
					}
					
					
		 		})

		 $('.fa-thumbs-o-up').click(function(){
			$.ajax({
        method: "POST",
        url: "api/likevideo",
        data: { id: 'like' }
      	})
        .done(function( dat ) {
					$('#like').html(dat[0].cant)
					
		 		})
		 })
		 $('.fa-thumbs-o-down').click(function(){
			$.ajax({
        method: "POST",
        url: "api/likevideo",
        data: { id: 'dislike' }
      	})
        .done(function( dat ) {
					$('#dislike').html(dat[0].cant)
					
		 		})
		 })
	 })
</script>
@endsection
