@extends('layouts.app')
@section('content')

<div class="col-sm-12" style="width:800px">
  <div class="card">
      <img class="card-img-top" src="/img/sites/help.jpg" style="border-top:3px solid #8abc37">
  </div>
  <br>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <form action="" method="post" enctype="multipart/form-data" id="reportehd">
    {{csrf_field()}}
    <div class="row">
      <div class="col-sm-4">
        <div class="form-group">
          <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre" value="{{Auth::user()->name}}" readonly>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <label for="email" class="col-sm-2 col-form-label">Email</label>
          <input type="text" class="form-control" id="email" name="email" value="{{Auth::user()->email}}" readonly>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <label for="cargo" class="col-sm-2 col-form-label">Cargo</label>
          <input type="text" class="form-control" id="cargo" name="cargo" value="{{Auth::user()->cargo}}" readonly>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <label for="sede" class="col-sm-12 col-form-label">Selecciona la sede a la que perteneces </label>
          <select class="form-control" id="sede" name="sede">
            @foreach ($sedes as $sede)
            <option>{{ $sede }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <label for="area" class="col-sm-12 col-form-label">Destino del requerimiento</label>
          <select class="form-control" id="areahd" name="area">
            <option>Sistemas</option>
            <option>Comunicaciones</option>
            <option>Gestión Humana</option>
            <option>Compras, Mantenimiento y Mensajería</option>
          </select>
        </div>
      </div>
      
      <div class="col-sm-4">
        <div class="form-group" id="grupsub">
          <label for="subarea" class="col-sm-12 col-form-label">Cúal es el tema</label>
          <select class="form-control" id="subareahd" name="subarea">
            <option value='1A'>Redes e Internet</option>
            <option value='1B'>Telefonía</option>
            <option value='1C'>Correo</option>
            <option value='1D'>Impresoras</option>
            <option value='1E'>Equipos de cómputo</option>
            <option value='1F'>Servidores</option>
            <option value='1G'>Sistemas de Información</option>
            <option value='1H'>Zeus</option>
            <option value='1I'>Intranet</option>
            <option value='1J'>Ingreso de Empleado</option>
            <option value='1K'>Retiro de Empleado</option>
          </select>
        </div>
      </div>

      <div class="col-sm-12" id="ingreso">
        <label for="ingreso">Selecciona los items necesarios para el INGRESO del empleado</label>
        <div class="row align-items-center shadow-sm p-3 mb-5 bg-white rounded border border-primary">
          <div class="col-auto custom-control custom-checkbox my-1 mr-sm-2">
            <input type="checkbox" class="custom-control-input" id="customControlInline1" name="okingreso0" value="Necesita PC">
            <label class="custom-control-label" for="customControlInline1">Necesita PC</label>
          </div>
          <div class="col-auto custom-control custom-checkbox my-1 mr-sm-2">
            <input type="checkbox" class="custom-control-input" id="customControlInline2" name="okingreso1" value="Necesita teléfono">
            <label class="custom-control-label" for="customControlInline2">Necesita teléfono</label>
          </div>
          <div class="col-auto custom-control custom-checkbox my-1 mr-sm-2">
            <input type="checkbox" class="custom-control-input" id="customControlInline3" name="okingreso2" value="Necesita línea celular">
            <label class="custom-control-label" for="customControlInline3">Necesita línea celular</label>
          </div>
          <div class="col-auto custom-control custom-checkbox my-1 mr-sm-2">
            <input type="checkbox" class="custom-control-input" id="customControlInline4" name="okingreso3" value="Necesita usuario Zeus">
            <label class="custom-control-label" for="customControlInline4">Necesita usuario Zeus</label>
          </div>
          <div class="col-auto custom-control custom-checkbox my-1 mr-sm-2">
            <input type="checkbox" class="custom-control-input" id="customControlInline5" name="okingreso4" value="Necesita Correo">
            <label class="custom-control-label" for="customControlInline5">Necesita Correo</label>
          </div>
          <div class="col-auto custom-control custom-checkbox my-1 mr-sm-2">
            <input type="checkbox" class="custom-control-input" id="customControlInline6" name="okingreso5" value="Necesita usuario Spark">
            <label class="custom-control-label" for="customControlInline6">Necesita usuario Spark</label>
          </div>
          <div class="col-auto custom-control custom-checkbox my-1 mr-sm-2">
            <input type="checkbox" class="custom-control-input" id="customControlInline7" name="okingreso6" value="Necesita usuario de intranet">
            <label class="custom-control-label" for="customControlInline7">Necesita usuario de intranet</label>
          </div>
        </div>
      </div>
      <div class="col-sm-12" id="retiro">
          <label for="ingreso">Selecciona los items necesarios para el RETIRO del empleado</label>
          <div class="row align-items-center shadow-sm p-3 mb-5 bg-white rounded border border-primary">
            <div class="col-auto custom-control custom-checkbox my-1 mr-sm-2">
              <input type="checkbox" class="custom-control-input" id="customControl1" name="okretiro0" value="Entrega de PC">
              <label class="custom-control-label" for="customControl1">Entrega de PC</label>
            </div>
            <div class="col-auto custom-control custom-checkbox my-1 mr-sm-2">
              <input type="checkbox" class="custom-control-input" id="customControl2" name="okretiro1" value="Entrega de teléfono">
              <label class="custom-control-label" for="customControl2">Entrega de teléfono</label>
            </div>
            <div class="col-auto custom-control custom-checkbox my-1 mr-sm-2">
              <input type="checkbox" class="custom-control-input" id="customControl3" name="okretiro2" value="Entrega de línea celular">
              <label class="custom-control-label" for="customControl3">Entrega de línea celular</label>
            </div>
            <div class="col-auto custom-control custom-checkbox my-1 mr-sm-2">
              <input type="checkbox" class="custom-control-input" id="customControl4" name="okretiro3" value="Eliminar usuario Zeus">
              <label class="custom-control-label" for="customControl4">Eliminar usuario Zeus</label>
            </div>
            <div class="col-auto custom-control custom-checkbox my-1 mr-sm-2">
              <input type="checkbox" class="custom-control-input" id="customControl5" name="okretiro4" value="Eliminar o bloquear Correo">
              <label class="custom-control-label" for="customControl5">Eliminar o bloquear Correo</label>
            </div>
            <div class="col-auto custom-control custom-checkbox my-1 mr-sm-2">
              <input type="checkbox" class="custom-control-input" id="customControl6" name="okretiro5" value="Eliminar usuario Spark">
              <label class="custom-control-label" for="customControl6">Eliminar usuario Spark</label>
            </div>
            <div class="col-auto custom-control custom-checkbox my-1 mr-sm-2">
              <input type="checkbox" class="custom-control-input" id="customControl7" name="okretiro6" value="Eliminar usuario de intranet">
              <label class="custom-control-label" for="customControl7">Eliminar usuario de intranet</label>
            </div>
          </div>
        </div>
      
      <div class="col-sm-6">
        <div class="form-group" id="divreque">
          <label for="requerimiento" class="col-sm-6 col-form-label" id="requeri">Tipo de Requerimiento</label>
          <select class="form-control" id="requerimientohd" name="requerimiento">
            <option>Selecciona...</option>
            <option>Solicitud</option>
            <option>Incidente</option>
          </select>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group" id="divcategoria">
          <label for="requerimiento" class="col-sm-12 col-form-label">Tipo de categoría</label>
          <select class="form-control" id="categoriahd" name="categoria">
          </select>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="asunto" class="col-sm-12 col-form-label">Asunto</label>
          <input type="text" class="form-control" id="asunto" name="asunto" placeholder="¿Cúal es el motivo de tu Solicitud?" required>
      </div>
        <div class="form-group">
          <label for="archivo" class="col-sm-12 col-form-label">Adjuntar Archivo (Max. 3MB, jpg, jpeg, pdf, word, excel, zip)</label>
            <input type="file" class="form-control" id="archivohd" name="archivo">
      </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="descripcion">Descripción</label>
          <textarea class="form-control" style="height: 140px; id="descripcion" name="descripcion" rows="6" required placeholder="Describe detalladamente los requerimientos de tu solicitud"></textarea>
        </div>
      </div>
      
    </div>
    <input type="text" class="form-control" id="admin" name="admin" hidden>
   

<div class="col-sm-12">
            <button type="submit" class="btn btn-primary btn pull-right">Generar Solicitud</button>
        </div>
         <!-- @captcha
        <input type="text" id="captcha" name="captcha"> -->
        
  </form>
  
</div>

{!! Html::script('/js/jquery.min.js') !!}

<script>
  $(function(){

    
    $('#ingreso').hide()
            $('#retiro').hide()
            $('#subareahd').on({
            change:function(){
                if($(this).val()=='3B'){
                    $('#ingreso').hide()
                    $('#retiro').hide()
                    $('#divcategoria').show() 
                    $('#categoriahd').html('<option value="301">Muebles y Enseres</option>\
                                        <option value="302">Equipos de Computo</option>\
                                        <option value="303">Telefonía</option>\
                                        <option value="304">Redes</option>\
                                        <option value="305">Aseo</option>\
                                        <option value="306">Cafetería</option>\
                                        <option value="307">Dotación de Consultorio</option>\
                                        <option value="308">Logistica y Eventos</option>\
                                        <option value="309">Papeleria</option>\
                                        <option value="100">Otros</option>\
                                       ')
                }else if($(this).val()=='3A' || $(this).val()=='3C'){
                    $('#ingreso').hide()
                    $('#retiro').hide()
                    $('#divcategoria').hide() 
                }else if($(this).val()=='1A'){
                    $('#ingreso').hide()
                    $('#retiro').hide()
                    $('#divcategoria').show()
                    $('#categoriahd').html('<option value="101">Restricciones de páginas web</option>\
                                        <option value="102">Limitaciones de ancho de banda</option>\
                                        <option value="103">Adquisición o ampliación de canal de internet</option>\
                                        <option value="104">Configuración de VPN</option>\
                                        <option value="105">WIFI (Cambiar nombre o contraseña)</option>\
                                        <option value="106">Equipo o sede sin internet</option>\
                                        <option value="107">Lentitud de internet en equipo o sede</option>\
                                        <option value="100">Otro</option>')
                }else if($(this).val()=='1B'){
                    $('#ingreso').hide()
                    $('#retiro').hide()
                    $('#divcategoria').show()
                    $('#categoriahd').html('<option value="108">Creación de extensión telefónica</option>\
                                        <option value="109">Grabación de llamada</option>\
                                        <option value="110">Cambiar nombre a extensión telefónica</option>\
                                        <option value="111">Desvío de llamadas</option>\
                                        <option value="112">Modificación de audio en IVR</option>\
                                        <option value="113">Informe de Telefonía</option>\
                                        <option value="1131">Problemas al realizar llamada</option>\
                                        <option value="100">Otro</option>')
                }else if($(this).val()=='1C'){
                    $('#ingreso').hide()
                    $('#retiro').hide()
                    $('#divcategoria').show()
                    $('#categoriahd').html('<option value="114">Creación, configuración o eliminación de cuenta de correo</option>\
                                        <option value="115">Configuración o modificación de firma corporativa</option>\
                                        <option value="1151">Problemas con correo electrónico</option>\
                                        <option value="100">Otro</option>')
                }else if($(this).val()=='1D'){
                    $('#ingreso').hide()
                    $('#retiro').hide()
                    $('#divcategoria').show()
                    $('#categoriahd').html('<option value="116">Cambio de tóner</option>\
                                        <option value="117">Informe de impresión</option>\
                                        <option value="118">Adquisición o reemplazo de impresora</option>\
                                        <option value="119">Instalación y configuración de impresora</option>\
                                        <option value="120">Revisión de impresora</option>\
                                        <option value="100">Otro</option>')
                }else if($(this).val()=='1E'){
                    $('#ingreso').hide()
                    $('#retiro').hide()
                    $('#divcategoria').show()
                    $('#categoriahd').html('<option value="121">Asignación o cambio de equipo</option>\
                                        <option value="122">Instalación o activación de Office</option>\
                                        <option value="123">Instalación o activación de Windows</option>\
                                        <option value="124">Instalación o activación de Antivirus</option>\
                                        <option value="125">Backup de información</option>\
                                        <option value="126">Instalación o actualización de programas</option>\
                                        <option value="127">Problemas en pantalla, puertos USB, mouse o teclado</option>\
                                        <option value="128">Bajo rendimiento de equipo</option>\
                                        <option value="100">Otro</option>')
                }else if($(this).val()=='1F'){
                    $('#ingreso').hide()
                    $('#retiro').hide()
                    $('#divcategoria').show()
                    $('#categoriahd').html('<option value="129">Creación de usuario de dominio</option>\
                                        <option value="130">Ingreso de equipo al dominio</option>\
                                        <option value="131">Creación o actualización de servidor</option>\
                                        <option value="132">Configuración de servicios (DNS, FS, FTP)</option>\
                                        <option value="133">Informe de servicios</option>\
                                        <option value="134">Problemas con servicios DNS, archivos en el File Server o Directorio Activo</option>\
                                        <option value="100">Otro</option>')
                }else if($(this).val()=='1G'){
                    $('#ingreso').hide()
                    $('#retiro').hide()
                    $('#divcategoria').show()
                    $('#categoriahd').html('<option value="135">Estadísticas e Informes de RIPS</option>\
                                            <option value="136">Inconsistencias en RIPS</option>\
                                            <option value="100">Otro</option>')
                }else if($(this).val()=='1H'){
                    $('#ingreso').hide()
                    $('#retiro').hide()
                    $('#divcategoria').show()
                    $('#categoriahd').html('<option value="137">Levantamiento de restricciones</option>\
                                        <option value="138">Permisos adicionales en Zeus</option>\
                                        <option value="139">Nuevas implementaciones o mejoras en el aplicativo</option>\
                                        <option value="140">Problemas para ingresar al aplicativo o módulo</option>\
                                        <option value="141">Lentitud en alguno de los módulos del aplicativo</option>\
                                        <option value="100">Otro</option>')
                                        $('#divreque').show()
                }else if($(this).val()=='1I'){
                    $('#divcategoria').show()
                    $('#ingreso').hide()
                    $('#retiro').hide()
                    $('#categoriahd').html('<option value="142">Crear usuario</option>\
                                        <option value="143">Permiso de acceso a módulo</option>\
                                        <option value="144">No puedo acceder a la intranet</option>\
                                        <option value="100">Otro</option>')
                    }else if($(this).val()=='1J'){
                    $('#ingreso').show()
                    $('#retiro').hide()
                    $('#divcategoria').hide()
                }else if($(this).val()=='1K'){
                    $('#retiro').show()
                    $('#ingreso').hide()
                    $('#divcategoria').hide()
                }
            }
            })
            
             $('#categoriahd').on({
                click:function(){
                    if($(this).val()==null){
                        toastr.options = { "closeButton":true, "progressBar": true};
                        toastr.warning("Selecciona primero el requerimiento");
                    }
                }
            })

            
            
      
        

        $('#requerimientohd').on({
            change:function(){
                if($('#requerimientohd').val()=='Solicitud'){
                    toastr.options = { "closeButton":true, "progressBar": true};
                toastr.info("Solicitud: Tarea o actividad que no conlleva a la suspensión de un servicio o actividad diaria");
                
                }

                if($('#requerimientohd').val()=='Incidente'){
                    toastr.options = { "closeButton":true, "progressBar": true};
                toastr.info("Incidente: Evento que impide la realización normal de actividades");
               
                                        
                }
                 if($('#requerimientohd').val()=='Solicitud' &&  $('#subareahd').val()=='1A'){
                $('#categoriahd').html('<option value="101">Restricciones de páginas web</option>\
                                        <option value="102">Limitaciones de ancho de banda</option>\
                                        <option value="103">Adquisición o ampliación de canal de internet</option>\
                                        <option value="104">Configuración de VPN</option>\
                                        <option value="105">WIFI (Cambiar nombre o contraseña)</option>\
                                        <option value="100">Otro</option>')
                }else if($('#requerimientohd').val()=='Incidente' &&  $('#subareahd').val()=='1A'){ 
                $('#categoriahd').html('<option value="106">Equipo o sede sin internet</option>\
                                        <option value="107">Lentitud de internet en equipo o sede</option>\
                                        <option value="100">Otro</option>')
                                        }
                
               if($('#requerimientohd').val()=='Solicitud' && $('#subareahd').val()=='1B'){
                $('#categoriahd').html('<option value="108">Creación de extensión telefónica</option>\
                                        <option value="109">Grabación de llamada</option>\
                                        <option value="110">Cambiar nombre a extensión telefónica</option>\
                                        <option value="111">Desvío de llamadas</option>\
                                        <option value="112">Modificación de audio en IVR</option>\
                                        <option value="113">Informe de Telefonía</option>\
                                        <option value="100">Otro</option>')
                }else if($('#requerimientohd').val()=='Incidente' && $('#subareahd').val()=='1B'){
                $('#categoriahd').html('<option value="1131">Problemas al realizar llamada</option>\
                                        <option value="100">Otro</option>')
                                        }

                if($('#requerimientohd').val()=='Solicitud' && $('#subareahd').val()=='1C'){
                $('#categoriahd').html('<option value="114">Creación, configuración o eliminación de cuenta de correo</option>\
                                        <option value="115">Configuración o modificación de firma corporativa</option>\
                                        <option value="100">Otro</option>')
                }else if($('#requerimientohd').val()=='Incidente' && $('#subareahd').val()=='1C'){
                $('#categoriahd').html('<option value="1151">Problemas con correo electrónico</option>\
                                        <option value="100">Otro</option>')
                                        }

                if($('#requerimientohd').val()=='Solicitud' && $('#subareahd').val()=='1D'){
                $('#categoriahd').html('<option value="116">Cambio de tóner</option>\
                                        <option value="117">Informe de impresión</option>\
                                        <option value="118">Adquisición o reemplazo de impresora</option>\
                                        <option value="119">Instalación y configuración de impresora</option>\
                                        <option value="100">Otro</option>')
                }else if($('#requerimientohd').val()=='Incidente' && $('#subareahd').val()=='1D'){
                $('#categoriahd').html('<option value="120">Revisión de impresora</option>\
                                        <option value="100">Otro</option>')
                                        }

                if($('#requerimientohd').val()=='Solicitud' && $('#subareahd').val()=='1E'){
                $('#categoriahd').html('<option value="121">Asignación o cambio de equipo</option>\
                                        <option value="122">Instalación o activación de Office</option>\
                                        <option value="123">Instalación o activación de Windows</option>\
                                        <option value="124">Instalación o activación de Antivirus</option>\
                                        <option value="125">Backup de información</option>\
                                        <option value="126">Instalación o actualización de programas</option>\
                                        <option value="100">Otro</option>')
                }else if($('#requerimientohd').val()=='Incidente' && $('#subareahd').val()=='1E'){
                $('#categoriahd').html('<option value="127">Problemas en pantalla, puertos USB, mouse o teclado</option>\
                                        <option value="128">Bajo rendimiento de equipo</option>\
                                        <option value="100">Otro</option>')
                                        }

                if($('#requerimientohd').val()=='Solicitud' && $('#subareahd').val()=='1F'){
                $('#categoriahd').html('<option value="129">Creación de usuario de dominio</option>\
                                        <option value="130">Ingreso de equipo al dominio</option>\
                                        <option value="131">Creación o actualización de servidor</option>\
                                        <option value="132">Configuración de servicios (DNS, FS, FTP)</option>\
                                        <option value="133">Informe de servicios</option>\
                                        <option value="100">Otro</option>')
                }else if($('#requerimientohd').val()=='Incidente' && $('#subareahd').val()=='1F'){
                $('#categoriahd').html('<option value="134">Problemas con servicios DNS, archivos en el File Server o Directorio Activo</option>\
                                        <option value="100">Otro</option>')
                                        }

               

                if($('#requerimientohd').val()=='Solicitud' && $('#subareahd').val()=='1G'){
                $('#categoriahd').html('<option value="135">Estadísticas e Informes de RIPS</option>\
                                        <option value="100">Otro</option>')
                }else if($('#requerimientohd').val()=='Incidente' && $('#subareahd').val()=='1G'){
                $('#categoriahd').html('<option value="136">Inconsistencias en RIPS</option>\
                                        <option value="100">Otro</option>')
                                        }
                
                if($('#requerimientohd').val()=='Solicitud' && $('#subareahd').val()=='1H'){
                $('#categoriahd').html('<option value="137">Levantamiento de restricciones</option>\
                                        <option value="138">Permisos adicionales en Zeus</option>\
                                        <option value="139">Nuevas implementaciones o mejoras en el aplicativo</option>\
                                        <option value="100">Otro</option>')
                }else if($('#requerimientohd').val()=='Incidente' && $('#subareahd').val()=='1H'){
                $('#categoriahd').html('<option value="140">Problemas para ingresar al aplicativo o módulo</option>\
                                        <option value="141">Lentitud en alguno de los módulos del aplicativo</option>\
                                        <option value="100">Otro</option>')
                                        }

                if($('#requerimientohd').val()=='Solicitud' && $('#subareahd').val()=='1I'){
                $('#categoriahd').html('<option value="142">Crear usuario</option>\
                                        <option value="143">Permiso de acceso a módulo</option>\
                                        <option value="100">Otro</option>')
                }else if($('#requerimientohd').val()=='Incidente' && $('#subareahd').val()=='1I'){
                $('#categoriahd').html('<option value="144">No puedo acceder a la intranet</option>\
                                        <option value="100">Otro</option>')
                                        }
            }
        })

        $('#reportehd').on('submit', function(event){
            if($('#requerimientohd').val()=='Selecciona...'){
                $('#requeri').css("color", "red")
                toastr.options = { "closeButton":true, "progressBar": true};
                toastr.error("Por favor selecciona el tipo de requerimiento");
                event.preventDefault();
            }
            if($('#subareahd').val()=='1H'){
                $('#admin').val(501) //Jorge Arboleda Vallejo
            }
            else if($('#areahd').val()=='Comunicaciones'){
                $('#categoriahd').val('')
                $('#admin').val(502) //laura vasquez
            }
            else if($('#areahd').val()=='Gestión Humana'){
                $('#categoriahd').val('')
                $('#admin').val(475) //Paola Fonseca
            }
            else if($('#areahd').val()=='Compras, Mantenimiento y Mensajería'){
                $('#admin').val(476) //luisa giraldo
            }
            else if($('#subareahd').val()=='3A' || $('#subareahd').val()=='3C'){
                $('#categoriahd').val('')
            }
            else{
                 $('#admin').val(430) //fernando padron
            }
        })

        $('#areahd').on({
                change:function(){
                if($(this).val()=='Comunicaciones'){
                        $('#ingreso').hide()
                        $('#retiro').hide()
                        $('#divcategoria').hide()
                        $('#subareahd').html('<option value="2A">Publicación de Contenidos en Intranet</option>\
                                        <option value="2B">Publicación de Contenidos Página Web</option>\
                                        <option value="2C">Revisión y/o Creación de Contenido</option>\
                                        <option value="2D">Mantenimiento y/o Instalación de contenido Imagen Corporativa</option>\
                                        <option value="2E">Solicitud de Piezas Publicitarias</option>\
                                        <option value="2F">Creación de Campaña Publicitaria</option>\
                                        <option value="2G">Creación de Videos Institucionales</option>')
                }
                else if($(this).val()=='Sistemas'){
                        $('#ingreso').hide()
                        $('#retiro').hide()
                        $('#divcategoria').show()
                        $('#subareahd').html('<option value="1A">Redes e Internet</option>\
                                                <option value="1B">Telefonía</option>\
                                                <option value="1C">Correo</option>\
                                                <option value="1D">Impresoras</option>\
                                                <option value="1E">Equipos de cómputo</option>\
                                                <option value="1F">Servidores</option>\
                                                <option value="1G">Sistemas de Información</option>\
                                                <option value="1H">Zeus</option>\
                                                <option value="1I">Intranet</option>\
                                                <option value="1J">Ingreso de Empleado</option>\
                                                <option value="1K">Retiro de Empleado</option>') 
                        $('#categoriahd').html('')
                    }
                else if($(this).val()=='Gestión Humana'){
                        $('#ingreso').hide()
                        $('#retiro').hide()
                        $('#divcategoria').hide()
                        $('#subareahd').html('<option value="4A">PQRSF Empleado</option>') 
                    }
                    else{
                        $('#ingreso').hide()
                        $('#retiro').hide()
                        $('#divcategoria').hide()
                        $('#subareahd').html('<option value="3A">Mantenimiento</option>\
                                            <option value="3B">Compras</option>\
                                            <option value="3C">Mensajeria</option>')
                    }
                 }
                 })

             
            
        $(document).on('change','#archivohd',function(){
	    // this.files[0].size recupera el tamaño del archivo
	    // alert(this.files[0].size);
	
	    var fileName = this.files[0].name;
	    var fileSize = this.files[0].size;

	    if(fileSize > 3000000){
            toastr.error("El archivo no debe superar los 3MB");
		this.value = '';
		this.files[0].name = '';
	    }else{
		// recuperamos la extensión del archivo
		var ext = fileName.split('.').pop();

		// console.log(ext);
		switch (ext) {
            case 'xls':
             case 'xlsm':
            case 'xlsx':
            case 'docx':
            case 'doc':
            case 'jpg':
            case 'jpeg':
            case 'PDF':
            case 'zip':
            case 'ZIP':
			case 'pdf': break;
			default:
            toastr.options = { "closeButton":true, "progressBar": true};
            toastr.error("El archivo no tiene la extensión adecuada");
				this.value = ''; // reset del valor
				this.files[0].name = '';
		}
	    }
        });
  })

</script>

@endsection

