<!DOCTYPE html>
<html>
<head>
	<title>Certificado Laboral</title>
	<!-- Latest compiled and minified CSS -->
</head>
<style>
	body {
  background-image: url("/img/sumi/fondo.png");
  background-repeat: no-repeat;
}
</style>
<body> 
@php

date_default_timezone_set("America/Bogota");
$fecha = utf8_encode(strtotime($users[0]->F_InicioContrato));
$cargo = ucfirst(strtolower($users[0]->Cargo));
$hoy = utf8_encode(strtotime(date('Y-m-d')));
$f = explode('-', $users[0]->F_InicioContrato);
$dia=date("l", $fecha);


if ($dia=="Monday") $dia="Lunes";
if ($dia=="Tuesday") $dia="Martes";
if ($dia=="Wednesday") $dia="Miércoles";
if ($dia=="Thursday") $dia="Jueves";
if ($dia=="Friday") $dia="Viernes";
if ($dia=="Saturday") $dia="Sabado";
if ($dia=="Sunday") $dia="Domingo";

$mes=date("F", $fecha);

if ($mes=="January") $mes="Enero";
if ($mes=="February") $mes="Febrero";
if ($mes=="March") $mes="Marzo";
if ($mes=="April") $mes="Abril";
if ($mes=="May") $mes="Mayo";
if ($mes=="June") $mes="Junio";
if ($mes=="July") $mes="Julio";
if ($mes=="August") $mes="Agosto";
if ($mes=="September") $mes="Setiembre";
if ($mes=="October") $mes="Octubre";
if ($mes=="November") $mes="Noviembre";
if ($mes=="December") $mes="Diciembre";
// Fecha Actual
$hoy1 = date("l", $hoy);
if ($hoy1=="Monday") $hoy1="Lunes";
if ($hoy1=="Tuesday") $hoy1="Martes";
if ($hoy1=="Wednesday") $hoy1="Miércoles";
if ($hoy1=="Thursday") $hoy1="Jueves";
if ($hoy1=="Friday") $hoy1="Viernes";
if ($hoy1=="Saturday") $hoy1="Sabado";
if ($hoy1=="Sunday") $hoy1="Domingo";

$mes1=date("F", $hoy);

if ($mes1=="January") $mes1="Enero";
if ($mes1=="February") $mes1="Febrero";
if ($mes1=="March") $mes1="Marzo";
if ($mes1=="April") $mes1="Abril";
if ($mes1=="May") $mes1="Mayo";
if ($mes1=="June") $mes1="Junio";
if ($mes1=="July") $mes1="Julio";
if ($mes1=="August") $mes1="Agosto";
if ($mes1=="September") $mes1="Setiembre";
if ($mes1=="October") $mes1="Octubre";
if ($mes1=="November") $mes1="Noviembre";
if ($mes1=="December") $mes1="Diciembre";



$ano=date("Y");
$date = $dia. ' '. date('d', $fecha) . ' de ' .' '. $mes. ' de '. date('Y', $fecha);
$datehoy = $hoy1. ' '. date('d', $hoy) . ' de ' .' '. $mes1. ' de '. date('Y', $hoy);


@endphp
	<h3 style="padding-top:180px; text-align: center;">CERTIFICA QUE</h3>
	<br>
	<br>
	<br>
	<br>
	<br>
	<p style="text-align: justify; padding-left:70px; padding-right:70px; font-size:18px;line-height:28px;">
		La persona <b>{{ $users[0]->Nombres }}</b>, identificado(a) con Cédula de Ciudadanía número
		<b>{{ $users[0]->Identificacion }}</b>, se encuentra laborando en esta empresa como <b>{{ $users[0]->Cargo }}</b>, desde el día <b>@php echo $date;  @endphp</b> hasta la fecha; con
		un contrato a <b>término fijo</b> y con un salario básico de $<b>{{ $users[0]->SueldoBasico }}</b> ({{$letras}}PESOS M/L)<i></i> mensuales.
	</p>
	<br>
	<br>
		<p style="text-align: justify; padding-left:70px; padding-right:70px; font-size:18px">
		

		La presente se expide el día @php echo $datehoy;  @endphp.
	</p>
	<br>
	<br>
	<br>
	<p style="text-align: justify; padding-left:70px; padding-right:70px; font-size:18px">
		Atentamente,
	</p>
	<br>
	<br>
	<br>
	<br>
	<br>

	<!-- Latest compiled and minified JavaScript -->


</body>
</html>