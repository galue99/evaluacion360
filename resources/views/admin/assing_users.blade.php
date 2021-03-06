@extends('layouts.layout')

@section('content')
<div class="row">
	<div class="col-xs-11 pull-center" id="AssignUsersTest">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">
					Asignacion de Usuarios a la Evaluacion
				</h3>
			</div>
			<div class="box-body">
				<button class="btn btn-primary" data-bind="click: newAssing"><i class="fa fa-plus"></i> Agregar Nuevo</button>

				<div class="row"><div class="box-divider col-xs-12"></div></div>
				<div class="col-xs-12" data-bind="visible: showForm">
					<form action="" class="form row" id="formAssignUsersTest">
						<div class="col-xs-6 col-md-4 separate">
						    <div class="form-group">
						        <label class="label-control">Evaluación</label>
						        <select name="" id="" class="form-control" data-bind="optionsCaption: 'Seleccione una encuesta', options: tests, optionsText: 'name', optionsValue: 'id', value: formData().id_encuesta"></select>
						    </div>
						</div>
						
						<div class="col-xs-6 col-md-4 separate">
						    <div class="form-group">
				            	<label class="label-control">Usuario</label>
				                <select name="" id="" class="form-control" data-bind="optionsCaption: 'Seleccione un usuario', options: users, optionsText: 'firstname', optionsValue: 'id', value: formData().id_user"></select>
						    </div>
						</div>
						<div class="col-xs-6 col-md-4 separate">
						    <div class="form-group">
						    <label for="">Estado</label>
						      <input id="status" class="cmn-toggle cmn-toggle-round" type="checkbox" data-bind="checked: formData().status">
                				<label for="status"></label>
						    </div>
						</div>
						<div class="form-group col-xs-9 col-md-12 text-right">
							<div class="form-group">
								<button class="btn btn-primary" data-bind="click: save">Asignar</button>
								<button class="btn btn-danger" role="button" click="click: toggleForm">Cancelar</button>
							</div>
						</div>
					</form>
				</div>
				

				<div class="table-responsive">
					<table id="" class="table table-bordered table-hover">
						<thead>
						    <tr>
								<th class="col-xs-2 text-center">Nombre</th>
								<th class="col-xs-2 text-center">Evaluación</th>
								<th class="col-xs-2 text-center">Email</th>
								<th class="col-xs-2 text-center">Estado de la Evaluación</th>
								<th class="col-xs-2 text-center">Acciones</th>
						    </tr>
						</thead>
						<tbody data-bind="foreach: userTests">
							<tr>
								<td data-bind="text: firstname + ' ' + lastname" class="text-center"></td>
								<td data-bind="text: name" class="text-center"></td>
								<td data-bind="text: email" class="text-center"></td>
								<td data-bind="text: status == 1 ? 'No realizada' : 'realizada' " class="text-center"></td>
								<td class="text-center">
									<i class="fa fa-pencil fa-blue pointer"></i>
									<i class="fa fa-close fa-red pointer"></i>
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