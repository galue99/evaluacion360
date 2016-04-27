@extends('layouts.test')
@section('title','Nueva Evaluacion')

@section('content')
<div class="row" id="NewTest">
	<div class="col-xs-12 col-md-10 pull-center animated" data-bind="visible: !showForm(), css: {fadeIn: !showForm()}">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Evaluacion 360</h3>
			</div>
			<div class="box-body">
				<div class="attachment-block clearfix">
					<div class="attachment-pushed">
						<h4 class="attachment-heading text-center"><strong>Gracias por estar aqui!</strong></h4><br>
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
								<li><strong>Teléfono:</strong><a href="tel:811.579.5525">  811.579.5525</a></li>
								<li><strong>Correo:</strong> <a href="mailto:mary.v@mejorar-se.com?subject=Irregularidad Por Encuesta">mary.v@mejorar-se.com</a></li>

							</ul>
						</div>
						<div class="attachment-text">
							<p><strong>INSTRUCCIONES:</strong> Lea con cuidado cada una de las frases y escoja la opción que mejor describa el desempeño del supervisor que va a evaluar, encerrando en un círculo el número de la casilla correspondiente.</p><br>
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
				<button class="btn btn-primary pull-right" data-bind="click: toggleEncuesta">Iniciar Evaluación</button>
			</div>
		</div>
	</div>



	<div class="col-xs-12 col-md-10 pull-center animated" data-bind="visible: showForm, css: {fadeIn: showForm}">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Evaluación <strong style="margin-right: 20px;" data-bind="text: nameTest"></strong>  Usuario a evaluar <strong data-bind="text: userEvaluado"></strong></h3>
			</div>
			<div class="box-body">
				<div class="attachment-block clearfix">
					<div class="attachment-pushed" data-bind="visible: !$root.finish()">
						<h4 class="attachment-heading text-center"><strong data-bind="text: $root.currentItem().name"></strong></h4><br>
						<div class="col-xs-12 col-sm-5">
							<!-- ko if: $root.currentItem().frases.length > 0 -->
							<h5 data-bind="text: $root.currentItem().frases[$root.currentIndexFrase()].name"></h5>
							<!-- /ko -->
						</div>
						<div class="col-xs-12 col-sm-7" data-bind="foreach: $root.currentItem().frases[$root.currentIndexFrase()].answers">
							<div class="col-xs-6 col-sm-2 text-center">
								<div class="row form-group">
									<div class="radio">
										<label class="label-control">
										<strong><span data-bind="text: name"></span></strong><br>
											<input type="radio" class="radioOptions pull-center" name="optionsRadios" data-bind="checked: $root.currentAnswer, checkedValue: $data">
										</label>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="attachment-pushed" data-bind="visible: $root.finish()">
						<h4 class="attachment-heading text-center">
							Primera parte de la encuesta de <strong>terminada!</strong>
						</h4><br>
						<h5>Hagla click en <strong><ins>Siguiente parte</ins></strong> para continuar con la encuesta</h5>
					</div>
				</div>
			</div>
			<div class="box-footer">
				<button class="btn btn-primary pull-left" data-bind="click: toggleEncuesta">Cancelar</button>
				<button class="btn btn-primary pull-right" data-bind="click: setAnswer, text: $root.finish() ? 'Siguiente Parte' : 'Siguiente'"></button>
			</div>
		</div>
	</div>

	<div class="modal" id="modal1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span></button>
						<h4 class="modal-title">Segunda parte</h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-xs-12" data-bind="foreach: formData().otherQuestion">
								<div class="col-xs-12 col-sm6">
									<div class="form-group">
										<label for="" class="label-control" data-bind="text: OtherQ_question">Menciona una (01) fortaleza, o cosa que haga muy bien esta persona:</label>
				                  		<textarea class="form-control" rows="3" placeholder="Ingrese su respuesta" data-bind="textInput: OtherQ_answer"></textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-success" data-bind="click: setAnswerPartTwo">Finalizar Encuesta</button>
					</div>
				</div>
			</div>
		</div>
	</div>



@stop
