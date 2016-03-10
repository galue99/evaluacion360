@extends('layouts.test')
@section('title','Nueva Encuestas')

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
                 				<li><strong>Teléfono:</strong> 811.579.5525</li>
                 				<li><strong>Correo:</strong> <a href="">mary.v@mejorar-se.com</a></li>
                 			</ul>
	                 	</div>
                        <div class="attachment-text">
                            <p><strong>INSTRUCCIONES:</strong> Lea con cuidado cada una de las frases y escoja la opción que mejor describa el desempeño del supervisor que va a evaluar, encerrando en un círculo el número de la casilla correspondiente.</p><br>
                        </div>
	                </div>
	            </div>
			</div>
			<div class="box-footer">
				<button class="btn btn-primary pull-right" data-bind="click: toggleEncuesta">Iniciar Encuesta</button>
			</div>
		</div>
	</div>



	<div class="col-xs-12 col-md-10 pull-center animated" data-bind="visible: showForm, css: {fadeIn: showForm}">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Gracias por estar aqui!</h3>
			</div>
			<div class="box-body">
        <div class="attachment-block clearfix">
          <div class="attachment-pushed">
            <h4 class="attachment-heading text-center"><strong>Categoria <span data-bind="text: $root.currentItem() + 1"></span></strong></h4><br><div class="col-xs-12 col-sm-5">
              <!-- ko if: $root.currentItem().frases.length > 0 -->
                  <h5 data-bind="text: $root.currentItem().frases[$root.currentIndexFrase()].name"></h5>
              <!-- /ko -->
              </div>
              <div class="col-xs-12 col-sm-7" data-bind="foreach: $root.currentItem().frases[$root.currentIndexFrase()].answers">
                <div class="col-xs-2 text-center">
                  <div class="form-group">
                    <div class="radio">
                      <label class="label-control"><strong><span data-bind="text: name"></span></strong>
                        <input type="radio" class="radioOptions" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                      </label>
                    </div>
                  </div>
                </div>
              </div>


          </div>
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

<!-- <div class="row" id="NewTest">
<div class="col-xs-10 pull-center animated">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title" data-bind="text: $root.finish">Nueva Encuesta</h3>
			</div>
			<div class="box-body">
        <div > -->
          <!-- ko if: $root.currentItem().frases.length > 0 -->
          <!-- <h5 data-bind="text: $root.currentItem().frases[$root.currentIndexFrase()].name"></h5> -->
          <!-- /ko -->
        <!-- </div>
			</div>
			<div class="box-footer">
				<button class="btn btn-primary pull-left" data-bind="click: toggleEncuesta">Cancelar</button>
				<button class="btn btn-primary pull-right" data-bind="click: next, visible: !finish()">Siguiente</button>
        <button class="btn btn-primary pull-right" data-bind="click: next, visible: finish">Finalizar Encuesta</button>
			</div>
		</div>
	</div>
</div> -->



@stop
