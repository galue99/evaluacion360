@extends('layouts.layout')

@section('content')
<div class="row">
	<div class="col-xs-12 col-sm-11 pull-center" id="comportamientos">
		<div data-bind='template: { name: "template-competencias", afterRender: loadScripts }'> </div>
		
		</div>
		
		
	</div>
</div>

<script type="text/html" id="template-competencias">
	<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">
					Competencias y sus comportamientos
				</h3>
			</div>
			<div class="box-body">
				<!--ko if: !Unselected() -->
				<button class="btn btn-primary" data-bind="click: newComportamiento"><i class="fa fa-plus"></i> Agregar Nuevo</button>
				<div class="row"><div class="box-divider col-xs-12"></div></div>
				<!--/ko-->
				<div class="col-xs-12" data-bind="visible: showForm">
					<form action="" class="form row" id="formComportamiento">
						<div class="col-xs-12 col-md-6 separate">
						    <div class="form-group">
						        <label class="label-control">Seleccione una competencia</label>
						        <!--ko if: Unselected -->
							        <select class="form-control" name="competencia"
							        data-bind="optionsCaption: 'Seleccione una competencia',
							        options: competencias,
							        optionsText: 'name',
							        optionsValue: 'id',
							        "></select>
						        <!-- /ko -->
						        <!--ko if: !Unselected() -->
						        <span class="form-control" disabled data-bind="text: competeSelected().name"></span>
						        <!-- /ko -->
						    </div>
						</div>
						<div class="col-xs-12 col-md-6 separate">
						    <div class="form-group">
						        <label class="label-control">Comportamiento</label>
						        <input type="text" name="name" id="firstname" class="form-control" data-bind="textInput: formData().name">
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
				
				<div class="table-responsive" data-bind="visible: !tableComportamientos()">
					<table class="table table-bordered table-hover" id="dataTable">
						<thead>
						    <tr>
								<th class=" text-center">Competencia</th>
								<th class=" text-center">Descripcion</th>
								<th class=" text-center">Ver Comportamientos</th>
						    </tr>
						</thead>
					</table>
				</div>
				<div class="table-responsive"  data-bind="visible: tableComportamientos">
					<table class="table table-bordered table-hover">
						<thead>
						    <tr>
								<th class=" text-center">Comportamientos</th>
								<th class=" text-center">Acciones</th>
						    </tr>
						</thead>
						<!-- ko if: competenciaSeleted --> 
						<tbody data-bind="foreach: competenciaSeleted().comportamientos">
							<tr>
								<td class="text-center" data-bind="text: name"></td>
							    <td class="text-center">
							    	<i class="fa fa-pencil fa-blue pointer" data-bind="click: $root.editComportamientos"></i>
							    	<i class="fa fa-close fa-red pointer" data-bind="click: $root.removeComportamientos"></i>
							    </td>
							</tr>
						</tbody>
						<!--/ko-->
					</table>
					
				</div>
				
				
				

			</div>
			<div class="box-footer">
				<!--ko if: tableComportamientos -->
				<button class="btn btn-danger" data-bind="click: toggleBox"><span class="fa fa-arrow-left"></span> Atras</button>
				<!--/ko-->
			</div>
		</div>
</script>
@stop