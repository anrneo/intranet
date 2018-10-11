
<div class="dropdown-menu ">
        @if ($row->estado==3)
                <a class="dropdown-item" href="" data-toggle="modal" data-target="#Modalasignar{{ $row->id }}">Asignar</a>
                <a class="dropdown-item" href="/responder/{{ $row->id }}">Finalizar</a>
         @elseif($row->estado==0)
                 <a class="dropdown-item" href="#" data-toggle="modal" data-target="#Modalaprobar{{ $row->id }}">Verificar</a>
                 <a class="dropdown-item" href="#" data-toggle="modal" data-target="#Modalcambioa{{ $row->id }}">Cambiar área</a>
        @elseif($row->estado==1)
        <a class="dropdown-item" href="" data-toggle="modal" data-target="#Modaldocu{{ $row->id }}">Documentar</a>
        <a class="dropdown-item" href="" data-toggle="modal" data-target="#Modalasignar{{ $row->id }}">Reasignar</a>
                <a class="dropdown-item" href="/responder/{{ $row->id }}">Finalizar</a>
        @endif
</div>