@extends('layouts.layout')
@section('title','Nueva Encuestas')

@section('content')
<div class="row" id="NuevaEncuestas">
	<div class="col-xs-12" data-bind="visible: !showForm(), css: {fadeIn: !showForm()}">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Nueva Encuesta</h3>
			</div>
			<div class="box-body">
				<h1>Introduccion</h1>
			</div>
			<div class="box-footer">
				<button class="btn btn-primary pull-right" data-bind="click: toggleEncuesta">Iniciar Encuesta</button>
			</div>
		</div>
	</div>


	<div class="col-xs-12" data-bind="visible: showForm, css: {fadeIn: showForm}">
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
