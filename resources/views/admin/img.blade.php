@extends('layouts.layout')

@section('content')
<div class="row">
	<div class="col-xs-11 pull-center" id="company">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">
					Empresas
				</h3>
			</div>
			<div class="box-body">
				<button class="btn btn-primary" data-bind="click: toggleForm"><i class="fa fa-plus"></i> Agregar Nuevo</button>

				<div class="row"><div class="box-divider col-xs-12"></div></div>
				<div class="col-xs-12" data-bind="visible: showForm">
					{!! Form::open(
					    array(
					        'route' => 'admin.img.store',
					        'class' => 'form', 
					        'novalidate' => 'novalidate', 
					        'files' => true)) !!}
					
					<div class="form-group separate col-xs-6 col-md-4">
					    {!! Form::label('Nombre de la empresa') !!}
					    {!! Form::text('name',null ,['class' => 'form-control']) !!}
					</div>

					<div class="form-group separate col-xs-6  col-md-4">
					    {!! Form::label('Logo de la Empresa') !!}
					    {!! Form::file('image', null) !!}
					</div>

					<div class="form-group col-xs-12 separate">
					    {!! Form::submit('Crear Empresa', ['class' => 'btn btn-info pull-right']) !!}
					</div>
					{!! Form::close() !!}
				</div>
				

				<div class="table-responsive" data-bind="visible: !showForm()">
					<table id="" class="table table-bordered table-striped">
						<thead>
						    <tr>
								<th class="col-xs-2 text-center">Nombre de la Empresa</th>
								<th class="col-xs-2 text-center">Logo</th>
								<th class="col-xs-2 text-center">Acción</th>
						    </tr>
						</thead>
						<tbody data-bind="foreach: companies">
							<tr>
								<td data-bind="text: name" class="text-center"></td>
							    <td>
							    	<figure>
							    		<img class="logo" data-bind="attr: {'src': url}">
							    	</figure>
							    </td>
							    <td class="text-center">
							    	<a data-bind="attr: {href: '/admin/img/'+ id + '/edit'}"><i class="fa fa-blue fa-pencil pointer"></i></a>
							    	<a href="{{ URL::to('admin/img/2/edit') }}"class="btn btn-small btn-info">Edit</a>
							    	<a href="{{ URL::to('admin/img/2/destroy') }}" class="btn btn-small btn-warning">Delete</a>
							    </td>
							</tr>
						</tbody>
					</table>					
				</div>

			</div>
			<div class="box-footer">
				<button class="btn btn-danger pull-left" data-bind="visible: showForm, click: toggleForm">Cancelar</button>
			</div>
		</div>
	</div>
</div>
@stop