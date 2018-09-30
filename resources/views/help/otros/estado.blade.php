@if ($row->estado==0)
    Pendiente
@elseif($row->estado==1)
    Asignado
@elseif($row->estado==3)
    {{ $row->aprobado  }}
@else
    Finalizado 
@endif