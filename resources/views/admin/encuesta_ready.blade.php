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
									<th>Empresa</th>
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
									<td data-bind="text: company_id"></td>
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

			<div data-bind="visible: !showListTest()">
				<h1>Mostrar Respuestas</h1>
			</div>
		</div>
	</div>
@stop