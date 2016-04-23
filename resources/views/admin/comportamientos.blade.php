@extends('layouts.layout')

@section('content')
<div class="row">
	<div class="col-xs-12 col-sm-11 pull-center" id="comportamientos">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">
					Comportamientos
				</h3>
			</div>
			<div class="box-body">
				<button class="btn btn-primary" data-bind="click: toggleForm"><i class="fa fa-plus"></i> Agregar Nuevo</button>

				<div class="row"><div class="box-divider col-xs-12"></div></div>
				<div class="col-xs-12" data-bind="visible: showForm">
					<form action="" class="form row" id="formCompetencia">
						<div class="col-xs-12 col-md-6 separate">
						    <div class="form-group">
						        <label class="label-control">Seleccione una competencia</label>
						        <select class="form-control" data-bind="optionsCaption: 'Seleccione una competencia', options: competencias, optionsText: 'name', optionsValue: 'id', value: $root.formData().competencia_id "></select>
						    </div>
						</div>
						<div class="col-xs-12 col-md-6 separate">
						    <div class="form-group">
						        <label class="label-control">Nombre</label>
						        <input type="text" name="firstname" id="firstname" class="form-control" data-bind="textInput: formData().name">
						    </div>
						</div>
						<div class="col-xs-12 col-md-12 separate">
						    <div class="form-group">
						        <label class="label-control">Descripcion</label>
						        <textarea name="" id="" class="form-control" data-bind="textInput: formData().description"></textarea>
						    </div>
						</div>
						<div class="form-group col-xs-9 col-md-12 text-right">
							<div class="form-group">
								<button class="btn btn-primary" data-bind="click: save">Guardar</button>
								<button class="btn btn-danger" role="button" data-bind="click: cancel">Cancelar</button>
							</div>
						</div>
					</form>
				</div>
				<!-- Form Competencias -->
				
				<div class="table-responsive">
					<table id="" class="table table-bordered table-hover">
						<thead>
						    <tr>
								<th class="col-xs-2 text-center">Nombre</th>
								<th class="col-xs-2 text-center">Descripcion</th>
								<th class="col-xs-2 text-center">Competencia</th>
								<th class="col-xs-2 text-center">Acciones</th>
						    </tr>
						</thead>
						<tbody data-bind="foreach: {data: comportamientos, as: 'comportamiento'}">
							<tr>
								<td class="text-center" data-bind="text: name" ></td>
							    <td data-bind="text: definicion" class="text-center"></td>
							    <!-- ko foreach: {data: competencia, as: 'competencia'} -->
							    <td class="text-center" data-bind="text: name"></td>
							    <!-- /ko -->
							    <td class="text-center">
							    	<i class="fa fa-pencil fa-blue pointer" data-bind="click: $root.editComportamientos"></i>
							    	<i class="fa fa-close fa-red pointer" data-bind="click: $root.removeComportamientos"></i>
							    </td>
							</tr>
						</tbody>
					</table>					
				</div>

			</div>
			<div class="box-footer">
				
			</div>
		</div>
	</div>
</div>
@stop