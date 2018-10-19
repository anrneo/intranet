
 @if ($row->estado==2)
 @if ($row->evaluar==0)
     <a href="/evaluacionhd/{{$row->id}}/{{1}}"><i class="fa fa-star" id="star1-{{$row->id}}" onmouseover="mOver1({{$row->id}})" onmouseout="mOut1({{$row->id}})" ></i></a>
     <a href="/evaluacionhd/{{$row->id}}/{{2}}"><i class="fa fa-star" id="star2-{{$row->id}}" onmouseover="mOver2({{$row->id}})" onmouseout="mOut2({{$row->id}})" ></i></a>
     <a href="/evaluacionhd/{{$row->id}}/{{3}}"><i class="fa fa-star" id="star3-{{$row->id}}" onmouseover="mOver3({{$row->id}})" onmouseout="mOut3({{$row->id}})" ></i></a>
     <a href="/evaluacionhd/{{$row->id}}/{{4}}"><i class="fa fa-star" id="star4-{{$row->id}}" onmouseover="mOver4({{$row->id}})" onmouseout="mOut4({{$row->id}})" ></i></a>
     <a href="/evaluacionhd/{{$row->id}}/{{5}}"><i class="fa fa-star" id="star5-{{$row->id}}" onmouseover="mOver5({{$row->id}})" onmouseout="mOut5({{$row->id}})" ></i></a>
 @elseif($row->evaluar<3)
     @for ($i = 0; $i < $row->evaluar; $i++)
     <i class="fa fa-star" style="color:red"></i>
     @endfor
@elseif($row->evaluar==3)
     @for ($i = 0; $i < $row->evaluar; $i++)
     <i class="fa fa-star" style="color:gold"></i>
     @endfor
@else 
    @for ($i = 0; $i < $row->evaluar; $i++)
    <i class="fa fa-star" style="color:green"></i>
    @endfor
 @endif
@endif
