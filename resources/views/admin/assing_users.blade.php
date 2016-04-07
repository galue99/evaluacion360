@extends('layouts.layout')

@section('content')
<div class="row">
	<div class="col-xs-11 pull-center" id="">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">
					Asignacion de usuario a encuesta
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
						        <label class="label-control">Encuesta</label>
						        <select name="" id="" class="form-control">
				                	<option value="">Seleccione una encuesta</option>
				                </select>
						    </div>
						</div>
						
						<div class="col-xs-6 col-md-4 separate">
						    <div class="form-group">
				            	<label class="label-control">Usuario</label>
				                <!-- <select class="form-control" name="idroluser" id="idroluser" data-bind="optionsCaption: 'Seleccione un rol', options: roles, optionsText: 'name', optionsValue: 'idroluser', textInput: formData().idrol" ></select> -->
				                <select name="" id="" class="form-control">
				                	<option value="">Seleccione un usuario</option>
				                </select>
						    </div>
						</div>
						<div class="form-group col-xs-9 col-md-12 text-right">
							<div class="form-group">
								<button class="btn btn-primary">Guardar</button>
								<button class="btn btn-danger" role="button">Cancelar</button>
							</div>
						</div>
					</form>
				</div>
				

				<div class="table-responsive">
					<table id="" class="table table-bordered table-hover">
						<thead>
						    <tr>
								<th class="col-xs-2 text-center">asasas</th>
								<th class="col-xs-2 text-center">assasa</th>
						    </tr>
						</thead>
						<tbody>
							<tr>
								<td></td>
								<td></td>
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