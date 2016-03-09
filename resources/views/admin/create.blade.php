@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-xs-11 pull-center" id="evaluadores">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        Crear Encuesta
                    </h3>
                </div>
                <div class="box-body">
                    <div class="row">

                    </div>
                    <div class="col-xs-12">
                        <form action="" class="form row" id="formEvaluadores">
                            <div class="col-xs-6 col-md-4 separate">
                                <div class="form-group">
                                    <label class="label-control">Agregar Items</label><br>
                                    <button>Agregar Items</button>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4 separate">
                                <div class="form-group">
                                    <label class="label-control">Agregar Comportamiento</label><br>
                                    <button>Agregar Comportamiento</button>
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

                </div>
                <div class="box-footer">

                </div>
            </div>
        </div>
    </div>
@stop