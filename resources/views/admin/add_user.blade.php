@extends('layouts.layout')

@section('content')
<div class="row">
	<div class="col-xs-11 pull-center" id="evaluadores">
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
						<div class="col-xs-6 col-md-4 separate">
						    <div class="form-group">
						        <label class="label-control">Nombre</label>
						        <input type="text" name="firstname" id="firstname" class="form-control" data-bind="textInput: formData().firstname">
						    </div>
						</div>
						<div class="col-xs-6 col-md-4 separate">
						    <div class="form-group">
						        <label class="label-control">Apellido</label>
						        <input type="text" name="lastname" id="lastname" class="form-control" data-bind="textInput: formData().lastname">
						    </div>
						</div>
						<div class="col-xs-6 col-md-4 separate">
						    <div class="form-group">
						        <label class="label-control">Nro. de Identificacion</label>
						        <input type="number" name="dni" id="dni" class="form-control" data-bind="textInput: formData().dni">
						    </div>
						</div>
						<div class="col-xs-6 col-md-4 separate">
						    <div class="form-group">
						        <label class="label-control">Email</label>
						        <input type="email" name="email" id="email" class="form-control" data-bind="textInput: formData().email">
						    </div>
						</div>
						<div class="col-xs-6 col-md-4 separate">
						    <div class="form-group">
						        <label class="label-control">Password</label>
						        <input type="password" name="password" id="password" class="form-control" data-bind="textInput: formData().password">
						    </div>
						</div>
						<div class="col-xs-6 col-md-4 separate">
						    <div class="form-group">
						        <label class="label-control">Cargo</label>
						        <input type="text" name="position" id="position" class="form-control" data-bind="textInput: formData().position">
						    </div>
						</div>
						<div class="col-xs-6 col-md-4 separate">
						    <div class="form-group">
						        <label class="label-control">Empresa</label>
						        <input type="text" name="company" id="company" class="form-control" data-bind="textInput: formData().company">
						    </div>
						</div>
						<div class="col-xs-6 col-md-4 separate">
							<div class="form-group">
								<label class="label-control">Sucursal</label>
								<input type="text" name="branch_office" id="branch_office" class="form-control" data-bind="textInput: formData().branch_office">
							</div>
						</div>
						<div class="col-xs-6 col-md-4 separate">
						    <div class="form-group">
				            	<label class="label-control">Rol</label>
				                <select class="form-control" name="idroluser" id="idroluser" data-bind="optionsCaption: 'Seleccione un rol', options: roles, optionsText: 'name', optionsValue: 'idroluser', textInput: formData().idrol" ></select>
						    </div>
						</div>
						<div class="col-xs-6 col-md-4 separate">
						    <div class="form-group">
						    <label for="">Status</label>
						      <input id="status" class="cmn-toggle cmn-toggle-round" type="checkbox" data-bind="checked: formData().is_active">
                				<label for="status"></label>
						    </div>
						</div>
						<div class="form-group col-xs-9 col-md-12 text-right">
							<div class="form-group">
								<button class="btn btn-primary" data-bind="click: save">Guardar</button>
								<button class="btn btn-danger" role="button" data-bind="click: toggleForm">Cancelar</button>
							</div>
						</div>
					</form>
				</div>
				<!-- Form Evaluadores -->
				

				<div class="table-responsive">
					<table id="" class="table table-bordered table-hover">
						<thead>
						    <tr>
								<th class="col-xs-2 text-center">Nombre Completo</th>
								<th class="col-xs-2 text-center">Email</th>
								<th class="col-xs-2 text-center">Nro. de Identificacion</th>
								<th class="col-xs-2 text-center">Cargo</th>
								<th class="col-xs-2 text-center">Empresa</th>
								<th class="col-xs-2 text-center">Sucursal</th>
								<th class="col-xs-2 text-center">Estatus</th>
								<th class="col-xs-2 text-center">Acciones</th>
						    </tr>
						</thead>
						<tbody data-bind="foreach: evaluadores">
							<tr>
								<td data-bind="text: firstname + ' ' + lastname" class="text-center"></td>
							    <td data-bind="text: email" class="text-center"></td>
							    <td data-bind="text: dni" class="text-center"></td>
							    <td data-bind="text: position" class="text-center"></td>
							    <td data-bind="text: company" class="text-center"></td>
							    <td data-bind="text: branch_office" class="text-center"></td>
							    <td data-bind="text: is_active == 1 ? 'Activo' : 'Inactivo'" class="text-center"></td>
							    <td class="text-center">
							    	<i class="fa fa-pencil fa-blue pointer" data-bind="click: $root.editEvaluadores"></i>
							    	<i class="fa fa-close fa-red pointer" data-bind="click: $root.removeEvaluadores"></i>
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