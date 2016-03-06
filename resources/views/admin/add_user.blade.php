@extends('layouts.layout')

@section('content')
<div class="row">
	<div class="col-xs-11 pull-center" id="evaluadores">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">
					Evaluadores
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
						        <input type="text" name="firstname" class="form-control" data-bind="textInput: formData().firstname">
						    </div>
						</div>
						<div class="col-xs-6 col-md-4 separate">
						    <div class="form-group">
						        <label class="label-control">Apellido</label>
						        <input type="text" name="lastname" class="form-control" data-bind="textInput: formData().lastname">
						    </div>
						</div>
						<div class="col-xs-6 col-md-4 separate">
						    <div class="form-group">
						        <label class="label-control">cedula</label>
						        <input type="number" name="dni" class="form-control" data-bind="textInput: formData().dni">
						    </div>
						</div>
						<div class="col-xs-6 col-md-4 separate">
						    <div class="form-group">
						        <label class="label-control">Email</label>
						        <input type="email" name="email" class="form-control" data-bind="textInput: formData().email">
						    </div>
						</div>
						<div class="col-xs-6 col-md-4 separate">
						    <div class="form-group">
						        <label class="label-control">Password</label>
						        <input type="password" name="password" class="form-control" data-bind="textInput: formData().password">
						    </div>
						</div>
						<div class="col-xs-6 col-md-4 separate">
						    <div class="form-group">
						        <label class="label-control">Departamento</label>
						        <input type="text" name="deparment" class="form-control" data-bind="textInput: formData().deparment">
						    </div>
						</div>
						<div class="col-xs-6 col-md-4 separate">
						    <div class="form-group">
						        <label class="label-control">Posicion</label>
						        <input type="text" name="position" class="form-control" data-bind="textInput: formData().position">
						    </div>
						</div>
						<div class="col-xs-6 col-md-4 separate">
						    <div class="form-group">
				            	<label class="label-control">Rol</label>    
				                <select class="form-control" name="idrol" id="state" data-bind="optionsCaption: 'Seleccione un rol', options: roles, optionsText: 'name', optionsValue: 'idroluser', textInput: formData().idrol" ></select>
						    </div>
						</div>
						<div class="col-xs-6 col-md-4 separate">
						    <div class="form-group">
						    <label for="">Status</label>
						      <div class="col-sm-offset-2 col-sm-10">
						        <div class="checkbox">
						        	<label>
						            	<input type="checkbox" name="is_active" value="1" data-bind="checked: formData().is_active"> Activo / Inactivo
						        	</label>
						        </div>
						      </div>
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
						      <th class="col-xs-2">Nombre Completo</th>
						      <th class="col-xs-2">Email</th>
						      <th class="col-xs-2">DNI</th>
						      <th class="col-xs-2">Departamento</th>
						      <th class="col-xs-2">Posicion</th>
						      <th class="col-xs-2">Estatus</th>
						      <th class="col-xs-2">Acciones</th>
						    </tr>
						</thead>
						<tbody data-bind="foreach: evaluadores">
							<tr>
								<td data-bind="text: firstname + ' '+ lastname"></td>
							    <td data-bind="text: email"></td>
							    <td data-bind="text: dni"></td>
							    <td data-bind="text: deparment"></td>
							    <td data-bind="text: position"></td>
							    <td data-bind="text: is_active == 1 ? 'Activo' : 'Inactivo'"></td>
							    <td>
							    	<i class="fa fa-pencil fa-blue" data-bind="click: $root.editEvaluadores"></i>
							    	<i class="fa fa-close fa-red"></i>
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