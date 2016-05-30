@extends('layouts.layout')

@section('content')
<div class="row">
	<div class="col-xs-11 pull-center" id="evaluadores">
	<div data-bind='template: { name: "template-evaluadores", afterRender: loadScripts }'> </div>
	
	</div>
		
</div>


<script type="text/html" id="template-evaluadores">
	<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">
					Usuarios
				</h3>
			</div>
			<div class="box-body">
				<button class="btn btn-primary" data-bind="click: toggleForm"><i class="fa fa-plus"></i> Agregar Nuevo</button>

				<div class="row"><div class="box-divider col-xs-12"></div></div>
				<div class="col-xs-12" data-bind="visible: showForm">
					<form action="" class="form row" id="formEvaluadores">
						<div class="col-xs-12 col-md-4 separate">
						    <div class="form-group">
						        <label class="label-control">Nombre</label>
						        <input type="text" name="firstname" id="firstname" class="form-control" data-bind="textInput: formData().firstname">
						    </div>
						</div>
						<div class="col-xs-12 col-md-4 separate">
						    <div class="form-group">
						        <label class="label-control">Apellido</label>
						        <input type="text" name="lastname" id="lastname" class="form-control" data-bind="textInput: formData().lastname">
						    </div>
						</div>
						<div class="col-xs-12 col-md-4 separate">
						    <div class="form-group">
						        <label class="label-control">Nro. de Identificacion</label>
						        <input type="number" name="dni" id="dni" class="form-control" data-bind="textInput: formData().dni">
						    </div>
						</div>
						<div class="col-xs-12 col-md-4 separate">
						    <div class="form-group">
						        <label class="label-control">Email</label>
						        <input type="email" name="email" id="email" class="form-control" data-bind="textInput: formData().email">
						    </div>
						</div>
						<div class="col-xs-12 col-md-4 separate">
						    <div class="form-group">
						        <label class="label-control">Cargo</label>
						        <input type="text" name="position" id="position" class="form-control" data-bind="textInput: formData().position">
						    </div>
						</div>
						<div class="col-xs-12 col-md-4 separate">
						    <div class="form-group">
						        <label class="label-control">Empresa</label>
						        <select class="form-control" name="company" data-bind="optionsCaption: 'Seleccione una empresa', options: companies, optionsText: 'name', optionsValue: 'id', value: $root.formData().company_id "></select>
						    </div>
						</div>
						<div class="col-xs-12 col-md-4 separate">
							<div class="form-group">
								<label class="label-control">Sucursal</label>
								<input type="text" name="branch_office" id="branch_office" class="form-control" data-bind="textInput: formData().branch_office">
							</div>
						</div>
						<div class="col-xs-12 col-md-4 separate">
						    <div class="form-group">
						    <label for="">Estado</label>
						      <input id="status" class="cmn-toggle cmn-toggle-round" type="checkbox" data-bind="checked: formData().is_active">
                				<label for="status"></label>
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
				<!-- Form Evaluadores -->
				
				<div class="col-xs-12 table-responsive">
					<table id="dataTable" class="table table-bordered table-striped">
						<thead>
						    <tr>
								<th class="text-center">Nombre</th>
								<th class="text-center">Apellido</th>
								<th class="text-center">Email</th>
								<th class="text-center">Nro. de Identificacion</th>
								<th class="text-center">Cargo</th>
								<th class="text-center">Empresa</th>
								<th class="text-center">Sucursal</th>
								<th class="text-center">Estatus</th>
						    </tr>
						</thead>
					</table>					
				</div>

			<div class="box-footer">
				
			</div>
		</div>
	</div>
</script>

@stop