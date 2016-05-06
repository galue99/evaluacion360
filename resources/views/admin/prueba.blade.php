<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
		<link href="{{ asset("/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div class="cabecera">
			<div class="row">
				<div class="col-xs-2">
					<img src="{{ asset("images/logo/360.png") }}" class="img-responsive" alt="">
				</div>
			</div>
		</div>
		<h1 class="title"><i class="fa fa-comments" aria-hidden="true"></i> Introdución</h1>
		<p class="text">
			La Evaluación 3600 es un instrumento que sirve como apoyo para su desarrollo profesional y de carrera ya que identifica elementos claves sobre los cuales es posible fortalecer su desempeño, así como identificar los elementos que ya usted posee desarrollados y coloca al servicio de la organización.
			En este informe se muestran los resultados del proceso de Evaluación 3600, en el cual participaron usted y sus observadores de una manera estructurada y confidencial (a excepción de la evaluación de su jefe).
		</p>
		<div class="col-xs-12 content-text-gris">
			<p class="text">
				<p class="subtitle">Y además aporta elementos en los siguientes aspectos:</p>
				<ul>
					<li><span>Identificar cómo se percibe usted en cuanto a su actuación en el trabajo.</span></li>
					<li><span>Conocer como es observado(a) por las personas que trabajan con usted diariamente.</span></li>
					<li><span>Identificar las diferencias existentes entre el perfil ideal que debe tener toda persona que trabaja en la organización, y sus resultados.</span></li>
					<li><span>Identificar las diferencias existentes entre el perfil ideal del cargo y sus resultados.</span></li>
					<li><span>Tener mayor claridad sobre lo que la organización espera de usted, en cuanto a sus competencias laborales.</span></li>
				</ul>
			</p>
		</div>
		<p class="text">
			El conjunto de competencias contenidas en este informe fueron desarrolladas y seleccionadas específicamente por la alta dirección de la organización donde labora, tratando de reflejar la manera como la organización espera cumplir sus objetivos estratégicos; es por esto que es importante su total compromiso frente a esta evaluación, y frente a las acciones posteriores que apoyarán su capacitación y desarrollo.
		</p>
		<h1 class="title"><i class="fa fa-file-text" aria-hidden="true"></i> Contenido</h1>
		<table class="table table-no-bordered">
			<tr>
				<td>¿Cómo leer este informe?</td>
				<td class="diez text-center">3</td>
			</tr>
			<tr>
				<td>Descripción de las competencias evaluadas
					<ul>
						<li>Competencias Organizacionales</li>
						<li>Competencias del Cargo: Supervisores</li>
					</ul>
				</td>
				<td class="diez text-center">4</td>
			</tr>
			<tr>
				<td>Resumen general de la evaluación de las competencias 6</td>
				<td class="diez text-center">6</td>
			</tr>
			<tr>
				<td>Análisis de cada competencia</td>
				<td class="diez text-center">10</td>
			</tr>
			<tr>
				<td>Semáforo: Resumen general</td>
				<td class="diez text-center">14</td>
			</tr>
			<tr>
				<td>Semáforo por comportamiento específico</td>
				<td class="diez text-center">15</td>
			</tr>
			<tr>
				<td>Comentarios de los observadores</td>
				<td class="diez text-center">21</td>
			</tr>
			<tr>
				<td>Lista de competencias por desarrollar</td>
				<td class="diez text-center">22</td>
			</tr>
		</table>
		<div class="saltopagina"></div>


		
	</body>
	<style>
	.cabecera{
		border-bottom: solid 4px #FFA400;
	}
	.cabecera > div > div{
		padding-bottom: 5px;
	}
	h1.title{
		font-size: 2em;
		color: #4D4D4D;
	}
	h1.title i{
		font-size: 1.5em;
		color: #EF8E00;
	}
	p.text{
		color: #222222;
		text-align: justify;
	}
	p.subtitle {
	    font-size: 1.3em;
	    font-weight: 500;
	}
	div.content-text-gris {
	    background-color: #ECECEC;
	    padding: 5px 30px 5px 30px;
	}
	div.content-text-gris ul > li {
    	color: #EF8E00;
	}
	div.content-text-gris ul > li > span {
	    color: black;
	}
	table td.diez{
		width: 10px;
	}
	.table.table-no-bordered>tbody>tr>td,
	.table.table-no-bordered>tbody>tr>th,
	.table.table-no-bordered>tfoot>tr>td,
	.table.table-no-bordered>tfoot>tr>th,
	.table.table-no-bordered>thead>tr>td,
	.table.table-no-bordered>thead>tr>th
	{
		padding: 2px 0 2px 0;
		border-color: transparent;
	}



	@media all {
	   div.saltopagina{
	      display: none;
	   }
	}
	   
	@media print{
	   div.saltopagina{ 
	      display:block; 
	      page-break-before:always;
	   }
	}
	</style>
</html>