
<div class="dropdown-menu ">
        @if ($row->estado==3)
                <a class="dropdown-item" href="" data-toggle="modal" data-target="#Modalasignar{{ $row->id }}">Asignar</a>
                <a class="dropdown-item" href="/responder/{{ $row->id }}">Responder</a>
         @elseif($row->estado==0)
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#Modalaprobar{{ $row->id }}">Aprobar</a>
        @elseif($row->estado==1)
        <a class="dropdown-item" href="" data-toggle="modal" data-target="#Modaldocu{{ $row->id }}">Documentar</a>
        <a class="dropdown-item" href="" data-toggle="modal" data-target="#Modalasignar{{ $row->id }}">Reasignar</a>
                <a class="dropdown-item" href="/responder/{{ $row->id }}">Responder</a>
        @endif
</div>