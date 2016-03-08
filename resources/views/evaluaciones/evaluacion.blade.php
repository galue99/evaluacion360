@extends('layouts.layout')
@section('title','Nueva Encuestas')

@section('content')
<!-- <div class="row" id="NewTest">
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
				<p>INSTRUCCIONES: Lea con cuidado cada una de las frases y escoja la opción que mejor describa el desempeño del
					supervisor que va a evaluar, encerrando en un círculo el número de la casilla correspondiente.</p>
				<div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <td colspan="3" rowspan="2" class="text-center"><h2>Comportamiento</h2></td>
                            <td colspan="5" class="text-center"><h3>Escala de Evaluaciones</h3></td>
                        </tr>
                        <tr>
                            <td class="text-center">Nunca</td>
                            <td class="text-center">Rara Vez</td>
                            <td class="text-center">A veces</td>
                            <td class="text-center">Casi Siempre</td>
                            <td class="text-center">Siempre</td>
                        </tr>
                        <tr>
                            <td rowspan="10">1</td>
                            <td>0</td>
                            <td>Llega (5) minutos antes de la hora de entrada.</td>
                            <td class="text-center"><input type="radio"></td>
                            <td class="text-center"><input type="radio"></td>
                            <td class="text-center"><input type="radio"></td>
                            <td class="text-center"><input type="radio"></td>
                            <td class="text-center"><input type="radio"></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Cumple con sus responsabilidades sin afectar los resultados
                                de sus compañeros o el equipo.</td>
                            <td class="text-center"><input type="radio"></td>
                            <td class="text-center"><input type="radio"></td>
                            <td class="text-center"><input type="radio"></td>
                            <td class="text-center"><input type="radio"></td>
                            <td class="text-center"><input type="radio"></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Toma en cuenta las necesidades y sentimientos de las
                                personas de manera respetuosa y con un buen trato.</td>
                            <td class="text-center"><input type="radio"></td>
                            <td class="text-center"><input type="radio"></td>
                            <td class="text-center"><input type="radio"></td>
                            <td class="text-center"><input type="radio"></td>
                            <td class="text-center"><input type="radio"></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Escucha las opiniones o sugerencias de los demás,
                                mostrando respeto y agradecimiento.</td>
                            <td class="text-center"><input type="radio"></td>
                            <td class="text-center"><input type="radio"></td>
                            <td class="text-center"><input type="radio"></td>
                            <td class="text-center"><input type="radio"></td>
                            <td class="text-center"><input type="radio"></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Motiva a su equipo, manteniendo una actitud positiva ante
                                los cambios y nuevos retos.</td>
                            <td class="text-center"><input type="radio"></td>
                            <td class="text-center"><input type="radio"></td>
                            <td class="text-center"><input type="radio"></td>
                            <td class="text-center"><input type="radio"></td>
                            <td class="text-center"><input type="radio"></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Ayuda a sus compañeros, dando ideas para alcanzar la meta
                                y mejorar el trabajo.</td>
                            <td class="text-center"><input type="radio"></td>
                            <td class="text-center"><input type="radio"></td>
                            <td class="text-center"><input type="radio"></td>
                            <td class="text-center"><input type="radio"></td>
                            <td class="text-center"><input type="radio"></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Integra al empleado nuevo, mostrándole las instalaciones,
                                presentándolo a los demás, enseñándole cómo hacer el
                                trabajo y haciéndolo sentir a gusto.</td>
                            <td class="text-center"><input type="radio"></td>
                            <td class="text-center"><input type="radio"></td>
                            <td class="text-center"><input type="radio"></td>
                            <td class="text-center"><input type="radio"></td>
                            <td class="text-center"><input type="radio"></td>
                        </tr>
                    </table>
				</div>
			</div>
			<div class="box-footer">
				<button class="btn btn-primary pull-left" data-bind="click: toggleEncuesta">Cancelar</button>
				<button class="btn btn-primary pull-right">Siguiente</button>
			</div>
		</div>
	</div>
</div> -->

<div class="row" id="NewTest">
<div class="col-xs-12 animated">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title" data-bind="text: $root.finish">Nueva Encuesta</h3>

			</div>
			<div class="box-body">
        <div >
          <!-- ko if: $root.currentItem().frases.length > 0 -->
          <h5 data-bind="text: $root.currentItem().frases[$root.currentIndexFrase()].name"></h5>
          <!-- /ko -->
        </div>
			</div>
			<div class="box-footer">
				<button class="btn btn-primary pull-left" data-bind="click: toggleEncuesta">Cancelar</button>
				<button class="btn btn-primary pull-right" data-bind="click: next, visible: !finish()">Siguiente</button>
        <button class="btn btn-primary pull-right" data-bind="click: next, visible: finish">Finalizar Encuesta</button>
			</div>
		</div>
	</div>
</div>



@stop
