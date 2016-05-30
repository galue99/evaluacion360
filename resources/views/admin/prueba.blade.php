@extends('layouts.layout')
@section('content')

<div class="row">
	<div class="col-sm-11 col-xs-12 pull-center" id="prueba">
		
		<div data-bind='template: { name: "template-prueba", afterRender: loadScripts }'> </div>
		
	</div>
</div>

<script type="text/html" id="template-prueba">
	<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">
					pruebas
				</h3>
			</div>
			<div class="box-body">
				<div class="table-responsive" >
					<table id="dataTable">
						<thead>
							<tr>
								<td></td>
								<td></td>
								<td></td>
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