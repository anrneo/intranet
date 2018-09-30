<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Datos extends Controller
{

    public function subarea()
    {
        $subarea=array('Redes e Internet','Telefonía', 'Correo','Impresoras','Equipos de cómputo','Servidores',
        'Sistemas de Información','Zeus','Intranet','Ingreso de Empleado','Retiro de Empleado');

        return $subarea;
    }

    public function categoria()
    {
        $categoria=array(
            '1A'=>array('Solicitud'=>array('id'=>'Restricciones de páginas web',
                                           'id'=>'Limitaciones de ancho de banda',
                                           'id'=>'Adquisición o ampliación de canal de internet',
                                           'id'=>'Configuración de VPN',
                                           'id'=>'WIFI (Cambiar nombre o contraseña)',
                                           'id'=>'Otro'),
                        'Incidente'=>array('id'=>'Equipo o sede sin internet',
                                            'id'=>'Lentitud de internet en equipo o sede',
                                            'id'=>'Otro')),
            '1B'=>array('Solicitud'=>array('id'=>'Creación de extensión telefónica',
                                                        'id'=>'Grabación de llamada',
                                                        'id'=>'Cambiar nombre a extensión telefónica',
                                                        'id'=>'Desvío de llamadas',
                                                        'id'=>'Modificación de audio en IVR',
                                                        'id'=>'Informe de Telefonía',
                                                        'id'=>'Otro'),
                                    'Incidente'=>array('id'=>'Problemas al realizar llamada',
                                                        'id'=>'Otro')),        
            '1C'=>array('Solicitud'=>array('id'=>'Creación, configuración o eliminación de cuenta de correo',
                                                'id'=>'Configuración o modificación de firma corporativa',
                                                'id'=>'Otro'),
                            'Incidente'=>array('id'=>'Problemas con correo electrónico',
                                                'id'=>'Otro')),     
            '1D'=>array('Solicitud'=>array('id'=>'Cambio de tóner',
                                                'id'=>'Informe de impresión',
                                                'id'=>'Adquisición o reemplazo de impresora',
                                                'id'=>'Instalación y configuración de impresora',
                                                'id'=>'Otro'),
                            'Incidente'=>array('id'=>'Revisión de impresora',
                                                'id'=>'Otro')),  
            '1E'=>array('Solicitud'=>array('id'=>'Asignación o cambio de equipo',
                                                        'id'=>'Instalación o activación de Office',
                                                        'id'=>'Instalación o activación de Windows',
                                                        'id'=>'Instalación o activación de Antivirus',
                                                        'id'=>'Backup de información',
                                                        'id'=>'Instalación o actualización de programas',
                                                        'id'=>'Otro'),
                                    'Incidente'=>array('id'=>'Problemas en pantalla, puertos USB, mouse o teclado',
                                                        'id'=>'Bajo rendimiento de equipo',
                                                        'id'=>'Otro')),   
            '1F'=>array('Solicitud'=>array('id'=>'Creación de usuario de dominio',
                                                        'id'=>'Ingreso de equipo al dominio',
                                                        'id'=>'Creación o actualización de servidor',
                                                        'id'=>'Configuración de servicios (DNS, FS, FTP)',
                                                        'id'=>'Informe de servicios',
                                                        'id'=>'Otro'),
                                    'Incidente'=>array('id'=>'Problemas con servicios DNS, archivos en el File Server o Directorio Activo',
                                                        'id'=>'Otro')),   
            
            '1G'=>array('Solicitud'=>array('id'=>'Estadísticas e Informes de RIPS',
                                                                'id'=>'Otro'),
                                            'Incidente'=>array('id'=>'Inconsistencias en RIPS',
                                                                'id'=>'Otro')),  
            '1H'=>array('Solicitud'=>array('id'=>'Levantamiento de restricciones',
                                             'id'=>'Permisos adicionales en Zeus',
                                             'id'=>'Nuevas implementaciones o mejoras en el aplicativo',
                                             'id'=>'Otro'),
                          'Incidente'=>array('id'=>'Problemas para ingresar al aplicativo o módulo',
                                             'id'=>'Lentitud en alguno de los módulos del aplicativo',
                                             'id'=>'Otro')),   
            '1I'=>array('Solicitud'=>array('id'=>'Crear usuario',
                                             'id'=>'Permiso de acceso a módulo',
                                             'id'=>'Otro'),
                          'Incidente'=>array('id'=>'No puedo acceder a la intranet',
                                             'id'=>'Otro')),                            
        );
        
        
        return $categoria;   
    }
    
    public function sedes()
    {
        $sedes= array(
            0 => 'La 33',
            1 => 'La 80', 
            2 => 'Prado', 
            3 => 'Laureles', 
            4 => 'Envigado', 
            5 => 'Bello', 
            6 => 'Caucasia', 
            7 => 'Turbo', 
            8 => 'Estadio', 
            9 => 'Argentina', 
            10 => 'Itagüi', 
            11 => 'Rionegro', 
            12 => 'Apartadó', 
            13 => 'Quibdó', 
            14 => 'Apoyo terapéutico', 
            15 => 'Serv. Farmacéuticos', 
            16 => 'IPS Universitaria Prado', 
            17 => 'La Aguacatala', 
        );
        return $sedes;
    }

    public function datos($i)
    {
       $datosubarea=array(
            '1A' => 'Redes e Internet',
            '1B' => 'Telefonía',
            '1C' => 'Correo',
            '1D' => 'Impresoras',
            '1E' => 'Equipos de cómputo',
            '1F' => 'Servidores',
            '1G' => 'Sistemas de Información',
            '1H' => 'Zeus',
            '1I' => 'Intranet',
            '1J' => 'Ingreso de Empleado',
            '1K' => 'Retiro de Empleado',
            "2A" => 'Publicación de Contenidos en Intranet',
            "2B" => 'Publicación de Contenidos Página Web',
            "2C" => 'Revisión y/o Creación de Contenido',
            "2D" => 'Mantenimiento y/o Instalación de contenido Imagen Corporativa',
            "2E" => 'Solicitud de Piezas Publicitarias',
            "2F" => 'Creación de Campaña Publicitaria',
            "2G" => 'Creación de Videos Institucionales',
            "3A" => 'Mantenimiento',
            "3B" => 'Compras',
            "3C" => 'Mensajeria',
            "4A" => 'PQRSF Empleado',
            );  

            return $datosubarea[$i];
    }
    public function tiempos()
    {
       $t_std=array(
        100=>array('n' => 'Otro','t'=>24),
        101=>array('n' => 'Restricciones de páginas web','t'=>1),
        102=>array('n' => 'Limitaciones de ancho de banda','t'=>1),
        103=>array('n' => 'Adquisición o ampliación de canal de internet','t'=>1),
        104=>array('n' => 'Configuración de VPN','t'=>1),
        105=>array('n' => 'WIFI (Cambiar nombre o contraseña)','t'=>0.5),
        106=>array('n' => 'Equipo o sede sin internet','t'=>1),
        107=>array('n' => 'Lentitud de internet en equipo o sede','t'=>2),
        108=>array('n' => 'Creación de extensión telefónica','t'=>1),
        109=>array('n' => 'Grabación de llamada','t'=>1),
        110=>array('n' => 'Cambiar nombre a extensión telefónica','t'=>0.5),
        111=>array('n' => 'Desvío de llamadas','t'=>0.5),
        112=>array('n' => 'Modificación de audio en IVR','t'=>1),
        113=>array('n' => 'Informe de Telefonía','t'=>1),
        1131=>array('n' => 'Problemas al realizar llamada','t'=>1),
        114=>array('n' => 'Creación, configuración o eliminación de cuenta de correo','t'=>1),
        115=>array('n' => 'Configuración o modificación de firma corporativa','t'=>1),
        1151=>array('n' => 'Problemas con correo electrónico','t'=>1),
        116=>array('n' => 'Cambio de tóner','t'=>0.25),
        117=>array('n' => 'Informe de impresión','t'=>1),
        118=>array('n' => 'Adquisición o reemplazo de impresora','t'=>1),
        119=>array('n' => 'Instalación y configuración de impresora','t'=>1),
        120=>array('n' => 'Revisión de impresora','t'=>1),
        121=>array('n' => 'Asignación o cambio de equipo','t'=>0.25),
        122=>array('n' => 'Instalación o activación de Office','t'=>0.25),
        123=>array('n' => 'Instalación o activación de Windows','t'=>0.25),
        124=>array('n' => 'Instalación o activación de Antivirus','t'=>0.25),
        125=>array('n' => 'Backup de información','t'=>1),
        126=>array('n' => 'Instalación o actualización de programas','t'=>1),
        127=>array('n' => 'Problemas en pantalla, puertos USB, mouse o teclado','t'=>1),
        128=>array('n' => 'Bajo rendimiento de equipo','t'=>1),
        129=>array('n' => 'Creación de usuario de dominio','t'=>0.25),
        130=>array('n' => 'Ingreso de equipo al dominio','t'=>0.5),
        131=>array('n' => 'Creación o actualización de servidor','t'=>2),
        132=>array('n' => 'Configuración de servicios (DNS, FS, FTP)','t'=>1),
        133=>array('n' => 'Informe de servicios','t'=>1),
        134=>array('n' => 'Problemas con servicios DNS, archivos en el File Server o Directorio Activo','t'=>1),
        135=>array('n' => 'Estadísticas e Informes de RIPS','t'=>1),
        136=>array('n' => 'Inconsistencias en RIPS','t'=>1),
        137=>array('n' => 'Levantamiento de restricciones','t'=>0.4),
        138=>array('n' => 'Permisos adicionales en Zeus','t'=>0.4),
        139=>array('n' => 'Nuevas implementaciones o mejoras en el aplicativo','t'=>48),
        140=>array('n' => 'Problemas para ingresar al aplicativo o módulo','t'=>0.4),
        141=>array('n' => 'Lentitud en alguno de los módulos del aplicativo','t'=>24),
        142=>array('n' => 'Crear usuario','t'=>0.4),
        143=>array('n' => 'Permiso de acceso a módulo','t'=>0.4),
        144=>array('n' => 'No puedo acceder a la intranet','t'=>1),
        "1J" => 24,
        "1K" => 24,
        "2A" => 48,
        "2B" => 24,
        "2C" => 72,
        "2D" => 24,
        "2E" => 72,
        "2F" => 72,
        "2G" => 360,
        "3A" => 72,
        "3B" => 72,
        301=>array('n' => 'Muebles y Enseres','t'=>72),
        302=>array('n' => 'Equipos de Computo','t'=>72),
        303=>array('n' => 'Telefonía','t'=>72),
        304=>array('n' => 'Redes','t'=>72),
        305=>array('n' => 'Aseo','t'=>72),
        306=>array('n' => 'Cafetería','t'=>72),
        307=>array('n' => 'Dotación de Consultorio','t'=>72),
        308=>array('n' => 'Logistica y Eventos','t'=>72),
        309=>array('n' => 'Papeleria','t'=>72),
        "3C" => 72,
        "4A" => 72,
            
            );  

            return $t_std;
    }
    
    public function asigna()
    {
        /*TECNOLOGIA
        fernando padron = 430
          alexandra velez = 450
          edwin ayala = 490
        ZEUS
        jorge arboleda = 501
        RIBS
        edwing mejia = 449
        samir cordoba = 438
        alexander montoya = 165
        cristina murillo = 415
        deysi aguirre= 4
        ana paniagua= 300
        COMUNICACIONES
        laura vasquez = 502
        COMPRAS Y MTTO
        paula del castillo = 365
        jesica durango = 149
        Luisa Giraldo = 476
          */
        $asignacion=array(
             'Redes e Internet'=>array(0=>array('id'=>351, 'nombre'=>'Sistemas La 80'),//Jonathan Cobaleda Cabrera
                                        1=>array('id'=>72, 'nombre'=>'Sistemas Laureles'),//Cristian Camilo Rodriguez Sanchez
                                        2=>array('id'=>564, 'nombre'=>'Sistemas Estadio'),//José Manuel Londoño
                                        3=>array('id'=>565, 'nombre'=>'Sistemas Caucasia'),//Juan David García Mestra
                                        4=>array('id'=>566, 'nombre'=>'Sistemas Apartadó'),//Yeferson David Barrios Herrera
                                        5=>array('id'=>50, 'nombre'=>'Sistemas Bello'),//Yenifer Tatiana Parra Quintana
                                        6=>array('id'=>190, 'nombre'=>'Sistemas Envigado'),//John Anderson Arrubla Mejia
                                        7=>array('id'=>577, 'nombre'=>'Sistemas Perú'),
                                        8=>array('id'=>578, 'nombre'=>'Sistemas Rionegro'),
                                        9=>array('id'=>579, 'nombre'=>'Sistemas Argentina'),
                                        10=>array('id'=>581, 'nombre'=>'Sistemas Turbo'),
                                        11=>array('id'=>582, 'nombre'=>'Sistemas Medicalcomplex'),
                                        12=>array('id'=>450, 'nombre'=>'Alexandra Vélez Grisales'),
                                        13=>array('id'=>501, 'nombre'=>'Jorge Arboleda Vallejo'),
                                        14=>array('id'=>490, 'nombre'=>'Edwin Ayala Palomeque'),
                                        15=>array('id'=>500, 'nombre'=>'Carlos Villa Rojas'),
                                        16=>array('id'=>2, 'nombre'=>'Cristián Álvarez Chacón'),
                                        17=>array('id'=>430, 'nombre'=>'Fernando Padron Jabib')),

             'Telefonía'=>array(0=>array('id'=>351, 'nombre'=>'Sistemas La 80'),
             1=>array('id'=>72, 'nombre'=>'Sistemas Laureles'),
             2=>array('id'=>564, 'nombre'=>'Sistemas Estadio'),
             3=>array('id'=>565, 'nombre'=>'Sistemas Caucasia'),
             4=>array('id'=>566, 'nombre'=>'Sistemas Apartadó'),
             5=>array('id'=>50, 'nombre'=>'Sistemas Bello'),
             6=>array('id'=>190, 'nombre'=>'Sistemas Envigado'),
             7=>array('id'=>577, 'nombre'=>'Sistemas Perú'),
             8=>array('id'=>578, 'nombre'=>'Sistemas Rionegro'),
             9=>array('id'=>579, 'nombre'=>'Sistemas Argentina'),
             10=>array('id'=>581, 'nombre'=>'Sistemas Turbo'),
             11=>array('id'=>582, 'nombre'=>'Sistemas Medicalcomplex'),
             12=>array('id'=>450, 'nombre'=>'Alexandra Vélez Grisales'),
             13=>array('id'=>501, 'nombre'=>'Jorge Arboleda Vallejo'),
             14=>array('id'=>490, 'nombre'=>'Edwin Ayala Palomeque'),
             15=>array('id'=>500, 'nombre'=>'Carlos Villa Rojas'),
             16=>array('id'=>2, 'nombre'=>'Cristián Álvarez Chacón'),
             17=>array('id'=>430, 'nombre'=>'Fernando Padron Jabib')),

             'Correo'=>array(0=>array('id'=>351, 'nombre'=>'Sistemas La 80'),
             1=>array('id'=>72, 'nombre'=>'Sistemas Laureles'),
             2=>array('id'=>564, 'nombre'=>'Sistemas Estadio'),
             3=>array('id'=>565, 'nombre'=>'Sistemas Caucasia'),
             4=>array('id'=>566, 'nombre'=>'Sistemas Apartadó'),
             5=>array('id'=>50, 'nombre'=>'Sistemas Bello'),
             6=>array('id'=>190, 'nombre'=>'Sistemas Envigado'),
             7=>array('id'=>577, 'nombre'=>'Sistemas Perú'),
             8=>array('id'=>578, 'nombre'=>'Sistemas Rionegro'),
             9=>array('id'=>579, 'nombre'=>'Sistemas Argentina'),
             10=>array('id'=>581, 'nombre'=>'Sistemas Turbo'),
             11=>array('id'=>582, 'nombre'=>'Sistemas Medicalcomplex'),
                                        12=>array('id'=>450, 'nombre'=>'Alexandra Vélez Grisales'),
                                        13=>array('id'=>501, 'nombre'=>'Jorge Arboleda Vallejo'),
                                        14=>array('id'=>490, 'nombre'=>'Edwin Ayala Palomeque'),
                                        15=>array('id'=>500, 'nombre'=>'Carlos Villa Rojas'),
                                        16=>array('id'=>2, 'nombre'=>'Cristián Álvarez Chacón'),
                                        17=>array('id'=>430, 'nombre'=>'Fernando Padron Jabib')),

             'Impresoras'=>array(0=>array('id'=>351, 'nombre'=>'Sistemas La 80'),
             1=>array('id'=>72, 'nombre'=>'Sistemas Laureles'),
             2=>array('id'=>564, 'nombre'=>'Sistemas Estadio'),
             3=>array('id'=>565, 'nombre'=>'Sistemas Caucasia'),
             4=>array('id'=>566, 'nombre'=>'Sistemas Apartadó'),
             5=>array('id'=>50, 'nombre'=>'Sistemas Bello'),
             6=>array('id'=>190, 'nombre'=>'Sistemas Envigado'),
             7=>array('id'=>577, 'nombre'=>'Sistemas Perú'),
             8=>array('id'=>578, 'nombre'=>'Sistemas Rionegro'),
             9=>array('id'=>579, 'nombre'=>'Sistemas Argentina'),
             10=>array('id'=>581, 'nombre'=>'Sistemas Turbo'),
             11=>array('id'=>582, 'nombre'=>'Sistemas Medicalcomplex'),
             12=>array('id'=>450, 'nombre'=>'Alexandra Vélez Grisales'),
             13=>array('id'=>501, 'nombre'=>'Jorge Arboleda Vallejo'),
             14=>array('id'=>490, 'nombre'=>'Edwin Ayala Palomeque'),
             15=>array('id'=>500, 'nombre'=>'Carlos Villa Rojas'),
             16=>array('id'=>2, 'nombre'=>'Cristián Álvarez Chacón'),
             17=>array('id'=>430, 'nombre'=>'Fernando Padron Jabib')),

            'Equipos de cómputo'=>array(0=>array('id'=>351, 'nombre'=>'Sistemas La 80'),
            1=>array('id'=>72, 'nombre'=>'Sistemas Laureles'),
            2=>array('id'=>564, 'nombre'=>'Sistemas Estadio'),
            3=>array('id'=>565, 'nombre'=>'Sistemas Caucasia'),
            4=>array('id'=>566, 'nombre'=>'Sistemas Apartadó'),
            5=>array('id'=>50, 'nombre'=>'Sistemas Bello'),
            6=>array('id'=>190, 'nombre'=>'Sistemas Envigado'),
            7=>array('id'=>577, 'nombre'=>'Sistemas Perú'),
            8=>array('id'=>578, 'nombre'=>'Sistemas Rionegro'),
            9=>array('id'=>579, 'nombre'=>'Sistemas Argentina'),
            10=>array('id'=>581, 'nombre'=>'Sistemas Turbo'),
            11=>array('id'=>582, 'nombre'=>'Sistemas Medicalcomplex'),
                                        12=>array('id'=>450, 'nombre'=>'Alexandra Vélez Grisales'),
                                        13=>array('id'=>501, 'nombre'=>'Jorge Arboleda Vallejo'),
                                        14=>array('id'=>490, 'nombre'=>'Edwin Ayala Palomeque'),
                                        15=>array('id'=>500, 'nombre'=>'Carlos Villa Rojas'),
                                        16=>array('id'=>2, 'nombre'=>'Cristián Álvarez Chacón'),
                                        17=>array('id'=>430, 'nombre'=>'Fernando Padron Jabib')),

            'Servidores'=>array(0=>array('id'=>351, 'nombre'=>'Sistemas La 80'),
             1=>array('id'=>72, 'nombre'=>'Sistemas Laureles'),
             2=>array('id'=>564, 'nombre'=>'Sistemas Estadio'),
             3=>array('id'=>565, 'nombre'=>'Sistemas Caucasia'),
             4=>array('id'=>566, 'nombre'=>'Sistemas Apartadó'),
             5=>array('id'=>50, 'nombre'=>'Sistemas Bello'),
             6=>array('id'=>190, 'nombre'=>'Sistemas Envigado'),
             7=>array('id'=>577, 'nombre'=>'Sistemas Perú'),
             8=>array('id'=>578, 'nombre'=>'Sistemas Rionegro'),
             9=>array('id'=>579, 'nombre'=>'Sistemas Argentina'),
             10=>array('id'=>581, 'nombre'=>'Sistemas Turbo'),
             11=>array('id'=>582, 'nombre'=>'Sistemas Medicalcomplex'),
             12=>array('id'=>450, 'nombre'=>'Alexandra Vélez Grisales'),
             13=>array('id'=>501, 'nombre'=>'Jorge Arboleda Vallejo'),
             14=>array('id'=>490, 'nombre'=>'Edwin Ayala Palomeque'),
             15=>array('id'=>500, 'nombre'=>'Carlos Villa Rojas'),
             16=>array('id'=>2, 'nombre'=>'Cristián Álvarez Chacón'),
             17=>array('id'=>430, 'nombre'=>'Fernando Padron Jabib')),
            
            'Sistemas de Información'=>array(0=>array('id'=>449,'nombre'=>'Edwing Mejia'),
                                 1=>array('id'=>438, 'nombre'=>'Samir Cordoba'),
                                  2=>array('id'=>165,'nombre'=>'Alexander Montoya'), 
                                  3=>array('id'=>415,'nombre'=>'Cristina Murillo'), 
                                  4=>array('id'=>4,'nombre'=>'Deysi Aguirre'),
                                   5=>array('id'=>300,'nombre'=>'Ana Paniagua')),

            'Zeus'=>array(0=>array('id'=>351, 'nombre'=>'Sistemas La 80'),
            1=>array('id'=>72, 'nombre'=>'Sistemas Laureles'),
            2=>array('id'=>564, 'nombre'=>'Sistemas Estadio'),
            3=>array('id'=>565, 'nombre'=>'Sistemas Caucasia'),
            4=>array('id'=>566, 'nombre'=>'Sistemas Apartadó'),
            5=>array('id'=>50, 'nombre'=>'Sistemas Bello'),
            6=>array('id'=>190, 'nombre'=>'Sistemas Envigado'),
            7=>array('id'=>577, 'nombre'=>'Sistemas Perú'),
            8=>array('id'=>578, 'nombre'=>'Sistemas Rionegro'),
            9=>array('id'=>579, 'nombre'=>'Sistemas Argentina'),
            10=>array('id'=>581, 'nombre'=>'Sistemas Turbo'),
            11=>array('id'=>582, 'nombre'=>'Sistemas Medicalcomplex'),
            12=>array('id'=>450, 'nombre'=>'Alexandra Vélez Grisales'),
            13=>array('id'=>501, 'nombre'=>'Jorge Arboleda Vallejo'),
            14=>array('id'=>490, 'nombre'=>'Edwin Ayala Palomeque'),
            15=>array('id'=>500, 'nombre'=>'Carlos Villa Rojas'),
            16=>array('id'=>2, 'nombre'=>'Cristián Álvarez Chacón'),
            17=>array('id'=>430, 'nombre'=>'Fernando Padron Jabib')),
            
            'Intranet'=>array(0=>array('id'=>2, 'nombre'=>'Cristian Alvarez'),
                              1=>array('id'=>500, 'nombre'=>'Carlos Villa'),
                              2=>array('id'=>430, 'nombre'=>'Fernando Padrón')),
            
            'Ingreso de Empleado'=>array(0=>array('id'=>351, 'nombre'=>'Sistemas La 80'),
            1=>array('id'=>72, 'nombre'=>'Sistemas Laureles'),
            2=>array('id'=>564, 'nombre'=>'Sistemas Estadio'),
            3=>array('id'=>565, 'nombre'=>'Sistemas Caucasia'),
            4=>array('id'=>566, 'nombre'=>'Sistemas Apartadó'),
            5=>array('id'=>50, 'nombre'=>'Sistemas Bello'),
            6=>array('id'=>190, 'nombre'=>'Sistemas Envigado'),
            7=>array('id'=>577, 'nombre'=>'Sistemas Perú'),
            8=>array('id'=>578, 'nombre'=>'Sistemas Rionegro'),
            9=>array('id'=>579, 'nombre'=>'Sistemas Argentina'),
            10=>array('id'=>581, 'nombre'=>'Sistemas Turbo'),
            11=>array('id'=>582, 'nombre'=>'Sistemas Medicalcomplex'),
            12=>array('id'=>450, 'nombre'=>'Alexandra Vélez Grisales'),
            13=>array('id'=>501, 'nombre'=>'Jorge Arboleda Vallejo'),
            14=>array('id'=>490, 'nombre'=>'Edwin Ayala Palomeque'),
            15=>array('id'=>500, 'nombre'=>'Carlos Villa Rojas'),
            16=>array('id'=>2, 'nombre'=>'Cristián Álvarez Chacón'),
            17=>array('id'=>430, 'nombre'=>'Fernando Padron Jabib')),

            'Retiro de Empleado'=>array(0=>array('id'=>351, 'nombre'=>'Sistemas La 80'),
            1=>array('id'=>72, 'nombre'=>'Sistemas Laureles'),
            2=>array('id'=>564, 'nombre'=>'Sistemas Estadio'),
            3=>array('id'=>565, 'nombre'=>'Sistemas Caucasia'),
            4=>array('id'=>566, 'nombre'=>'Sistemas Apartadó'),
            5=>array('id'=>50, 'nombre'=>'Sistemas Bello'),
            6=>array('id'=>190, 'nombre'=>'Sistemas Envigado'),
            7=>array('id'=>577, 'nombre'=>'Sistemas Perú'),
            8=>array('id'=>578, 'nombre'=>'Sistemas Rionegro'),
            9=>array('id'=>579, 'nombre'=>'Sistemas Argentina'),
            10=>array('id'=>581, 'nombre'=>'Sistemas Turbo'),
            11=>array('id'=>582, 'nombre'=>'Sistemas Medicalcomplex'),
            12=>array('id'=>450, 'nombre'=>'Alexandra Vélez Grisales'),
            13=>array('id'=>501, 'nombre'=>'Jorge Arboleda Vallejo'),
            14=>array('id'=>490, 'nombre'=>'Edwin Ayala Palomeque'),
            15=>array('id'=>500, 'nombre'=>'Carlos Villa Rojas'),
            16=>array('id'=>2, 'nombre'=>'Cristián Álvarez Chacón'),
            17=>array('id'=>430, 'nombre'=>'Fernando Padron Jabib')),

            'PQRSF Empleado'=>array(0=>array('id'=>475, 'nombre'=>'Paola Isabel Fonseca Díaz')),



             'Publicación de Contenidos en Intranet'=>array(0=>array('id'=>503, 'nombre'=>'Andres García Montoya'),
                                            1=>array('id'=>502, 'nombre'=>'Laura Vasquez')),
             'Publicación de Contenidos Página Web'=>array(0=>array('id'=>503, 'nombre'=>'Andres García Montoya'),
                                                1=>array('id'=>502, 'nombre'=>'Laura Vasquez')),
            'Revisión y/o Creación de Contenido'=>array(0=>array('id'=>503, 'nombre'=>'Andres García Montoya'),
                                             1=>array('id'=>502, 'nombre'=>'Laura Vasquez')),
            'Mantenimiento y/o Instalación de contenido Imagen Corporativa'=>array(0=>array('id'=>503, 'nombre'=>'Andres García Montoya'),
                                             1=>array('id'=>502, 'nombre'=>'Laura Vasquez')),
            'Solicitud de Piezas Publicitarias'=>array(0=>array('id'=>503, 'nombre'=>'Andres García Montoya'),
                                             1=>array('id'=>502, 'nombre'=>'Laura Vasquez')),
            'Creación de Campaña Publicitaria'=>array(0=>array('id'=>503, 'nombre'=>'Andres García Montoya'),
                                             1=>array('id'=>502, 'nombre'=>'Laura Vasquez')),
            'Creación de Videos Institucionales'=>array(0=>array('id'=>503, 'nombre'=>'Andres García Montoya'),
                                             1=>array('id'=>502, 'nombre'=>'Laura Vasquez')),

             'Mantenimiento'=>array(0=>array('id'=>365, 'nombre'=>'Paula del Castillo'),
                                    1=>array('id'=>149, 'nombre'=>'Jesica Durango'),
                                    2=>array('id'=>476 , 'nombre'=>'Luisa Giraldo'),
                                    3=>array('id'=>502, 'nombre'=>'Laura Vasquez'),
                                    4=>array('id'=>275, 'nombre'=>'Derlys Sofia Suarez Guerra'),
                                    5=>array('id'=>430, 'nombre'=>'Fernando Padron')),
             'Compras'=>array(0=>array('id'=>365, 'nombre'=>'Paula del Castillo'),
                                1=>array('id'=>149, 'nombre'=>'Jesica Durango'),
                                2=>array('id'=>476 , 'nombre'=>'Luisa Giraldo'),
                                3=>array('id'=>502, 'nombre'=>'Laura Vasquez'),
                                4=>array('id'=>275, 'nombre'=>'Derlys Sofia Suarez Guerra'),
                                5=>array('id'=>430, 'nombre'=>'Fernando Padron')),
             'Mensajeria'=>array(0=>array('id'=>365, 'nombre'=>'Paula del Castillo'),
                                1=>array('id'=>149, 'nombre'=>'Jesica Durango'),
                                2=>array('id'=>476 , 'nombre'=>'Luisa Giraldo'),
                                3=>array('id'=>502, 'nombre'=>'Laura Vasquez'),
                                4=>array('id'=>275, 'nombre'=>'Derlys Sofia Suarez Guerra'),
                                5=>array('id'=>430, 'nombre'=>'Fernando Padron')),
            );  

            return $asignacion;
    }
    
    public function roles($i)
    {
        $roles=array(
            430 => 'Sistemas',
            501 => 'Sistemas - Zeus',
            502 => 'Comunicaciones',
            476 => 'Compras y Mantenimiento',
            500 => 'Sistemas',
            2 => 'Sistemas',
            475 => 'Gestión Humana'

            );  

            return $roles[$i];
    }
    
}
