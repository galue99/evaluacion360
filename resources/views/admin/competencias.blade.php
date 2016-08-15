@extends('layouts.layout')

@section('content')
<div class="row">
	<div class="col-sm-11 col-xs-12 pull-center" id="competencias">
		<div data-bind='template: { name: "template", afterRender: loadScripts }'> </div>
		
		</div>
	</div>
</div>

<script type="text/html" id="template">
	<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">
					Competencias
				</h3>
			</div>
			<div class="box-body">
				<button class="btn btn-primary" data-bind="click: toggleForm"><i class="fa fa-plus"></i> Agregar Nuevo</button>

				<div class="row"><div class="box-divider col-xs-12"></div></div>
				<div class="col-xs-12" data-bind="visible: showForm">
					<form action="" class="form row" id="formCompetencia">
						<div class="col-xs-12 col-md-6 separate">
						    <div class="form-group">
						        <label class="label-control">Nombre</label>
						        <input type="text" name="name" id="name" class="form-control" data-bind="textInput: formData().name">
						    </div>
						</div>
						<div class="col-xs-12 col-md-6 separate">
						    <div class="form-group">
						        <label class="label-control">Tipo de competencia</label>
						        <select class="form-control" name="type" id="type" data-bind="options: typeCompetencia, optionsText: 'type', optionsValue: 'type' ,value: formData().type, optionsCaption: 'Seleccione el tipo de competencia'">
						        	
						        </select>
						    </div>
						</div>
						<div class="col-xs-12 col-md-6 separate">
						    <div class="form-group">
						        <label class="label-control">Descripción</label>
						        <textarea name="description" id="description" class="form-control" data-bind="textInput: formData().description"></textarea>
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
					<table id="dataTable" class="table table-bordered table-hover">
						<thead>
						    <tr>
								<th class="col-xs-2 text-center">Nombre</th>
								<th class="col-xs-2 text-center">Tipo</th>
								<th class="col-xs-2 text-center">Descripción</th>
								<th class="col-xs-2 text-center">Acciones</th>
						    </tr>
						</thead>
					</table>
				</div>

			</div>
			<div class="box-footer">
				
			</div>
		</div>
</script>
@stop