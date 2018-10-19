
 @if ($row->estado==2)
 @if ($row->evaluar==0)
     <a href="/evaluacionhd/{{$row->id}}/{{1}}"><i class="fa fa-star" id="star11-{{$row->id}}" onmouseover="mOver11({{$row->id}})" onmouseout="mOut11({{$row->id}})" ></i></a>
     <a href="/evaluacionhd/{{$row->id}}/{{2}}"><i class="fa fa-star" id="star22-{{$row->id}}" onmouseover="mOver22({{$row->id}})" onmouseout="mOut22({{$row->id}})" ></i></a>
     <a href="/evaluacionhd/{{$row->id}}/{{3}}"><i class="fa fa-star" id="star33-{{$row->id}}" onmouseover="mOver33({{$row->id}})" onmouseout="mOut33({{$row->id}})" ></i></a>
     <a href="/evaluacionhd/{{$row->id}}/{{4}}"><i class="fa fa-star" id="star44-{{$row->id}}" onmouseover="mOver44({{$row->id}})" onmouseout="mOut44({{$row->id}})" ></i></a>
     <a href="/evaluacionhd/{{$row->id}}/{{5}}"><i class="fa fa-star" id="star55-{{$row->id}}" onmouseover="mOver55({{$row->id}})" onmouseout="mOut55({{$row->id}})" ></i></a>
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
