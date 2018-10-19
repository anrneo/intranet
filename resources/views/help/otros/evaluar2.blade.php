
 

 @if($row->evaluar<3)
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


