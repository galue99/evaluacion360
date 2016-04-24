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
				<div class="col-xs-12">
					{!! Form::open(
					    array(
					        'route' => 'admin.img.update',
					        'class' => 'form', 
					        'method' => 'PUT',
					        'novalidate' => 'novalidate', 
					        'files' => true)) !!}
					
					<div class="form-group separate col-xs-6 col-md-4">
					    {!! Form::label('Nombre de la empresa') !!}
					    <input type="text" name="name" class="form-control" value="{{$company->name}}" />
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
				



			</div>
			<div class="box-footer">
				<button class="btn btn-danger pull-left" data-bind="visible: showForm, click: toggleForm">Cancelar</button>
			</div>
		</div>
	</div>
</div>
@stop