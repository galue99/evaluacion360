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
				                <label class="label-control">Nombre Completo</label>
				                <input type="text" name="firstname" class="form-control" data-bind="textInput: formData().fullname">
					        </div>
						</div>
						<div class="col-xs-6 col-md-4 separate">
					        <div class="form-group">
				                <label class="label-control">Email</label>
				                <input type="text" name="firstname" class="form-control" data-bind="textInput: formData().email">
					        </div>
						</div>
						<div class="col-xs-6 col-md-4 separate">
					        <div class="form-group">
					        <label for="">Status</label>
	                          <div class="col-sm-offset-2 col-sm-10">
	                            <div class="checkbox">
	                            	<label>
	                                	<input type="checkbox"> Activo / Inactivo
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
				</div><!-- Form Evaluadores -->
				

				<div class="table-responsive">
					<table id="" class="table table-bordered table-hover">
						<thead>
						    <tr>
						      <th class="col-xs-2">Nombre Completo</th>
						      <th class="col-xs-2">Email</th>
						      <th class="col-xs-2">Estatus</th>
						      <th class="col-xs-2">Acciones</th>
						    </tr>
						</thead>
						<tbody>
							<tr>
								<td>Data</td>
							    <td>Data</td>
							    <td>Data</td>
							    <td>
							    	<i class="fa fa-pencil fa-blue"></i>
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