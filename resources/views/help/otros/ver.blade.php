<div class="card-body">
        
    <p>
    <b>Sede: </b>{{ $row->sede }} <br>
    @if ($row->categoria!=null)
        <b>Categoría: </b>@php echo $categoria[$row->categoria]['n'];    @endphp  <br>
    @endif
    <b >Asunto: </b>{{ $row->asunto }} <br>
    <b >Tiempo de Solución: </b>{{ $row->t_std }} hora(s)<br>
    <span id='timer_0' class='timer'></span><br>
    @if ($row->archivo!='Sin archivo')
       <b>Archivo: </b><a href="/intranet/public/storage/{{ $row->archivo }}" class="card-link" target="_blank">Ver archivo adjunto</a><br>
    @endif
    
    <b>Descripción: </b>{{ $row->descripcion }} <br>
    
    @if ($row->aprobado!=null)
       <b>Aprobación: </b>{{ $row->aprobado }} <br>
       <b>Fecha de aprobación: </b>{{ $row->f_aprobado }} <br>
       <b>Prerespuesta aprobación: </b>{{ $row->res_aprobado }} <br>
       <b>Tiempo estimado de solución: </b>{{ $row->tiempo.' '.$row->u_tiempo }} <br>
       <b>Fecha estimada de solución: </b>{{ $row->f_aproxsolu }} <br>
    @endif
    
    @if ($row->asignado_a!=0)
       <b>Asignado a: </b>{{ $row->nombre_asig }} <br>
       <b>Fecha de asignación: </b>{{ $row->f_asignado }} <br>
    @endif

    @php
       
        $sql = "SELECT docu, f_docu FROM docu_help_desks where help_id=$row->id";
        $result = $conn->query($sql);
        

        if ($result->num_rows > 0) {
            $dat=$result->fetch_all();
            // output data of each row
            echo " <b>Documentación: </b><br>" ;
            foreach ($dat as $key => $value) {
                $num=$key+1;
                echo " <b>Nota".$num.": </b>" . $value[0]."<br>";
                echo " <b>Fecha de Nota".$num.": </b>" . $value[1]."<br>";
            }
           /* while($dat = $result->fetch_assoc()) {
                echo " <b>Documentación: </b>" . $dat["docu"]."<br>";
                echo " <b>Fecha de Documentación: </b>" . $dat["f_docu"]."<br>";
            }*/
        }
    @endphp
   

    @if ($row->respuesta!=null)
        <b>Respuesta: </b>{{ $row->respuesta }} <br>
        <b>Fecha de respuesta: </b>{{ $row->f_respuesta }} <br>
    @endif
    </p>
</div>