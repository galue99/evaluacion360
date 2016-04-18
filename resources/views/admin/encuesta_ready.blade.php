@extends('layouts.layout')

@section('content')
    <div class="row">
    		<div class="col-xs-11 pull-center" id="listsSurveys">
    			<div class="box box-primary">
    				<div class="box-header with-border">
    					<h3 class="box-title">
    						Encuestas Realizadas
    					</h3>
    				</div>
    				<div class="box-body">
    					<div class="table-responsive">
    						<table id="" class="table table-bordered table-hover">
    							<thead>
    							    <tr>
    									<th class="col-xs-2 text-center">Nombre Completo</th>
    									<th class="col-xs-2 text-center">Email</th>
    									<th class="col-xs-2 text-center">Nro. de Identificacion</th>
    									<th class="col-xs-2 text-center">Cargo</th>
    							    </tr>
    							</thead>
    							<tbody data-bind="foreach: tests">
    								<tr>
	    								<td data-bind="text: name"></td>
	    								<td ></td>
	    								<td></td>
    								    <td class="text-center">
    								    	<i class="fa fa-eye fa-blue pointer"></i>
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