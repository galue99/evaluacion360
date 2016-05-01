@extends('layouts.layout')

@section('content')
	<div class="row">
		<div class="col-xs-11 pull-center" id="listsSurveys">
			<div class="box box-primary" data-bind="visible: showListTest">
				<div class="box-header with-border">
					<h3 class="box-title">
						Encuestas Realizadas
					</h3>
				</div>
				<div class="box-body">
					<div class="table-responsive">
						<table id="" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>Encuesta</th>
									<th>Evaluador</th>
									<th>Nro. de Identificacion</th>
									<th>Email</th>
									<th>Cargo</th>
									<th>Ver Respuesta</th>
								</tr>
							</thead>
							<tbody data-bind="foreach: tests">
								<tr>
									<td data-bind="text: name"></td>
									<td data-bind="text: firstname + ' ' + lastname"></td>
									<td data-bind="text: dni"></td>
									<td data-bind="text: email"></td>
									<td data-bind="text: position"></td>
									<td class="text-center">
										<i class="fa fa-eye fa-blue pointer" data-bind="click: $root.viewDetails"></i>
									</td>
								</tr>
							</tbody>
						</table>					
					</div>

				</div>
				<div class="box-footer">
					
				</div>
			</div>

			<div class="box box-primary" data-bind="visible: !showListTest()">
				<div class="box-header with-border">
					<h3 class="box-title">
						Respuesta de la encuesta
					</h3>
				</div>
				<div class="box-body">
					<div class="col-xs-12 separate" data-bind="foreach: user">
						<div class="form-group col-xs-3">
							<label>Nombre del evaluador</label>
							<input type="text" class="form-control" readonly="true" data-bind="textInput: firstname + ' ' + lastname">
						</div>
						<div class="form-group col-xs-3">
							<label>Cedula</label>
							<input type="text" class="form-control" readonly="true" data-bind="textInput: dni">
						</div>
						<div class="form-group col-xs-3">
							<label>email</label>
							<input type="text" class="form-control" readonly="true" data-bind="textInput: email">
						</div>
						<div class="form-group col-xs-3">
							<label>nivel</label>
							<input type="text" class="form-control" readonly="true" data-bind="textInput: nivel">
						</div>
					</div>
					<div class="col-xs-12 table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th class="col-xs-10">Pregunta</th>
									<th class="col-xs-2">Respuesta</th>
								</tr>
							</thead>
							<tbody data-bind="foreach: answers">
								<tr>
									<td data-bind="text: pregunta"></td>
									<td class="text-center" data-bind="text: respuesta"></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="row">
						<div class="col-xs-12 box-divider"></div>
					</div>
					<div class="col-xs-12 text-center">
						<h4>Preguntas Adicionales</h4>
					</div>	
					<div class="col-xs-12">
						<!--ko foreach: otherAnswers-->
						<div class="panel box box-primary">
							<div class="box-header with-border">
								<h4 class="box-title">
									<a
									data-toggle="collapse"
									data-parent="#accordion"
									aria-expanded="false"
									class="collapsed"
									data-bind="text: question, attr: {href: '#' + id}"></a>
								</h4>
							</div>
							<div  class="panel-collapse collapse" aria-expanded="false" style="height: 0px;" data-bind="attr: {id: id}">
								<div class="box-body" data-bind="text: answers">
									
								</div>
							</div>
						</div>
						<!--/ko-->
					</div>
				</div>
				
				<div class="box-footer">
					<button class="btn btn-danger pull-left" data-bind="click: toggleListTest"><i class="fa fa-arrow-left"></i> Atras</button>
				</div>
			</div>
		</div>
	</div>
@stop