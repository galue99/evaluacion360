@extends('layouts.layout')
@section('title','Nueva Encuestas')

@section('content')
<div class="row" id="NuevaEncuestas">
	<div class="col-xs-10 pull-center animated" data-bind="visible: !showForm(), css: {fadeIn: !showForm()}">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Evaluacion 360</h3>
			</div>
			<div class="box-body">
				<div class="attachment-block clearfix">
					<div class="attachment-pushed">
						<h4 class="attachment-heading text-center">Gracias por estar aqui!</h4><br>
						<div class="attachment-text">
	                    	<li>
	                    		¡Gracias por estar aquí! Este cuestionario es personal y anónimo. Su nombre no debe aparecer en ninguna parte del formulario. La información será presentada como un promedio y de forma grupal.
	                    	</li>
	                 	</div>
	                 	<div class="attachment-text">
	                 		<li>
	                 			El objetivo es conocer lo que hace bien y lo que debe aprender cada supervisor, con la finalidad de tomar las acciones adecuadas de capacitación y desarrollo.
	                 		</li>
	                 	</div>
	                 	<div class="attachment-text">
	                 		<li>
	                 			Agradecemos que tus respuestas sean lo más sinceras y cercanas a la realidad posible, ya que de esto depende que nuestros supervisores sean cada vez mejores.
	                 		</li>
	                 	</div>
	                 	<div class="attachment-text">
	                 		<li>
	                 			Es indispensable que tengas al menos un año trabajando con la persona que vas a evaluar.
	                 		</li>
	                 	</div>
	                 	<div class="attachment-text">
	                 		<li>
	                 			Si existiese alguna irregularidad o comportamiento inadecuado de un supervisor, como consecuencia de haber llenado este formulario,
	                 		</li>
	                 	</div>
	                 	<div class="attachment-text">
                 			<ul>
                 				<li><strong>Teléfono:</strong> 811.579.5525</li>
                 				<li><strong>Correo:</strong> <a href="">mary.v@mejorar-se.com</a></li>
                 			</ul>
	                 	</div>

	                 	<dt class="attachment-heading text-left">Persona a evaluar.</dt>                 	
	                 	<form action="" class="form" id="formPersonEval">
	                 		<div class="form-group">
                 				<div class="checkbox">
                 					<label class="label-control">
					                	<input type="checkbox"> Auto-Evaluacion 
					              	</label>
					            </div>
	                 		</div>
	                 		<div class="form-group">
                 				<div class="checkbox">
                 					<label class="label-control">
					                	<input type="checkbox"> Par
					              	</label>
					            </div>
	                 		</div>
	                 		<div class="form-group">
                 				<div class="checkbox">
                 					<label class="label-control">
					                	<input type="checkbox"> Jefe
					              	</label>
					            </div>
	                 		</div>
	                 		<div class="form-group">
                 				<div class="checkbox">
                 					<label class="label-control">
					                	<input type="checkbox"> Supervisado
					              	</label>
					            </div>
	                 		</div>
	                 	</form>
	                </div>
	            </div>
			</div>
			<div class="box-footer">
				<button class="btn btn-primary pull-right" data-bind="click: toggleEncuesta">Iniciar Encuesta</button>
			</div>
		</div>
	</div>


	<div class="col-xs-12 animated" data-bind="visible: showForm, css: {fadeIn: showForm}">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Nueva Encuesta</h3>
			</div>
			<div class="box-body">
				<h1>Formulario</h1>
			</div>
			<div class="box-footer">
				<button class="btn btn-primary pull-left" data-bind="click: toggleEncuesta">Cancelar</button>
				<button class="btn btn-primary pull-right">Siguiente</button>
			</div>
		</div>
	</div>
</div>
@stop
